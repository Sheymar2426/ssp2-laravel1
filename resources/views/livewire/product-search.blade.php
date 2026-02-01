
    <div>
    <input type="text"
           wire:model.debounce.300ms="query"
           placeholder="Search products..."
           class="border rounded p-2 mb-4 w-full">

    <div class="grid grid-cols-3 gap-4">
        @forelse($products as $product)
            <div class="border p-4 rounded">
                <img src="{{ asset('storage/' . $product->Image) }}" class="w-full h-40 object-cover mb-2">
                <h2 class="font-bold">{{ $product->Name }}</h2>
                <p>${{ $product->Price }}</p>
            </div>
        @empty
            <div class="col-span-3 text-center">No products found.</div>
        @endforelse
    </div>

    {{ $products->links() }}
</div>

