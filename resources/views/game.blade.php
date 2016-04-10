@extends('layouts.main')
@section('promo')
    <div id="game">

    </div>
    {{ HTML::script('js/Game/js/phaser.js') }}
    {{ HTML::script('js/Game/js/Boot.js') }}
    {{ HTML::script('js/Game/js/Preload.js') }}
    {{ HTML::script('js/Game/js/Game.js') }}
    {{ HTML::script('js/Game/js/Dungeon.js') }}
    {{ HTML::script('js/Game/js/StartMenu.js') }}
    {{ HTML::script('js/Game/js/GameOver.js') }}
    {{ HTML::script('js/Game/js/main.js') }}
@stop