@extends('commen.blogmanage')

@section('css')

<link href="http://cdn.bootcss.com/wangeditor/2.1.20/css/wangEditor.css" rel="stylesheet">

@stop

@section('container')

        <div class="col-md-9 col-sm-7 col-xs-12">
            <div class="mb-block write">
                <div class="mb-block-content">
                    <div class="list-comment">
                        @foreach($comments as $comment)
                        <div class="list-item">
                            <div class="item-title">
                                <div class="comment-user col-md-12 col-sm-12 col-xs-12">
                                    用户：<a href="{{url('user')}}?id={{$comment->user_id}}" class="black">{{$comment->user_name}}</a>
                                    {{$comment->comment_create_time}}
                                </div>
                                <div class="item-content col-md-12 col-xs-12 col-sm-12">
                                    {!!$comment->comment_content!!}
                                </div>
                                <div class="item-bottom  col-md-12 col-xs-12 col-sm-12">
                                    所属文章：<a href="{{url('blog')}}?id={{$comment->blog_id}}">{{$comment->blog_title}} </a>
                                    <a href="{{url('blog/comment/delete')}}?id={{$comment->id}}" class="item-btn btn btn-danger btn-xs pull-right">删除</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="list-item">
                            <div class="btn-group pull-right">
                                @if($c <= 0)
                                <a href="jacascript:void(0)" class="btn btn-default btn-sm disabled">首页</a>
                                @else
                                <a href="{{url('blog/manage/comment')}}?p={{$c}}" class="btn btn-default btn-sm">首页</a>
                                @endif
                                
                                @if($p - 1 <= 0)
                                <a href="jacascript:void(0)" class="btn btn-default btn-sm disabled">上一页</a>
                                @else
                                <a href="{{url('blog/manage/comment')}}?p={{$p-1}}" class="btn btn-default btn-sm">上一页</a>
                                @endif

                                @for($i = -3; $i <= 3; $i++)
                                @if($p + $i > 0 && $p + $i <= $c)
                                @if($i != 0)
                                <a href="{{url('blog/manage/comment')}}?p={{$p+$i}}" class="btn btn-default btn-sm">{{$p + $i}}</a>
                                @else
                                <a href="{{url('blog/manage/comment')}}?p={{$p+$i}}" class="btn btn-default btn-sm disabled">{{$p + $i}}</a>
                                @endif
                                @endif
                                @endfor

                                @if($p + 1 > $c)
                                <a href="jacascript:void(0)" class="btn btn-default btn-sm disabled">下一页</a>
                                @else
                                <a href="{{url('blog/manage/comment')}}?p={{$p+1}}" class="btn btn-default btn-sm">下一页</a>
                                @endif

                                @if($c <= 0)
                                <a href="jacascript:void(0)" class="btn btn-default btn-sm disabled">尾页</a>
                                @else
                                <a href="{{url('blog/manage/comment')}}?p={{$c}}" class="btn btn-default btn-sm">尾页</a>
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