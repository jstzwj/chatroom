<?php

namespace App\Http\Controllers;

require_once app_path().'/Http/Function.php';

use Illuminate\Http\Request;

use Validator;

class LoginController extends Controller
{
  protected $user_model;

  public function __construct()
  {
    $this->user_model = new \App\UserModel();
  }

  public function login()
  {
    return view('login.login');
  }

  public function login2(Request $request)
  {
    $request->flashExcept('_token');

    $validator = $this->login_validator($request->all());

    if($validator->fails())
    {
      set_error_session(array_to_string($validator->messages()->all()));
      return redirect('login');
    }

    $login = $this->user_model->login($request->all());

    switch($login)
    {
      case 1:
        set_error_session('用户不存在！请检查用户名输入是否正确');
        return redirect('login');
      case 2:
        set_error_session('用户尚未激活，请通过激活邮件进行激活');
        return redirect('login');
      case 3:
        set_error_session('用户已被封禁，请联系管理员解封');
        return redirect('login');
      case 4:
        set_error_session('用户名或密码错误');
        return redirect('login');
      case 5:
        
        return redirect('user');
      default:
        return redirect('login');
    }

  }

  public function logout()
  {
    session()->put('user_is_login', false);
    return redirect('login');
  }

  public function register()
  {
    return view('login.register');
  }

  public function register2(Request $request)
  {
    $request->flashExcept('_token');

    $validator = $this->register_validator($request->all());

    if($validator->fails())
    {
      set_error_session(array_to_string($validator->messages()->all()));
      return redirect('register');
    }

    $register = $this->user_model->register($request->all());

    if($register <= 0)
    {
      set_error_session('用户注册失败！请稍后再试...');
      return redirect('register');
    }
    return redirect('login');

  }

  private function register_validator($data) {
    $rule = [
      'name'     => ['between:1,30', 'regex:/^[_0-9a-zA-Z]+$/'],
      'email'    => ['email'],
      'password' => ['between:6,20', 'regex:/^[0-9a-zA-Z]+$/', 'confirmed'],
      'captcha'  => ['captcha']
    ];

    $message = [
      'required'       => ':attribute不能为空',
      'between'        => ':attribute长度必须在 :min 和 :max 之间',
      'name.regex'     => ':attribute使用除汉字、数字、字母、下划线以外的字符',
      'password.regex' => ':attribute使用除数字、字母以外的字符',
      'confirmed'      => '两次输入的:attribute不一致',
      'captcha'        => ':attribute错误',
      'email'          => ':attribute格式错误'
    ];

    $attribute = [
      'name'     => '用户名',
      'email'    => '邮箱',
      'password' => '密码',
      'captcha'  => '验证码'
    ];

    return Validator::make($data, $rule, $message, $attribute);
  }

  private function login_validator($data) {
    $rule = [
      'email'    => ['email'],
      'password' => ['between:6,20', 'regex:/^[0-9a-zA-Z]+$/'],
      'captcha'  => ['captcha']
    ];

    $message = [
      'between'        => ':attribute长度必须在 :min 和 :max 之间',
      'password.regex' => ':attribute使用除数字、字母以外的字符',
      'captcha'        => ':attribute错误',
      'email'          => ':attribute格式错误'
    ];

    $attribute = [
      'email'    => '邮箱',
      'password' => '密码',
      'captcha'  => '验证码'
    ];

    return Validator::make($data, $rule, $message, $attribute);
  }
}
