@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 px-4">
  <h1 class="text-3xl font-bold mb-6 text-blue-700">Orders</h1>

  <div class="overflow-x-auto shadow-lg rounded-lg">
    <table class="min-w-full bg-white rounded-lg">
      <thead>
        <tr class="bg-blue-600 text-white">
          <th class="py-3 px-6 text-left">Order ID</th>
          <th class="py-3 px-6 text-left">Customer ID</th>
          <th class="py-3 px-6 text-left">Date</th>
          <th class="py-3 px-6 text-left">Amount</th>
          <th class="py-3 px-6 text-left">Status</th>
          <th class="py-3 px-6 text-left">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        @foreach($orders as $order)
        <tr class="hover:bg-blue-50 transition">
            <form method="POST" action="{{ route('admin.orders.update', $order->id) }}" class="contents">
                @csrf
                @method('PUT')
                <td class="py-3 px-6 font-semibold text-gray-700">{{ $order->id }}</td>
                <td class="py-3 px-6 text-gray-600">{{ $order->CustId }}</td>
                <td class="py-3 px-6 text-gray-600">{{ $order->created_at }}</td>
                <td class="py-3 px-6">
                    <input type="text" name="TotalAmount" value="{{ $order->TotalAmount }}" class="border border-gray-300 rounded-lg px-3 py-1 w-24">
                </td>
                <td class="py-3 px-6">
                    <select name="Status" class="border border-gray-300 rounded-lg px-3 py-1">
                        <option @if($order->Status=='Pending') selected @endif>Pending</option>
                        <option @if($order->Status=='Cancelled') selected @endif>Cancelled</option>
                        <option @if($order->Status=='Shipped') selected @endif>Shipped</option>
                        <option @if($order->Status=='Delivered') selected @endif>Delivered</option>
                    </select>
                </td>
                <td class="py-3 px-6 flex gap-2">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded-lg shadow-md transition">Update</button>
            </form>
            <form method="POST" action="{{ route('admin.orders.destroy', $order->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded-lg shadow-md transition" onclick="return confirm('Delete this order?')">Delete</button>
            </form>
                </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
