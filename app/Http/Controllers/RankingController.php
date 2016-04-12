<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Auth;
class RankingController extends Controller
{
    public function index()
    {
        $users = User::orderBy('gold', 'DESC')->take(10)->get();
        $count = 0;
        if(Auth::user()){
            $user = Auth::user();
        }else{
            $user = null;
        }

        return view('ranking', compact('user', 'users', 'count'));
    }

}