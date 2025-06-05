<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class Tour extends Model
{
    use HasFactory;
    
    protected $guarded=['id'];

    protected $casts = [
        'meta_keyward' => 'array',
        'sub_destination' => 'array',
    ];
    
    protected $with = ['tour_translations'];

    public function getTranslation($field = '', $lang = false){
        $lang = $lang == false ? App::getLocale() : $lang;
        $tour_translation = $this->tour_translations->where('lang', $lang)->first();
        return $tour_translation != null ? $tour_translation->$field : $this->$field;
    }

    public function tour_translations(){
    	return $this->hasMany(TourTranslation::class, 'tour_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function destinations()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
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

    public function tour_categories()
    {
        return $this->belongsTo(TourCategory::class, 'category_id');
    }

    public function reviews(){
    	return $this->hasMany(Review::class, 'product_id')->where('product_type','tour')->whereNull('parent_id');
    }
}
