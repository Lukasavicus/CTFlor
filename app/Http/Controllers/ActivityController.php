<?php

namespace CTFlor\Http\Controllers;

use DB;
use Auth;
use Validator, Input, Redirect;
use Illuminate\Http\Request;
use CTFlor\Http\Controllers\Controller;
use CTFlor\Models\Activity;
use CTFlor\Models\Participant;

class ActivityController extends Controller{
    
    public function activityIndex(){
    	$activities = DB::table('activities')->orderBy('name')->get();
        $events = DB::table('events')->orderBy('name')->get();
        $types = Activity::getTypes();
    	return view('crud.activity', ['activities' => $activities, 'events' => $events, 'types' => $types]);
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
            'name'              => 'required|unique:activities',
            'start'             => 'required',
            'startTime'         => 'required',
            'end'               => 'required',
            'endTime'           => 'required',
            'location'          => 'required',
            'qnt_participants'  => 'required',
            'type'              => 'required',
            'id_event'          => 'required',
        ]);

        DB::table('Activities')->insert([
            'name'              => Input::get('name'),
            'start'             => Input::get('start'),
            'startTime'         => Input::get('startTime'),
            'end'               => Input::get('end'),
            'endTime'           => Input::get('endTime'),
            'location'          => Input::get('location'),
            'qnt_participants'  => Input::get('qnt_participants'),
            'type'              => Input::get('type'),
            'id_event'          => Input::get('id_event'),
         ]);

        return redirect()->back()->with('info', 'Successfully created activity!');
    }

    public function deleteRegister(Request $request){

        $id = Input::get('modalMSGValue');

        Activity::where('name', '=', $id)->delete();
        return redirect()->back()->with('info', 'Successfully deleted activity!');
    }



// ============================== Inscrição de Participantes =================================================

    public function insc(){

        $id_activity = '6';

        $activities = DB::table('activities')->orderBy('name')->get();

        // SELECT name from participants where id != (select id_participant from activitiesparticipants where id_activity = 5); or
        // SELECT name from participants where id NOT IN (select id_participant from activitiesparticipants where id_activity = 5); 
        $participantsNotInsc = Participant::WhereNotIn('id', function($query) use ($id_activity){
            $query->select('id_participant')->from('activitiesparticipants')->where('id_activity', '=', $id_activity);
        })->orderBy('name')->get();


        // SELECT name from participants where id = (select id_participant from activitiesparticipants where id_activity = 5); or
        // SELECT name from participants where id IN (select id_participant from activitiesparticipants where id_activity = 5); 
        $participantsInsc = Participant::WhereIn('id', function($query) use ($id_activity){
            $query->select('id_participant')->from('activitiesparticipants')->where('id_activity', '=', $id_activity);
        })->orderBy('name')->get();


        return view('participantsActivity', ['activities' => $activities, 'partNotInsc' => $participantsNotInsc, 'partInsc' => $participantsInsc]);
    }

    public function same_insc($id){

        $id_activity = $id;

        $activities = DB::table('activities')->orderBy('name')->get();

        // SELECT name from participants where id != (select id_participant from activitiesparticipants where id_activity = 5); or
        // SELECT name from participants where id NOT IN (select id_participant from activitiesparticipants where id_activity = 5); 
        $participantsNotInsc = Participant::WhereNotIn('id', function($query) use ($id_activity){
            $query->select('id_participant')->from('activitiesparticipants')->where('id_activity', '=', $id_activity);
        })->orderBy('name')->get();


        // SELECT name from participants where id = (select id_participant from activitiesparticipants where id_activity = 5); or
        // SELECT name from participants where id IN (select id_participant from activitiesparticipants where id_activity = 5); 
        $participantsInsc = Participant::WhereIn('id', function($query) use ($id_activity){
            $query->select('id_participant')->from('activitiesparticipants')->where('id_activity', '=', $id_activity);
        })->orderBy('name')->get();


        return view('participantsActivity', ['activities' => $activities, 'partNotInsc' => $participantsNotInsc, 'partInsc' => $participantsInsc]);
    }

    public function inscSave(Request $request){

        $ids = explode('&', $request['allData'], -1);
        
        DB::table('activitiesparticipants')->where('id_activity', '=', $ids[0])->delete();

        $i = 1;
        $tam = count($ids);
        for (; $i < $tam; $i++) {
            DB::table('activitiesparticipants')->insert(['id_activity' => $ids[0], 'id_participant' => $ids[$i]]);
        }
        
        return $this->same_insc($ids[0]);

    }

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++



// ============================== Inscrição de Palestra ======================================================

    public function inscLecture(){
        $activities = DB::table('activities')->where('type', '=', 'lecture')->orderBy('name')->get();

        $id_activity = '3';

        // SELECT name from participants where id NOT IN (select id_participant from lectureparticipants where id_activity = 3 and role = 'presenter');
        $speakerNotInsc = Participant::WhereNotIn('id', function($query) use ($id_activity){
            $query->select('id_participant')->from('lectureparticipants')->where('id_activity', '=', $id_activity)->where('role', '=', 'presenter');
        })->orderBy('name')->get();

        // SELECT name from participants where id IN (select id_participant from lectureparticipants where id_activity = 3 and role = 'presenter');
        $speakerInsc = Participant::WhereIn('id', function($query) use ($id_activity){
            $query->select('id_participant')->from('lectureparticipants')->where('id_activity', '=', $id_activity)->where('role', '=', 'presenter');
        })->orderBy('name')->get();

        // SELECT name from participants where id NOT IN (select id_participant from lectureparticipants where id_activity = 3 and role = 'judge');
        $judgeNotInsc = Participant::WhereNotIn('id', function($query) use ($id_activity){
            $query->select('id_participant')->from('lectureparticipants')->where('id_activity', '=', $id_activity)->where('role', '=', 'judge');
        })->orderBy('name')->get();      

        // SELECT name from participants where id NOT IN (select id_participant from lectureparticipants where id_activity = 3 and role = 'judge');
        $judgeInsc = Participant::WhereIn('id', function($query) use ($id_activity){
            $query->select('id_participant')->from('lectureparticipants')->where('id_activity', '=', $id_activity)->where('role', '=', 'judge');
        })->orderBy('name')->get();

        return view('lectureActivity', ['activities' => $activities, 'speakerNotInsc' => $speakerNotInsc, 'speakerInsc' => $speakerInsc, 'judgeNotInsc' => $judgeNotInsc, 'judgeInsc' => $judgeInsc]);
    }

    public function same_inscLecture($id){
        $activities = DB::table('activities')->where('type', '=', 'lecture')->orderBy('name')->get();

        $id_activity = $id;

        // SELECT name from participants where id NOT IN (select id_participant from lectureparticipants where id_activity = 3 and role = 'presenter');
        $speakerNotInsc = Participant::WhereNotIn('id', function($query) use ($id_activity){
            $query->select('id_participant')->from('lectureparticipants')->where('id_activity', '=', $id_activity)->where('role', '=', 'presenter');
        })->orderBy('name')->get();

        // SELECT name from participants where id IN (select id_participant from lectureparticipants where id_activity = 3 and role = 'presenter');
        $speakerInsc = Participant::WhereIn('id', function($query) use ($id_activity){
            $query->select('id_participant')->from('lectureparticipants')->where('id_activity', '=', $id_activity)->where('role', '=', 'presenter');
        })->orderBy('name')->get();

        // SELECT name from participants where id NOT IN (select id_participant from lectureparticipants where id_activity = 3 and role = 'judge');
        $judgeNotInsc = Participant::WhereNotIn('id', function($query) use ($id_activity){
            $query->select('id_participant')->from('lectureparticipants')->where('id_activity', '=', $id_activity)->where('role', '=', 'judge');
        })->orderBy('name')->get();      

        // SELECT name from participants where id NOT IN (select id_participant from lectureparticipants where id_activity = 3 and role = 'judge');
        $judgeInsc = Participant::WhereIn('id', function($query) use ($id_activity){
            $query->select('id_participant')->from('lectureparticipants')->where('id_activity', '=', $id_activity)->where('role', '=', 'judge');
        })->orderBy('name')->get();

        return view('lectureActivity', ['activities' => $activities, 'speakerNotInsc' => $speakerNotInsc, 'speakerInsc' => $speakerInsc, 'judgeNotInsc' => $judgeNotInsc, 'judgeInsc' => $judgeInsc]);
    }

    public function inscLectureSave(Request $request){

        $ids = explode('&', $request['allData'], -1);
        
        DB::table('lecturesparticipants')->where('id_activity', '=', $ids[0])->delete();

        $i = 1;
        $tam = count($ids);
        for (; $i < $tam; $i++) {
            DB::table('lecturesparticipants')->insert(['id_activity' => $ids[0], 'id_participant' => $ids[$i]]);
        }
        
        return $this->same_inscLecture($ids[0]);

    }

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++



// ============================= Inscrição de Mini-Curso =====================================================

    public function inscMiniCourse(){
       $activities = DB::table('activities')->where('type', '=', 'mini_course')->orderBy('name')->get();

        $id_activity = '5';

        // SELECT name from participants where id NOT IN (select id_participant from minicourseparticipants where id_activity = 3 and role = 'presenter');
        $presenterNotInsc = Participant::WhereNotIn('id', function($query) use ($id_activity){
            $query->select('id_participant')->from('minicourseparticipants')->where('id_activity', '=', $id_activity);
        })->orderBy('name')->get();

        // SELECT name from participants where id IN (select id_participant from minicourseparticipants where id_activity = 3 and role = 'presenter');
        $presenterInsc = Participant::WhereIn('id', function($query) use ($id_activity){
            $query->select('id_participant')->from('minicourseparticipants')->where('id_activity', '=', $id_activity);
        })->orderBy('name')->get();

        return view('minicourseActivity', ['activities' => $activities, 'presenterNotInsc' => $presenterNotInsc, 'presenterInsc' => $presenterInsc]);
    }

    public function same_inscMiniCourse($id){
       $activities = DB::table('activities')->where('type', '=', 'mini_course')->orderBy('name')->get();

        $id_activity = $id;

        // SELECT name from participants where id NOT IN (select id_participant from minicourseparticipants where id_activity = 3 and role = 'presenter');
        $presenterNotInsc = Participant::WhereNotIn('id', function($query) use ($id_activity){
            $query->select('id_participant')->from('minicourseparticipants')->where('id_activity', '=', $id_activity);
        })->orderBy('name')->get();

        // SELECT name from participants where id IN (select id_participant from minicourseparticipants where id_activity = 3 and role = 'presenter');
        $presenterInsc = Participant::WhereIn('id', function($query) use ($id_activity){
            $query->select('id_participant')->from('minicourseparticipants')->where('id_activity', '=', $id_activity);
        })->orderBy('name')->get();

        return view('minicourseActivity', ['activities' => $activities, 'presenterNotInsc' => $presenterNotInsc, 'presenterInsc' => $presenterInsc]);
    }

    public function inscMiniCourseSave(Request $request){

        $ids = explode('&', $request['allData'], -1);
        
        DB::table('minicourseparticipants')->where('id_activity', '=', $ids[0])->delete();

        $i = 1;
        $tam = count($ids);
        for (; $i < $tam; $i++) {
            DB::table('minicourseparticipants')->insert(['id_activity' => $ids[0], 'id_participant' => $ids[$i]]);
        }
        
        return $this->same_inscMiniCourse($ids[0]);

    }

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++



// ============================ Inscrição de Visita Técnica ==================================================


    public function inscTechnicalVisit(){
        $activities = DB::table('activities')->where('type', '=', 'technical_visit')->orderBy('name')->get();

        $id_activity = '3';

        // SELECT name from participants where id NOT IN (select id_participant from technicalvisitparticipants where id_activity = 3 and role = 'presenter');
        $responsableNotInsc = Participant::WhereNotIn('id', function($query) use ($id_activity){
            $query->select('id_participant')->from('technicalvisitparticipants')->where('id_activity', '=', $id_activity);
        })->orderBy('name')->get();

        // SELECT name from participants where id IN (select id_participant from technicalvisitparticipants where id_activity = 3 and role = 'presenter');
        $responsableInsc = Participant::WhereIn('id', function($query) use ($id_activity){
            $query->select('id_participant')->from('technicalvisitparticipants')->where('id_activity', '=', $id_activity);
        })->orderBy('name')->get();

        return view('technicalVisitActivity', ['activities' => $activities, 'responsableNotInsc' => $responsableNotInsc, 'responsableInsc' => $responsableInsc]);
    }

    public function same_inscTechnicalVisit($id){
        $activities = DB::table('activities')->where('type', '=', 'technical_visit')->orderBy('name')->get();

        $id_activity = $id;

        // SELECT name from participants where id NOT IN (select id_participant from technicalvisitparticipants where id_activity = 3 and role = 'presenter');
        $responsableNotInsc = Participant::WhereNotIn('id', function($query) use ($id_activity){
            $query->select('id_participant')->from('technicalvisitparticipants')->where('id_activity', '=', $id_activity);
        })->orderBy('name')->get();

        // SELECT name from participants where id IN (select id_participant from technicalvisitparticipants where id_activity = 3 and role = 'presenter');
        $responsableInsc = Participant::WhereIn('id', function($query) use ($id_activity){
            $query->select('id_participant')->from('technicalvisitparticipants')->where('id_activity', '=', $id_activity);
        })->orderBy('name')->get();

        return view('technicalVisitActivity', ['activities' => $activities, 'responsableNotInsc' => $responsableNotInsc, 'responsableInsc' => $responsableInsc]);
    }

    public function inscTechnicalVisitLectureSave(Request $request){

        $ids = explode('&', $request['allData'], -1);
        
        DB::table('technicalvisitparticipants')->where('id_activity', '=', $ids[0])->delete();

        $i = 1;
        $tam = count($ids);
        for (; $i < $tam; $i++) {
            DB::table('technicalvisitparticipants')->insert(['id_activity' => $ids[0], 'id_participant' => $ids[$i]]);
        }
        
        return $this->same_inscTechnicalVisit($ids[0]);

    }

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


// ================================== Inscrição ATIVIDADES ===================================================


    public function subscribing(){
        $activities = DB::table('activities')->orderBy('name')->get(); //->where('type', '=', 'technical_visit')

        //dd($activities);

        $id_activity = '1';

        /*  SELECT p.name, p.cpf, p.type, ap.role_participant
            from participants as p, activitiesparticipants as ap
            where p.id = ap.id_participant and ap.id_activity = 1;
        */
        $partSubscribed = DB::table('activitiesparticipants')
        ->join('participants', 'activitiesparticipants.id_participant', '=', 'participants.id')
        ->select('participants.name as pName', 'participants.cpf' , 'participants.type', 'activitiesparticipants.role_participant')
        ->where('activitiesparticipants.id_activity', '=', $id_activity)
        ->orderBy('pName')
        ->get();


        $partNotSubscribed = Participant::WhereNotIn('id', function($query) use ($id_activity){
            $query->select('id_participant')->from('activitiesparticipants')->where('id_activity', '=', $id_activity);
        })
        ->orderBy('name')
        ->get();

        //dd($partNotSubscribed);

        $speakers = DB::table('activitiesparticipants')
        ->join('participants', 'activitiesparticipants.id_participant', '=', 'participants.id')
        ->select('participants.name as pName', 'participants.cpf' , 'participants.type', 'activitiesparticipants.role_participant')
        ->where('activitiesparticipants.id_activity', '=', $id_activity)
        ->where('activitiesparticipants.role_participant', '=', 'speaker')
        ->orderBy('pName')
        ->get();

        $judges = DB::table('activitiesparticipants')
        ->join('participants', 'activitiesparticipants.id_participant', '=', 'participants.id')
        ->select('participants.name as pName', 'participants.cpf' , 'participants.type', 'activitiesparticipants.role_participant')
        ->where('activitiesparticipants.id_activity', '=', $id_activity)
        ->where('activitiesparticipants.role_participant', '=', 'judge')
        ->orderBy('pName')
        ->get();

        $responsability = "Palestrantes";
        //$responsability = "Apresentadores";
        //$responsability = "Responsáveis";

        return view('lista.atividade', ['activities' => $activities, 'partSubscribed' => $partSubscribed, 'partNotSubscribed' => $partNotSubscribed, 'speakers' => $speakers, 'judges' => $judges, 'responsability' => $responsability]);
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
