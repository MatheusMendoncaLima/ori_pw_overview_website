<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('institutional_contents', function (Blueprint $table): void {
            $table->id();
            $table->string('section')->index();
            $table->string('seed_key')->nullable()->unique();
            $table->string('badge')->nullable();
            $table->string('title', 180);
            $table->text('summary');
            $table->longText('details')->nullable();
            $table->unsignedInteger('display_order')->index();
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
            $table->index(['section', 'is_active', 'display_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('institutional_contents');
    }
};
