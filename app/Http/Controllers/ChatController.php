<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;


class ChatController extends Controller
{
    //
    public function exit(Request $request)
    {
        DB::table('user')->where('id', Session::get('user_id'))
                ->update(['user_active_time' => null]);
        Session::forget('user_id');
        return redirect('login');
    }
    public function chat(Request $request)
    {
        //检测session
        if(!Session::has('user_id'))
        {
            return redirect('login');
        }
        else
        {
            //更新在线时间
            DB::table('user')->where('id', Session::get('user_id'))
                ->update(['user_active_time' => date("Y-m-d H:i:s")]);
        }
        //获取在线用户
        $active_time=date('Y-m-d H:i:s',strtotime('-10 minute'));
        $user_result=DB::table('user')->where('user_active_time','>', $active_time)->get();

        //获取消息
        $msg_result=DB::table('msg')->leftJoin('user', 'user.id', '=', 'msg.chat_user_id')->where('chat_time','>', $active_time)->get();

        $data=[
            'user_id'=>Session::get('user_id'),
            'user_list'=>$user_result,
            'msg_list'=>$msg_result
        ];
        return view('chat',$data);


    }

    public function sendMsg(Request $request)
    {
        //检测session
        if(!Session::has('user_id'))
        {
            return redirect('login');
        }
        //插入消息
        DB::table('msg')->insert(['chat_user_id'=>Session::get('user_id'),
        'chat_msg'=>$request->input('chat_msg'),
        'chat_time'=>date("Y-m-d H:i:s")]);
        //更新在线时间
        DB::table('user')->where('id', Session::get('user_id'))
                ->update(['user_active_time' => date("Y-m-d H:i:s")]);
        return redirect('chat');
    }


}
