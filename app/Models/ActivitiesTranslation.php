<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivitiesTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'shoulder',
        'lang',
        'activities_id'
    ];
}
