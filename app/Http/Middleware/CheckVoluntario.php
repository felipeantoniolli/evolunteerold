<?php

namespace App\Http\Middleware;

use Closure;

class CheckVoluntario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if (!$user->tipo == '1' || $user->ativo == '1') {
            return redirect('index')->with('erro', 'Desculpe, você não possui acesso a essa página.');
        }

        return $next($request);
    }
}
