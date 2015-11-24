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
        $events = Event::orderBy('name')->get();

        return view('crud.event', compact('events'));
    }


    public function store(Request $request){

        //dd($request);

        $evento = Event::find($request['id']);

        if($evento != null)
            return $this->alterRegister($request, $evento);
        else{
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
    }

    public function deleteRegister(Request $request){

        $id = Input::get('modalMSGValue');

        Event::where('name', '=', $id)->delete();
        return redirect()->back()->with('info', 'Successfully deleted participant!');

    }

    private function alterRegister(Request $request, $evento){

        $events = Event::orderBy('name')->get();

        foreach ($events as $key){
            if($key['name'] == $request['name'] && $key['id'] != $request['id'])//&& $key['id'] != $evento['id']
                return redirect()->back()->with('error', 'Failed to update event!');
        }

        //dd($request->all());

         $this->validate($request,[
                'name'              => 'required',
                'start'             => 'required',
                'end'               => 'required',
                'location'          => 'required',
        ]);

        $evento->update($request->all());
        return redirect()->back()->with('info', 'Successfully updated event!');

    }

    public function insc(){
        $events = Event::orderBy('name')->get();
        $activitiesNotInsc = Activity::orderBy('name')->get();
        $activitiesInsc = Activity::orderBy('name')->get();
        return view('activitiesevent', compact('events', 'activitiesInsc', 'activitiesNotInsc') );
    }

    public function searchEvent(Request $request)
    {
        $this->validate($request,[
               'valueSearch'       => 'required',
               'radioSearch'       => 'required',
        ]);

        $param  = Input::get('radioSearch');
        $searchText = Input::get('valueSearch');


        if($param == "Name")  $events = Event::where('name', 'LIKE' , $searchText . '%')->orderBy('name')->get();

        else                  $events = Event::where('location', 'LIKE' , $searchText . '%')->orderBy('location')->get();
        //dd($events);
        return view( 'crud.event',  compact('events'));
    }



}
