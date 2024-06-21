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
        Schema::create('structure_service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('structure_id');
            $table->unsignedBigInteger('service_id');
            $table->timestamps();

            // Clés étrangères
            $table->foreign('structure_id')->references('id')->on('structures')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('structure_service');
    }
};
