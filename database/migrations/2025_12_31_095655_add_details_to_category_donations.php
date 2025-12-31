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
        Schema::table('category_donations', function (Blueprint $table) {
            //
            $table->string('name')->after('id'); // Menambahkan kolom Nama Program
            // $table->string('image')->nullable()->after('name');
            $table->string('label')->nullable(); // Untuk badge 'Food', 'Health'
            $table->text('description')->nullable();
            $table->bigInteger('goal')->default(0);
            $table->bigInteger('raised')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('category_donations', function (Blueprint $table) {
            //
        });
    }
};
