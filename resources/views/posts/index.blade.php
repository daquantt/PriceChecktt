@extends('layouts.app')

@section('content')
    <br>    
    <h2 class="text-center">Prices</h2>

    <div class="row my-3 justify-content-center">
        <form action="/search" method="GET" class="col-sm-6">
            <div class="input-group">
                <input name="search" class="form-control" type="search" placeholder="Search Products" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </div>
        </form>
    </div>
    
    <small class="d-sm-none">Rotate mobile screens for full details</small>
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
                    <th class="text-center">Like</th>
                </tr>
                @foreach ($posts as $post)                                         
                    <tr>
                        <td class="text-center">{{$post->price_date}}</td>                        
                        <td>
                            <strong><a href="/posts/{{$post->id}}">{{$post->title}}</a></strong>
                            <span class="badge rounded-pill bg-info"><span>{{ $post->likes->count() }}</span></span>
                            {{-- <span class="position-absolute ms-2 top-25 start-75 translate-middle badge rounded-pill bg-info"><span>{{ $post->likes->count() }}</span></span> --}}
                        </td>
                        <td class="text-end">{{number_format($post->price, 2, '.', ',')}}</td>                        
                        <td class="text-center d-none d-sm-table-cell">{{$post->brand}}</td>
                        <td class="text-center d-none d-sm-table-cell">{{$post->size}}</td>
                        <td class="text-center d-none d-sm-table-cell">{{$post->vendor}}</td>
                        <td class="text-center d-none d-sm-table-cell">{{$post->location}}</td>
                        <td class="text-center">                                                        
                            @if (!$post->likedBy(auth()->user()))
                                <form action="{{ route('posts.likes', $post) }}" method="post" class="me-1">
                                    @csrf
                                    <button type="submit" class="btn btn-none btn-sm p-0"><i class="bi bi-hand-thumbs-up-fill text-info h5"></i></button>
                                </form>
                            @else
                                <form action="{{ route('posts.likes', $post) }}" method="post" class="me-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-none btn-sm p-0"><i class="bi bi-hand-thumbs-down-fill text-info h5 p-0"></i></button>
                                </form>
                            @endif                            
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

