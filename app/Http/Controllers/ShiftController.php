<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shift;

class ShiftController extends Controller
{
    public function index()
    {
        $shifts = Shift::all();
        return view('shifts.index', compact('shifts'));
    }

    public function create()
    {
        return view('shifts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);
    
        try {
            Shift::create($request->all());
            return redirect()->route('shifts.index')->with('success', 'Ca làm việc đã được thêm!');
        } catch (\Exception $e) {
            return back()->with('error', 'Lỗi khi thêm ca: ' . $e->getMessage());
        }
    }
    

    public function edit(Shift $shift)
    {
        return view('shifts.edit', compact('shift'));
    }

    public function update(Request $request, Shift $shift)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s|after:start_time',
        ]);

        $shift->update($request->all());
        return redirect()->route('shifts.index')->with('success', 'Ca làm việc đã được cập nhật!');
    }

    public function destroy(Shift $shift)
    {
        $shift->delete();
        return redirect()->route('shifts.index')->with('success', 'Ca làm việc đã bị xóa!');
    }
}
