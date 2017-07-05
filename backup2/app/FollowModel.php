<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class FollowModel extends Model
{


    public function get_user_follow($user_id)
    {
        return DB::table('follow')
                ->where('follow_create_user_id', $user_id)
                ->join('user', 'user.id', '=', 'follow_target_user_id')
                ->select('user.*')
                ->get();
    }

    public function get_follow_user($user_id)
    {
        return DB::table('follow')
                ->where('follow_target_user_id', $user_id)
                ->join('user', 'user.id', '=', 'follow_create_user_id')
                ->select('user.*')
                ->get();
    }

    public function follow($user_id, $my_id)
    {
        $count = DB::table('follow')
                    ->where('follow_create_user_id', $my_id)
                    ->where('follow_target_user_id', $user_id)
                    ->count();

        if($count != 0) return;

        $insert = [
            'follow_create_user_id' => $my_id,
            'follow_target_user_id' => $user_id,
            'follow_create_time' => date('Y-m-d H:i:s')
        ];

        DB::table('follow')->insert($insert);
    }

    public function unfollow($user_id, $my_id)
    {
        $count = DB::table('follow')
                    ->where('follow_create_user_id', $my_id)
                    ->where('follow_target_user_id', $user_id)
                    ->count();

        if($count == 0) return;

        DB::table('follow')
            ->where('follow_create_user_id', $my_id)
            ->where('follow_target_user_id', $user_id)
            ->delete();
    }

    public function is_follow($user_id, $my_id)
    {
        $count = DB::table('follow')
                    ->where('follow_create_user_id', $my_id)
                    ->where('follow_target_user_id', $user_id)
                    ->count();
        // dd($count);
        return $count > 0;
    }
}
