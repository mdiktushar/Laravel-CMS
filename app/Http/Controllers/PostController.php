<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index() {
        
        $posts = auth()->user()->posts;
        // $posts = Post::all();
        return view('admin.post.index', ['posts'=>$posts]);
    }

    public function show(Post $post) {
        return view('blog-post', ['post' => $post]);
    }

    public function create() {
        return view('admin.post.create');
    }

    public function store() {
        $this->authorize('create', Post::class);
        $inputs = request()->validate([
            'title'=>'required| min:8| max:255',
            'post_image' => 'file:jpeg, jpg, png',
            'body'=>'required'
        ]);


        if(request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
        }


        auth()->user()->posts()->create($inputs);

        session()->flash('created', 'Post Created...!');
        return redirect()->route('post.index');
    }

    public function edit(Post $post) {
        $this->authorize('view', $post);
        return view('admin.post.edit', ['post' => $post]);
    }

    public function distroy(Post $post, Request $request) {
        $this->authorize('delete', $post);
        $post->delete();
        session()->flash('delete-message', 'Post Deleted...!');
        return back();
    }


    public function update(Post $post) {
        $inputs = request()->validate([
            'title'=>'required| min:8| max:255',
            'post_image' => 'file:jpeg, jpg, png',
            'body'=>'required'
        ]);

        if(request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        // $this->authorize('update', $post);

        if(auth()->user()->can('update', $post)) {
            $post->update();

            session()->flash('updated', 'Post Updated...!');

            return redirect()->route('post.index');
        }

        
    }
}
