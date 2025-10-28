@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-6">
    <h1 class="text-3xl font-bold mb-8 text-center text-red-600">🩸 My Profile</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('patient.updateProfile') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Profile Photo -->
        <div class="flex items-center space-x-6">
            <div>
                @if($profile && $profile->profile_photo)
                    <img src="{{ asset('storage/'.$profile->profile_photo) }}" class="w-24 h-24 rounded-full">
                @else
                    <img src="https://via.placeholder.com/100" class="w-24 h-24 rounded-full">
                @endif
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Profile Photo</label>
                <input type="file" name="profile_photo" class="mt-2 block w-full text-sm text-gray-600 border rounded-lg p-2">
            </div>
        </div>

        <!-- Personal Info -->
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-xl font-semibold mb-4 text-red-500">👤 Personal Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block text-gray-700">First Name</label>
                    <input type="text" name="firstname" value="{{ $patient->firstname }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2">
                </div>

                <div> 
                    <label>Last Name</label> 
                    <input type="text" name="lastname" value="{{ $patient->lastname }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2"> 
                </div> 
                
                <div> 
                    <label>Contact</label> 
                    <input type="text" name="contact" value="{{ $patient->contact }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2"> 
                </div> 
                <div> 
                    <label>Email</label> 
                    <input type="email" name="email" value="{{ $patient->email }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2"> 
                </div>

                <div> 
                    <label>Age</label> 
                    <input type="number" name="age" value="{{ $patient->age }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2"> 
                </div> 
                
                <div> 
                    <label>Blood Group</label> 
                    <input type="text" name="blood_group" value="{{ $patient->blood_group }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2"> 
                </div> 
                
                <div> 
                    <label>State</label> 
                    <input type="text" name="state" value="{{ $patient->state }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2">
                </div> 
                 
                <div> 
                    <label>City</label> 
                    <input type="text" name="city" value="{{ $patient->district }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2"> 
                </div>

                <div>
                    <label class="block text-gray-700">Date of Birth</label>
                    <input type="date" name="dob" value="{{ old('dob', $patient->dob ?? '') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2">

                </div>
                {{-- <div>
                    <label class="block text-gray-700">Address</label>
                    <input type="text" name="address" value="{{ old('address', $patient->address ?? '') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2">
                </div> --}}
                {{-- <div>
                    <label class="block text-gray-700">City</label>
                    <input type="text" name="city" value="{{ old('city', $patient->city ?? '') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2">
                </div> --}}
                <div>
                    <label class="block text-gray-700">Country</label>
                    <input type="text" name="country" value="{{ old('country', $patient->country ?? '') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2">
                </div>
                <div>
                    <label class="block text-gray-700">Zip Code</label>
                    <input type="text" name="zip" value="{{ old('zip', $patient->zip ?? '') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2">
                </div>
            </div>
        </div>

        <!-- Medical Info -->
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-xl font-semibold mb-4 text-red-500">💊 Medical Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700">Weight (kg)</label>
                    <input type="number" name="weight" value="{{ old('weight', $profile->weight ?? '') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2">
                </div>
                <div>
                    <label class="block text-gray-700">Height (cm)</label>
                    <input type="number" name="height" value="{{ old('height', $profile->height ?? '') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-gray-700">Allergies</label>
                    <textarea name="allergies" rows="2" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2">{{ old('allergies', $profile->allergies ?? '') }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-gray-700">Chronic Diseases</label>
                    <textarea name="chronic_diseases" rows="2" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2">{{ old('chronic_diseases', $profile->chronic_diseases ?? '') }}</textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-gray-700">Medications</label>
                    <textarea name="medications" rows="2" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2">{{ old('medications', $profile->medications ?? '') }}</textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-gray-700">Past Surgeries</label>
                    <textarea name="past_surgeries" rows="2" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2">{{ old('past_surgeries', $profile->past_surgeries ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-gray-700">Last Donation Date</label>
                    <input type="date" name="last_donation_date" value="{{ old('last_donation_date', $profile->last_donation_date ?? '') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2">
                </div>
                <div>
                    <label class="block text-gray-700">Total Donations</label>
                    <input type="number" name="total_donations" value="{{ old('total_donations', $profile->total_donations ?? '') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2">
                </div>
                <div>
                    <label class="block text-gray-700">Preferred Center</label>
                    <input type="text" name="preferred_center" value="{{ old('preferred_center', $profile->preferred_center ?? '') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2">
                </div>
                <div>
                    <label class="block text-gray-700">Availability Status</label>
                    <select name="availability_status" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2">
                        <option value="available" {{ (old('availability_status', $profile->availability_status ?? '') == 'available') ? 'selected' : '' }}>Available</option>
                        <option value="unavailable" {{ (old('availability_status', $profile->availability_status ?? '') == 'unavailable') ? 'selected' : '' }}>Unavailable</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Emergency Contact -->
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-xl font-semibold mb-4 text-red-500">🚨 Emergency Contact</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-gray-700">Name</label>
                    <input type="text" name="emergency_contact_name" value="{{ old('emergency_contact_name', $patient->emergency_contact_name ?? '') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2">
                </div>
                <div>
                    <label class="block text-gray-700">Phone</label>
                    <input type="text" name="emergency_contact_phone" value="{{ old('emergency_contact_phone', $patient->emergency_contact_phone ?? '') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2">
                </div>
                <div>
                    <label class="block text-gray-700">Relation</label>
                    <input type="text" name="emergency_contact_relation" value="{{ old('emergency_contact_relation', $patient->emergency_contact_relation ?? '') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2">
                </div>
            </div>
        </div>

        <!-- Notification Preference -->
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-xl font-semibold mb-4 text-red-500">🔔 Notifications</h2>
            <select name="notification_method" class="w-full border-gray-300 rounded-lg p-2">
                <option value="email" {{ (old('notification_method', $patient->notification_method ?? '') == 'email') ? 'selected' : '' }}>Email</option>
                <option value="sms" {{ (old('notification_method', $patient->notification_method ?? '') == 'sms') ? 'selected' : '' }}>SMS</option>
                <option value="phone" {{ (old('notification_method', $patient->notification_method ?? '') == 'phone') ? 'selected' : '' }}>Phone Call</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold shadow-md transition">
                Save Profile
            </button>
        </div>
    </form>
</div>
@endsection
