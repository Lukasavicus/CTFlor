<?php

namespace CTFlor\Http\Controllers;

use Illuminate\Http\Request;

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

    public function teste_marcos(){
    	return view('marcos');
    }
}
