<?php

namespace CTFlor\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Input;
use CTFlor\Models\Activity;
use CTFlor\Models\Package;
use CTFlor\Http\Requests;
use CTFlor\Http\Controllers\Controller;

class PagesController extends Controller{
    public function about(){
    	$congress = "CTFlor";
    	$description = "Congresso de Tecnologia Florestal";

    	return view('pages.about', compact('congress', 'description'));

    }

    function packageIndex(){
		$activities = Activity::orderBy('name')->get();
		$packagesactivities = null;
		$packages = Package::orderBy('name')->get();

		return view('package', compact('activities', 'packagesactivities', 'packages'));
	}

	function store(Request $request){


		//dd($request->all());

		$this->validate($request,[
                'name'              => 'required|unique:packages',
            ]);

            //$input = $request->all();

            //Activity::create($input);

			DB::table('packages')->insert([
                    'name'              => Input::get('name'),
            ]);

            $package = Package::where('name', '=', Input::get('name'))->first();

            //dd($package['id']);

            foreach($request->all() as $key => $value){
				if(substr($key, 0, 2) == "cb"){
					//dd(substr($key, 3) . " " . $value);
					DB::table('packagesactivities')->insert(['id_package' => $package['id'], 'id_activity' => substr($key, 3)]);
				}
			}

            return redirect()->back()->with('info', 'Successfully created event!');
	}

	function packageSelectedIndex(Request $request){

		//dd($request->input('idP'));

		$id_package = $request->input('idP');

		$activities = Activity::orderBy('name')->get();

		$packagesactivities = Package::join('packagesActivities', 'packages.id', '=', 'packagesActivities.id_package')
		->select('packagesActivities.*', 'packages.*')
        ->where('packagesActivities.id_package', '=', $id_package)
        ->get();

		$packages = Package::orderBy('name')->get();

		return view('package', compact('activities', 'packagesactivities', 'packages'));
	}
}