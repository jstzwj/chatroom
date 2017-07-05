<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>MyBlog</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/wangeditor/2.1.20/css/wangEditor.css" rel="stylesheet">

    <link href="{{asset('css')}}/myblog.css" rel="stylesheet">

    <style type="text/css">
        .user{
            width: 100%;
            height: 40px;
        }
        .after-img-info{
            margin-left: 48px;
            top: 0px;
            float: left;
        }

        .img-circle{
            width: 40px;
            height: 40px;
            float: left;
        }
        .user-name-sm{
            font-size:15px;
            line-height: 17px;
            color: #555;
        }
        .user-bio-sm{
            color:black;
            margin-top: 6px;
            line-height: 17px;
            overflow: hidden;
            font-size: 14px;
            white-space: nowrap;
        }
        .btn-circle{
            border-radius: 50%;
            border: solid 1px;
            height: 60px;
            width: 60px;
        }
        .btn-thumbs{
            padding: 16px;
        }
    </style>

</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#example-navbar-collapse">
                    <span class="sr-only">切换导航</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><span><img height="100%" src="{{asset('image')}}/m.jpg"></span> 晓木Blog</a>
            </div>
            <div class="collapse navbar-collapse" id="example-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?php if(session()->get('user_name', null) == null): ?>
                    <li><a href="{{url('login')}}">登陆</a></li>
                    <li><a href="{{url('register')}}">注册</a></li>
                    <?php else: ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php echo session()->get('user_name') ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('user')}}">个人主页</a></li>
                            <li><a href="{{url('logout')}}">登出</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="max-width: 750px;">
        <div class="mb-view-title">
            <h1>{{$user->user_name}}的Blog</h1>
            <div class="desc"></div>
        </div>
        <div class="row">
<!--             <div class="mb-left">
                <div class="mb-block user-info">
                    <div class="mb-block-title">个人信息</div>
                    <div class="mb-block-content">
                        <img class="user-img width="100%" img width="100%"-rounded" src="default.jpg" width="100%"><br><br>

                        <p class="user-name">lichaoxi</p>

                        <div class="user-btn">
                            <button class="btn btn-info btn-xs">关注</button>
                            <button class="btn btn-info btn-xs">私信</button>
                        </div><br>

                        <div class="user-page-info">
                            <p>访问：100次</p>
                            <p>关注：1013人</p>
                            <p>粉丝：10000人</p>
                            <p>博文：115篇</p>
                        </div>
                    </div>
                </div>

                <div class="mb-block search">
                    <div class="mb-block-title">搜索栏目</div>
                    <div class="mb-block-content">
                        <form action="search.php" method="get">
                            <div class="form-group has-success">
                                <input type="" name="s" class="form-control" placeholder="查找博客">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="mb-block category">
                    <div class="mb-block-title">博客分类</div>
                    <div class="mb-block-content">
                        <ul>
                            <li><a href="#">Android</a> <span>(31)</span></li>
                            <li><a href="#">Flex</a> <span>(1)</span></li>
                            <li><a href="#">iPhone开发</a> <span>(400)</span></li>
                            <li><a href="#">javaEE</a> <span>(13)</span></li>
                            <li><a href="#">javascript</a> <span>(4)</span></li>
                            <li><a href="#">Oracle</a> <span>(1)</span></li>
                            <li><a href="#">一步一步学grails</a> <span>(11)</span></li>
                            <li><a href="#">系统管理</a> <span>(3)</span></li>
                            <li><a href="#">Mac OS X</a> <span>(10)</span></li>
                        </ul>
                    </div>
                </div>

            </div> -->
            <div class="">
                <div class="bolg-info mb-block">
                    <div class="mb-block-title">博客内容</div>
                    <div class="mb-block-content">
                        <div class="blog blog-title">
                            <div class="blog-title-text"><h1>{{$blog->blog_title}}</h1></div>
                                <div class="user">
                                    <img src="{{$user->user_image_path}}" class="img-circle">&nbsp;
                                    <span class="after-img-info">
                                        <div class="user-name-sm">{{$user->user_name}}</div>
                                        <div class="user-bio-sm">360首席科学家颜水成教授</div>
                                    </span>

                                </div>
                            <div class="pull-left">
                                @foreach($blog->blog_tags as $tag)
                                <label class="label label-info">{{$tag}}</label>
                                @endforeach

                            </div>
                            <div class="pull-right">
                                <span>2012-12-21 2:35</span>&nbsp;&nbsp;
                                <span><span class="glyphicon glyphicon-eye-open"></span> 浏览({{$blog->blog_view_count}})</span>&nbsp;&nbsp;
                                <span class="glyphicon glyphicon-thumbs-up"></span> <a href="#thumb">点赞({{$blog->blog_thumbs_up_count}})</a>&nbsp;&nbsp;
                                <span class="glyphicon glyphicon-comment"></span> <a href="#comment">评论({{count($comments)}})</a>&nbsp;&nbsp;
                                <span class="glyphicon glyphicon-plus"></span> <a href="#">收藏</a>&nbsp;&nbsp;
                            </div>
                        </div>

                        <div class="blog blog-content">

                            <div id="article_content" class="article_content">
                                <div class="markdown_views" style="font-size: 16px;">
                                {!!$blog->blog_content!!}
                                </div>
                                <div id="thumb"></div>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <div id="comment"></div>
                                <div style="width: 100%; text-align: center">
                                    <a href="{{url('blog/like')}}?id={{$blog->id}}" class="btn btn-thumbs btn-lg btn-circle btn-default"><span class="glyphicon glyphicon glyphicon-thumbs-up"></span></a>
                                    <button class="btn btn-lg btn-circle btn-default" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon glyphicon-yen"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mb-block comment">
                    <div class="mb-block-title">查看评论</div>
                    <div class="mb-block-content">
                        <div class="view-comment">
                        <?php $i = 1; ?>
                        @foreach($comments as $comment)
                            @if($comment->comment_delete_time == null)
                            <div class="user-comment">
                                <div class="user-img"><img src="{{asset('image')}}/default.jpg" width="100%"></div>
                                <div class="comment-info">
                                    <span class="pull-left">{{$comment->user_name}} {{$comment->comment_create_time}}</span>
                                    <span class="pull-right">#{{$i}}</span><br>
                                    <hr>
                                    <span id="reply_{{$i}}">{!!$comment->comment_content!!}</span><br>
                                    <hr>
                                    <div class="pull-right reply">
                                        <button class="btn btn-link btn-xs btn-reply" value="{{$i}}">回复</button>
                                        @if(session()->get('user_id', 0) > 0 && session()->get('user_id') == $user->id)
                                        <a href="{{url('blog/comment/delete')}}?id={{$comment->id}}&blog_id={{$blog->id}}">删除</a>
                                        @else
                                        @if($comment->comment_report_create_time != null)
                                        <a href="{{url('blog/comment/unreport')}}?id={{$comment->id}}&blog_id={{$blog->id}}">已举报</a>
                                        @else
                                        <a href="{{url('blog/comment/report')}}?id={{$comment->id}}&blog_id={{$blog->id}}">举报</a>
                                        @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                            <?php $i++; ?>
                        @endforeach
                        </div>
                        <br>
                        <br>
                        <form action="{{url('blog/comment')}}" method="post">
                            <textarea name="comment" id="textarea" style="height:200px;max-height:500px;"></textarea>
                            <input type="hidden" name="blog_id" id="type" value="{{$blog->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn-submit pull-right">提交</button>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 模态框（Modal） -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        打赏博主
                    </h4>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <img src="{{asset('')}}image/alipay.png" width="100%">
                </div>
                <div class="modal-footer">
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://cdn.bootcss.com/wangeditor/2.1.20/js/lib/jquery-1.10.2.min.js"></script>
    <script src="http://cdn.bootcss.com/wangeditor/2.1.20/js/wangEditor.js"></script>

    <script>
        var editor = new wangEditor('textarea');

        editor.config.menus = [
            'source',
            '|',
            'bold',
            'underline',
            'italic',
            'strikethrough',
            'eraser',
            'forecolor',
            'bgcolor',
            '|',
            'quote',
            'fontfamily',
            'fontsize',
            'alignleft',
            'aligncenter',
            'alignright',
            '|',
            'link',
            'unlink',
            'emotion',
            // '|',
            // 'img',
            // 'insertcode',
            '|',
            'undo',
            'redo',
            'fullscreen'
        ];

        editor.config.emotions = {
            'default': {
                title: '默认',
                data: 'http://www.wangeditor.com/wangEditor/test/emotions.data'
            }
        }

        editor.create();
    </script>

    <script>

        $(document).ready(function(){
            $('.btn-reply').click(function(e){
                var id = $(e.target).val();

            });
        });
    </script>
</body>
</html>