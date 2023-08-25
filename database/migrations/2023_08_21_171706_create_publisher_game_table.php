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
        Schema::create('publisher_game', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('publisher_id')->nullable();
            $table->unsignedBigInteger('game_id')->nullable();
            $table->timestamps();

            $table->foreign('publisher_id')->references('id')->on('publishers');
            $table->foreign('game_id')->references('id')->on('games');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publisher_game');
    }
};
