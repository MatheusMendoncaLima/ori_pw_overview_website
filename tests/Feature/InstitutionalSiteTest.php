<?php

namespace Tests\Feature;

use App\Models\InstitutionalContent;
use App\Models\User;
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\InstitutionalContentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\ResetPassword;
use Tests\TestCase;

class InstitutionalSiteTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_displays_only_active_content_and_escapes_text(): void
    {
        InstitutionalContent::create(['section' => 'who-we-are', 'title' => 'ORI público', 'summary' => '<script>alert(1)</script>', 'display_order' => 1, 'is_active' => true]);
        InstitutionalContent::create(['section' => 'problem', 'title' => 'Rascunho privado', 'summary' => 'Oculto', 'display_order' => 2, 'is_active' => false]);

        $this->get('/')->assertOk()->assertSee('ORI público')->assertSee('&lt;script&gt;alert(1)&lt;/script&gt;', false)->assertDontSee('Rascunho privado');
    }

    public function test_registration_creates_a_regular_site_user_even_with_role_input(): void
    {
        $this->post('/register', ['name' => 'Pessoa Exemplo', 'email' => 'pessoa@example.test', 'password' => 'SenhaSegura!123', 'password_confirmation' => 'SenhaSegura!123', 'role' => 'admin'])
            ->assertRedirect('/dashboard');

        $this->assertDatabaseHas('users', ['email' => 'pessoa@example.test', 'role' => 'user']);
    }

    public function test_authenticated_dashboard_is_available_without_email_verification(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user)->get('/dashboard')->assertOk()->assertSee('Painel');
    }

    public function test_dashboard_requires_authentication(): void
    {
        $this->get('/dashboard')->assertRedirect('/login');
    }

    public function test_regular_user_cannot_access_administration_routes(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user)->get('/admin/contents')->assertForbidden();
        $this->actingAs($user)->get('/admin/contents/create')->assertForbidden();
    }

    public function test_admin_can_list_create_show_update_deactivate_and_delete_content(): void
    {
        $admin = $this->admin();
        $this->actingAs($admin)->get('/admin/contents')->assertOk();
        $this->post('/admin/contents', ['section' => 'problem', 'title' => 'Fragmentação', 'summary' => 'Resumo inicial', 'details' => 'Detalhes iniciais', 'display_order' => 20, 'is_active' => '1'])
            ->assertRedirect('/admin/contents');
        $content = InstitutionalContent::where('title', 'Fragmentação')->firstOrFail();

        $this->get('/admin/contents/'.$content->id)->assertOk()->assertSee('Resumo inicial');
        $this->put('/admin/contents/'.$content->id, ['section' => 'problem', 'title' => 'Fragmentação atualizada', 'summary' => 'Resumo atualizado', 'details' => 'Detalhes atualizados', 'display_order' => 21, 'is_active' => '0', 'role' => 'admin'])
            ->assertRedirect('/admin/contents');
        $this->assertDatabaseHas('institutional_contents', ['id' => $content->id, 'title' => 'Fragmentação atualizada', 'is_active' => false]);
        $this->get('/')->assertDontSee('Fragmentação atualizada');

        $this->delete('/admin/contents/'.$content->id)->assertRedirect('/admin/contents');
        $this->assertDatabaseMissing('institutional_contents', ['id' => $content->id]);
    }

    public function test_content_validation_rejects_unknown_sections_and_negative_order(): void
    {
        $this->actingAs($this->admin())->from('/admin/contents/create')->post('/admin/contents', [
            'section' => 'mobile-user-data', 'title' => 'Inválido', 'summary' => 'Não deveria salvar', 'display_order' => -1,
        ])->assertSessionHasErrors(['section', 'display_order']);
    }

    public function test_admin_account_role_cannot_be_changed_through_profile_form(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user)->patch('/profile', ['name' => 'Nome Atualizado', 'email' => $user->email, 'role' => 'admin'])->assertRedirect('/profile');
        $this->assertSame('user', $user->fresh()->role);
    }

    public function test_login_and_logout_work(): void
    {
        $user = User::factory()->create(['password' => Hash::make('SenhaSegura!123')]);
        $this->post('/login', ['email' => $user->email, 'password' => 'SenhaSegura!123'])->assertRedirect('/dashboard');
        $this->post('/logout')->assertRedirect('/');
        $this->assertGuest();
    }

    public function test_password_reset_link_and_password_update_work(): void
    {
        Notification::fake();
        $user = User::factory()->create();
        $this->post('/forgot-password', ['email' => $user->email])->assertSessionHas('status');

        $token = null;
        Notification::assertSentTo($user, ResetPassword::class, function (ResetPassword $notification) use (&$token): bool {
            $token = $notification->token;
            return true;
        });

        $this->post('/reset-password', ['token' => $token, 'email' => $user->email, 'password' => 'OutraSenha!456', 'password_confirmation' => 'OutraSenha!456'])
            ->assertSessionHas('status');
        $this->assertTrue(Hash::check('OutraSenha!456', $user->fresh()->password));
    }

    public function test_content_seeder_is_exactly_ten_idempotent_and_preserves_admin_content(): void
    {
        $seeder = new InstitutionalContentSeeder();
        $seeder->run();
        $this->assertSame(10, InstitutionalContent::count());
        InstitutionalContent::create(['section' => 'problem', 'title' => 'Conteúdo adicionado pelo painel', 'summary' => 'Preservar', 'display_order' => 50]);
        $seeder->run();

        $this->assertSame(11, InstitutionalContent::count());
        $this->assertSame(1, InstitutionalContent::where('seed_key', 'routine')->count());
        $this->assertDatabaseHas('institutional_contents', ['title' => 'Conteúdo adicionado pelo painel']);
    }

    public function test_admin_seeder_hashes_credentials_and_is_idempotent(): void
    {
        config(['ori.admin.name' => 'Admin ORI', 'ori.admin.email' => 'admin@example.test', 'ori.admin.password' => 'Adm!nSegura2026']);
        $seeder = new AdminUserSeeder();
        $seeder->run();
        $seeder->run();

        $this->assertSame(1, User::where('email', 'admin@example.test')->count());
        $this->assertSame('admin', User::where('email', 'admin@example.test')->value('role'));
        $this->assertTrue(Hash::check('Adm!nSegura2026', User::where('email', 'admin@example.test')->value('password')));
    }

    public function test_unknown_route_returns_custom_not_found_page(): void
    {
        $this->get('/rota-inexistente')->assertNotFound()->assertSee('Este caminho')->assertSee('Voltar à página inicial');
    }

    private function admin(): User
    {
        $user = User::factory()->create();
        $user->forceFill(['role' => 'admin'])->save();
        return $user->fresh();
    }
}
