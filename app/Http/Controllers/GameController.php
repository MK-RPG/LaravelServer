<?php


namespace App\Http\Controllers;


namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
class GameController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('game');
    }
    public function getScore()
    {
        $highscore = response()->json([
            "highscore" => Auth::user()->highscore
        ]);
        return $highscore;
    }

    public function postScore()
    {
        $user = Auth::user();
        $score = request()->input('score');
        $user->highscore = $score;
        $user->save;
    }
}