<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployeeAuth
{

    public function handle(Request $request, Closure $next)
    {
        if(!Session::has('employee_id'))
        {
            return redirect('/employee/login');
        }

        return $next($request);
    }

}