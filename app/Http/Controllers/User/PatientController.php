<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
use App\Models\Profile;

class PatientController extends Controller
{
    // Show profile page
    public function profile()
    {
        $patient = Auth::user(); // Basic patient info
        $profile = $patient->profile; // Related profile info

        return view('profile', compact('patient', 'profile'));
    }

    // Update profile
    public function updateProfile(Request $request)
    {
        $patient = Auth::user();

        // Validate inputs
        $request->validate([
            // Patient table fields
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'contact' => 'required|string|max:15|unique:patients,contact,' . $patient->id,
            'email' => 'required|email|unique:patients,email,' . $patient->id,
            'age' => 'nullable|integer|min:18|max:100',
            'blood_group' => 'nullable|string|max:5',
            'state' => 'nullable|string|max:100',
            'district' => 'nullable|string|max:100',

            // Profile table fields
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'zip' => 'nullable|string|max:20',
            'profile_photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'weight' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'allergies' => 'nullable|string',
            'chronic_diseases' => 'nullable|string',
            'medications' => 'nullable|string',
            'past_surgeries' => 'nullable|string',
            'last_donation_date' => 'nullable|date',
            'total_donations' => 'nullable|integer',
            'preferred_center' => 'nullable|string|max:255',
            'availability_status' => 'nullable|in:available,unavailable',
            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_phone' => 'nullable|string|max:20',
            'emergency_contact_relation' => 'nullable|string|max:100',
            'notification_method' => 'nullable|in:email,sms,phone',
        ]);

        // Update Patient table
        $patient->update($request->only([
            'firstname','lastname','contact','email','age','blood_group','state','district'
        ]));

        // Update Profile table
        $profile = $patient->profile ?? new Profile(['patient_id' => $patient->id]);


        if ($request->hasFile('profile_photo')) {
            $profilePhotoPath = $request->file('profile_photo')->store('profile_photos', 'public');
            $profile->profile_photo = $profilePhotoPath; // stores path like profile_photos/xyz.jpg
        }



        $profile->fill(array_merge($request->except([
            'firstname','lastname','contact','email','_token','_method','profile_photo'
        ]), [
            'total_donations' => $request->total_donations ?? 0,
            'availability_status' => $request->availability_status ?? 'available',
        ]));


        $profile->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
