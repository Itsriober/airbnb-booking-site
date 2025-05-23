<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public function states()
    {
        return $this->belongsTo(Location::class, 'state_id');
    }

    public function countries()
    {
        return $this->belongsTo(Location::class, 'country_id');
    }
}
