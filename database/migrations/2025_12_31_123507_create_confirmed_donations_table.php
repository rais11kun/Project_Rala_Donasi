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
        Schema::create('confirmed_donations', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke tabel kategori donasi Anda
            $table->foreignId('category_donation_id')->constrained('category_donations')->onDelete('cascade');
            $table->string('donator_name')->default('Hamba Allah');
            $table->decimal('amount', 15, 2);
            // Status untuk dikelola Staff (pending = baru masuk, success = sudah dicek staff)
            $table->enum('status', ['pending', 'success', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confirmed_donations');
    }
};
