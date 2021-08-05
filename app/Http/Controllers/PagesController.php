<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PagesController extends Controller
{

    public function index()
    {
        return view('pages.index');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function about()
    {
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }

    public function points()
    {
        $title = 'Point System';
        return view('pages.points')->with('title', $title);
    }

    public function rank()
    {
        $title = 'Scoreboard';
        $users = User::orderBy('points', 'desc')->paginate(100);
        return view('pages.rank')
            ->with('title', $title)
            ->with(['users' => $users, 'no' => 1]);
    }
}
