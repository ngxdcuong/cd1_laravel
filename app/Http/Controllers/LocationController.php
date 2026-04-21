<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }
    

    public function create()
    {
        return view('locations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'google_map_link' => 'required|url',
        ]);

        Location::create($request->all());

        return redirect()->route('locations.index')->with('success', 'Địa chỉ đã được thêm.');
    }

    public function edit(Location $location)
    {
        return view('locations.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'google_map_link' => 'required|url',
        ]);

        $location->update($request->all());

        return redirect()->route('locations.index')->with('success', 'Cập nhật thành công.');
    }

    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('locations.index')->with('success', 'Xóa thành công.');
    }
}
