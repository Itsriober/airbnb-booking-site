<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportAttributeTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'lang', 'attribute_id'];
}
