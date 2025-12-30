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
        Schema::create('category_donations', function (Blueprint $table) {
            $table->id();
            $table->integer('campaign_id')->nullable(); // Menghubungkan ke ID kampanye
            $table->string('category'); // Food, Health, atau Education
            $table->decimal('amount', 15, 2); // Nominal donasi
            $table->text('notes')->nullable(); // Pesan dari tamu
            $table->string('status')->default('pending'); // Status awal untuk staff
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_donations');
    }
};
