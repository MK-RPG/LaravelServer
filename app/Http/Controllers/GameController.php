<?php


namespace App\Http\Controllers;


namespace App\Http\Controllers;

//use App\Http\Requests;
//use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Auth;

class GameController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 //   public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        $gold = Auth::user()->gold;
        return view('game' , compact('gold'));
    }
    public function getGold()
    {
        $gold = response()->json([
            "gold" => Auth::user()->gold
        ]);
        return $gold;
    }

    public function postScore()
    {
        $user = Auth::user();
        $gold = request()->input('gold');
        $user->gold += $gold;
        $user->save();
    }
}