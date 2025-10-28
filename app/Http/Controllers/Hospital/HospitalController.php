<?php
namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Hospital;
class HospitalController extends Controller
{
    // Show registration form
    public function showRegisterForm() {
        return view('hospital.register');
    }

    // Handle registration
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'website' => 'nullable|url|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'contact' => 'required|string|max:15',
            'alternate_number' => 'nullable|string|max:15',
            'zip' => 'required|string|max:10',
            'category' => 'nullable|string|max:50',
            'license_number' => 'nullable|string|max:50',
            'from_date' => 'nullable|date',
            'to_date' => 'nullable|date|after_or_equal:from_date',
            'email' => 'required|email|unique:hospitals,email',
            'password' => 'required|string|',
        ]);

        $hospital = Hospital::create([
            'name' => $request->name,
            'address' => $request->address,
            'website' => $request->website,
            'city' => $request->city,
            'state' => $request->state,
            'contact' => $request->contact,
            'alternate_number' => $request->alternate_number,
            'zip' => $request->zip,
            'license_number' => $request->license_number,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'category' => $request->category,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('hospital')->login($hospital);

        return redirect()->route('hospital.dashboard')->with('success', 'Hospital registered successfully!');
    }

    // Show login form
    public function showLogin() {
        return view('hospital.login');
    }


public function login(Request $request)
{
    // Validate input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Grab credentials
    $credentials = $request->only('email', 'password');

    // Attempt login using hospital guard
    if (Auth::guard('hospital')->attempt($credentials)) {
        // Regenerate session to prevent fixation
        $request->session()->regenerate();

        // Redirect to hospital dashboard
        return redirect()->route('hospital.dashboard');
    }

    // If login fails
    return back()->withErrors([
        'email' => 'Invalid email or password.',
    ])->onlyInput('email');
}


    // Dashboard
    public function dashboard() {
        $hospital = Auth::guard('hospital')->user();
        return view('hospital.dashboard', compact('hospital'));
    }

    // Logout
    public function logout() {
        Auth::guard('hospital')->logout();
        return redirect()->route('hospital.login');
    }

    public function profile()
    {
        $hospital = Auth::guard('hospital')->user();
        return view('hospital.profile', compact('hospital'));
    }

    // Update profile
    public function updateProfile(Request $request)
    {
        $hospital = Auth::guard('hospital')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:hospitals,email,' . $hospital->id,
            'address' => 'required|string|max:500',
            'website' => 'nullable|url|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'contact' => 'required|string|max:15',
            'alternate_number' => 'nullable|string|max:15',
            'zip' => 'required|string|max:10',
            'category' => 'nullable|string|max:50',
            'license_number' => 'nullable|string|max:50',
            'from_date' => 'nullable|date',
            'to_date' => 'nullable|date|after_or_equal:from_date',
        ]);

        $hospital->update($request->only([
            'name','email','address','website','city','state','contact','alternate_number','zip','category','license_number','from_date','to_date'
        ]));

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

}

