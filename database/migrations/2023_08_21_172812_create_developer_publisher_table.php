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
        Schema::create('developer_publisher', function (Blueprint $table) { // Corrected table name
            $table->id();
            $table->unsignedBigInteger('developer_id')->nullable();
            $table->unsignedBigInteger('publisher_id')->nullable();
            $table->timestamps();

            $table->foreign('developer_id')->references('id')->on('developers')->onDelete('cascade');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developer_publisher'); // Corrected table name
    }
};
