<?php

namespace CTFlor\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use CTFlor\Models\Participant;


use Closure;

class RoleMiddleware
{

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $participant;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Participant $user)
    {
        $this->user = $user;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        $user_type = Auth::user()->getRole()  ;//: "testetstetet";

        $info = "Você não tem credencial para acessar essa área";

        if(Auth::check() &&  (strcmp($user_type, "organization") == 0) )
            return $next($request);
        else
            return redirect('site.subscribe')->with('info', $info ) ;

    }
    
}
