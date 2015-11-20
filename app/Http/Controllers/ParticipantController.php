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
        $participants = DB::table('participants')->orderBy('name')->get();
        return view('crud.participant', ['participants' => $participants])->with('participant', 'PARTICIPANTS');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

    	dd($request);

        $this->validate($request,[
            'name'			=> 'required',
            'cpf'			=> 'required|unique:participants',
            'email'			=> 'required',
            'phone'			=> 'required',
            'address'		=> 'required',
            'password'		=> 'required',
            'type'			=> 'required',
        ]);

        if(Input::get('type') == "student"){
	        $this->validate($request,[
	            'university'		=> 'required',
	            'course'			=> 'required',
	        ]);
        }
        else if(Input::get('type') == "professor"){
	        $this->validate($request,[
	            'university'		=> 'required',
	            'department'		=> 'required',
	        ]);
        }

        DB::table('participants')->insert([
            'name'			    => Input::get('name'),
            'cpf'			      => Input::get('cpf'),
            'email'			    => Input::get('email'),
            'phone'			    => Input::get('phone'),
            'address'		    => Input::get('address'),
            'password'		  => bcrypt(Input::get('password')),
            'type'			    => Input::get('type'),
            'university'		=> Input::get('university'),
        	  'course'			  => Input::get('course'),
        	  'department'		=> Input::get('department'),
        	  'responsability'=> Input::get('responsability'),
         ]);

        return redirect()->back()->with('info', 'Successfully created activity!');
    }

    public function deleteRegister(Request $request){

        $id = Input::get('modalMSGValue');

        Participant::where('name', '=', $id)->delete();
        return redirect()->back()->with('info', 'Successfully deleted participant!');
    }



// ================================== Inscrição ATIVIDADES ===================================================


    public function subscribing(){
        $participants = DB::table('participants')->orderBy('name')->get(); //->where('type', '=', 'technical_visit')

        //dd($participants);

        $id_participant = '2';

        // SELECT a.name, a.start, a.end, ap.role_participant
        //    from activities as a, activitiesparticipants as ap
        //    where a.id = ap.id_activity and ap.id_participant = 2;

        $lectures = DB::table('activitiesparticipants')
        ->join('activities', 'activitiesparticipants.id_activity', '=', 'activities.id')
        ->select('activities.name as aName', 'activities.*', 'activitiesparticipants.role_participant')
        ->where('activitiesparticipants.id_participant', '=', $id_participant)
        ->where('activities.type', '=', 'lecture')
        ->orderBy('aName')
        ->get();


        $mini_courses = DB::table('activitiesparticipants')
        ->join('activities', 'activitiesparticipants.id_activity', '=', 'activities.id')
        ->select('activities.name as aName', 'activities.*', 'activitiesparticipants.role_participant')
        ->where('activitiesparticipants.id_participant', '=', $id_participant)
        ->where('activities.type', '=', 'mini_course')
        ->orderBy('aName')
        ->get();

        $technical_visits = DB::table('activitiesparticipants')
        ->join('activities', 'activitiesparticipants.id_activity', '=', 'activities.id')
        ->select('activities.name as aName', 'activities.*', 'activitiesparticipants.role_participant')
        ->where('activitiesparticipants.id_participant', '=', $id_participant)
        ->where('activities.type', '=', 'technical_visit')
        ->orderBy('aName')
        ->get();


        return view('lista.participantes', ['participants' => $participants, 'lectures' => $lectures, 'mini_courses' => $mini_courses, 'technical_visits' => $technical_visits,]);
    }

    public function subscribingSave(Request $request){

        dd('subscribingSave');

        $ids = explode('&', $request['allData'], -1);

        DB::table('technicalvisitparticipants')->where('id_activity', '=', $ids[0])->delete();

        $i = 1;
        $tam = count($ids);
        for (; $i < $tam; $i++) {
            DB::table('technicalvisitparticipants')->insert(['id_activity' => $ids[0], 'id_participant' => $ids[$i]]);
        }

        return $this->same_subscribing($ids[0]);

    }

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


}
