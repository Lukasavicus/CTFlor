<?php

namespace CTFlor\Http\Controllers;

use Illuminate\Http\Request;

use CTFlor\Http\Requests;
use CTFlor\Http\Controllers\Controller;
use CTFlor\Models\Event;
use CTFlor\Models\Participant;
use CTFlor\Models\BancaAvaliadora;
use Validator, Input, Redirect;


class BancaAvaliadoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bancaIndex()
    {
        //
        $events = Event::orderBy('name')->get();
        $professors = Participant::where('type', 'like' ,'professor')->orderBy('name')->get();
        $boards = BancaAvaliadora::orderBy('created_at')->get();
        $show_form = true;

        return view('crud.banca', compact('events', 'professors', 'boards', 'show_form'));
    }

    public function searchBoard(Request $request)
    {
        $this->validate($request,[
               'valueSearch'       => 'required',
               'radioSearch'       => 'required'
        ]);

        $param  = Input::get('radioSearch');
        $searchText = Input::get('valueSearch');



        if($param == "Professor")
            $results = BancaAvaliadora::join('participants', function($join)
                                            { $join->on('BancaAvaliadora.professor1', '=', 'participants.id', 'or');
                                              $join->where('BancaAvaliadora.professor2', '=', 'participants.id', 'or');
                                              $join->where('BancaAvaliadora.professor3', '=', 'participants.id');
                                            })
                                            ->where('participants.type', 'LIKE' ,'professor')
                                            ->where('participants.name', 'LIKE' , $searchText . '%')
                                            ->orderBy('participants.name')->get();
        //event_name
        else
            $results = BancaAvaliadora::join('events', function($join)
                                            { $join->on('BancaAvaliadora.id_event', '=', 'events.id')
                                                   ->where('events.name', 'LIKE' , $searchText . '%');
                                            })->orderBy('events.name')->get();

        $events = Event::orderBy('name')->get();
        $professors = Participant::where('type', 'like' ,'professor')->orderBy('name')->get();
        $boards = BancaAvaliadora::orderBy('created_at')->get();
        $show_form = false;

        return view('crud.banca', compact('results', 'events', 'professors', 'boards', 'show_form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'id_event'              => 'required',
            'professor1'            => 'required',
            'professor2'            => 'required',
            'professor3'            => 'required',
        ]);

        $input = $request->all();

        BancaAvaliadora::create($input);

        return redirect()->back()->with('info', 'Banca Examinadora foi criada com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
