<?php 

namespace CTFlor\Http\Controllers;

use DB;
use Auth;
use Hash;
use Illuminate\Http\Request;
use CTFlor\Models\Activity;

class SiteController extends Controller{

    public function indexPage(){
        return view('site.site_home');
    }

    public function localPage(){
        return view('site.site_local');
    }

    public function programacaoPage(){
        $activities = DB::table('activities')->orderBy('start', 'startTime')->get();
        $types = Activity::getTypes();
        return view('site.site_programacao', ['activities' => $activities, 'types' => $types]);
    }

}