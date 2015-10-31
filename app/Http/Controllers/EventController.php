<?php

namespace CTFlor\Http\Controllers;

use Illuminate\Http\Request;
use CTFlor\Http\Requests;
use CTFlor\Http\Controllers\Controller;
use CTFlor\Event;
//use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Input;
use Validator, Input, Redirect; 


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $eventsCollection = Event::all();
        return view('event.index', compact('eventsCollection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('event.create')
                ->withErrors($validator);
        } else {
            // store
            $event = new Event;
            $event->name       = Input::get('name');
            $event->start      = Input::get('start');
            $event->location = Input::get('location');
            $event->save();

            // redirect
            Session::flash('message', 'Successfully created event!');
            return Redirect::to('event');
        }
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
