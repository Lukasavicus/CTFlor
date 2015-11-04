<?php

namespace CTFlor\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use CTFlor\Models\Participant;

class AuthController extends Controller{

	public function getSignup(){
		return view('auth.signup');
	}


	public function postSignup(Request $request){
		$this->validate($request, [
			'email' => 'required|unique:users|email|max:255',
			'username' => 'required|unique:users|alpha_dash|max:20',
			'password' => 'required|min:6',
		]);

		//dd('all ok');

		User::create([
			'email' => $request->input('email'),
			'username' => $request->input('username'),
			'password' => bcrypt($request->input('password')),
		]);

		return redirect()->route('home')->with('info', 'Your account has been created and now you can sign in.');

	}

	public function	getSignin(){
		return view('auth.signin');
	}

	public function postSignin(Request $request){
		$this->validate($request, [
			'email' => 'required',
			'password' => 'required',
		 ]);

		$size = strlen($request['email']);
		$count = substr_count($request['email'], '@',0, $size);

		if($count != 0) 
			$column = 'email';
		else
			$column = 'username';


		if(!Auth::attempt($request->only([$column,'password']), $request->has('remember'))){
			return redirect()->back()->with('info', 'Could not sign you in with these credentials.' . $column . ' ' . $request['password'] . ' ' . $request['email'] . ' ' . $count);
		}


		return redirect()->route('home')->with('info', 'You are now signed in.' . $column . ' ' . $request['password'] . ' ' . $request['email']  . ' ' . $count);

		//dd('all ok');
	}

	public function getSignout(){
		Auth::logout();
		return redirect()->route('home')->with('info', 'Good bye and come back soon. :)');
	}

}
?>