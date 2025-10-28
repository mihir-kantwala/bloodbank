@extends('layouts.hospitalheader')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-lg">
    <h1 class="text-3xl font-bold text-red-600 mb-6 text-center">🏥 Hospital Profile</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hospital.profile.update') }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-medium">Hospital Name</label>
                <input type="text" name="name" value="{{ old('name', $hospital->name) }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email', $hospital->email) }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Address</label>
                <input type="text" name="address" value="{{ old('address', $hospital->address) }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Website</label>
                <input type="url" name="website" value="{{ old('website', $hospital->website) }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium">City</label>
                <input type="text" name="city" value="{{ old('city', $hospital->city) }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">State</label>
                <input type="text" name="state" value="{{ old('state', $hospital->state) }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Contact Number</label>
                <input type="text" name="contact" value="{{ old('contact', $hospital->contact) }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Alternate Number</label>
                <input type="text" name="alternate_number" value="{{ old('alternate_number', $hospital->alternate_number) }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium">ZIP Code</label>
                <input type="text" name="zip" value="{{ old('zip', $hospital->zip) }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400" required>
            </div>

             <div class="mb-4">
                <label for="category" class="block text-gray-700 font-medium">Hospital Category</label>
                <select id="category" name="category" 
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400">
                    <option value="">Select Category</option>
                    <option value="Government" {{ (old('category', $hospital->category ?? '') == 'Government') ? 'selected' : '' }}>Government</option>
                    <option value="Private" {{ (old('category', $hospital->category ?? '') == 'Private') ? 'selected' : '' }}>Private</option>
                    <option value="NGO" {{ (old('category', $hospital->category ?? '') == 'NGO') ? 'selected' : '' }}>NGO</option>
                </select>
                @error('category')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div>
                <label class="block text-gray-700 font-medium">License Number</label>
                <input type="text" name="license_number" value="{{ old('license_number', $hospital->license_number) }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium">License Valid From</label>
                <input type="date" name="from_date" value="{{ old('from_date', $hospital->from_date) }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium">License Valid To</label>
                <input type="date" name="to_date" value="{{ old('to_date', $hospital->to_date) }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400">
            </div>
        </div>

        <div class="text-center mt-6">
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold shadow-md transition">
                Update Profile
            </button>
        </div>
    </form>
</div>
@endsection
