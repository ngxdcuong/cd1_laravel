<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Location;

class HomeController extends Controller
{
    public function index()
    {
        $latestPosts = Post::latest()->take(3)->get();
        $locations = Location::all(); // Thêm dòng này để lấy danh sách địa chỉ
        return view('home.index', compact('latestPosts', 'locations')); // Truyền thêm biến locations
    }
}
