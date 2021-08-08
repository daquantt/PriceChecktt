@extends('layouts.app')

@section('content')
    <br>
    <h3 class="text-center">Search Products</h3>
    
    <div class="d-flex align-items-center mb-3">
        @auth
            <div><a href="/posts/create" class="btn btn-success btn px-2 text-center fs-6 me-auto">New Post</a></div>
        @endauth
        <form action="/search" method="GET" class="ms-auto col-8 col-sm-4">
            <div class="input-group">
                <input name="search" class="form-control" type="search" placeholder="Search Products" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </div>
        </form>
    </div>
    
    <small class="d-sm-none">Rotate mobile devices for full details</small>
    @if(count($posts) > 0)
        <div class="card p-md-3 my-1 table-responsive">
            <table class="table table-sm table-striped table-hover text-nowrap">
                <tr>   
                    <th class="text-center">Date of Price</th>
                    <th>Item</th>
                    <th class="text-end">Price</th>                    
                    <th class="text-center d-none d-sm-table-cell">Brand</th>
                    <th class="text-center d-none d-sm-table-cell">Size/Qty</th>
                    <th class="text-center d-none d-sm-table-cell">Vendor</th>
                    <th class="text-center d-none d-sm-table-cell">Location</th>
                    <th class="text-center">Likes</th>
                </tr>
                @foreach ($posts as $post)                                         
                    <tr>
                        <td class="text-center">{{$post->price_date}}</td>                        
                        <td><strong><a href="/posts/{{$post->id}}">{{$post->title}}</a></strong></td>
                        <td class="text-end">{{number_format($post->price, 2, '.', ',')}}</td>                        
                        <td class="text-center d-none d-sm-table-cell">{{$post->brand}}</td>
                        <td class="text-center d-none d-sm-table-cell">{{$post->size}}</td>
                        <td class="text-center d-none d-sm-table-cell">{{$post->vendor}}</td>
                        <td class="text-center d-none d-sm-table-cell">{{$post->location}}</td>
                        <td class="text-center position-relative">  
                            {{-- <span class="badge rounded-pill bg-info align-self-center"><span>{{ $post->likes->count() }}</span></span> --}}
                            @guest
                                <span class="position-absolute ms-2 top-25 start-50 translate-middle badge rounded-pill bg-info" ><span>{{ $post->likes->count() }}</span></span>
                                <form action="#" method="" class="me-2" @popper(Log in to like)>
                                    @csrf
                                    <button type="submit" class="btn btn-none btn-sm p-0"><i class="bi bi-shield-check text-primary h5"></i></button>
                                </form>
                            @else
                            
                            <span class="position-absolute ms-2 top-25 start-50 translate-middle badge rounded-pill bg-info"><span>{{ $post->likes->count() }}</span></span>                                                                                 
                            @if (!$post->likedBy(auth()->user()))
                                <form action="{{ route('posts.likes', $post) }}" method="post" class="me-2" @popper(Click to like)>
                                    @csrf
                                    <button type="submit" class="btn btn-none btn-sm p-0"><i class="bi bi-hand-thumbs-up text-primary h5"></i></button>
                                </form>
                            @else
                                <form action="{{ route('posts.likes', $post) }}" method="post" class="me-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-none btn-sm p-0"><i class="bi bi-hand-thumbs-up-fill text-primary h5"></i></button>
                                </form>
                            @endif      
                            @endguest
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>    
        {{$posts->links()}}

    @else
        <p>No posts found</p>
    @endif
 
@endsection