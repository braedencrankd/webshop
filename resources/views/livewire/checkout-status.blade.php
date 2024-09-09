<div class="max-w-xl p-5 mx-auto mt-12 bg-white rounded shadow">
    @if ($this->order)
        <p>
            Thank you for your order! #{{ $this->order->id }}.
        </p>
    @else
        <p wire:poll>
            Waiting for payment confirmation. Please standby ...
        </p>
    @endif
</div>
