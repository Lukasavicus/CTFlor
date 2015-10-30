<?php 

namespace CTFlor\Http\Controllers;
use Auth;
use CTFlor\Models\Participant;
use Illuminate\Http\Request;

class HomeController extends Controller{

	public function index(){
		return view('home');
	}

	public function post(Request $request){

		$this->validate($request, [
			'cpf' => 'required',
			'password' => 'required',
		]);

		$credentials = $request->only(['cpf', 'password']);

		$authencted_client = Participant::authParticipant($credentials);

		if(!$authencted_client){
			return redirect()->back()->with('error', 'Could not sign you in with these credentials.');
		}
		
		return redirect()->route('home')->with('personal', 'Welcome back ' . $authencted_client['name'] . '.' . PHP_EOL . 'You are now signed in.');
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