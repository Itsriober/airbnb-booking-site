<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class Visa extends Model
{
    use HasFactory;

    protected $with = ['visa_translations'];

    public function getTranslation($field = '', $lang = false)
    {
        $lang = $lang == false ? App::getLocale() : $lang;

        // Check if visa_translation is not null
        if ($this->visa_translation) {
            $visa_translation = $this->visa_translation->where('lang', $lang)->first();
            return $visa_translation != null ? $visa_translation->$field : $this->$field;
        }

        return $this->$field;
    }

    public function visa_translations()
    {
        return $this->hasMany(VisaTranslation::class, 'visa_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function countries()
    {
        return $this->belongsTo(Location::class, 'country_id');
    }

    public function categories()
    {
        return $this->belongsTo(VisaCategory::class, 'category_id');
    }
}
