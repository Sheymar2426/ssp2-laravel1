@extends('layouts.master')

@section('content')
<div class="max-w-2xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6 text-center">Checkout</h1>

    <form method="POST" action="{{ url('checkout_confirm') }}" class="space-y-6">
        @csrf
        <!-- Delivery Info -->
        <div>
            <label class="block font-semibold">Name</label>
            <input type="text" name="name" class="w-full border p-2 rounded" required>
        </div>
        <div>
            <label class="block font-semibold">Address</label>
            <input type="text" name="address" class="w-full border p-2 rounded" required>
        </div>
        <div>
            <label class="block font-semibold">Phone</label>
            <input type="text" name="phone" class="w-full border p-2 rounded" required>
        </div>

        <!-- Payment Method -->
        <div>
            <p class="font-semibold">Select Payment Method:</p>
            <label><input type="radio" name="payment" value="COD" checked> COD</label><br>
            <label><input type="radio" name="payment" value="Card" id="cardOption"> Card</label>
        </div>

        <!-- Card Details -->
        <div id="cardDetails" class="hidden">
            <label class="block font-semibold">Card Number</label>
            <input type="text" name="card_number" class="w-full border p-2 rounded">
            <label class="block font-semibold mt-2">Expiry</label>
            <input type="text" name="expiry" class="w-full border p-2 rounded">
            <label class="block font-semibold mt-2">CVV</label>
            <input type="text" name="cvv" class="w-full border p-2 rounded">
        </div>

        <!-- Order Summary -->
        <div class="border p-4 rounded">
            <h3 class="font-bold mb-2">Order Summary</h3>
            @php $total = 0; @endphp
            @foreach(session('cart', []) as $item)
                <p>{{ $item['name'] }} x {{ $item['quantity'] }} = ${{ $item['price'] * $item['quantity'] }}</p>
                @php $total += $item['price'] * $item['quantity']; @endphp
            @endforeach
            <p class="font-bold mt-2">Total: ${{ $total }}</p>
        </div>

        <div class="text-center">
            <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded">Confirm Order</button>
        </div>
    </form>
</div>

@push('scripts')
<script>
document.getElementById("cardOption").addEventListener("change", function() {
    document.getElementById("cardDetails").classList.remove("hidden");
});
</script>
@endpush
@endsection
