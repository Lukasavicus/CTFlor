<?php

namespace CTFlor\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Input;
use CTFlor\Http\Requests;
use CTFlor\Http\Controllers\Controller;
use CTFlor\Models\Participant;
use CTFlor\Models\ActivityParticipant;
use CTFlor\Models\TechnicalVisitParticipant;
use Validator;

class ParticipantController extends Controller{

    public function participantIndex()
    {
        $participants = Participant::orderBy('name')->get();
        return view('crud.participant', compact('participants') );
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name'			=> 'required',
            'cpf'			=> 'required|unique:participants',
            'email'			=> 'required',
            'phone'			=> 'required',
            'address'		=> 'required',
            'password'		=> 'required',
            'type'			=> 'required',
        ]);

        if(Input::get('type') == "student")
        {
          $this->validate($request,[
              'university'		=> 'required',
              'course'			=> 'required',
          ]);
        }
        else if(Input::get('type') == "professor")
        {
          $this->validate($request,[
              'university'		=> 'required',
              'department'		=> 'required',
          ]);
        }

        $inputParticipant = $request->all();

        Participant::create($inputParticipant);

        return redirect()->back()->with('info', 'Successfully created event!');

    }

    public function deleteRegister(Request $request){

        $id = Input::get('modalMSGValue');

        Participant::where('name', '=', $id)->delete();

        return redirect()->back()->with('info', 'Successfully deleted participant!');
    }



// ================================== Inscrição ATIVIDADES ===================================================


    public function subscribing(){

        $participants = Participant::orderBy('name')->get();


        $id_participant = '2';

        $lectures = ActivityParticipant::join('activities', 'activitiesparticipants.id_activity', '=', 'activities.id')
        ->select('activities.name as aName', 'activities.*', 'activitiesparticipants.role_participant')
        ->where('activitiesparticipants.id_participant', '=', $id_participant)
        ->where('activities.type', '=', 'lecture')
        ->orderBy('aName')
        ->get();


        $mini_courses = ActivityParticipant::join('activities', 'activitiesparticipants.id_activity', '=', 'activities.id')
        ->select('activities.name as aName', 'activities.*', 'activitiesparticipants.role_participant')
        ->where('activitiesparticipants.id_participant', '=', $id_participant)
        ->where('activities.type', '=', 'mini_course')
        ->orderBy('aName')
        ->get();

        $technical_visits = ActivityParticipant::join('activities', 'activitiesparticipants.id_activity', '=', 'activities.id')
        ->select('activities.name as aName', 'activities.*', 'activitiesparticipants.role_participant')
        ->where('activitiesparticipants.id_participant', '=', $id_participant)
        ->where('activities.type', '=', 'technical_visit')
        ->orderBy('aName')
        ->get();


        return view('lista.participantes', compact('lectures', 'mini_courses', 'technical_visits'));
    }

    public function subscribingSave(Request $request){


        $ids = explode('&', $request['allData'], -1);

        TechnicalVisitParticipant::where('id_activity', '=', $ids[0])->delete();

        $i = 1;
        $tam = count($ids);
        for (; $i < $tam; $i++) {
            technicalVisitParticipants::create(['id_activity' => $ids[0], 'id_participant' => $ids[$i]]);
        }

        return $this->same_subscribing($ids[0]);

    }

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


}
