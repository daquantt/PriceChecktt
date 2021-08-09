<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'search']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();   alternative for the below to select all posts
        //$posts = Post::orderBy('created_at','desc')->get();
        //$posts = Post::orderBy('created_at','desc')->take(10)->get();
        //take(10) only pulls 10 posts
        $posts = Post::with(['user', 'likes'])->orderBy('price_date', 'desc')->paginate(25);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required'],
            'vendor' => 'required',
            'price' => 'required|numeric',
            'price_date' => 'required'
        ]);

        /**    protected function validator(array $data)
        {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }
         */

        //Create Post
        $post = new Post;
        $points = 4;
        $post->title = $request->input('title');
        $post->brand = $request->input('brand');
        $post->size = $request->input('size');
        $post->vendor = $request->input('vendor');
        $post->location = $request->input('location');
        $post->price = $request->input('price');
        $post->price_date = $request->input('price_date');
        $post->comment = $request->input('comment');
        $post->user_id = auth()->user()->id;
        $post->save();

        if ($request->filled('brand')) {
            $points += 1;
        }
        if ($request->filled('size')) {
            $points += 1;
        }
        if ($request->filled('location')) {
            $points += 1;
        }

        $request->user()->points += $points;
        $request->user()->save();

        return redirect('/posts/create')->with('success', 'Post Created - You earned ' . $points . ' points');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }


    public function search(Request $request)
    {
        $search = $request->get('search');
        $posts = Post::where('title', 'LIKE', '%' . $search . '%')->paginate(25);

        return view('posts.search')->with('posts', $posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        //Check for correct user
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        return view('posts.edit')->with('post', $post);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => ['required', 'max:25'],
            'vendor' => 'required',
            'price' => 'required',
            'price_date' => 'required'
        ]);

        //Update Post
        $post = Post::Find($id);

        $points = 0;
        if (isset($post->brand)) {
            $points += -1;
        }
        if (isset($post->size)) {
            $points += -1;
        }
        if (isset($post->location)) {
            $points += -1;
        }

        $post->title = $request->input('title');
        $post->brand = $request->input('brand');
        $post->size = $request->input('size');
        $post->vendor = $request->input('vendor');
        $post->location = $request->input('location');
        $post->price = $request->input('price');
        $post->price_date = $request->input('price_date');
        $post->comment = $request->input('comment');


        if ($request->filled('brand')) {
            $points += 1;
        }
        if ($request->filled('size')) {
            $points += 1;
        }
        if ($request->filled('location')) {
            $points += 1;
        }

        $post->save();
        $request->user()->points += $points;
        $request->user()->save();

        return redirect('/dashboard')->with('success', 'Post Updated - You earned ' . $points . ' points');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::Find($id);
        $points = -4;

        //Check for correct user
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        if (isset($post->brand)) {
            $points += -1;
        }
        if (isset($post->size)) {
            $points += -1;
        }
        if (isset($post->location)) {
            $points += -1;
        }

        $post->delete();
        $request->user()->points += $points;
        $request->user()->save();

        return redirect('/dashboard')->with('success', 'Post Removed - You lost ' . -$points . ' points');
    }
}
