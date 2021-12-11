<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Cookie;
use App\Models\DefaultModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class LoginController extends Controller
{
    //
    public function index()
    {
        return view('vw_login');
    }
    public function loginAction(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4|max:8',
        ]);
   
        $check=DB::table('users')
        ->where('email_id',$request['email'])
        ->select('uid','name','email_id','mobile_no','password','role')
        ->first();
        $set_session=array();
        // dd($check->name);
        if(!empty($check)){
            if(Hash::check($request['password'], $check->password)){
                // dd('if');
                $set_session=array(
                    'UID'=>$check->uid,
                    'UNAME'=>$check->name,
                    'EMAILID'=>$check->email_id,                    
                    'MobileNo'=>$check->mobile_no,                    
                    'ROLE'=>$check->role,                    
                );
                session($set_session);
                $minutes=10;
                \Cookie::queue('cook_uname', $check->name, $minutes);
                return redirect("dashboard")->with('success','Login successful');
            }else{
                return redirect("/")->with('error','Login password invalid');
            }
        }else{
            return redirect("/")->with('error','Login details are not valid');
        }
    }
    public function registerIndex()
    {
        return view('vw_register');
    }

    public function registrationAction(Request $request)
    {  
        // dd($request->all());
        $obj = new DefaultModel();
        $request->validate([
            'name' => 'required',
            // 'email' => 'required|email|unique:users',
            'email' => 'required|email',
            'password' => 'required|min:4|max:8|confirmed',
        ]);
           
         $data=array(
             'name'=>$request['name'],
             'email_id'=>$request['email'],
             'mobile_no'=>'1',
             'password'=>Hash::make($request['password']),
             'role'=>'1',
             'status'=>'1',
             'created_at'=>date('Y-m-d H:i:s'),
             'ip_address'=>$_SERVER['REMOTE_ADDR']
         );
        $res=$obj->insertData('users',$data);
         if(!empty($res)){
            return redirect("/")->with('success','You have Registered Successfully');
        }else{
            return redirect()->back()->with('error','Registration Failed Try Again Later!!!');
        }
    }
    public function dashboard()
    {
        if(!Session::has('UID')){
            return redirect()->back()->with('error','Session expired.. signin again!!!');
        }        
        else{            
            return view('vw_temp');
        }
    }
    public function logout() {
        Session::flush();
        Auth::logout();  
        return redirect('/');
    }
}
