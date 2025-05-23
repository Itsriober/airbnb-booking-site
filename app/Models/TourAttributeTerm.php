<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
use Mews\Purifier\Casts\CleanHtml;

class TourAttributeTerm extends Model
{
    use HasFactory;

    protected $with = ['tour_attribute_term_translations'];

    public function getTranslation($field = '', $lang = false){
        $lang = $lang == false ? App::getLocale() : $lang;
        $tour_attribute_term_translation = $this->tour_attribute_term_translations->where('lang', $lang)->first();
        return $tour_attribute_term_translation != null ? $tour_attribute_term_translation->$field : $this->$field;
    }

    public function tour_attribute_term_translations(){
    	return $this->hasMany(TourAttributeTermTranslation::class,'term_id');
    }
}
