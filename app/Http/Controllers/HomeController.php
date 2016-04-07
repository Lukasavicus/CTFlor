<?php 
namespace CTFlor\Http\Controllers;
use Auth;
use Hash;
use CTFlor\Models\Participant;
use Illuminate\Http\Request;
class HomeController extends Controller{
	
    public function index(){
		return view('home');
	}
	
    public function post(Request $request)
    {
        $this->validate($request, [
            'cpf' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only(['cpf', 'password']); 
        
        if(!Auth::attempt($request->only(['cpf', 'password']))){
            return redirect()->back()->with('error', 'Sua senha ou cpf não conferem');
        }
        
        return redirect()->route('controle.principal')->with('personal', 'Bem Vindo ' . Auth::user()['name'] . '.' . ' Você está logado no CTFlor! ')->with('pagePrincipal','pagePrincipal');
    }
    
    public function principal(){
    	return view('controle.principal');
    }
}