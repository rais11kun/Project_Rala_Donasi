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
        Schema::table('events', function (Blueprint $blueprint) {
            // Menambahkan kolom target donasi dan dana terkumpul
            // Menggunakan decimal agar bisa menyimpan nominal besar dengan presisi
            $blueprint->decimal('goal', 15, 2)->default(0)->after('cat'); 
            $blueprint->decimal('raised', 15, 2)->default(0)->after('goal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $blueprint) {
            $blueprint->dropColumn(['goal', 'raised']);
        });
    }
};
