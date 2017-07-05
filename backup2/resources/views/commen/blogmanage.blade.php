<!DOCTYPE html>
<html>
<head>
    <title>MyBlog</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('pnotify')}}/dist/pnotify.custom.min.css">

    <link href="{{asset('css')}}/myblog.css" rel="stylesheet">


    <style type="text/css">
        .guide{
            padding: 20px 10px;
            font-size: 16px;
            font-weight: 700px;
            color: black;
            /*max-width: 200px;*/
        }
        .nav li a:hover{
            color: white;
            background-color: #383838 !important;
        }
        .nav li a{
            color: black;
        }
        .container{
            margin-top: 100px;
        }
        .write{
            padding: 20px 10px;
        }
        .btn-submit{
            margin-right: 20px;
            height: 34px;
        }
        .list-item{
            border-top: solid 1px #383838;
            margin-bottom: 30px;
            margin-top: 20px;
            padding: 10px;
            display: block;
            clear: both;
        }
        .item-content{
            min-height: 40px;
        }
        .item-btn{
            margin-left: 5px;
        }
        .item-bottom{
            margin-bottom: 20px;
        }
        .black{
            color: black;
        }
    </style>
    @section('css')
    @show
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
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

    <div class="container">
        <div></div>
        <div class="col-md-3 col-sm-5 col-xs-12">
            <div class="mb-block guide">
                <div class="navbar-default sidebar">
                    <div class="sidebar-nav">
                        <ul class="nav">
                            <li id="url_write"><a href="{{url('blog/manage/write')}}"><i class="glyphicon glyphicon-pencil"></i> 写文章</a></li>
                            <li id="url_draft"><a href="{{url('blog/manage/draft')}}"><i class="glyphicon glyphicon-save"></i> 草稿箱</a></li>
                            <li id="url_publish"><a href="{{url('blog/manage/publish')}}"><i class="glyphicon glyphicon-open"></i> 已发布</a></li>
                            <li id="url_undo"><a href="{{url('blog/manage/undo')}}"><i class="glyphicon glyphicon-repeat"></i> 已撤回</a></li>
                            <li id="url_delete"><a href="{{url('blog/manage/delete')}}"><i class="glyphicon glyphicon-trash"></i> 已删除</a></li>
                            <li id="url_category"><a href="{{url('blog/manage/category')}}"><i class="glyphicon glyphicon-th-list"></i> 分类管理</a></li>
                            <li id="url_comment"><a href="{{url('blog/manage/comment')}}"><i class="glyphicon glyphicon-th-list"></i> 评论管理</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    @section('container')

    @show

    </div>



    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script src="{{asset('pnotify')}}/dist/pnotify.custom.min.js"></script>
    
    @section('js')

    @show

    @if(isset($url))
    
    <script>
        $('#{{$url}}').addClass('active');
    </script>

    @endif

    @if(session()->has('info'))
    <script>
      $(document).ready(function() {
        new PNotify({
          title: '{!!session()->get('info')['title']!!}',
          text: '{!!session()->get('info')['text']!!}',
          delay: 5000,
          type: 'info',
          styling: 'bootstrap3'
        });
      });
    </script>
    @endif
    @if(session()->has('error'))
    <script>
      $(document).ready(function() {
        new PNotify({
          title: '{!!session()->get('error')['title']!!}',
          text: '{!!session()->get('error')['text']!!}',
          delay: 5000,
          type: 'error',
          styling: 'bootstrap3'
        });
      });
    </script>
    @endif
    @if(session()->has('success'))
    <script>
      $(document).ready(function() {
        new PNotify({
          title: '{!!session()->get('success')['title']!!}',
          text: '{!!session()->get('success')['text']!!}',
          delay: 5000,
          type: 'success',
          styling: 'bootstrap3'
        });
      });
    </script>
    @endif
</body>
</html>