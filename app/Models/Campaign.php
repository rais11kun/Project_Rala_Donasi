<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campaign extends Model
{
    //
    use HasFactory;

    // Jika di database nama tabelnya adalah 'events' (sesuai screenshot HeidiSQL Anda)
    // Maka tambahkan baris berikut agar model Campaign membaca tabel events
    protected $table = 'events';

    /**
     * Kolom yang dapat diisi (Mass Assignable)
     */
    protected $fillable = [
        'title',       // Judul kampanye (contoh: Healthy Food)
        'cat',         // Kategori (food, health, education)
        'description', // Penjelasan singkat mengenai donasi
        'goal',        // Target total donasi (contoh: 10000)
        'raised',      // Dana yang sudah terkumpul saat ini
        'img',         // Nama file gambar
        'reg',         // Wilayah atau informasi pendaftaran
    ];

    public function donations()
    {
        return $this->hasMany(Donation::class, 'campaign_id');
    }

    /**
     * Fungsi pembantu untuk menghitung persentase progres donasi
     */
    public function getPercentageAttribute()
    {
        if ($this->goal <= 0) return 0;
        return round(($this->raised / $this->goal) * 100);
    }
}
