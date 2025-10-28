@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-lg">
    <h1 class="text-3xl font-bold text-red-600 mb-6 text-center">🏥 Hospital / Blood Bank Registration</h1>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 border border-green-300 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Global Errors --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-800 border border-red-300 p-4 rounded mb-6">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hospital.register.submit') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <label class="block text-gray-700 font-medium">Hospital / Blood Bank Name</label>
            <input type="text" name="name"
                   class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400 @error('name') border-red-500 @enderror" required>
            @error('name') <p class="text-red-500 text-sm italic mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Email -->   
        <div> 
            <label class="block text-gray-700 font-medium">Email</label> 
            <input type="email" name="email" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400" required> 
        </div>

        <!-- Address -->
        <div>
            <label class="block text-gray-700 font-medium">Address</label>
            <textarea name="address" rows="3"
                      class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400 @error('address') border-red-500 @enderror" required>{{ old('address') }}</textarea>
            @error('address') <p class="text-red-500 text-sm italic mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Website -->
        <div>
            <label class="block text-gray-700 font-medium">Website (Optional)</label>
            <input type="url" name="website" value="{{ old('website') }}"
                   class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400 @error('website') border-red-500 @enderror">
            @error('website') <p class="text-red-500 text-sm italic mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- City & State -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-medium">City</label>
                <input type="text" name="city" value="{{ old('city') }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400 @error('city') border-red-500 @enderror" required>
                @error('city') <p class="text-red-500 text-sm italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium">State</label>
                <input type="text" name="state" value="{{ old('state') }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400 @error('state') border-red-500 @enderror" required>
                @error('state') <p class="text-red-500 text-sm italic mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Contact Info -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-medium">Primary Contact</label>
                <input type="text" name="contact" value="{{ old('contact') }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400 @error('contact') border-red-500 @enderror" required>
                @error('contact') <p class="text-red-500 text-sm italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Alternate Number (Optional)</label>
                <input type="text" name="alternate_number" value="{{ old('alternate_number') }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400 @error('alternate_number') border-red-500 @enderror">
                @error('alternate_number') <p class="text-red-500 text-sm italic mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Zip & License -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-medium">Zip Code</label>
                <input type="text" name="zip" value="{{ old('zip') }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400 @error('zip') border-red-500 @enderror" required>
                @error('zip') <p class="text-red-500 text-sm italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="category" class="block text-gray-700 font-medium">Hospital Category</label>
                <select id="category" name="category" 
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400">
                    <option value="">Select Category</option>
                    <option value="Government" {{ old('category') == 'Government' ? 'selected' : '' }}>Government</option>
                    <option value="Private" {{ old('category') == 'Private' ? 'selected' : '' }}>Private</option>
                    <option value="NGO" {{ old('category') == 'NGO' ? 'selected' : '' }}>NGO</option>
                </select>
                @error('category')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div>
                <label class="block text-gray-700 font-medium">License Number</label>
                <input type="text" name="license_number" value="{{ old('license_number') }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400 @error('license_number') border-red-500 @enderror">
                @error('license_number') <p class="text-red-500 text-sm italic mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- License Validity -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-medium">License Valid From</label>
                <input type="date" name="from_date" value="{{ old('from_date') }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400 @error('from_date') border-red-500 @enderror">
                @error('from_date') <p class="text-red-500 text-sm italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium">License Valid To</label>
                <input type="date" name="to_date" value="{{ old('to_date') }}"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400 @error('to_date') border-red-500 @enderror">
                @error('to_date') <p class="text-red-500 text-sm italic mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

            <div>
                <label class="block text-gray-600 font-medium">Password</label>
                <input type="password" name="password" placeholder="Password" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

        <!-- Submit -->
        <div class="text-center">
            <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold shadow-md transition">
                Register Hospital / Blood Bank
            </button>
        </div>
    </form>
</div>
@endsection
