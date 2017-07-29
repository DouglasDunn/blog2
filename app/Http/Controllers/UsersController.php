<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index(User $user)
    {
        $posts = $user->posts;

        return view('posts.index', compact('posts'));
    }
}
