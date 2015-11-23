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


        return view('crud.banca', compact('events', 'professors', 'boards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        return redirect()->back()->with('info', 'Successfully created board of examiners!');

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
