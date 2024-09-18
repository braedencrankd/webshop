<div class="mt-12 space-y-12">
    <div class="flex justify-between">
        <h1 class="text-xl font-medium">Our Products</h1>
        <div>
            <x-input wire:model.live.debounce="keywords" type="search" placeholder="Enter keyword" />
        </div>
    </div>
    <div class="grid grid-cols-4 gap-4">
        @foreach ($this->products as $product)
            <x-panel class="relative">
                <a wire:navigate href="{{ route('product', $product) }}" class="absolute inset-0 w-full h-full"></a>
                <img src="{{ $product->image->path }}" alt="">
                <h2 class="text-lg font-medium">
                    {{ $product->name }}
                </h2>
                <span class="text-sm text-gray-700">{{ $product->price }}</span>
            </x-panel>
        @endforeach
    </div>
    
    <div class="mt-6">
        {{ $this->products->links() }}
    </div>
</div>
