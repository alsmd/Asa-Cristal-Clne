<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificarItensCarrinho
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
        if(count(session()->get('carrinho')) == 0){
            return redirect()->route('carrinho.index');
        }
        return $next($request);
    }
}
