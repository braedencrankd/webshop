<?php

namespace App\Livewire;

use App\Actions\Webshop\AddProductVariantToCart;
use App\Models\Product as ProductModel;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;

class Product extends Component
{
    use InteractsWithBanner;

    public $productId;

    #[Validate(['required', 'exists:App\Models\ProductVariant,id'])]
    public $variant;

    public function mount()
    {
        $this->variant = $this->product->variants->value('id');
    }

    #[Computed()]
    public function product()
    {
        return ProductModel::findOrFail($this->productId);
    }

    public function addToCart(AddProductVariantToCart $cart)
    {
        $this->validate();

        $cart->add(
            variantId: $this->variant,
        );

        $this->banner('Your product has been added to your cart.');

        $this->dispatch('productAddedToCart');
    }
}
