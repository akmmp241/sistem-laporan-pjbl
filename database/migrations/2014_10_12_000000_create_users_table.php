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
            $table->unsignedBigInteger('role_id')->nullable(false);
            $table->unsignedBigInteger('dudi_id')->nullable(false);
            $table->string('nis')->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('name')->nullable(false);
            $table->string('class')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
