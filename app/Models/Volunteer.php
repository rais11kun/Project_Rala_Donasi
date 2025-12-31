<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Volunteer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function event()
{
    // Pastikan foreign key-nya adalah event_id
    return $this->belongsTo(Event::class, 'event_id');
}
}
