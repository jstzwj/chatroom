<!DOCTYPE html>
<html>
<head>
    <title>MyBlog</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="myblog.css" rel="stylesheet">

    <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
        .user{
            height: 40px;
            width: 100%;
        }
        .user-name-lg{
            color:black;
            font-size:25px;
            margin:5px;
        }
        .user-bio-lg{
            color:black;
            margin:5px;
        }
        .user-name-sm{
            font-size:15px;
            color: #555;
        }
        .user-bio-sm{
            color:black;
            margin-top: 6px;
            overflow: hidden;
            font-size: 14px;
            white-space: nowrap;
        }
        .avatar{
            width:100px;
            height:100px;
        }
        .avatar-img{
            width:100%;
            height:100%;
        }
        .after-img-info{
            margin-left: 48px;
            top:0px;
            float: left;
        }
        .img-circle{
            width: 40px;
            height: 40px;
            float: left;
        }
        .default-font{
            font-family: Helvetica Neue,Helvetica,PingFang SC,Hiragino Sans GB,Microsoft YaHei,Noto Sans CJK SC,WenQuanYi Micro Hei,Arial,sans-serif;
            font-size: 15px;
        }
        .event-name{
            color: #8590a6;
        }
        .article-title{
            font-size: 18px;
            font-weight: 700;
            line-height: 1.6;
            color: #1e1e1e;
        }
        .article-brief{
            margin-bottom: .72em;
        }
        .article-state{
            color: #999;
            vertical-align: middle;
            text-decoration: none;
        }
        .article-state a{
            margin: 0px 10px;
        }
    </style>


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
                <a class="navbar-brand" href="#"><span><img height="100%" src="m.jpg"></span> 晓木Blog</a>
            </div>
            <div class="collapse navbar-collapse" id="example-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="login.php">登陆</a></li>
                    <li><a href="register.php">注册</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#">首页</a>
                                </li>
                                <li><a href="#">精华</a></li>
                                <li><a href="#">推荐</a></li>
                                <li><a href="#">最新</a></li>
                            </ul>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="article-title">
                                        TensorFlow实战
                                    </div>
                                    <div class="article-brief">
                                        这两天 GitHub 对其官网进行了改版，紧接着又发布了一年一度的开源报告，我们程序员比较关心之后的趋势是什么
                                    </div>
                                    <div class="article-state">
                                        <a href="#" name="addcomment" class="">
                                            <i class="z-icon-comment"></i>
                                            108 条评论
                                        </a>
                                        <a href="#" name="readcounter" class="">
                                            <i class="z-icon-comment"></i>
                                            1005 次阅读
                                        </a>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="article-title">
                                        唐纳德·特朗普和伊万卡·特朗普都每天只睡三四个小时，一般人如果这么做的话受得了吗？
                                    </div>
                                    <div class="article-brief">
                                        受得了的, 我就是普通人, 大概持续很多年了, 不过没那么夸张, 因为我没总统那么多事要做 去年几乎一整年都是 3 4 个小时睡眠, 今年有所改善, 变成了 5 6 小时我认为这就是信念和习惯的问题比如我从不睡午觉, 这是从小坚持的信念(从小觉得白天睡觉浪费时间
                                    </div>
                                    <div class="article-state">
                                        <a href="#" name="addcomment" class="">
                                            <i class="z-icon-comment"></i>
                                            423 条评论
                                        </a>
                                        <a href="#" name="readcounter" class="">
                                            <i class="z-icon-comment"></i>
                                            7239 次阅读
                                        </a>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="article-title">
                                        Rust 开发环境指北
                                    </div>
                                    <div class="article-brief">
                                        有兴趣入门 Rust 的同学现在不少，一直想写这样一篇文章，但不是我拖延而时机未到，现在今年是社区着力改善工具链和第三方库的年份，相关的成绩挺显著。虽然搭建环境的时候可能会碰到问题，但大致要做的事情已经明了了。（因为很少在 Windows 上开发，本文
                                    </div>
                                    <div class="article-state">
                                        <a href="#" name="addcomment" class="">
                                            <i class="z-icon-comment"></i>
                                            176 条评论
                                        </a>
                                        <a href="#" name="readcounter" class="">
                                            <i class="z-icon-comment"></i>
                                            8462 次阅读
                                        </a>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="article-title">
                                        如何看待川普被指与向俄罗斯泄露机密行动信息，可能破坏反恐情报来源？
                                    </div>
                                    <div class="article-brief">
                                        看完英文报道，我是有点无语的。这类事情，在外事、军事、情报领域，司空见惯，不信去翻翻丘吉尔的回忆录。有时候，所谓机密只是针对大众而言，在特定圈子里根本不算什么。讲真，分享isis情报给俄罗斯实在很难算上“通俄”。虽然俄罗斯和美国在叙利亚上利益… 
                                    </div>
                                    <div class="article-state">
                                        <a href="#" name="addcomment" class="">
                                            <i class="z-icon-comment"></i>
                                            845 条评论
                                        </a>
                                        <a href="#" name="readcounter" class="">
                                            <i class="z-icon-comment"></i>
                                            5623 次阅读
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>