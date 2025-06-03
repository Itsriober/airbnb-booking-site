<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
use Mews\Purifier\Casts\CleanHtml;

class ActivitiesAttributeTerm extends Model
{
    use HasFactory;

    protected $with = ['activities_attribute_term_translations'];

    public function getTranslation($field = '', $lang = false){
        $lang = $lang == false ? App::getLocale() : $lang;
        $activities_attribute_term_translation = $this->activities_attribute_term_translations->where('lang', $lang)->first();
        return $activities_attribute_term_translation != null ? $activities_attribute_term_translation->$field : $this->$field;
    }

    public function activities_attribute_term_translations(){
    	return $this->hasMany(ActivitiesAttributeTermTranslation::class,'term_id');
    }
}
