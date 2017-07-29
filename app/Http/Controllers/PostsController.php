d .<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::latest()->filter(request(['month', 'year']))->get();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(Post $post)
    {
        $comments = $post->getComments();
        $tags = $post->tags;

        return view('posts.show', compact('post', 'comments', 'tags'));
    }

    public function store()
    {
        // validate
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        // store
        Post::create([
            'user_id' => auth()->id(),
            'title' => request('title'),
            'body' => request('body')
        ]);

        // flash message
        session()->flash('message', 'Post successfully published!');

        // redirect
        return redirect()->home();
    }

    public function home()
    {
        return redirect()->home();
    }
}
