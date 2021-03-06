<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Carbon;

class ValidateHour
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
       $date = Carbon::now('America/Mexico_city');
       $dateBlock = Carbon::parse('2022-03-05 20:00:20', 'America/Mexico_city');
       if ($date->gte($dateBlock)) {
            return redirect()->route('coins.create');   
        //return abort(403); //o 404, etc.
       }
        return $next($request);
        // return abort(403); //o 404, etc.
    }
}
