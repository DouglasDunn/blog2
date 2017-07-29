<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
        // validate
        $this->validate(request(), [
            'body' => 'required|min:2'
        ]);

        // store
        Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'body' => request('body')
        ]);

        // redirect back
        return back();
    }
}
