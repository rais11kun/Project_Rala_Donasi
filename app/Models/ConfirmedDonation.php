<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmedDonation extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'category_donation_id',
        'donator_name',
        'amount',
        'status',
    ];

    // Relasi ke Kategori agar Staff tahu donasi ini untuk program apa
    public function category()
    {
        return $this->belongsTo(CategoryDonation::class, 'category_donation_id');
    }
}
