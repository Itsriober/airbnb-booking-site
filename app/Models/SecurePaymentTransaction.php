<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecurePaymentTransaction extends Model
{
    protected $fillable = [
        'booking_id',
        'order_id',
        'user_id',
        'transaction_id',
        'payment_method',
        'amount',
        'currency',
        'status',
        'external_transaction_id',
        'payment_details',
        'paid_at',
        'callback_data',
        'signature'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'paid_at' => 'datetime',
        'payment_details' => 'array',
        'callback_data' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public static function createFromOrder(Order $order, array $additionalData = [])
    {
        return self::create([
            'booking_id' => $order->order_number,
            'order_id' => $order->id,
            'user_id' => $order->user_id,
            'amount' => $order->total_with_tax,
            'currency' => get_setting('currency_code', 'USD'),
            'status' => 'pending',
            'payment_details' => array_merge([
                'product_type' => $order->product_type,
                'first_name' => $order->first_name,
                'last_name' => $order->last_name,
                'email' => $order->email
            ], $additionalData)
        ]);
    }
}
