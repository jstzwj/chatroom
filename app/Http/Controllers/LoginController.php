<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        //检测session
        if(Session::has('user_id'))
        {
            return redirect('chat');
        }
        return view('login');
    }
    
    //
    public function check(Request $request)
    {
        if($request->has('user_name')&&$request->has('user_pw'))
        {
            $user_name="";
            $user_pw="";
            $user_id=0;
            if($request->has('user_name')&&$request->has('user_pw'))
            {
                $user_name=$request->input('user_name');
                $user_pw=$request->input('user_pw');
            }
            else
            {
                return view('login',['alert_flag' => 1]);
            }
            $result=DB::table('user')->where('user_name', $user_name)
             ->where('user_password',$user_pw)->first();
            if($result!=null)
            {
                Session::put('user_id', $result->id);
                DB::table('user')->where('id', $result->id)
                            ->update(['user_login_time' => date("Y-m-d H:i:s")]);
                DB::table('user')->where('id', $result->id)
                            ->update(['user_active_time' => date("Y-m-d H:i:s")]);
                return redirect('chat');
            }
            else
            {
                return view('login',['alert_flag' => 1]);
            }
        }
        else
        {
            return view('login',['alert_flag' => 1]);
        }
    }
}
