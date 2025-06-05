<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class Hotel extends Model
{
    use HasFactory;
    
    protected $guarded=['id'];

    protected $casts = [
        'meta_keyward' => 'array',
    ];

    protected $with = ['hotel_translations'];

    public function getTranslation($field = '', $lang = false)
    {
        $lang = $lang == false ? App::getLocale() : $lang;
        $hotel_translation = $this->hotel_translations->where('lang', $lang)->first();
        return $hotel_translation != null ? $hotel_translation->$field : $this->$field;
    }

    public function hotel_translations()
    {
        return $this->hasMany(HotelTranslation::class, 'hotel_id');
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

    public function hotel_galleries()
    {
        return $this->hasMany(HotelGallery::class, 'hotel_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id')->where('status', 1)->where('product_type', 'hotel')->whereNull('parent_id');
    }
}
