@extends('layouts.hospitalheader')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-md mt-6">
    <h2 class="text-2xl font-bold text-red-600 mb-6">Edit Blood Stock</h2>

    @if($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hospital.bloodstock.update', $bloodStock->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Blood Group -->
        <div>
            <label class="block font-medium text-gray-700 mb-1">Blood Group</label>
            <select name="blood_group" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-400" required>
                <option value="">Select Blood Group</option>
                @foreach(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $group)
                    <option value="{{ $group }}" {{ $bloodStock->blood_group == $group ? 'selected' : '' }}>{{ $group }}</option>
                @endforeach
            </select>
        </div>

        <!-- Blood Component -->
        <div>
            <label class="block font-medium text-gray-700 mb-1">Component</label>
            <select name="component" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-400" required>
                <option value="">Select Component</option>
                @foreach(['Whole Blood', 'Plasma', 'Platelets', 'Red Blood Cells', 'Cryoprecipitate'] as $component)
                    <option value="{{ $component }}" {{ $bloodStock->component == $component ? 'selected' : '' }}>{{ $component }}</option>
                @endforeach
            </select>
        </div>

        <!-- Quantity -->
        <div>
            <label class="block font-medium text-gray-700 mb-1">Quantity (units)</label>
            <input type="number" name="units_available" value="{{ $bloodStock->units_available }}" min="1" required
                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-400">
        </div>

        <div class="text-center space-x-4">
            <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg shadow-md font-semibold transition">
                Update Stock
            </button>
            <a href="{{ route('hospital.bloodstock.index') }}"
               class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-6 py-3 rounded-lg shadow-md font-semibold transition">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
