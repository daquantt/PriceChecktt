<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $user_id = auth()->user()->id;
        // $user = User::find($user_id);        
        // return view('dashboard')->with('posts', $user->posts);

        $user = auth()->user();
        $posts = $user->posts()->paginate(25);
        // Or with 1 line: $posts = auth()->user()->posts()->paginate();
        return view('dashboard')->with('posts', $posts);


        //$posts = Post::orderBy('created_at','desc')->paginate(10);
        //return view('posts.index')->with('posts', $posts);

    }

    public function search(Request $request)
    {
        $search = $request->get('search');
               
        // split on 1+ whitespace & ignore empty (eg. trailing space)
        $searchValues = preg_split('/\s+/', $search, -1, PREG_SPLIT_NO_EMPTY); 

        $posts = Post::where(function ($q) use ($searchValues) {
            foreach ($searchValues as $value) {
            $q->where('title', 'like', "%{$value}%");
            }
        })->orderBy('price_date', 'desc')->paginate(25)->withQueryString();

        return view('dashboard')->with('posts', $posts);
    }
}
