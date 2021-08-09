@extends('layouts.app')

@section('content')

    <br>    
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3 class="pt-1 mb-0">Dashboard</h3>            
            <span class="pt-1 mb-0">Points: {{ Auth::user()->points }}</span>        
        </div>

            <div class="card-body px-3">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                
                <div class="d-flex align-items-center">
                    <div><a href="/posts/create" class="btn btn-success btn me-auto px-2 text-center fs-6">New Post</a></div>
                    <form action="/dashsearch" method="GET" class="ms-auto col-8 col-sm-4 p-0">
                        <div class="input-group">
                            <input name="search" class="form-control" type="search" placeholder="Search posts" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </div>
                    </form>
                </div>

                @if(count($posts) > 0)
                    <div class="card p-md-2 mt-3 mb-3 table-responsive">
                    <table class="table table-sm table-striped table-hover text-nowrap">
                        <tr>   
                            <th class="text-center">Date of Price</th>
                            <th>Item</th>
                            <th class="text-end">Price</th>
                            <th class="text-center">Brand</th>
                            <th class="text-center">Size/Qty</th>
                            <th class="text-center">Vendor</th>
                            <th class="text-center">Location</th>
                            <th class="text-center">Edit/Delete</th>
                        </tr>
                        @foreach ($posts as $post)                                         
                            <tr>
                                <td class="text-center">{{$post->price_date}}</td>
                                <td>{{$post->title}}</td>
                                <td class="text-end">{{number_format($post->price, 2, '.', ',')}}</td>
                                <td class="text-center">{{$post->brand}}</td>
                                <td class="text-center">{{$post->size}}</td>
                                <td class="text-center">{{$post->vendor}}</td>
                                <td class="text-center">{{$post->location}}</td>                                                       
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="/posts/{{$post->id}}/edit" class="btn btn-info btn-sm py-0 px-3 text-light">Edit</a>
                                        {{-- <button class="btn btn-danger btn-sm py-0">
                                            {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm p-0'])}}
                                            {!!Form::close()!!}
                                        </button> --}}
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete post</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">This post will be removed!</div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-danger">
                                                            {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST'])!!}
                                                            {{Form::hidden('_method', 'DELETE')}}
                                                            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm p-0'])}}
                                                            {!!Form::close()!!}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Button trigger modal -->
                                        <button class="btn btn-danger btn-sm py-0 text-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Delete
                                        </button>

                                    </div>                                
                                </td>                    
                            </tr>
                        @endforeach
                    </table>
                    </div>
                    {{$posts->links()}}    
                @else   
                    <p class="text-center mt-3">No posts found</p>
                @endif   
            </div>
    </div>           
@endsection
