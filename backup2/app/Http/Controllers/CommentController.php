<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $blog_model;
    protected $category_model;
    protected $comment_model;
    protected $user_model;

    public function __construct()
    {
        $this->blog_model = new \App\BlogModel();
        $this->category_model = new \App\CategoryModel();
        $this->comment_model = new \App\CommentModel();
        $this->user_model = new \App\UserModel();
    }

    public function delete(Request $request)
    {
        $delete = $this->comment_model->delete_comment($request->get('id'));
        return redirect(url('blog').'?id='.$request->get('blog_id').'#comment');
    }

    public function report(Request $request)
    {
        $report = $this->comment_model->report_comment($request->get('id'), session()->get('user_id'));
        return redirect(url('blog').'?id='.$request->get('blog_id').'#comment');
    }

    public function unreport(Request $request)
    {
        $report = $this->comment_model->unreport_comment($request->get('id'), session()->get('user_id'));
        return redirect(url('blog').'?id='.$request->get('blog_id').'#comment');
    }

}
