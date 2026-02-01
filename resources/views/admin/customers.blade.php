@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Customer Management</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <table class="min-w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Phone</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $c)
                <tr>
                    <form method="POST" action="{{ route('admin.customers.update', $c->CustId) }}">
                        @csrf
                        @method('PUT')
                        <td class="border px-4 py-2">{{ $c->CustId }}</td>
                        <td class="border px-4 py-2"><input type="text" name="Name" value="{{ $c->Name }}" class="border rounded p-1 w-full"></td>
                        <td class="border px-4 py-2"><input type="text" name="Phone" value="{{ $c->Phone }}" class="border rounded p-1 w-full"></td>
                        <td class="border px-4 py-2"><input type="email" name="Email" value="{{ $c->Email }}" class="border rounded p-1 w-full"></td>
                        <td class="border px-4 py-2 space-x-2">
                            <button type="submit" class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">Update</button>
                    </form>
                    <form method="POST" action="{{ route('admin.customers.destroy', $c->CustId) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600" onclick="return confirm('Delete this customer?')">Delete</button>
                    </form>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
