<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
use Mews\Purifier\Casts\CleanHtml;

class TransportAttribute extends Model
{
    use HasFactory;

    protected $with = ['transport_attribute_translations'];

    protected $casts = [
        'name'            => CleanHtml::class,
    ];

    public function getTranslation($field = '', $lang = false){
        $lang = $lang == false ? App::getLocale() : $lang;
        $transport_attribute_translation = $this->transport_attribute_translations->where('lang', $lang)->first();
        return $transport_attribute_translation != null ? $transport_attribute_translation->$field : $this->$field;
    }

    public function transport_attribute_translations(){
    	return $this->hasMany(TransportAttributeTranslation::class, 'attribute_id');
    }

    public function transport_terms()
    {
        return $this->hasMany(TransportAttributeTerm::class,'attribute_id');
    }
}
