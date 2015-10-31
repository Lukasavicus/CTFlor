<?php

namespace CTFlor\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Input, Redirect; 

use DB;
use CTFlor\Http\Requests;
use CTFlor\Http\Controllers\Controller;
use CTFLor\Models\Activity;

class ActivityController extends Controller{
    
    public function activityIndex(){
    	$activities = DB::table('activities')->get();
    	return view('activity', ['activities' => $activities])->with('event', 'EVENTS');
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

        //$validator = Validator::make(Input::all(), $rules);

        //if ($validator->fails()) {
        //    dd('¬ ok '. $validator);//echo 'not ok';
        //    return redirect()->back()->with('error', $validator);
        //}
        //else{

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
        //}
    
    }
}
