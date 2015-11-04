<?php

namespace CTFlor\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Input;
use CTFlor\Http\Requests;
use CTFlor\Http\Controllers\Controller;
use CTFlor\Models\Participant;
use Validator;

class ParticipantController extends Controller{

    public function participantIndex(){
        $participants = DB::table('participants')->get();
        return view('participant', ['participants' => $participants])->with('participant', 'PARTICIPANTS');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

    	//dd($request);

        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'					=> 'required',
            'cpf'					=> 'required|unique:participants',
            'email'					=> 'required',
            'phone'					=> 'required',
            'address'				=> 'required',
            'password'				=> 'required',
            'type'					=> 'required',
        );

        $student = array(
        	'university'	=> 'required',
        	'course'		=> 'required',
    	);

        $professor = array(
        	'university'	=> 'required',
        	'department'	=> 'required',
    	);

        $valRules = Validator::make([
        	$request->input('name'), 
        	$request->input('cpf'), 
        	$request->input('email'), 
        	$request->input('phone'), 
        	$request->input('address'), 
        	$request->input('password'), 
        	$request->input('type'),
        	], $rules);

        $valStudent = Validator::make([$request->input('university'), $request->input('course')], $student);

        $valProfessor = Validator::make([$request->input('university'), $request->input('department')], $professor);


        $this->validate($request, [
			'email' => 'required|unique:participants|email|max:255',
			'name' => 'required|unique:participants|alpha_dash|max:20',
			'password' => 'required|min:6',
		]);

        //if($valRules->fails())
        	//return redirect()->back()->with('error', 'Error on try to created activity![1]');
        //else{
        	//if(Input::get('type') == "student"){
        	//	if($valStudent->fails()){
        	//		return redirect()->back()->with('error', 'Error on try to created activity![2]');
    		//	}
			//}
			//else if(Input::get('type') == "professor"){
        	//	if($valProfessor->fails()){
        	//		return redirect()->back()->with('error', 'Error on try to created activity![3]');
    		//	}
			//}
        //}

        DB::table('participants')->insert([
            'name'              => Input::get('name'),
            'start'             => Input::get('start'),
            'end'               => Input::get('end'),
            'location'          => Input::get('location'),
            'qnt_participants'  => Input::get('qnt_participants'),
            'duration'          => Input::get('duration'),
            'type'              => Input::get('type'),
            'university'		=> Input::get('university'),
        	'course'			=> Input::get('course'),
        	'department'		=> Input::get('department'),
        	'responsability'	=> Input::get('responsability'),
         ]);

        return redirect()->back()->with('info', 'Successfully created activity!');
    }

    public function deleteRegister(Request $request){

        //dd('all ¬ ok >' . '< |>' . Input::get('modalMSGValue') . '<| >>' . $request->input('modalMSGValue')  . '<<' );

        $id = Input::get('modalMSGValue');

        Participant::where('name', '=', $id)->delete();
        return redirect()->back()->with('info', 'Successfully deleted participant!');
    }

}
