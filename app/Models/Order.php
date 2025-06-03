<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function tours()
    {
        return $this->belongsTo(Tour::class, 'product_id');
    }

    public function hotels()
    {
        return $this->belongsTo(Hotel::class, 'product_id');
    }

    public function activities()
    {
        return $this->belongsTo(Activities::class, 'product_id');
    }

    public function transports()
    {
        return $this->belongsTo(Transport::class, 'product_id');
    }

    public function visas()
    {
        return $this->belongsTo(Visa::class, 'product_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function wallets()
    {
        return $this->hasOne(Wallet::class, 'order_id', 'id');
    }
}
