<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
use Mews\Purifier\Casts\CleanHtml;

class HotelAttributeTerm extends Model
{
    use HasFactory;

    protected $with = ['hotel_attribute_term_translations'];

    public function getTranslation($field = '', $lang = false){
        $lang = $lang == false ? App::getLocale() : $lang;
        $hotel_attribute_term_translation = $this->hotel_attribute_term_translations->where('lang', $lang)->first();
        return $hotel_attribute_term_translation != null ? $hotel_attribute_term_translation->$field : $this->$field;
    }

    public function hotel_attribute_term_translations(){
    	return $this->hasMany(HotelAttributeTermTranslation::class,'term_id');
    }
}
