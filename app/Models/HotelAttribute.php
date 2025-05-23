<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
use Mews\Purifier\Casts\CleanHtml;

class HotelAttribute extends Model
{
    use HasFactory;

    protected $with = ['hotel_attribute_translations'];

    protected $casts = [
        'name'            => CleanHtml::class,
    ];

    public function getTranslation($field = '', $lang = false){
        $lang = $lang == false ? App::getLocale() : $lang;
        $hotel_attribute_translation = $this->hotel_attribute_translations->where('lang', $lang)->first();
        return $hotel_attribute_translation != null ? $hotel_attribute_translation->$field : $this->$field;
    }

    public function hotel_attribute_translations(){
    	return $this->hasMany(HotelAttributeTranslation::class, 'attribute_id');
    }

    public function hotel_terms()
    {
        return $this->hasMany(HotelAttributeTerm::class,'attribute_id');
    }
}
