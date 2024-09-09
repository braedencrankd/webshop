<x-panel class="max-w-lg mx-auto mt-12" title="My Orders">
    <table class="w-full"> 
        <thead>
            <tr>
                <th class="text-left">Order</th>
                <th class="text-left">Ordered At</th>
                <th class="text-left">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($this->orders as $order)
                <tr>
                    <td>
                        <a href="{{ route('view-order', $order->id) }}" class="py-2 font-medium underline">
                            #{{ $order->id }}
                        </a>
                    </td>
                    <td class="py-2">{{ $order->created_at->diffForHumans() }}</td>
                    <td class="py-2">{{ $order->amount_total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-panel>
