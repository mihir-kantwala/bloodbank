<?php

namespace App\Http\Controllers\Auth;


use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public function home()
    {
        return view('home'); // your register.blade.php
    }    

    public function showregister()
    {
        return view('register'); // your register.blade.php
    }  

    public function register(Request $request)
    {
        // Validate form inputs
        $request->validate([
            'firstname'     => 'required|string|max:50',
            'lastname'      => 'required|string|max:50',
            'contact'       => 'required|string|max:15|unique:patients,contact',
            'email'         => 'required|email|unique:patients,email',
            'gender'        => 'required',
            'age'           => 'required|integer|min:18|max:65',
            'blood_group'   => 'required|string',
            'state'         => 'required|string|max:100',
            'district'      => 'required|string|max:100',
            'password'      => 'required|string|confirmed',
        ]);

        // Create user
        $user = Patient::create([
            'firstname'   => $request->firstname,
            'lastname'    => $request->lastname,
            'contact'     => $request->contact,
            'email'       => $request->email,
            'gender'      => $request->gender,
            'age'         => $request->age,
            'blood_group' => $request->blood_group,
            'state'       => $request->state,
            'district'    => $request->district,
            'password'    => Hash::make($request->password),
        ]);

        // Auto-login after registration
        auth()->login($user);

        return redirect('/')->with('success', 'Registration successful! Welcome.');
    }
}
