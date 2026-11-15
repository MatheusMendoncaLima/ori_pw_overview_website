<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $name = config('ori.admin.name');
        $email = config('ori.admin.email');
        $password = config('ori.admin.password');

        if (! $name && ! $email && ! $password) {
            $this->command?->warn('Administrador inicial ignorado. Configure ORI_ADMIN_NAME, ORI_ADMIN_EMAIL e ORI_ADMIN_PASSWORD no .env.');
            return;
        }

        $validator = Validator::make(
            ['name' => $name, 'email' => $email, 'password' => $password],
            ['name' => ['required', 'string', 'max:255'], 'email' => ['required', 'email', 'max:255'], 'password' => ['required', 'string', Password::min(12)->mixedCase()->numbers()->symbols()]],
        );

        if ($validator->fails()) {
            throw new \InvalidArgumentException('Credenciais ORI_ADMIN_* inválidas: '.$validator->errors()->first());
        }

        $user = User::query()->firstOrNew(['email' => $email]);
        $user->forceFill(['name' => $name, 'password' => Hash::make($password), 'role' => 'admin'])->save();
    }
}
