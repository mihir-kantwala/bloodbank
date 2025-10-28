@extends('layouts.hospitalheader')

@section('content')
<div class="max-w-4xl mx-auto mt-6 bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-red-600 mb-4">Your Blood Stock</h2>

    <a href="{{ route('hospital.bloodstock.create') }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 mb-4 inline-block">
        Add Blood Stock
    </a>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="w-full table-auto border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Blood Group</th>
                <th class="border px-4 py-2">Component</th>
                <th class="border px-4 py-2">Quantity</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($stocks as $stock)
            <tr>
                <td class="border px-4 py-2">{{ $stock->blood_group }}</td>
                <td class="border px-4 py-2">{{ $stock->component }}</td>
                <td class="border px-4 py-2">{{ $stock->units_available }}</td>
                <td class="border px-4 py-2 space-x-2">
                    <a href="{{ route('hospital.bloodstock.edit', $stock->id) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('hospital.bloodstock.destroy', $stock->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="border px-4 py-2 text-center">No blood stock found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
