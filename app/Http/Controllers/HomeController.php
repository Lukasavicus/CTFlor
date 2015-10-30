<?php 

namespace CTFlor\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller{

	public function index(){
		return view('home');
	}

	public function post(Request $request){

		$this->validate($request, [
			'login' => 'required',
			'password' => 'required',
		]);

		$cpf_participant = $request->input('login');
		$password_participant = $request->input('password');

		//dd($cpf_participant . ' ' . $password_participant);

		if(!Auth::attempt(['cpf' => $cpf_participant, 'password' => $password_participant] ) ){
			dd('error');//echo 'Error';
			return redirect()->back()->with('error', 'Could not sign you in with these credentials.');
		}

		dd('no error');//echo 'No Error';

		return redirect()->route('home')->with('info', 'You are now signed in.');

		//print_r("Bloody hell");
		//dd($request->input('login') . " " . $request->input('password'));
	}

}


/*

		$this->validate($request, [
			'login' => 'required|unique:participants|number|max:11',
			'password' => 'required|min:3',
		]);

		Participant::create([
			'cpf' 		=> 	$request->input('login'),
			'password' 	=>	bcrypt($request->input('password')),
		]);

*/