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

        $this->validate($request,[
            'name'			=> 'required',
            'cpf'			=> 'required|unique:participants',
            'email'			=> 'required',
            'phone'			=> 'required',
            'address'		=> 'required',
            'password'		=> 'required',
            'type'			=> 'required',
        ]);

        //if(Input::get('type') == "Estudante")
        //	dd('estudante');

        DB::table('participants')->insert([
            'name'			    => Input::get('name'),
            'cpf'			    => Input::get('cpf'),
            'email'			    => Input::get('email'),
            'phone'			    => Input::get('phone'),
            'address'		    => Input::get('address'),
            'password'		    => Input::get('password'),
            'type'			    => Input::get('type'),
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
