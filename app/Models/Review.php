<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(Review::class, 'parent_id');
    }

    public function hotels()
    {
        return $this->belongsTo(Hotel::class,'product_id');
    }

    public function tours()
    {
        return $this->belongsTo(Tour::class,'product_id');
    }

    public function activities()
    {
        return $this->belongsTo(Activities::class,'product_id');
    }

    public function transports()
    {
        return $this->belongsTo(Transport::class,'product_id');
    }

}
