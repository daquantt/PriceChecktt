@extends('layouts.app')

@section('content')
    <br>
    <h2 class="text-center"><?php echo $title; ?></h2>
    
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-md-3 mt-3 mb-3">
                <table class="table table-sm table-striped table-hover text-nowrap">
                    <tr>   
                        <th class="text-center">Rank</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Points</th>
                        <th class="text-center">Date Joined</th>

                    </tr>
                    @foreach ($users as $user)                                         
                        <tr>
                            <td class="text-center">{{$no++}}</td>
                            <td class="text-center"><a href="/users/{{$user->username}}/posts">{{$user->username}}</a></td>
                            <td class="text-center">{{$user->points}}</td>
                            <td class="text-center">{{$user->created_at->format('Y-m-d')}}</td>

                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>   
@endsection