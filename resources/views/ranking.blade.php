@extends('layouts.main')
@section ('play-button')
<li class="li"><a href="/game"><img src="/img/play.png">Play</a></li>
@stop
@section ('bootstrap')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css";
@stop


@section('promo')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default" style="background-color:transparent; border-color: black; font-family: 'Limelight', cursive; font-size: 16px; color:black">
                    <div class="panel-heading"  style="background-color:transparent;border-color:black;color:black"> @if($user)
                            Hello, {{ $user->firstname}} !
                        @else
                            Hello guest !
                        @endif
                    </div>

                    <div class="panel-body">


                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Gold</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{++$count}}</td>
                                    <td>{{$user->firstname." ".$user->lastname}}</td>
                                    <td>{{$user->gold}}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
