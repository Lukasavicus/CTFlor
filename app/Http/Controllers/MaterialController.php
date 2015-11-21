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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class MaterialController extends Controller
{

    public function materialIndex()
    {
        $materials = Material::orderBy('title')->get();

        $partActivities = ActivityParticipant::join('participants', 'activitiesparticipants.id_participant', '=', 'participants.id')
        ->join('activities', 'activitiesparticipants.id_activity', '=', 'activities.id')
        ->select('participants.name as pName', 'participants.*', 'activities.name as aName', 'activities.*', 'activitiesparticipants.*')
        ->orderBy('pName')
        ->get();

        return view('crud.material', compact('materials', 'partActivities') );
    }


    public function store(Request $request)
    {

        $this->validate($request,[
            'id_activity'       => 'required|unique:materials',
            'id_participant'    => 'required',
            'title'             => 'required',
            'keywords'          => 'required',
            'abstract'          => 'required',
            'category'          => 'required',
        ]);

        Storage::disk('local')->makeDirectory($request->input('participant'));

        $file = $request->file('fileField');
    		$extension = $file->getClientOriginalExtension();

        Storage::disk('local')->put(
                                  $request->input('id_participant').'/'.$file->getClientOriginalName().'.'.$extension,
                                  File::get($file)
                                );

        $entry = new Material();
    		$entry->mime = $file->getClientMimeType();
    		$entry->original_filename = $file->getClientOriginalName();
    		$entry->filename = $file->getFilename().'.'.$extension;

    		$entry->save();

        Material::create
                ([
                  'id_activity'       => $request->input('id_activity'),
                  'id_participant'    => $request->input('id_participant'),
                  'title'             => $request->input('title'),
                  'keywords'          => $request->input('keywords'),
                  'abstract'          => $request->input('abstract'),
                  'category'          => $request->input('category'),
                  'filename'          => $entry->filename,
                  'mime'              => $entry->mime,
                  'original_filename' => $entry->original_filename,
                ]);


        return redirect()->back()->with('info', 'Successfully created material!');
    }

    public function get($filename)
    {

  		$entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
  		$file  = Storage::disk('local')->get($entry->filename);

  		return (new Response($file, 200))->header('Content-Type', $entry->mime);
	  }

    public function deleteRegister(Request $request)
    {
        $id = Input::get('modalMSGValue');

        material::where('name', '=', $id)->delete();
        return redirect()->back()->with('info', 'Successfully deleted participant!');
    }

    public function insc()
    {
        $materials = Material::orderBy('title')->get();
        $activitiesNotInsc = Activity::orderBy('name')->get();
        $activitiesInsc = Activity::orderBy('name')->get();
        return view('activitiesmaterial', compact('materials', 'activNotInsc', 'activInsc') )->with('material', 'materialS');
    }

}
