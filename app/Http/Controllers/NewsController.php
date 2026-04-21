<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Post;
class NewsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('published_at', 'desc')->get();
        return view('news.index', compact('posts'));
    }

    public function show($id)
{
    $post = Post::find($id);

    if (!$post) {
        abort(404);
    }

    // Lấy các bài viết khác, loại trừ bài viết hiện tại
    $relatedPosts = Post::where('id', '!=', $id)
                        ->orderBy('created_at', 'desc')
                        ->limit(10) 
                        ->get();

    return view('news.show', compact('post', 'relatedPosts'));
}
    
}
