<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
use Mews\Purifier\Casts\CleanHtml;

class TransportAttributeTerm extends Model
{
    use HasFactory;

    protected $with = ['transport_attribute_term_translations'];

    public function getTranslation($field = '', $lang = false){
        $lang = $lang == false ? App::getLocale() : $lang;
        $transport_attribute_term_translation = $this->transport_attribute_term_translations->where('lang', $lang)->first();
        return $transport_attribute_term_translation != null ? $transport_attribute_term_translation->$field : $this->$field;
    }

    public function transport_attribute_term_translations(){
    	return $this->hasMany(TransportAttributeTermTranslation::class,'term_id');
    }
}
