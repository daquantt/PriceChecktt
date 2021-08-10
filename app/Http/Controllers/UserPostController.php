<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserPostController extends Controller
{
    public function index(User $user)
    {
        $posts = $user->posts()->with(['user', 'likes'])->paginate(20);
        
        return view('users.index', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function rank()
    {
        $title = 'Scoreboard';
        $users = User::orderBy('points', 'desc')->paginate(100);
        return view('users.rank')
            ->with('title', $title)
            ->with(['users' => $users, 'no' => 1]);
    }
}
