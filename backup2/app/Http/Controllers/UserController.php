<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
  protected $user_model;
  protected $blog_model;
  protected $follow_model;

  public function __construct()
  {
    $this->user_model = new \App\UserModel();
    $this->blog_model = new \App\BlogModel();
    $this->follow_model = new \App\FollowModel();
  }

  public function user(Request $request)
  {
    if($request->has('id') && $request->get('id') != session()->get('user_id'))
    {
      $this->user_model->user_view_increment($request->get('id'), session()->get('user_id'));
      $user_info = $this->user_model->get_user($request->get('id'));
      // $user_dynamic = $this->user_model->get_user_dynamic($request->get('id'));
      $user_follow = $this->follow_model->get_user_follow($request->get('id'));
      $follow_user = $this->follow_model->get_follow_user($request->get('id'));
      $blogs = $this->blog_model->get_blog_by_user_id($request->get('id'));
      $is_follow = $this->follow_model->is_follow($request->get('id'), session()->get('user_id'));
    }
    else
    {
      $user_info = $this->user_model->get_user(session()->get('user_id'));
      // $user_dynamic = $this->user_model->get_user_dynamic(session()->get('user_id'));
      $user_follow = $this->follow_model->get_user_follow(session()->get('user_id'));
      $follow_user = $this->follow_model->get_follow_user(session()->get('user_id'));
      $blogs = $this->blog_model->get_blog_by_user_id(session()->get('user_id'));
      $is_follow = false;
    }

    $data = [
      'user_info' => $user_info['user_info'],
      'category_count' => $user_info['category_count'],
      'blog_count' => $user_info['blog_count'],
      'user_follow' => $user_follow,
      'follow_user' => $follow_user,
      'blogs' => $blogs,
      'is_follow' => $is_follow
    ];
    return view('user.user', $data);
  }

  public function follow(Request $request)
  {
    if($request->has('id'))
    {
      $follow = $this->follow_model->follow($request->get('id'), session()->get('user_id'));
    }
    return redirect()->back();
  }

  public function unfollow(Request $request)
  {
    if($request->has('id'))
    {
      $follow = $this->follow_model->unfollow($request->get('id'), session()->get('user_id'));
    }
    return redirect()->back();
  }
}
