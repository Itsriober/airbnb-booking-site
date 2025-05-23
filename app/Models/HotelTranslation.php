<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'address',
        'lang',
        'hotel_id'
    ];
}
