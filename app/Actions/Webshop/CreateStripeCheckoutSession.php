<?php

namespace App\Actions\Webshop;

use App\Models\Cart;
use Illuminate\Support\Collection;

class CreateStripeCheckoutSession
{
  public function createFromCart(Cart $cart)
  {
    return $cart->user
      ->allowPromotionCodes()
      ->checkout(
        $this->formatCartItems($cart->items),
        [
          'customer_update' => [
            'shipping' => 'auto',
          ],
          'shipping_address_collection' => [
            'allowed_countries' => ['NZ'],
          ],
        ]
      );
  }

  private function formatCartItems(Collection $items)
  {
    return $items->loadMissing(['product', 'variant'])->map(function ($item) {
      return [
        'price_data' => [
          'currency' => 'NZD',
          'unit_amount' => $item->product->price->getAmount(),
          'product_data' => [
            'name' => $item->product->name,
            'description' => "Size: {$item->variant->size} - Color: {$item->variant->color}",
            'metadata' => [
              'product_id' => $item->product->id,
              'product_variant_id' => $item->variant->id
            ]
          ]
        ],
        'quantity' => $item->quantity,
      ];
    })->toArray();
  }
}
