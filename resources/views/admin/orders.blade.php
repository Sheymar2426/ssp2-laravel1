@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Orders</h1>

    {{-- Bulk actions (optional) --}}
    <div class="mb-4">
        <x-button type="button" class="bg-indigo-600 text-white px-4 py-2 rounded" onclick="selectAllCheckboxes(true)">
            Select All
        </x-button>
        <x-button type="button" class="bg-gray-600 text-white px-4 py-2 rounded" onclick="selectAllCheckboxes(false)">
            Deselect All
        </x-button>
    </div>

    {{-- Table of Orders --}}
    <div class="overflow-x-auto border rounded">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-4 py-2 text-center">
                        <x-label value="Select" />
                    </th>
                    <th class="px-4 py-2"><x-label value="Order ID" /></th>
                    <th class="px-4 py-2"><x-label value="Customer ID" /></th>
                    <th class="px-4 py-2"><x-label value="Total Amount" /></th>
                    <th class="px-4 py-2"><x-label value="Status" /></th>
                    <th class="px-4 py-2"><x-label value="Order Date" /></th>
                    <th class="px-4 py-2"><x-label value="Items" /></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 text-center">
                            <x-checkbox name="selected_orders[]" value="{{ $order->OrderId }}" />
                        </td>
                        <td class="px-4 py-2">{{ $order->OrderId }}</td>
                        <td class="px-4 py-2">{{ $order->CustomerId }}</td>
                        <td class="px-4 py-2">${{ number_format($order->TotalAmount, 2) }}</td>
                        <td class="px-4 py-2">
                            @php
                                $statusColor = match($order->Status) {
                                    'Pending' => 'bg-yellow-200 text-yellow-800',
                                    'Completed' => 'bg-green-200 text-green-800',
                                    'Cancelled' => 'bg-red-200 text-red-800',
                                    default => 'bg-gray-200 text-gray-800'
                                };
                            @endphp
                            <span class="px-2 py-1 rounded {{ $statusColor }} font-semibold">{{ $order->Status }}</span>
                        </td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($order->OrderDate)->format('Y-m-d H:i') }}</td>
                        <td class="px-4 py-2">
                            <button type="button"
                                    class="text-indigo-600 hover:underline"
                                    onclick="toggleItems('items-{{ $order->OrderId }}')">
                                View Items
                            </button>
                            <div id="items-{{ $order->OrderId }}" class="hidden mt-2">
                                <table class="min-w-full bg-gray-50 border border-gray-200">
                                    <thead>
                                        <tr>
                                            <th class="px-2 py-1 text-left">Product</th>
                                            <th class="px-2 py-1">Quantity</th>
                                            <th class="px-2 py-1">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->items as $item)
                                            <tr class="border-t">
                                                <td class="px-2 py-1">{{ $item->ProductId }}</td>
                                                <td class="px-2 py-1 text-center">{{ $item->Quantity }}</td>
                                                <td class="px-2 py-1">${{ number_format($item->Price, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-2 text-center text-gray-500">No orders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $orders->links() }}
    </div>
</div>

{{-- Scripts for toggle & select all --}}
<script>
function toggleItems(id) {
    const el = document.getElementById(id);
    el.classList.toggle('hidden');
}

function selectAllCheckboxes(selectAll) {
    document.querySelectorAll('input[name="selected_orders[]"]').forEach(cb => {
        cb.checked = selectAll;
    });
}
</script>
@endsection
