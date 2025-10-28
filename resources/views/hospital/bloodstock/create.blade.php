@extends('layouts.hospitalheader')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-lg">
    <h1 class="text-3xl font-bold text-red-600 mb-6 text-center">➕ Add Blood Stock</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('hospital.bloodstock.store') }}" method="POST" class="space-y-6">
        @csrf

       <!-- Blood Group -->
        <div>
            <label class="block font-medium text-gray-700 mb-1">Blood Group</label>
            <select name="blood_group" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-400" required>
                <option value="">Select Blood Group</option>
                @foreach(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $group)
                    <option value="{{ $group }}" {{ old('blood_group') == $group ? 'selected' : '' }}>{{ $group }}</option>
                @endforeach
            </select>
        </div>

        <!-- Blood Component -->
        <div>
            <label class="block font-medium text-gray-700 mb-1">Blood Component</label>
            <select name="component" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-400" required>
                <option value="">Select Component</option>
                @foreach(['Whole Blood', 'Plasma', 'Platelets', 'Red Blood Cells', 'Cryoprecipitate'] as $component)
                    <option value="{{ $component }}" {{ old('component') == $component ? 'selected' : '' }}>{{ $component }}</option>
                @endforeach
            </select>
        </div>

        <!-- Quantity -->
        <div>
            <label class="block font-medium text-gray-700 mb-1">Quantity (in units)</label>
            <input type="number" name="units_available" value="{{ old('units_available') }}" min="1" required
                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-400">
        </div>

        <!-- Submit -->
        <div class="text-center">
            <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg shadow-md font-semibold transition">
                Add Blood Stock
            </button>
        </div>
    </form>
</div>
@endsection
