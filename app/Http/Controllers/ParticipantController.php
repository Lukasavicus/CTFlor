<?php

namespace CTFlor\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use CTFlor\Http\Requests;
use CTFlor\Http\Controllers\Controller;

class ParticipantController extends Controller{

    public function participantIndex(){
        $participants = DB::table('participants')->get();
        return view('participant', ['participants' => $participants])->with('participant', 'PARTICIPANTS');
    }
}
