<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index() {
        
        $posts = Post::all();
        return view('admin.post.index', ['posts'=>$posts]);
    }

    public function show(Post $post) {
        return view('blog-post', ['post' => $post]);
    }

    public function create() {
        return view('admin.post.create');
    }

    public function store() {
        $inputs = request()->validate([
            'title'=>'required| min:8| max:255',
            'post_image' => 'file:jpeg, jpg, png',
            'body'=>'required'
        ]);


        if(request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
        }


        auth()->user()->posts()->create($inputs);
        return back();
    }
}
