@extends('commen.blogmanage')

@section('css')

<link href="http://cdn.bootcss.com/wangeditor/2.1.20/css/wangEditor.css" rel="stylesheet">

@stop

@section('container')

        <div class="col-md-9 col-sm-7 col-xs-12">
            <div class="mb-block write">
                <div class="mb-block-content">
                    <div class="list-blog">
                    
                    @if(isset($blogs))
                    @foreach($blogs as $blog)
                        <div class="list-item">
                            <div class="item-title">
                                <h4><input type="checkbox" name="many"> <a class="black" href="{{url('blog')}}?id={{$blog->blog_id}}">{{$blog->blog_title}}</a></h4>
                                <div class="item-category col-md-6 col-sm-6 col-xs-12">{{$blog->category_name}}</div>
                                <div class="item-tag col-md-6 col-sm-6 col-xs-12">{{$blog->blog_tags}}</div>
                                <div class="item-content col-md-12 col-xs-12 col-sm-12">
                                    {{$blog->blog_summary}}...
                                </div>
                                <div class="item-bottom  col-md-12 col-xs-12 col-sm-12">
                                    <a href="{{url('blog/delete')}}?id={{$blog->blog_id}}" class="item-btn btn btn-xs btn-danger pull-right">删除</a>
                                    <a href="{{url('blog/edit')}}?id={{$blog->blog_id}}" class="item-btn btn btn-xs btn-info pull-right">编辑</a>
                                    <a href="{{url('blog/publish')}}?id={{$blog->blog_id}}" class="item-btn btn btn-xs btn-success pull-right">发表</a>
                                    <span class="pull-right">{{date('Y-m-d H:i', strtotime($blog->blog_create_time))}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @endif

                        <div class="list-item">
                            <div class="pull-left">
                                <button class="btn btn-success btn-sm">批量发表</button>
                                <button class="btn btn-danger btn-sm">批量删除</button>
                            </div>
                            <div class="btn-group pull-right">
                                
                                @if($c <= 0)
                                <a href="jacascript:void(0)" class="btn btn-default btn-sm disabled">首页</a>
                                @else
                                <a href="{{url('blog/manage/draft')}}?p={{$c}}" class="btn btn-default btn-sm">首页</a>
                                @endif
                                
                                @if($p - 1 <= 0)
                                <a href="jacascript:void(0)" class="btn btn-default btn-sm disabled">上一页</a>
                                @else
                                <a href="{{url('blog/manage/draft')}}?p={{$p-1}}" class="btn btn-default btn-sm">上一页</a>
                                @endif

                                @for($i = -3; $i <= 3; $i++)
                                @if($p + $i > 0 && $p + $i <= $c)
                                @if($i != 0)
                                <a href="{{url('blog/manage/draft')}}?p={{$p+$i}}" class="btn btn-default btn-sm">{{$p + $i}}</a>
                                @else
                                <a href="{{url('blog/manage/draft')}}?p={{$p+$i}}" class="btn btn-default btn-sm disabled">{{$p + $i}}</a>
                                @endif
                                @endif
                                @endfor

                                @if($p + 1 > $c)
                                <a href="jacascript:void(0)" class="btn btn-default btn-sm disabled">下一页</a>
                                @else
                                <a href="{{url('blog/manage/draft')}}?p={{$p+1}}" class="btn btn-default btn-sm">下一页</a>
                                @endif

                                @if($c <= 0)
                                <a href="jacascript:void(0)" class="btn btn-default btn-sm disabled">尾页</a>
                                @else
                                <a href="{{url('blog/manage/draft')}}?p={{$c}}" class="btn btn-default btn-sm">尾页</a>
                                @endif

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

@stop

@section('js')


@stop