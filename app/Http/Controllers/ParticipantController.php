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

    public function deleteRegister(Request $request){

        dd('all ¬ ok >' . '< |>' . Input::get('modalMSGValue') . '<| >>' . $request->input('modalMSGValue')  . '<<' );

        $id = Input::get('modalMSGValue');

        Participant::where('name', '=', $id)->delete();
        return redirect()->back()->with('info', 'Successfully deleted participant!');
    }

}
