<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourAttributeTermTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'lang', 'term_id'];
}
