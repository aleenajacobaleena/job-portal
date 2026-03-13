<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

/* Employee Register */

public function employeeRegister()
{
return view('auth.employee-register');
}

public function employeeStore(Request $request)
{

User::create([
'name'=>$request->name,
'email'=>$request->email,
'password'=>Hash::make($request->password),
'role'=>'employee'
]);

return redirect('/employee/login');
}


/* Employee Login */

public function employeeLogin()
{
return view('auth.employee-login');
}

public function employeeLoginCheck(Request $request)
{

if(Auth::attempt([
'email'=>$request->email,
'password'=>$request->password,
'role'=>'employee'
]))
{
return redirect()->route('employee.dashboard');
}

return back()->with('error','Invalid Login');

}


/* Employer Register */

public function employerRegister()
{
return view('auth.employer-register');
}

public function employerStore(Request $request)
{

User::create([
'name'=>$request->name,
'email'=>$request->email,
'password'=>Hash::make($request->password),
'role'=>'employer'
]);

return redirect('/employer/login');

}


/* Employer Login */

public function employerLogin()
{
return view('auth.employer-login');
}

public function employerLoginCheck(Request $request)
{

if(Auth::attempt([
'email'=>$request->email,
'password'=>$request->password,
'role'=>'employer'
]))
{
return redirect()->route('employer.dashboard');
}

return back()->with('error','Invalid Login');

}


/* Admin Login */

public function adminLogin()
{
return view('auth.admin-login');
}

public function adminLoginCheck(Request $request)
{

if(Auth::attempt([
'email'=>$request->email,
'password'=>$request->password,
'role'=>'admin'
]))
{
return redirect()->route('admin.dashboard');
}

return back()->with('error','Invalid Admin Login');

}

}