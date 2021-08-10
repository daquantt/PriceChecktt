@extends('layouts.app')

@section('content')
    <br>
    <h4 class="text-center">Item Details</h4>    

    <hr>
    
    <div class="row">
        <span class="col-4 col-md-2">Date of Price: </span>
        <span class="col-8 col-md-10">{{$post->price_date}}</span>
    </div>
    <div class="row">
        <span class="col-4 col-md-2">Item: </span>
        <span class="col-8 col-md-10">{{$post->title}}</span>
    </div>
    <div class="row">
        <span class="col-4 col-md-2">Price: </span>
        <span class="col-8 col-md-10">{{number_format($post->price, 2, '.', ',')}}</span>
    </div>
    <div class="row">
        <span class="col-4 col-md-2">Brand: </span>
        <span class="col-8 col-md-10">{{$post->brand}}</span>
    </div>
    <div class="row">
        <span class="col-4 col-md-2">Size: </span>
        <span class="col-8 col-md-10">{{$post->size}}</span>
    </div>
    <div class="row">
        <span class="col-4 col-md-2">Vendor: </span>
        <span class="col-8 col-md-10">{{$post->vendor}}</span>
    </div>
    <div class="row">
        <span class="col-4 col-md-2">Location: </span>
        <span class="col-8 col-md-10">{{$post->location}}</span>
    </div>
    <div class="row">
        <span class="col-4 col-md-2">Comments: </span>
        <span class="col-8 col-md-10">{{$post->comment}}</span>
    </div>
    <br>
    <small>Created on {{$post->created_at}} by <a href="{{ route('users.posts', $post->user) }}">{{$post->user->username}}</a></small>
    <hr>
    
    <a href="{{ url()->previous() }}" class="btn btn-secondary" >Go Back</a>
    
    <!-- if statement Blocks guests from seeing edit/delete buttons -->
    @if (!Auth::guest()) 
        <!-- if statement Only allows users to see edit & delete buttons on their posts-->
        @if (Auth::user()->id == $post->user_id)      
            <a href="/posts/{{$post->id}}/edit" class="btn btn-info  text-light">Edit</a>

            {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-end'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger text-light'])}}
            {!!Form::close()!!}
        @endif
    @endif

@endsection