@extends('layouts.app')

@section('content')
    <br>
    <h3>Create Post</h3><span>* required fields</span>
        
    <div class="col-md-6">
        {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST']) !!}
            
            <div class="input-group">
                {{Form::label('date', 'Date of Price*', ['class' => 'input-group-text col-sm-3 mb-2'])}}
                {{Form::date('price_date', \Carbon\Carbon::now(-4), ['class' => 'form-control mb-2', 'placeholder' => 'Date of Price'])}}
            </div>
            <div class="input-group">
                {{Form::label('title', 'Item*', ['class' => 'input-group-text col-sm-3 mb-2'])}}
                {{Form::text('title', '', ['class' => 'form-control mb-2', 'maxlength' => '30', 'placeholder' => 'Product'])}}
            </div>
            <div class="input-group">
                {{Form::label('brand', 'Brand', ['class' => 'input-group-text col-sm-3 mb-2'])}}
                {{Form::text('brand', '', ['class' => 'form-control mb-2', 'maxlength' => '20', 'placeholder' => 'Brand'])}}
            </div>
            <div class="input-group">
                {{Form::label('size', 'Size', ['class' => 'input-group-text col-sm-3 mb-2'])}}
                {{Form::text('size', '', ['class' => 'form-control mb-2', 'maxlength' => '8', 'placeholder' => 'Size'])}}
            </div>
            <div class="input-group")>
                {{Form::label('price', 'Price*', ['class' => 'input-group-text col-sm-3 mb-2'])}}
                {{Form::text('price', '', ['class' => 'form-control mb-2 col col-sm-4', 'maxlength' => '12', 'placeholder' => 'Price'])}}
            </div>
            <div class="input-group">
                {{Form::label('vendor', 'Vendor*', ['class' => 'input-group-text col-sm-3 mb-2'])}}
                {{Form::text('vendor', '', ['class' => 'form-control mb-2', 'maxlength' => '20', 'placeholder' => 'Vendor'])}}
            </div>
            <div class="input-group">
                {{Form::label('location', 'Location', ['class' => 'input-group-text col-sm-3 mb-2'])}}
                {{Form::text('location', '', ['class' => 'form-control mb-2', 'maxlength' => '20', 'placeholder' => 'Location'])}}
            </div>
            <div class="input-group">
                {{Form::label('comment', 'Comments', ['class' => 'input-group-text col-sm-3 mb-2'])}}
                {{Form::textarea('comment', '', ['class' => 'form-control mb-2', 'rows' => '1', 'maxlength' => '1000', 'placeholder' => 'Additional information'])}}
            </div>            
            
            {{Form::submit('Upload', ['class' => 'btn btn-primary text-light'])}}
            <a href="/dashboard" class="btn btn-secondary">Back</a>
        {!! Form::close() !!}
    </div>
@endsection