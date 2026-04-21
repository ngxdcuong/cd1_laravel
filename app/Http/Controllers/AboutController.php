<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Storage;


class AboutController extends Controller {
    public function index() {
        $aboutSections = About::all();
        return view('about.index', compact('aboutSections'));
    }

    public function manager() {
        $abouts = About::all();
        return view('about.about_manager', compact('abouts'));
    }

    public function create() {
        return view('about.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('about_images', 'public');
        }

        About::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath
        ]);

        return redirect()->route('about.about_manager')->with('success', 'Thêm thông tin thành công!');
    }

    public function show($id)
    {
        $about = About::findOrFail($id);
        $otherAbouts = About::where('id', '!=', $id)->get(); // Lấy các mục khác
    
        return view('about.about_detail', compact('about', 'otherAbouts'));
    }
    
    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $about->image;
        if ($request->hasFile('image')) {
            if ($about->image) {
                Storage::disk('public')->delete($about->image);
            }
            $imagePath = $request->file('image')->store('about_images', 'public');
        }

        $about->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('about.about_manager')->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id)
    {
        $about = About::findOrFail($id);
        if ($about->image) {
            Storage::disk('public')->delete($about->image);
        }
        $about->delete();

        return redirect()->route('about.about_manager')->with('success', 'Xóa thành công!');
    }
}
