<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class Activities extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    protected $casts = [
        'meta_keyward' => 'array',
    ];

    protected $with = ['activities_translations'];

    public function getTranslation($field = '', $lang = false){
        $lang = $lang == false ? App::getLocale() : $lang;
        $activities_translation = $this->activities_translations->where('lang', $lang)->first();
        return $activities_translation != null ? $activities_translation->$field : $this->$field;
    }

    public function activities_translations(){
    	return $this->hasMany(ActivitiesTranslation::class, 'activities_id');
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

    public function reviews(){
    	return $this->hasMany(Review::class, 'product_id')->where('product_type','activities')->whereNull('parent_id');
    }

}
