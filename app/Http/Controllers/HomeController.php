<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Location;
use App\Models\MenuItem;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy tin tức
        $latestPosts = Post::latest()->take(3)->get();

        // Lấy địa điểm
        $locations = Location::all();


        // Debug nhanh (nếu cần)
        // dd($menus);

        return view('home.index', [
            'latestPosts' => $latestPosts,
            'locations' => $locations,
        ]);
    }
}