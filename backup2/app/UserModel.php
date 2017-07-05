<?php

namespace App;

require_once app_path().'/Http/Function.php';

use Illuminate\Database\Eloquent\Model;

use DB;

class UserModel extends Model
{
    public function login($data)
    {
        $get = DB::table('user')
                ->where('user_email', $data['email'])
                ->select('id', 'user_name', 'user_password', 'user_is_activate', 'user_lock_time')
                ->first();

        if(!$get)
            return 1;

        if(!$get->user_is_activate)
            return 2;

        if($get->user_lock_time != null)
            return 3;

        if(!password_verify($data['password'], $get->user_password))
            return 4;

        session()->put('user_id', $get->id);
        session()->put('user_name', $get->user_name);
        session()->put('user_is_login', true);

        $update = [
            'user_lastest_login_time' => date('Y-m-d H:i:s'),
            'user_lastest_login_ip' => get_client_ip()
        ];

        DB::table('user')
            ->where('id', $get->id)
            ->update($update);

        return 5;
    }

    public function register($data)
    { 
        // dd($data);
        $insert = [
            'user_name' => $data['name'],
            'user_password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'user_email' => $data['email'],
            'user_is_activate' => false,
            'user_create_time' => date('Y-m-d H:i:s')
        ];

        return DB::table('user')->insertGetId($insert);
    }

    public function get_user_by_blog_id($blog_id)
    {
        return DB::table('user')
                ->join('category', 'category_user_id', '=', 'user.id')
                ->join('blog', 'blog_category_id', '=', 'category.id')
                ->where('blog.id', $blog_id)
                ->select('user.id', 'user_name', 'user_alipay_picture_path', 'user_image_path')
                ->first();
    }

    public function get_user($user_id)
    {
        $category_count = DB::table('user')
            ->where('user.id', $user_id)
            ->join('category', 'category_user_id', '=', 'user.id')
            ->whereNull('category_delete_time')
            ->count();

        $blog_count = DB::table('user')
            ->where('user.id', $user_id)
            ->join('category', 'category_user_id', '=', 'user.id')
            ->whereNull('category_delete_time')
            ->join('blog', 'blog_category_id', '=', 'category.id')
            ->whereNull('blog_delete_time')
            ->whereNull('blog_undo_time')
            ->whereNotNull('blog_publish_time')
            ->count();

        // dd($blog_count);

        $user_info = DB::table('user')
            ->where('user.id', $user_id)
            ->first();

        return [
            'user_info' => $user_info,
            'category_count' => $category_count,
            'blog_count' => $blog_count
        ];

    }

    public function user_view_increment($user_id, $my_id)
    {
        if($user_id == $my_id) return;

        $count = DB::table('user_view')
                    ->where('user_view_target_user_id', $user_id)
                    ->where('user_view_create_user_id', $my_id)
                    ->count();

        if($count != 0)
            return;

        $insert = [
            'user_view_create_user_id' => $my_id,
            'user_view_target_user_id' => $user_id,
            'user_view_create_time' => date('Y-m-d H:i:s'),
            'user_view_create_ip' => get_client_ip()
        ];

        DB::table('user_view')->insert($insert);

        DB::table('user')
            ->where('user.id', $user_id)
            ->increment('user_profile_view_count');
    }
}
