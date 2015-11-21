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
        $activities = Activity::orderBy('start', 'startTime')->get();
        $types = Activity::getTypes();
        return view('site.site_programacao', compact('activities', 'types') );
    }

    public function subscribePage()
    {
      return view('site.site_subscribe');
    }

    public function loginPage()
    {
      return view('site.site_login');
    }

}
