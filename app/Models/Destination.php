<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class Destination extends Model
{

    use HasFactory;

    public function getTranslation($field = '', $lang = false)
    {
        $lang = $lang == false ? App::getLocale() : $lang;

        // Check if destination_translation is not null
        if ($this->destination_translation) {
            $destination_translation = $this->destination_translation->where('lang', $lang)->first();
            return $destination_translation != null ? $destination_translation->$field : $this->$field;
        }

        return $this->$field;
    }

    public function destination_translation()
    {
        return $this->hasMany(DestinationTranslation::class, 'destination_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function tours(){
    	return $this->hasMany(Tour::class, 'destination_id');
    }
}
