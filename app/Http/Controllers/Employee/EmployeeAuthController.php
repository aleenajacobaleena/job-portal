<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class EmployeeAuthController extends Controller
{

    public function showRegister()
    {
        return view('employee.register');
    }

public function register(Request $request)
{
    $validator = \Validator::make($request->all(),[
        'name' => 'required',
        'email' => 'required|email|unique:employees,email',
        'password' => 'required|min:6'
    ]);

    if($validator->fails()){
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);
    }

    \App\Models\Employee::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>\Hash::make($request->password)
    ]);

    return response()->json([
        'status'=>true,
        'message'=>'Registration successful'
    ]);
}

    public function showLogin()
    {
        return view('employee.login');
    }

  public function login(Request $request)
{

$employee = \App\Models\Employee::where('email',$request->email)->first();

if(!$employee){

return response()->json([
'status'=>false,
'message'=>'Email not registered'
]);

}

if(!\Hash::check($request->password,$employee->password)){

return response()->json([
'status'=>false,
'message'=>'Incorrect password'
]);

}

session([
'employee_id'=>$employee->id,
'employee_email'=>$employee->email
]);

return response()->json([
'status'=>true,
'redirect'=>'/employee/dashboard'
]);

}
    public function dashboard()
{
    if(!session()->has('employee_id')){
        return redirect('/employee/login');
    }

    return view('employee.dashboard');
}

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
    public function profile()
{
    $employee = \App\Models\Employee::find(session('employee_id'));

    return view('employee.profile',compact('employee'));
}
public function updateProfile(Request $request)
{
    $employee = \App\Models\Employee::find(session('employee_id'));

    // Image upload
    if($request->hasFile('image')){
        $image = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'),$image);
        $employee->image = $image;
    }

    // Resume upload
    if($request->hasFile('resume')){
        $resume = time().'_'.$request->resume->getClientOriginalName();
        $request->resume->move(public_path('uploads'),$resume);
        $employee->resume = $resume;
    }

    $employee->phone = $request->phone;
    $employee->skills = $request->skills;
    $employee->experience = $request->experience;

    $employee->save();

    return redirect()->back()->with('success','Profile Updated');
}

}