<?php

namespace App\Models;

use App\Casts\MoneyCast;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public $casts = [
        'billing_address' => 'collection',
        'shipping_address' => 'collection',
        'amount_tax' => MoneyCast::class,
        'amount_total' => MoneyCast::class,
        'amount_subtotal' => MoneyCast::class,
        'amount_discount' => MoneyCast::class,
        'amount_shipping' => MoneyCast::class,
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
