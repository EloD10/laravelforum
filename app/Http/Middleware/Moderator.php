<?php

namespace App\Http\Middleware;

use Closure;

class Moderator
{
    /**
     * If incoming user is admin or moderator
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
            if (auth()->user()->role !== 1 && auth()->user()->role !== 2)
            {
                flash('Vous n\'avez pas les permissions pour accèder à cette page !')->error();
                return redirect('/login');
            }
        
        return $next($request);
    }
}
