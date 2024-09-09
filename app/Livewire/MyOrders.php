<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class MyOrders extends Component
{

    public function mount() {}

    #[Computed()]
    public function orders()
    {
        return auth()->user()->orders;
    }

    public function render()
    {
        return view('livewire.my-orders');
    }
}
