<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
use Mews\Purifier\Casts\CleanHtml;

class TourAttribute extends Model
{
    use HasFactory;

    protected $with = ['tour_attribute_translations'];

    protected $casts = [
        'name'            => CleanHtml::class,
    ];

    public function getTranslation($field = '', $lang = false){
        $lang = $lang == false ? App::getLocale() : $lang;
        $tour_attribute_translation = $this->tour_attribute_translations->where('lang', $lang)->first();
        return $tour_attribute_translation != null ? $tour_attribute_translation->$field : $this->$field;
    }

    public function tour_attribute_translations(){
    	return $this->hasMany(TourAttributeTranslation::class, 'attribute_id');
    }

    public function tour_terms()
    {
        return $this->hasMany(TourAttributeTerm::class,'attribute_id');
    }
}
