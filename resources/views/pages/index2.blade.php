@extends('layouts.app')

@section('content')
<br>
    <div class="text-center">
        <h1>Welcome to PriceCheck!</h1>
        <h5>All your prices under one roof!</h5>
        <br>
        
        <h4>Register now and start uploading prices!</h4>
        <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
        <br><br>
        <div class="row my-3 justify-content-center">
            <form action="/search" method="GET" class="col-sm-6">
                <div class="input-group">
                    <input name="search" class="form-control" type="search" placeholder="Search Products" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
@endsection