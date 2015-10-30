<?php 

use Illuminate\Http\Request;
namespace CTFlor\Http\Controllers;

class HomeController extends Controller{

	public function index(){
		return view('home');
	}

	public function post(){
		print_r("Bloody hell");
		//dd($request);
	}

}
