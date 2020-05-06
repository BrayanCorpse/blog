<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Tag;

class PagesController extends Controller
{
    public function home()
    {
        $posts =Post::published()->paginate(1);
       // $tags =Tag::all();

        return view('welcome', compact('posts'));

    }
}
