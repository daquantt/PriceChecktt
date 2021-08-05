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
    
    @if(count($posts) > 0)
        <div class="card p-md-3 mt-3 mb-3 table-responsive">
            <table class="table table-sm table-striped table-hover text-nowrap">
                <tr>   
                    <th class="text-center">Date of Price</th>
                    <th>Item</th>
                    <th class="text-end">Price</th>                    
                    <th class="text-center d-none d-sm-table-cell">Brand</th>
                    <th class="text-center">Size/Qty</th>
                    <th class="text-center">Vendor</th>
                    <th class="d-none d-sm-table-cell text-center">Location</th>
                    <th class="d-none d-sm-table-cell text-center">Created by</th>
                </tr>
                @foreach ($posts as $post)                                         
                    <tr>
                        <td class="text-center">{{$post->price_date}}</td>
                        <td><strong><a href="/posts/{{$post->id}}">{{$post->title}}</a></strong></td>
                        <td class="text-end">{{number_format($post->price, 2, '.', ',')}}</td>                        
                        <td class="text-center d-none d-sm-table-cell">{{$post->brand}}</td>
                        <td class="text-center">{{$post->size}}</td>
                        <td class="text-center">{{$post->vendor}}</td>
                        <td class="d-none d-sm-table-cell text-center">{{$post->location}}</td>
                        <td class="d-none d-sm-table-cell text-center">{{$post->user->name}}</td>

                    </tr>
                @endforeach
            </table>
        </div>            
        
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection