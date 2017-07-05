<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class CategoryModel extends Model
{
    public function get_categorys_by_user_id($user_id)
    {
        return DB::table('category')
                ->where('category_user_id', $user_id)
                ->whereNull('category_delete_time')
                ->leftJoin('blog', 'blog_category_id', '=', 'category.id')
                ->select('category.id', 'category_name', 'category_desc', DB::raw('count(blog.id) as blog_count'))
                ->groupBy('category.id', 'category_name', 'category_desc')
                ->get();
    }

    public function add_category($data, $user_id)
    {
        $count = DB::table('category')
                    ->whereNull('category_delete_time')
                    ->where('category_user_id', $user_id)
                    ->where('category_name', $data['category_name'])
                    ->count();

        if($count > 0)
            return false;
            
        $insert = [
            'category_user_id' => $user_id,
            'category_name' => $data['category_name'],
            'category_desc' => $data['category_desc'],
            'category_create_time' => date('Y-m-d H:i:s'),
        ];

        return DB::table('category')->insert($insert);
    }

    public function edit_category($data, $user_id)
    {
        $count = DB::table('category')
                    ->whereNull('category_delete_time')
                    ->where('category_user_id', $user_id)
                    ->where('category_name', $data['category_name'])
                    ->where('id', '!=', $data['id'])
                    ->count();

        if($count > 0) 
            return false;

        $update = [
            'category_name' => $data['category_name'],
            'category_desc' => $data['category_desc'],
            'category_update_time' => date('Y-m-d H:i:s')
        ];

        return DB::table('category')
                ->where('id', $data['id'])
                ->update($update);
    }

    public function delete_category($data, $user_id)
    {
        $count = DB::table('category')
                    ->whereNull('category_delete_time')
                    ->where('category_user_id', $user_id)
                    ->where('id', '=', $data['id'])
                    ->count();

        if($count <= 0) 
            return false;

        $update = [
            'category_delete_time' => date('Y-m-d H:i:s')
        ];

        return DB::table('category')
                ->where('id', $data['id'])
                ->update($update);
    }
}
