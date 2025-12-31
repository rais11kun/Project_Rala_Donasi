<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncomingDonation extends Model
{
    //
    protected $fillable = ['category_donation_id', 'donator_name', 'amount', 'status'];

    public function category()
    {
        return $this->belongsTo(CategoryDonation::class, 'category_donation_id');
    }
}
