<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class UsersController extends Controller {


    public function getNewaccount() {
        return view('users.newaccount');
    }

    public function postCreate() {

            $rules = [
                'firstname' => 'required|max:255',
                'email'=>'required|email|max:255|unique:users',
                'password'=>'required|min:6'];

            $isValid = Validator::make(Input::all(),$rules);

            if ($isValid->fails()) {
                return redirect('users/newaccount')
                    ->with('message', 'Something went wrong')
                    ->withInput();
            }else {
                $user = new User();
                $user->firstname = Input::get('firstname');
                $user->lastname = Input::get('lastname');
                $user->email = Input::get('email');
                $user->password = Hash::make(Input::get('password'));
                $user->save();
                return redirect('/')
                    ->with('message', 'Thank you for creating a new account.');
        }
    }


    protected function signIn(Request $request) {

        return Auth::attempt($this->getCredentials($request));
    }

    protected function getCredentials(Request $request) {

        return [
            'email'    => $request->input('email'),
            'password' => $request->input('password'),
        ];
    }


    public function getSignin() {

        return view('users.signin');
    }

    public function postSignin() {
        if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
            return redirect('/')->with('message', 'Thanks for signing in');
        }

        return back()->with('message', 'Your email/password was incorrect');
    }

    public function getSignout() {
        Auth::logout();
        return redirect('/')->with('message', 'You have been signed out');
    }
};

