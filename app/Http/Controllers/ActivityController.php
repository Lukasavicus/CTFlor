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
    	$activities = DB::table('activities')->get();
        $events = DB::table('events')->get();
        $types = Activity::getTypes();
    	return view('activity', ['activities' => $activities, 'events' => $events, 'types' => $types])->with('activity', 'ACTIVITIES');
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

    public function insc(){
        global $id_activity;
        $id_activity = '5';
        $activities = DB::table('activities')->get();

        // SELECT name from participants where id != (select id_participant from activitiesparticipants where id_activity = 5); or
        // SELECT name from participants where id NOT IN (select id_participant from activitiesparticipants where id_activity = 5); 

        
        $participantsNotInsc = Participant::WhereNotIn('id', function($id_activity, $query){
            $query->select('id_participant')->from('activitiesparticipants')->where('id_activity', '=', '5');
        })->get();


        // SELECT name from participants where id = (select id_participant from activitiesparticipants where id_activity = 5); or
        // SELECT name from participants where id IN (select id_participant from activitiesparticipants where id_activity = 5); 
        $participantsInsc = Participant::WhereIn('id', function($query){
            $query->select('id_participant')->from('activitiesparticipants')->where('id_activity', '=', '5');
        })->get();


        return view('participantsActivity', ['activities' => $activities, 'partNotInsc' => $participantsNotInsc, 'partInsc' => $participantsInsc])->with('activity', 'ACTIVITIES');
    }

    public function inscLecture(){
        $activities = DB::table('activities')->where('type', '=', 'lecture')->get();
        $speakerNotInsc = DB::table('participants')->get();
        $speakerInsc = DB::table('participants')->get();
        $judgeNotInsc = DB::table('participants')->get();
        $judgeInsc = DB::table('participants')->get();
        return view('lectureActivity', ['activities' => $activities, 'speakerNotInsc' => $speakerNotInsc, 'speakerInsc' => $speakerInsc, 'judgeNotInsc' => $judgeNotInsc, 'judgeInsc' => $judgeInsc]);
    }

    public function inscMiniCourse(){
        $activities = DB::table('activities')->where('type', '=', 'mini_course')->get();
        $speakerNotInsc = DB::table('participants')->get();
        $speakerInsc = DB::table('participants')->get();
        $judgeNotInsc = DB::table('participants')->get();
        $judgeInsc = DB::table('participants')->get();
        return view('minicourseActivity', ['activities' => $activities, 'speakerNotInsc' => $speakerNotInsc, 'speakerInsc' => $speakerInsc, 'judgeNotInsc' => $judgeNotInsc, 'judgeInsc' => $judgeInsc]);
    }

    public function inscTechnicalVisit(){
        $activities = DB::table('activities')->where('type', '=', 'technical_visit')->get();
        $speakerNotInsc = DB::table('participants')->get();
        $speakerInsc = DB::table('participants')->get();
        $judgeNotInsc = DB::table('participants')->get();
        $judgeInsc = DB::table('participants')->get();
        return view('technicalVisitActivity', ['activities' => $activities, 'speakerNotInsc' => $speakerNotInsc, 'speakerInsc' => $speakerInsc, 'judgeNotInsc' => $judgeNotInsc, 'judgeInsc' => $judgeInsc]);
    }
}
