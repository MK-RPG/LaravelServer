@extends('layouts.main')
@yield('gold')
@section('promo')
    <div id="game" style="width:640px;margin: 0 auto;">

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