<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('uuid',15)->unique();
            $table->string('username', 50)->unique();
            $table->string('first_name',50)->nullable();
            $table->string('middle_name', 50)->nullable();
            $table->string('last_name',50)->nullable();
            $table->string('department',50)->nullable();
            $table->string('position',50)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('is_admin');
            $table->boolean('is_deleted');
            $table->string('created_at');
            $table->string('updated_at');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
