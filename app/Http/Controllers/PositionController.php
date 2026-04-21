<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::all();
        return view('positions.index', compact('positions'));
    }

    public function create()
    {
        return view('positions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:positions',
            'description' => 'nullable|string',
        ]);

        Position::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('positions.index')->with('success', 'Chức vụ đã được tạo.');
    }

    public function edit(Position $position)
    {
        return view('positions.edit', compact('position'));
    }

    public function update(Request $request, Position $position)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:positions,name,' . $position->id,
            'description' => 'nullable|string',
        ]);

        $position->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('positions.index')->with('success', 'Chức vụ đã được cập nhật.');
    }

    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('positions.index')->with('success', 'Chức vụ đã bị xóa.');
    }
}
