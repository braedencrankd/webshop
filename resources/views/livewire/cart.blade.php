<div class="grid grid-cols-4 gap-4 mt-12">
    <div class="col-span-3 p-5 bg-white rounded-lg shadow">
        <table class="w-full"> 
            <thead>
                <tr>
                    <th class="text-left">Product</th>
                    <th class="text-left">Price</th>
                    <th class="text-left">Color</th>
                    <th class="text-left">Size</th>
                    <th class="text-left">Quantity</th>
                    <th class="text-right">Total</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->items as $item)
                    <tr>
                        <td class="py-2">{{ $item->product->name }} Size: {{ $item->variant->size }} Color: {{ $item->variant->color }}</td>
                        <td class="py-2">{{ $item->product->price }}</td>
                        <td class="py-2">{{  $item->variant->color  }}</td>
                        <td class="py-2">{{  $item->variant->size  }}</td>
                        <td class="flex items-center gap-1.5 py-2">
                            <button @disabled($item->quantity === 1) class="p-0.5 bg-white border border-gray-300 rounded shadow-sm" wire:click="decrement({{ $item->id }})">
                                <svg class="w-4 h-4" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 12H6"/></svg>
                            </button>
                            <div>
                                {{$item->quantity}}
                            </div>
                            <button class="p-0.5 bg-white border border-gray-300 rounded shadow-sm" wire:click="increment({{ $item->id }})">
                                <svg class="w-4 h-4" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v12m6-6H6"/></svg>
                            </button>
                        </td>
                        <td class="py-2 text-right">
                            {{ $item->subtotal }}
                        </td>
                        <td class="py-2 pl-2 text-right">
                            <button wire:click="delete({{ $item->id }})">
                                <svg class="w-4 h-4" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21q.512.078 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48 48 0 0 0-3.478-.397m-12 .562q.51-.088 1.022-.165m0 0a48 48 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a52 52 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a49 49 0 0 0-7.5 0"/></svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="font-medium text-right">Total</td>
                    <td class="font-medium text-right">{{ $this->cart->total }}</td>
                    <td>&nbsp;</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div>
        <div class="p-5 bg-white rounded-lg shadow">
            @guest
                <p>Please <a class="text-indigo-500 hover:text-indigo-600" href="{{ route('register') }}">register</a> or <a class="text-indigo-500 hover:text-indigo-600" href="{{ route('login') }}">login</a> to continue.</p>
            @endguest
            @auth
                <x-button wire:click="checkout">
                    Checkout
                </x-button>
            @endauth
        </div>
    </div>
</div>


