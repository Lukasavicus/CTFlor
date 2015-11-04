<?php

namespace CTFlor\Http\Controllers;

use DB;
use Auth;
use Validator, Input, Redirect;
use Illuminate\Http\Request;
use CTFlor\Http\Controllers\Controller;
use CTFlor\Models\Activity;

class ActivityController extends Controller{
    
    public function activityIndex(){
    	$activities = DB::table('activities')->get();
    	return view('activity', ['activities' => $activities])->with('activity', 'ACTIVITIES');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'              => 'required|alpha',
            'start'             => 'required',
            'end'               => 'required',
            'location'          => 'required',
            'qnt_participants'  => 'required',
            'type'              => 'required',
        );

        DB::table('Activities')->insert([
            'name'              => Input::get('name'),
            'start'             => Input::get('start'),
            'end'               => Input::get('end'),
            'location'          => Input::get('location'),
            'qnt_participants'  => Input::get('qnt_participants'),
            'duration'          => Input::get('duration'),
            'type'              => Input::get('type'),
         ]);

        return redirect()->back()->with('info', 'Successfully created activity!');
    }

    public function deleteRegister(Request $request){

        //dd('all ¬ ok >' . '< |>' . Input::get('modalMSGValue') . '<| >>' . $request->input('modalMSGValue')  . '<<' );

        $id = Input::get('modalMSGValue');

        Activity::where('name', '=', $id)->delete();
        return redirect()->back()->with('info', 'Successfully deleted activity!');
    }

    public function insc(){
        $activities = DB::table('activities')->get();
        $participantsNotInsc = DB::table('participants')->get();
        $participantsInsc = DB::table('participants')->get();
        return view('participantsActivity', ['activities' => $activities, 'partNotInsc' => $participantsNotInsc, 'partInsc' => $participantsInsc])->with('activity', 'ACTIVITIES');
    }

    public function inscLecture(){
        $activities = DB::table('activities')->get();
        $speakerNotInsc = DB::table('participants')->get();
        $speakerInsc = DB::table('participants')->get();
        $judgeNotInsc = DB::table('participants')->get();
        $judgeInsc = DB::table('participants')->get();
        return view('lectureActivity', ['activities' => $activities, 'speakerNotInsc' => $speakerNotInsc, 'speakerInsc' => $speakerInsc, 'judgeNotInsc' => $judgeNotInsc, 'judgeInsc' => $judgeInsc]);
    }
}
