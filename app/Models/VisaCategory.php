<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use Mews\Purifier\Casts\CleanHtml;

class VisaCategory extends Model
{

    protected $with = ['visa_category_translations'];

    protected $casts = [
        'name' => CleanHtml::class,
    ];

    public function getTranslation($field = '', $lang = false){
        $lang = $lang == false ? App::getLocale() : $lang;
        $visa_category_translation = $this->visa_category_translations->where('lang', $lang)->first();
        return $visa_category_translation != null ? $visa_category_translation->$field : $this->$field;
    }

    public function visa_category_translations(){
    	return $this->hasMany(VisaCategoryTranslation::class, 'category_id');
    }
}
