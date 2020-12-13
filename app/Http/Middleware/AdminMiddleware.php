<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Administrador;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //Veriica se o usuario logado é um administrador 
        $admin = Administrador::where('fk_id_user',auth()->user()->id)->first();
        if($admin == null){
            return redirect('/');
        }
        return $next($request);
    }
}
