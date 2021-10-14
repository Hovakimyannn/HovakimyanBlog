<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            's' => 'required',
        ]);
        $s = $request->s;
        $posts = Post::like($s)->with('category')->paginate(2);
        return view('posts.search', compact('posts', 's'));
    }
}
