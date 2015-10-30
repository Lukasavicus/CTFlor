<?php

namespace CTFlor\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use CTFlor\Http\Requests;
use CTFlor\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about()
    {
    	$congress = "CTFlor";
    	$description = "Congresso de Tecnologia Florestal";

    	return view('pages.about', compact('congress', 'description'));

    }

    public function activityIndex(){
    	$activities = DB::table('activities')->get();
    	return view('activity', ['activities' => $activities])->with('event', 'EVENTS');
    }

    public function participantIndex(){
        $participants = DB::table('participants')->get();
        return view('participant', ['participants' => $participants])->with('participant', 'PARTICIPANTS');
    }

    public function teste_marcos(){
    	return view('marcos');
    }
}
