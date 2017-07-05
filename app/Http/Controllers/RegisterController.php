<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;


class RegisterController extends Controller
{
    //
    public function register(Request $request)
    {
        $name=$request->input('user_name');
        $pw1=$request->input('user_pw');
        $pw2=$request->input('user_confirm_pw');
        if($pw1==$pw2)
        {
            //是否存在
            $result=DB::table('user')->where('user_name', $name)->first();
            if($result!=null)
            {
                return view('register',['alert_flag'=>2]);
            }
            //数据库插入
            DB::table('user')->insert(
                ['user_name'=>$name,
                'user_password'=>$pw1]);
            return view('login',['alert_flag'=>2]);
        }
        else
        {
            return view('register',['alert_flag'=>1]);
        }
    }
}
