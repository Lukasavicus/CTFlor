<?php

namespace CTFlor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use CTFlor\Http\Requests;
use CTFlor\Http\Controllers\Controller;
use CTFlor\Models\Participant;
use CTFlor\Models\Activity;
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


    public function getAlterPasswordView()
    {
        return view('operations.alterpassword');
    }

    public function changeUserPassword(Request $request)
    {
        $old_password_hashed = Participant::where( 'id' , '=', Auth::user()->getId() )->first(['password']);
        
        if (Hash::check( $request->oldpassword, $old_password_hashed->password ) ) 
        {
            if( strcasecmp($request->password, $request->password_confirmation) == 0)
            {
                DB::table('participants')->where( 'id', Auth::user()->getId() )->update( ['password' => Hash::make($request->password) ] );
                return redirect()->back()->with('info', 'Senha atualizada com sucesso!');
            }
            else
            {
                return redirect()->back()->with('error', 'Nova Senha e Confirmação de Senha não conferem');
            }
        }
        else
        {
            return redirect()->back()->with('error', 'Senha Antiga e Nova Senha não conferem');
        }
    }


    public function getActivitySubscriptionView( )
    {
        $lectures = Activity::where('type','=','lecture')->get();
        return view('operations.activity', compact('lectures'));
    }

    public function getMiniCourseView( )
    {
        $mini_courses = Activity::where('type','=','mini_course')->get();
        return view('operations.mini_course', compact('mini_courses'));
    }

    public function getTechnicalVisitView( )
    {
        $technical_courses = Activity::where('type','=','technical_visit')->get();
        return view('operations.technical_course', compact('technical_courses'));   
    }

}
