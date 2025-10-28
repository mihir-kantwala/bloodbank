<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BloodStock;
use Illuminate\Support\Facades\Auth;

class BloodStockController extends Controller
{
    // Show all blood stock for logged-in hospital
    public function index()
    {
        $hospital = Auth::guard('hospital')->user();
        $stocks = $hospital->bloodStocks()->get();
        return view('hospital.bloodstock.index', compact('stocks'));
    }

    // Show form to add new blood stock
    public function create()
    {
        return view('hospital.bloodstock.create');
    }

    // Store new blood stock
    public function store(Request $request)
    {
        $request->validate([
            'blood_group' => 'required|string|max:5',
            'units_available' => 'required|integer',
            'component' => 'required|string|max:50',
        ]);

        $hospital = Auth::guard('hospital')->user();

        BloodStock::create([
            'hospital_id' => $hospital->id,
            'blood_group' => $request->blood_group,
            'units_available' => $request->units_available,
            'component' => $request->component,
        ]);

        return redirect()->route('hospital.bloodstock.index')
                         ->with('success', 'Blood stock added successfully!');
    }

     public function edit(BloodStock $bloodStock)
    {
        
        return view('hospital.bloodstock.edit', compact('bloodStock'));
    }

    // Update stock
    public function update(Request $request, BloodStock $bloodStock)
    {
        

        $request->validate([
            'blood_group' => 'required|string',
            'component' => 'required|string',
            'units_available' => 'required|integer',
        ]);

        $bloodStock->update($request->only('blood_group', 'component', 'units_available'));

        return redirect()->route('hospital.bloodstock.index')->with('success', 'Blood stock updated!');
    }

    // Delete stock
    public function destroy(BloodStock $bloodStock)
    {
        
        $bloodStock->delete();

        return redirect()->route('hospital.bloodstock.index')->with('success', 'Blood stock deleted!');
    }

public function searchForm()
{
    return view('bloodavailability');
}

public function search(Request $request)
{
    $filters = $request->only(['state', 'city', 'blood_group', 'component']);

    $query = BloodStock::with('hospital');

    if(!empty($filters['state'])) $query->whereHas('hospital', fn($q)=> $q->where('state', $filters['state']));
    if(!empty($filters['city'])) $query->whereHas('hospital', fn($q)=> $q->where('city', $filters['city']));
    if(!empty($filters['blood_group'])) $query->where('blood_group', $filters['blood_group']);
    if(!empty($filters['component'])) $query->where('component', $filters['component']);

    $results = $query->get();

    return view('bloodavailability', compact('results', 'filters'));
}


}
