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
        Schema::create('attendance', function(Blueprint $table){
            $table->id();
            $table->string('uuid',15);
            $table->string('attID', 15)->unique();
            $table->string('time_in', 35)->nullable();
            $table->string('time_out', 35)->nullable();
            $table->string('date', 30)->nullable();
            $table->boolean('is_deleted');
            $table->string('created_at');
            $table->string('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
