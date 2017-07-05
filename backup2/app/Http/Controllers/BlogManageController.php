<?php

namespace App\Http\Controllers;

require_once app_path().'/Http/Function.php';

use Illuminate\Http\Request;

class BlogManageController extends Controller
{
    protected $blog_model;
    protected $category_model;
    protected $comment_model;

    public function __construct()
    {
        $this->blog_model = new \App\BlogModel();
        $this->category_model = new \App\CategoryModel();
        $this->comment_model = new \App\CommentModel();
    }

    public function write()
    {
        $categorys = $this->category_model->get_categorys_by_user_id(session()->get('user_id'));

        $data = [
            'url' => 'url_write',
            'categorys' => $categorys
        ];

        return view('blog.manage.write', $data);
    }

    public function write2(Request $request)
    {
        $write = $this->blog_model->write($request->all());
        return redirect('blog/manage/write');
    }

    public function draft(Request $request)
    {
        $info = $this->blog_model->get_draft_blog(session()->get('user_id'), $request->all());

        $data = [
            'url' => 'url_draft',
            'blogs' => $info['data'],
            'p' => $info['page_now'],
            'c' => $info['page_count']
        ];

        return view('blog.manage.draft', $data);
    }

    public function publish(Request $request)
    {
        $info = $this->blog_model->get_publish_blog(session()->get('user_id'), $request->all());

        $data = [
            'url' => 'url_publish',
            'blogs' => $info['data'],
            'p' => $info['page_now'],
            'c' => $info['page_count']
        ];
        // dd($data);
        return view('blog.manage.publish', $data);
    }

    public function undo(Request $request)
    {
        $info = $this->blog_model->get_undo_blog(session()->get('user_id'), $request->all());

        $data = [
            'url' => 'url_undo',
            'blogs' => $info['data'],
            'p' => $info['page_now'],
            'c' => $info['page_count']
        ];
        
        return view('blog.manage.undo', $data);
    }

    public function delete(Request $request)
    {
        $info = $this->blog_model->get_delete_blog(session()->get('user_id'), $request->all());

        $data = [
            'url' => 'url_delete',
            'blogs' => $info['data'],
            'p' => $info['page_now'],
            'c' => $info['page_count']
        ];
        
        return view('blog.manage.delete', $data);
    }

    public function category()
    {
        $categorys = $this->category_model->get_categorys_by_user_id(session()->get('user_id'));

        $data = [
            'url' => 'url_category',
            'categorys' => $categorys
        ];
        
        return view('blog.manage.category', $data);
    }

    public function category_add(Request $request)
    {
        $add = $this->category_model->add_category($request->all(), session()->get('user_id'));

        if(!$add)
            set_error_session('分类添加失败，分类已存在');
        else
            set_success_session('分类添加成功');
        
        return redirect()->back();
    }

    public function category_edit(Request $request)
    {
        $edit = $this->category_model->edit_category($request->all(), session()->get('user_id'));

        if(!$edit)
            set_error_session('分类编辑失败，分类已存在');
        else
            set_success_session('分类编辑成功');
        
        return redirect()->back();
    }

    public function category_delete(Request $request)
    {
        $delete = $this->category_model->delete_category($request->all(), session()->get('user_id'));

        if(!$delete)
            set_error_session('分类删除失败，分类已存在');
        else
            set_success_session('分类删除成功');
        
        return redirect()->back();
    }

    public function comment(Request $request)
    {
        $info = $this->comment_model->get_comment_by_user_id(session()->get('user_id'), $request->all());

        $data = [
            'url' => 'url_comment',
            'comments' => $info['data'],
            'p' => $info['page_now'],
            'c' => $info['page_count']
        ];
        
        return view('blog.manage.comment', $data);
    }
}
