@extends('layouts.hospitalheader')

@section('content')
{{-- @include('layouts.hospitalheader') --}}
<div class="max-w-5xl mx-auto mt-10">
    <h1 class="text-3xl font-bold text-red-600 mb-6">🏥 Hospital Dashboard</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded-xl shadow-lg space-y-4">
        <h2 class="text-xl font-semibold">Welcome, {{ $hospital->name }}</h2>

        <p><strong>Email:</strong> {{ $hospital->email }}</p>
        <p><strong>Contact:</strong> {{ $hospital->contact }}</p>
        <p><strong>City:</strong> {{ $hospital->city }}, <strong>State:</strong> {{ $hospital->state }}</p>
        <p><strong>Address:</strong> {{ $hospital->address }}</p>
        @if($hospital->website)
            <p><strong>Website:</strong> <a href="{{ $hospital->website }}" target="_blank" class="text-red-600 underline">{{ $hospital->website }}</a></p>
        @endif

        <form action="{{ route('hospital.logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                Logout
            </button>
        </form>
    </div>
</div>
@endsection
