<?php

namespace App\Livewire;

use App\Actions\Webshop\CreateStripeCheckoutSession;
use Livewire\Component;
use App\Factories\CartFactory;
use Livewire\Attributes\Computed;

class Cart extends Component
{
    #[Computed()]
    public function cart()
    {
        return CartFactory::make()->loadMissing(['items', 'items.product', 'items.variant']);
    }

    #[Computed()]
    public function items()
    {
        return $this->cart->items;
    }

    public function checkout(CreateStripeCheckoutSession $checkoutSession)
    {
        return $checkoutSession->createFromCart($this->cart);
    }

    public function increment($itemId)
    {
        $this->cart->items()->find($itemId)->increment('quantity');

        $this->dispatch('productAddedToCart');
    }

    public function decrement($itemId)
    {
        $item = $this->cart->items()->find($itemId);

        if ($item->quantity > 1) {
            $item->decrement('quantity');
            $this->dispatch('productAddedToCart');
        }
    }

    public function delete(int $itemId)
    {
        $this->cart->items()->find($itemId)->delete();
        $this->dispatch('productRemovedFromCart');
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
