<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryDonation extends Model
{
    //
    use HasFactory;

    // Nama tabel harus sesuai dengan migration
    protected $table = 'category_donations';

    // WAJIB: Daftarkan kolom agar bisa disimpan
    protected $fillable = [
        'campaign_id',
        'category',
        'amount',
        'notes',
        'status'
    ];
}
