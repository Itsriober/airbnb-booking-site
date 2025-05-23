<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'shoulder',
        'content',
        'address',
        'lang',
        'tour_id'
    ];
}
