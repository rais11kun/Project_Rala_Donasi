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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('title');        // Contoh: Healthy Food
            $table->text('description');  // Deskripsi singkat
            $table->decimal('goal', 15, 2); // Target: $10000
            $table->decimal('raised', 15, 2)->default(0); // Yang sudah terkumpul
            $table->string('image');      // Nama file gambar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
