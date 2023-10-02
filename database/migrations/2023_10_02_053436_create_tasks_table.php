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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("dudi_id")->nullable(false);
            $table->text('photo')->nullable(false);
            $table->text('detail')->nullable(false);
            $table->dateTime('date');
            $table->timestamps();

            $table->foreign('dudi_id')->references('id')->on('dudis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
