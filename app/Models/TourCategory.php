<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
use Mews\Purifier\Casts\CleanHtml;

class TourCategory extends Model
{
    use HasFactory;

    protected $with = ['tour_category_translations'];

    protected $casts = [
        'name'            => CleanHtml::class,
    ];

    public function getTranslation($field = '', $lang = false){
        $lang = $lang == false ? App::getLocale() : $lang;
        $tour_category_translation = $this->tour_category_translations->where('lang', $lang)->first();
        return $tour_category_translation != null ? $tour_category_translation->$field : $this->$field;
    }

    public function tour_category_translations(){
    	return $this->hasMany(TourCategoryTranslation::class, 'category_id');
    }
}
