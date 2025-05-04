<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $results = collect();

        $query = $request->query('query');
        if (filled($query) && strlen($query) >= 3) {
            $results = Post::withComments($query)->get();
        }

        return view('index', compact('results'));
    }
}
