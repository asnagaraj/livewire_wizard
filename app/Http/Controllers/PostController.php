<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create()
    {
        $data = [
            'name' =>'Nagarajan',
            'email' =>'nagarajan.s@synamen.com'.now(),
            'dob' =>'12/21/1996'
        ];

        $post = Post::create($data);

        dd($post);
    }

    public function show()
    {
        $post = Post::first();
        dd($post->toArray());
    }
}
