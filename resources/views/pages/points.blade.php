@extends('layouts.app')

@section('content')
        <br>
        <h2 class="text-center"><?php echo $title; ?></h2>
        <p></p>
        
        <ul class="list-group">
            <li class="list-group-item">
                <ul>                              
                    <li>In order to earn points you must register with us.</li>
                    <li>Once registered, you can create posts which earn you points.</li>
                    <li>A post has 4 required fields and 3 optional fields to be completed.</li>
                    <li>All completed fields earn you 1 point, therefore you can earn a maximum of 7 points per post.</li>
                    <li>Optional fields can be completed at a later date and you will earn the points at that time.</li>
                    <li>Comments do not earn any points.</li>           
                    <li>Deleting a post will result in the post’s assigned points being subtracted from your total points.</li>   
                </ul>
            </li>  
        </ul>
        
@endsection