<?php

namespace CTFlor\Http\Controllers;

use DB;
use CTFlor\Http\Requests;
use CTFlor\Http\Controllers\Controller;
use CTFlor\Models\Material;
use CTFlor\Models\Participant;
use CTFlor\Models\Activity;
use CTFlor\Models\ActivityParticipant;
use Validator, Input, Redirect;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class MaterialController extends Controller
{


    public function materialIndex()
    {
        $user_type = Auth::user()->getRole()  ;//: "testetstetet";

        if( strcmp($user_type, "organization") == 0 ) 
            $materials = Material::orderBy('title')->get();
        else
            $materials = Material::where('id_participant', Auth::user()->getId() )->orderBy('title')->get();


        $activities = Activity::orderBy('name')->get();

        return view('crud.material', compact('materials', 'activities') );
    }

    public function searchMaterial(Request $request)
    {
        $this->validate($request,[
               'valueSearch'       => 'required',
               'radioSearch'       => 'required',
        ]);

        $param  = Input::get('radioSearch');
        $searchText = Input::get('valueSearch');

        $materials = Material::orderBy('title')->get();
        $activities = Activity::orderBy('name')->get();


        if($param == "Title")              
            $results = Material::where('title', 'LIKE' , $searchText . '%')->orderBy('title')->get();
        else if($param == "Category")     
            $results = Material::where('category', 'LIKE' , $searchText . '%')->orderBy('category')->get();
        else      
            $results = Participant::where('keyword', 'LIKE' , '%' .  $searchText . '%')->orderBy('keyword')->get();

        return view('crud.material', compact('results', 'materials', 'activities'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'id_activity'       => 'required',
            'id_participant'    => 'required',
            'title'             => 'required',
            'keywords'          => 'required',
            'abstract'          => 'required',
            'category'          => 'required',
        ]);

        $file = $request->file('fileField');
    	$extension = $file->getClientOriginalExtension();

        $id_max = Material::max('id') + 1;

        //New file's name. It is a concatenation of the Activity's id and the participant's id.
        $new_filename = $request->input('id_activity') . $id_max . $request->input('id_participant') . '.' . $extension;

        //Gets the name of the folder
        $folder = $request->input('id_participant');
        
        $fullpath = $folder.'/'.$new_filename;

        //We finally save it to the disk
        Storage::disk('local')->put($fullpath, File::get($file));


        $register = new Material();
        $register = $this->getRequest( $request, $fullpath );
        $register->save();

        return redirect()->back()->with('info', 'Material adicionado com sucesso!');
    }

    public function getMaterial(Request $request)
    {
  		
        $file = Storage::disk('local')->get( $request->input('filepath') );

  		return ( new Response($file, 200) )->header('Content-Type', 'application/pdf')
                                           ->header('Content-Disposition', 'attachment') ;

    }

    public function deleteRegister(Request $request)
    {
        $id = Input::get('modalMSGValue');

        material::where('name', '=', $id)->delete();
        return redirect()->back()->with('info', 'Material foi excluído com sucesso!');
    }

    public function insc()
    {
        $materials = Material::orderBy('title')->get();
        $activitiesNotInsc = Activity::orderBy('name')->get();
        $activitiesInsc = Activity::orderBy('name')->get();
        return view('activitiesmaterial', compact('materials', 'activNotInsc', 'activInsc') )
                ->with('material', 'materialS');
    }

    public function getRequest($request, $filepath)
    {
        $aux = new Material();

        $aux->id_activity = $request->input('id_activity');
        $aux->id_participant = $request->input('id_participant');
        $aux->title = $request->input('title');
        $aux->author = $request->input('author');
        $aux->keywords = $request->input('keywords');
        $aux->abstract = $request->input('abstract');
        $aux->category = $request->input('category');
        $aux->filepath = $filepath;
        
        return $aux;
    }

}
