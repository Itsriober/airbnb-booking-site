<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class Transport extends Model
{
    use HasFactory;
    
    protected $guarded=['id'];

    protected $casts = [
        'meta_keyward' => 'array',
    ];

    protected $with = ['transport_translations'];

    public function getTranslation($field = '', $lang = false){
        $lang = $lang == false ? App::getLocale() : $lang;
        $transport_translation = $this->transport_translations->where('lang', $lang)->first();
        return $transport_translation != null ? $transport_translation->$field : $this->$field;
    }

    public function transport_translations(){
    	return $this->hasMany(TransportTranslation::class, 'transport_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function countries()
    {
        return $this->belongsTo(Location::class, 'country_id');
    }

    public function states()
    {
        return $this->belongsTo(Location::class, 'state_id');
    }
    public function cities()
    {
        return $this->belongsTo(Location::class, 'city_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id')->where('product_type','transports')->whereNull('parent_id');
    }
}
