@extends('layouts.main')
@yield('gold')
@section('promo')
<<<<<<< HEAD
    <div id="game">
=======
    <div id="game" style="width:640px;margin: 0 auto;">

>>>>>>> 67f51b58b1046ecb12f35c1906aad071f6b5fc28
    </div>
    {{ HTML::script('js/Game/js/phaser.js') }}
    {{ HTML::script('js/Game/js/DataManager.js') }}
    {{ HTML::script('js/Game/js/Boot.js') }}
    {{ HTML::script('js/Game/js/Preload.js') }}
    {{ HTML::script('js/Game/js/Game.js') }}
    {{ HTML::script('js/Game/js/Dungeon.js') }}
    {{ HTML::script('js/Game/js/StartMenu.js') }}
    {{ HTML::script('js/Game/js/GameOver.js') }}
    {{ HTML::script('js/Game/js/Win.js') }}
    {{ HTML::script('js/Game/js/main.js') }}
@stop