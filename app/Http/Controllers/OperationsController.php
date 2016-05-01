<?php

namespace CTFlor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use CTFlor\Http\Requests;
use CTFlor\Http\Controllers\Controller;
use CTFlor\Models\Participant;
use CTFlor\Models\ActivityParticipant;
use CTFlor\Models\TechnicalVisitParticipant;
use Validator;
use DB;
use Input;
use Hash;


class OperationsController extends Controller
{

    public function getAlterUserInfoView()
    {
        $id = Auth::user()->getId();
        $participant = Participant::where('id' , '=' , $id)->first(['name', 'email','cpf','phone', 'address', 'university',
                                                                    'department', 'course']);
        
        return view('operations.alteruserinfo', compact('participant') );
    }    

    public function changeUserInfo(Request $request)
    {   
        unset($request['_token']);
        DB::table('participants')->where( 'id', Auth::user()->getId() )->update($request->all());
        return redirect()->back()->with('info', 'Participante atualizado com sucesso!');
    }


}
