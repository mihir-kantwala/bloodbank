@extends('layouts.app')

@section('content')
<section class="py-20 bg-gray-50">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-4xl font-bold text-red-800 mb-10 text-center" data-aos="fade-up">
      🩸 Check Blood Availability
    </h2>

    <!-- Filter Form -->
    <form action="{{ route('blood.search.results') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md mb-10" data-aos="fade-up">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div>
          <label class="block mb-1 font-medium text-gray-700">State</label>
          <input type="text" name="state" value="{{ old('state', $filters['state'] ?? '') }}"
                 class="w-full p-2 border rounded-md" placeholder="Enter state">
        </div>

        <div>
          <label class="block mb-1 font-medium text-gray-700">City</label>
          <input type="text" name="city" value="{{ old('city', $filters['city'] ?? '') }}"
                 class="w-full p-2 border rounded-md" placeholder="Enter city">
        </div>

        <div>
          <label class="block mb-1 font-medium text-gray-700">Blood Group</label>
          <select name="blood_group" class="w-full p-2 border rounded-md">
            <option value="">Select Blood Group</option>
            @foreach(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $group)
                <option value="{{ $group }}" {{ (old('blood_group', $filters['blood_group'] ?? '') == $group) ? 'selected' : '' }}>
                    {{ $group }}
                </option>
            @endforeach
          </select>
        </div>

        <div>
          <label class="block mb-1 font-medium text-gray-700">Component</label>
          <select name="component" class="w-full p-2 border rounded-md">
            <option value="">Select Component</option>
            @foreach(['whole', 'plasma', 'platelets', 'red_cells'] as $component)
                <option value="{{ $component }}" {{ (old('component', $filters['component'] ?? '') == $component) ? 'selected' : '' }}>
                    {{ ucfirst(str_replace('_',' ',$component)) }}
                </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="mt-6 text-center">
        <button type="submit" class="px-6 py-2 bg-red-700 text-white rounded-lg hover:bg-red-800 transition">
          Search
        </button>
      </div>
    </form>

    <!-- Blood Availability Table -->
    <div class="overflow-x-auto" data-aos="fade-up">
        @if(isset($results))
            @if($results->isEmpty())
                <p class="text-gray-700">No blood stock found for the selected criteria.</p>
            @else
                <table class="min-w-full bg-white shadow-md rounded-lg">
                    <thead>
                      <tr class="bg-red-700 text-white">
                        <th class="py-2 px-4">Hospital / Blood Bank</th>
                        <th class="py-2 px-4">State</th>
                        <th class="py-2 px-4">City</th>
                        <th class="py-2 px-4">Category</th>
                        <th class="py-2 px-4">Blood Group</th>
                        <th class="py-2 px-4">Component</th>
                        <th class="py-2 px-4">Available Units</th>
                        <th class="py-2 px-4">Contact</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($results as $stock)
                        <tr class="border-b hover:bg-red-50 transition">
                          <td class="py-2 px-4">
                        <span class="font-semibold">{{ $stock->hospital->name }}</span><br>
                        <span class="text-sm text-gray-600">{{ $stock->hospital->address }}</span>
                      </td>
                          <td class="py-2 px-4">{{ $stock->hospital->state }}</td>
                          <td class="py-2 px-4">{{ $stock->hospital->city }}</td>
                          <td class="py-2 px-4">{{ $stock->hospital->category }}</td>
                          <td class="py-2 px-4">{{ $stock->blood_group }}</td>
                          <td class="py-2 px-4">{{ ucfirst(str_replace('_',' ',$stock->component)) }}</td>
                          <td class="py-2 px-4">{{ $stock->units_available }}</td>
                          <td class="py-2 px-4">{{ $stock->hospital->contact }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            @endif
        @endif
    </div>
  </div>
</section>
@endsection
