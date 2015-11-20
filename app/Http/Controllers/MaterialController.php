<?php

namespace CTFlor\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use CTFlor\Http\Requests;
use CTFlor\Http\Controllers\Controller;
use CTFlor\Models\Material;
use CTFlor\Models\Participant;
use CTFlor\Models\Activity;
use Validator, Input, Redirect;


class MaterialController extends Controller{

    public function materialIndex(){
        $materials = DB::table('materials')->orderBy('title')->get();

        $partActivities = DB::table('activitiesparticipants')
        ->join('participants', 'activitiesparticipants.id_participant', '=', 'participants.id')
        ->join('activities', 'activitiesparticipants.id_activity', '=', 'activities.id')
        ->select('participants.name as pName', 'participants.*', 'activities.name as aName', 'activities.*', 'activitiesparticipants.*')
        ->orderBy('pName')
        ->get();

        //dd($partActivities);

        return view('crud.material', ['materials' => $materials, 'partActivities' => $partActivities]);
    }

    //$done = mkdir($path . "/outropath", 0777);

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validate($request,[
            'name'              => 'required|unique:materials',
            'start'             => 'required',
            'end'               => 'required',
            'location'          => 'required',
        ]);

        DB::table('materials')->insert([
            'name'              => Input::get('name'),
            'start'             => Input::get('start'),
            'end'               => Input::get('end'),
            'location'          => Input::get('location'),
         ]);


        return redirect()->back()->with('info', 'Successfully created material!');
    }

    public function deleteRegister(Request $request){

        $id = Input::get('modalMSGValue');

        material::where('name', '=', $id)->delete();
        return redirect()->back()->with('info', 'Successfully deleted participant!');
    }

    public function insc(){
        $materials = DB::table('materials')->orderBy('title')->get();
        $activitiesNotInsc = DB::table('activities')->orderBy('name')->get();
        $activitiesInsc = DB::table('activities')->orderBy('name')->get();
        return view('activitiesmaterial', ['materials' => $materials, 'activNotInsc' => $activitiesNotInsc, 'activInsc' => $activitiesInsc])->with('material', 'materialS');
    }

}
