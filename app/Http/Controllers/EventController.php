<?php

namespace CTFlor\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use CTFlor\Http\Requests;
use CTFlor\Http\Controllers\Controller;
use CTFlor\Models\Event;
use Validator, Input, Redirect; 


class EventController extends Controller{

    public function eventIndex(){
        $events = DB::table('events')->orderBy('name')->get();
        return view('crud.event', ['events' => $events])->with('event', 'EVENTS');
        //return view('event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validate($request,[
            'name'              => 'required|unique:events',
            'start'             => 'required',
            'end'               => 'required',
            'location'          => 'required',
        ]);

        DB::table('Events')->insert([
            'name'              => Input::get('name'),
            'start'             => Input::get('start'),
            'end'               => Input::get('end'),
            'location'          => Input::get('location'),
         ]);


        return redirect()->back()->with('info', 'Successfully created event!');
    }

    public function deleteRegister(Request $request){

        $id = Input::get('modalMSGValue');

        Event::where('name', '=', $id)->delete();
        return redirect()->back()->with('info', 'Successfully deleted participant!');
    }

    public function insc(){
        $events = DB::table('events')->orderBy('name')->get();
        $activitiesNotInsc = DB::table('activities')->orderBy('name')->get();
        $activitiesInsc = DB::table('activities')->orderBy('name')->get();
        return view('activitiesevent', ['events' => $events, 'activNotInsc' => $activitiesNotInsc, 'activInsc' => $activitiesInsc])->with('event', 'EVENTS');
    }

}
