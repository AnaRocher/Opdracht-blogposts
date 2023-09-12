<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;


class UsersController extends Controller
{
    public function profile() {
        $user = auth()->user();
        $posts = Post::where('user_id', $user->id)
            ->latest()
            ->paginate(9);
            
        return view('users.profile', [
            'posts' => $posts,
            'user' => $user,
        ]);
    }

    public function show($username) {
        $user = User::where('username', $username)->firstOrFail();
        $posts = Post::where('user_id', $user->id)->latest()->paginate(9);
        return view('users.show', [
            'posts' => $posts,
            'user' => $user,
        ]);
    }    
}