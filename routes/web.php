<?php

use App\Livewire\Cart;
use App\Livewire\CheckoutStatus;
use App\Livewire\MyOrders;
use App\Livewire\Product;
use App\Livewire\StoreFront;
use App\Livewire\ViewOrder;
use Illuminate\Support\Facades\Route;

Route::get('/', StoreFront::class)->name('home');
Route::get('/cart', Cart::class)->name('cart');
Route::get('/product/{productId}', Product::class)->name('product');

Route::get('/preview', function () {
  $order = App\Models\Order::first();

  if (!$order) {
    return 'No orders found';
  }

  return new App\Mail\OrderConfirmation($order);
});

Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified',
])->group(function () {
  Route::get('checkout-status', CheckoutStatus::class)->name('checkout-status');
  Route::get('/order/{orderId}', ViewOrder::class)->name('view-order');
  Route::get('/my-orders', MyOrders::class)->name('my-orders');
});
