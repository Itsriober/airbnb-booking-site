<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
use Mews\Purifier\Casts\CleanHtml;

class ActivitiesAttribute extends Model
{
    use HasFactory;

    protected $with = ['activities_attribute_translations'];

    protected $casts = [
        'name'            => CleanHtml::class,
    ];

    public function getTranslation($field = '', $lang = false){
        $lang = $lang == false ? App::getLocale() : $lang;
        $activities_attribute_translation = $this->activities_attribute_translations->where('lang', $lang)->first();
        return $activities_attribute_translation != null ? $activities_attribute_translation->$field : $this->$field;
    }

    public function activities_attribute_translations(){
    	return $this->hasMany(ActivitiesAttributeTranslation::class, 'attribute_id');
    }

    public function activities_terms()
    {
        return $this->hasMany(ActivitiesAttributeTerm::class,'attribute_id');
    }
}
