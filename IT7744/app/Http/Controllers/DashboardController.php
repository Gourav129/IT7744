<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
{
    $posts = auth()->user()->posts()->latest()->paginate(4);
    return view('users.dashboard', ['posts' => $posts]);
}

public function userPosts(User $user)
{
    $posts = $user->posts()->latest()->paginate(6);

    return view('users.posts', [
        'user' => $user,
        'posts' => $posts
    ]);
}

}
