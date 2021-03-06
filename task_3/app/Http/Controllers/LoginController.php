<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Seeker;

use App\Models\Admin;

class LoginController extends Controller
{
    public function login(){
        return view('pages.login');
    }
    public function loginCheck(Request $request){
        $this->validate(
            $request,
            [
                
                'username' => 'required',
                'password'=>'required'
            ],
            [
                'username.required'=> 'Enter your username',
                
            ]
        );

        $seekers = Seeker::all();
        $admins = Admin::all();
        $flag=False;
            foreach($admins as $user)
        {
            if($user->username== $request->username && $user->password==md5($request->password))
                {   
                    $flag=True;
                    $request=session()->put('admin',$user->username);
                    $request=session()->put('adminId',$user->adminId);
                    return redirect()->route('dashboardAdmin');
                }
                
        }
            foreach($seekers as $user)
        {
            if($user->username== $request->username && $user->password==md5($request->password))
                {
                    $flag=True;
                    $request=session()->put('seeker',$user->username);
                    $request=session()->put('seekerId',$user->id);
                    return redirect()->route('dashboardSeeker');
                }
                
        }

        
        if($flag==False)
        {
           $errormsg = "User Id Or Password Not Matched";
           return view('pages.login')->with('errormsg',$errormsg);
        }
    }
}