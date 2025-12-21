<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    //

    use HasFactory;
    protected $table = 'donations';

    Protected $fillable = [
        'user_id',
        'title',
        'category_id',
        'amount',
        'note',
        'status',
        'proof_image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
{
    return $this->belongsTo(Category::class);
}

}
