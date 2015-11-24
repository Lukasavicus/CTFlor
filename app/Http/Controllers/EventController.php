<?php

namespace CTFlor\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use CTFlor\Http\Requests;
use CTFlor\Http\Controllers\Controller;
use CTFlor\Models\Event;
use Validator, Input, Redirect;


class EventController extends Controller{

    public function eventIndex()
    {
        $events = Event::orderBy('name')->get();

        return view('crud.event', compact('events'));
    }


    public function store(Request $request)
    {

        $this->validate($request,[
            'name'              => 'required|unique:events',
            'start'             => 'required',
            'end'               => 'required',
            'location'          => 'required',
        ]);

        $inputEvent = $request->all();

        Event::create($inputEvent);

        return redirect()->back()->with('info', 'Successfully created event!');
    }

    public function deleteRegister(Request $request)
    {

        $id = Input::get('modalMSGValue');

        Event::where('name', '=', $id)->delete();
        return redirect()->back()->with('info', 'Successfully deleted participant!');

    }

    public function insc()
    {
        $events = Event::orderBy('name')->get();
        $activitiesNotInsc = Activity::orderBy('name')->get();
        $activitiesInsc = Activity::orderBy('name')->get();
        return view('activitiesevent', compact('events', 'activitiesInsc', 'activitiesNotInsc') );
    }

    public function searchEvent(Request $request)
    {

    }



}
