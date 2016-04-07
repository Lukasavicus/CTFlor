<?php

namespace CTFlor\Http\Controllers;

use DB;
use Auth;
use Validator, Input, Redirect;
use Illuminate\Http\Request;
use CTFlor\Http\Controllers\Controller;
use CTFlor\Models\Activity;
use CTFlor\Models\Event;
use CTFlor\Models\Participant;
use CTFlor\Models\ActivityParticipant;
use CTFlor\Models\LectureParticipant;
use CTFlor\Models\TechnicalVisitParticipant;


class ActivityController extends Controller{

    public function activityIndex()
    {

    	  $activities = Activity::orderBy('name')->get();
        $events = Event::orderBy('name')->get();
        $types = Activity::getTypes();

        return view('crud.activity', compact('activities', 'events', 'types') );
    }


    public function store(Request $request){

        $atividade = Activity::find($request['id']);

        if($atividade != null)
            return $this->alterRegister($request, $atividade);
        else{
            $this->validate($request,[
                'name'              => 'required|unique:activities',
                'start'             => 'required',
                'startTime'         => 'required',
                'end'               => 'required',
                'endTime'           => 'required',
                'location'          => 'required',
                'qnt_participants'  => 'required',
                'type'              => 'required|rtype',
                'id_event'          => 'required|revent',
                'priceActivity'     => 'required',
            ]);

            $input = $request->all();

            Activity::create($input);
            return redirect()->back()->with('info', 'Successfully created event!');
        }


    }

    public function searchActivity(Request $request)
    {
        $this->validate($request,[
               'valueSearch'       => 'required',
               'radioSearch'       => 'required',
        ]);

        $events = Event::orderBy('name')->get();
        $types = Activity::getTypes();


        $param  = Input::get('radioSearch');
        $searchText = Input::get('valueSearch');


        if($param == "Name")            
            $results = Activity::where('name', 'LIKE' , $searchText . '%')->orderBy('name')->get();
        else if($param == "Location")   
            $results = Activity::where('location', 'LIKE' , $searchText . '%')->orderBy('location')->get();
        else                            
            $results = Activity::where('type', 'LIKE' , $searchText)->orderBy('type')->get();

        return view('crud.activity', compact('results', 'events', 'types'));

    }


    public function deleteRegister(Request $request){

        $id = Input::get('modalMSGValue');

        Activity::where('name', '=', $id)->delete();

        return redirect()->back()->with('info', 'Successfully deleted activity!');
    }

    private function alterRegister(Request $request, $atividade){

        $activities = Activity::orderBy('name')->get();

        foreach ($activities as $key){
            if($key['name'] == $request['name'] && $key['id'] != $request['id'])//&& $key['id'] != $atividade['id']
                return redirect()->back()->with('error', 'Failed to update event!');
        }

        //dd($request->all());

        $this->validate($request,[
            'name'              => 'required',
            'start'             => 'required',
            'startTime'         => 'required',
            'end'               => 'required',
            'endTime'           => 'required',
            'location'          => 'required',
            'qnt_participants'  => 'required',
            'type'              => 'required|rtype',
            'id_event'          => 'required|revent',
            'priceActivity'     => 'required',
        ]);

        $atividade->update($request->all());
        return redirect()->back()->with('info', 'Successfully updated event!');

    }


// ============================== Inscrição de Participantes =================================================

    public function insc(){

        $id_activity = '6';

        $activities = Activity::orderBy('name')->get();

        $partNotInsc = Participant::WhereNotIn('id',
            function($query) use ($id_activity)
            {
                $query->select('id_participant')->from('activitiesparticipants')
                      ->where('id_activity', '=', $id_activity);
            }
        )->orderBy('name')->get();


        $partInsc = Participant::WhereIn('id',
            function($query) use ($id_activity)
            {
              $query->select('id_participant')->from('activitiesparticipants')
                    ->where('id_activity', '=', $id_activity);
            }
        )->orderBy('name')->get();

        return view('participantsActivity', compact('activities', 'partInsc', 'partNotInsc'));
    }

    public function same_insc($id){

        $id_activity = $id;

        $activities = Activity::orderBy('name')->get();

        $partNotInsc = Participant::WhereNotIn('id',
            function($query) use ($id_activity)
            {
              $query->select('id_participant')->from('activitiesparticipants')
                    ->where('id_activity', '=', $id_activity);
            }
        )->orderBy('name')->get();


        $partInsc = Participant::WhereIn('id',
            function($query) use ($id_activity)
            {
              $query->select('id_participant')->from('activitiesparticipants')
                    ->where('id_activity', '=', $id_activity);
            }
        )->orderBy('name')->get();


        return view('participantsActivity', compact('activities', 'partNotInsc', 'partInsc') );
    }

    public function inscSave(Request $request){

        $ids = explode('&', $request['allData'], -1);

        ActivityParticipant::where('id_activity', '=', $ids[0])->delete();

        $i = 1;
        $tam = count($ids);
        for (; $i < $tam; $i++) {
            ActivityParticipant::create(['id_activity' => $ids[0], 'id_participant' => $ids[$i]]);
        }

        return $this->same_insc($ids[0]);
    }

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++



// ============================== Inscrição de Palestra ======================================================

    public function inscLecture(){

        $activities = Activity::where('type', '=', 'lecture')->orderBy('name')->get();

        $id_activity = '3';


        $speakerNotInsc = Participant::WhereNotIn('id',
            function($query) use ($id_activity){
              $query->select('id_participant')->from('lectureparticipants')
                    ->where('id_activity', '=', $id_activity)
                    ->where('role', '=', 'presenter');
            }
        )->orderBy('name')->get();


        $speakerInsc = Participant::WhereIn('id',
            function($query) use ($id_activity)
            {
              $query->select('id_participant')->from('lectureparticipants')
                    ->where('id_activity', '=', $id_activity)
                    ->where('role', '=', 'presenter');
            }
        )->orderBy('name')->get();


        $judgeNotInsc = Participant::WhereNotIn('id',
            function($query) use ($id_activity)
            {
              $query->select('id_participant')->from('lectureparticipants')
                    ->where('id_activity', '=', $id_activity)
                    ->where('role', '=', 'judge');
            }
        )->orderBy('name')->get();


        $judgeInsc = Participant::WhereIn('id',
            function($query) use ($id_activity)
            {
                $query->select('id_participant')->from('lectureparticipants')
                      ->where('id_activity', '=', $id_activity)
                      ->where('role', '=', 'judge');
            }
        )->orderBy('name')->get();

        return view('lectureActivity', compact('activities', 'speakerNotInsc', 'speakerInsc', 'judgeNotInsc', 'judgeInsc') );
    }

    public function same_inscLecture($id){

        $activities = Activity::where('type', '=', 'lecture')->orderBy('name')->get();

        $id_activity = $id;

        $speakerNotInsc = Participant::WhereNotIn('id',
            function($query) use ($id_activity)
            {
              $query->select('id_participant')->from('lectureparticipants')
                    ->where('id_activity', '=', $id_activity)
                    ->where('role', '=', 'presenter');
            }
        )->orderBy('name')->get();

        $speakerInsc = Participant::WhereIn('id',
            function($query) use ($id_activity)
            {
              $query->select('id_participant')->from('lectureparticipants')
                    ->where('id_activity', '=', $id_activity)
                    ->where('role', '=', 'presenter');
            }
        )->orderBy('name')->get();

        $judgeNotInsc = Participant::WhereNotIn('id',
            function($query) use ($id_activity)
            {
              $query->select('id_participant')->from('lectureparticipants')
                    ->where('id_activity', '=', $id_activity)
                    ->where('role', '=', 'judge');
            }
        )->orderBy('name')->get();

        $judgeInsc = Participant::WhereIn('id',
            function($query) use ($id_activity)
            {
              $query->select('id_participant')->from('lectureparticipants')
                    ->where('id_activity', '=', $id_activity)
                    ->where('role', '=', 'judge');
            }
        )->orderBy('name')->get();

        return view('lectureActivity', compact('activities', 'speakerNotInsc', 'speakerInsc', 'judgeNotInsc', 'judgeInsc') );
    }

    public function inscLectureSave(Request $request)
    {
        $ids = explode('&', $request['allData'], -1);

        LectureParticipant::where('id_activity', '=', $ids[0])->delete();

        $i = 1;
        $tam = count($ids);
        for (; $i < $tam; $i++) {
            LectureParticipant::create(['id_activity' => $ids[0], 'id_participant' => $ids[$i]]);
        }

        return $this->same_inscLecture($ids[0]);
    }

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++



// ============================= Inscrição de Mini-Curso =====================================================

    public function inscMiniCourse()
    {
        $activities = Activity::where('type', '=', 'mini_course')->orderBy('name')->get();

        $id_activity = '5';

        $presenterNotInsc = Participant::WhereNotIn('id',
            function($query) use ($id_activity)
            {
              $query->select('id_participant')->from('minicourseparticipants')
                    ->where('id_activity', '=', $id_activity);
            }
        )->orderBy('name')->get();

        $presenterInsc = Participant::WhereIn('id',
            function($query) use ($id_activity){
                $query->select('id_participant')->from('minicourseparticipants')
                      ->where('id_activity', '=', $id_activity);
            }
        )->orderBy('name')->get();

        return view('minicourseActivity',  compact('activities', 'presenterNotInsc', 'presenterInsc') );
    }

    public function same_inscMiniCourse($id)
    {
        $activities = Activity::where('type', '=', 'mini_course')->orderBy('name')->get();

        $id_activity = $id;

        $presenterNotInsc = Participant::WhereNotIn('id',
            function($query) use ($id_activity){
                $query->select('id_participant')->from('minicourseparticipants')
                      ->where('id_activity', '=', $id_activity);
            }
        )->orderBy('name')->get();

        $presenterInsc = Participant::WhereIn('id',
            function($query) use ($id_activity){
                $query->select('id_participant')->from('minicourseparticipants')
                      ->where('id_activity', '=', $id_activity);
            }
        )->orderBy('name')->get();

        return view('minicourseActivity', compact('activities', 'presenterNotInsc', 'presenterInsc') );
    }

    public function inscMiniCourseSave(Request $request)
    {
        $ids = explode('&', $request['allData'], -1);

        MiniCourseParticipant::where('id_activity', '=', $ids[0])->delete();

        $i = 1;
        $tam = count($ids);
        for (; $i < $tam; $i++) {
            MiniCourseParticipant::create(['id_activity' => $ids[0], 'id_participant' => $ids[$i]]);
        }

        return $this->same_inscMiniCourse($ids[0]);
    }

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++



// ============================ Inscrição de Visita Técnica ==================================================


    public function inscTechnicalVisit()
    {
        $activities = Activity::where('type', '=', 'technical_visit')->orderBy('name')->get();

        $id_activity = '3';

        $responsableNotInsc = Participant::WhereNotIn('id',
            function($query) use ($id_activity)
            {
              $query->select('id_participant')->from('technicalvisitparticipants')
                    ->where('id_activity', '=', $id_activity);
            }
        )->orderBy('name')->get();

        $responsableInsc = Participant::WhereIn('id',
            function($query) use ($id_activity){
                $query->select('id_participant')->from('technicalvisitparticipants')
                      ->where('id_activity', '=', $id_activity);
            }
        )->orderBy('name')->get();

        return view('technicalVisitActivity', compact('activities', 'responsableInsc', 'responsableNotInsc') );
    }

    public function same_inscTechnicalVisit($id)
    {
        $activities = Activity::where('type', '=', 'technical_visit')->orderBy('name')->get();

        $id_activity = $id;

        $responsableNotInsc = Participant::WhereNotIn('id',
            function($query) use ($id_activity)
            {
              $query->select('id_participant')->from('technicalvisitparticipants')
                    ->where('id_activity', '=', $id_activity);
            }
        )->orderBy('name')->get();

        $responsableInsc = Participant::WhereIn('id',
            function($query) use ($id_activity)
            {
                $query->select('id_participant')->from('technicalvisitparticipants')
                      ->where('id_activity', '=', $id_activity);
            }
        )->orderBy('name')->get();

        return view('technicalVisitActivity', compact('activities', 'responsableNotInsc', 'responsableNotInsc') );
    }

    public function inscTechnicalVisitLectureSave(Request $request)
    {
        $ids = explode('&', $request['allData'], -1);

        TechnicalVisitParticipant::where('id_activity', '=', $ids[0])->delete();

        $i = 1;
        $tam = count($ids);
        for (; $i < $tam; $i++) {
            TechnicalVisitParticipant::create(['id_activity' => $ids[0], 'id_participant' => $ids[$i]]);
        }

        return $this->same_inscTechnicalVisit($ids[0]);
    }

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


// ================================== Inscrição ATIVIDADES ===================================================


    public function subscribing()
    {
        $activities = Activity::orderBy('name')->get();


        $id_activity = '1';


        $partSubscribed = ActivityParticipant::join('participants', 'activitiesparticipants.id_participant', '=', 'participants.id')
        ->select('participants.name as pName', 'participants.cpf' , 'participants.type', 'activitiesparticipants.role_participant')
        ->where('activitiesparticipants.id_activity', '=', $id_activity)
        ->orderBy('pName')
        ->get();


        $partNotSubscribed = Participant::WhereNotIn('id',
            function($query) use ($id_activity){
              $query->select('id_participant')->from('activitiesparticipants')
                    ->where('id_activity', '=', $id_activity);
            }
        )->orderBy('name')
        ->get();

        $speakers = ActivityParticipant::join('participants', 'activitiesparticipants.id_participant', '=', 'participants.id')
        ->select('participants.name as pName', 'participants.cpf' , 'participants.type', 'activitiesparticipants.role_participant')
        ->where('activitiesparticipants.id_activity', '=', $id_activity)
        ->where('activitiesparticipants.role_participant', '=', 'speaker')
        ->orderBy('pName')
        ->get();

        $judges = ActivityParticipant::join('participants', 'activitiesparticipants.id_participant', '=', 'participants.id')
        ->select('participants.name as pName', 'participants.cpf' , 'participants.type', 'activitiesparticipants.role_participant')
        ->where('activitiesparticipants.id_activity', '=', $id_activity)
        ->where('activitiesparticipants.role_participant', '=', 'judge')
        ->orderBy('pName')
        ->get();

        $responsability = "Palestrantes";

        return view('lista.atividade', compact('activities', 'partSubscribed', 'partNotSubscribed', 'speakers', 'judges', 'responsability') );
    }

    public function subscribingSave(Request $request)
    {
        $ids = explode('&', $request['allData'], -1);

        TechnicalVisitParticipant::where('id_activity', '=', $ids[0])->delete();

        $i = 1;
        $tam = count($ids);
        for (; $i < $tam; $i++) {
            TechnicalVisitParticipant::create(['id_activity' => $ids[0], 'id_participant' => $ids[$i]]);
        }

        return $this->same_subscribing($ids[0]);
    }

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

}
