<html>
    <head>
        <meta charset="utf-8">
        <title>聊天 - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
        <script src="jquery/jquery-3.1.1.min.js"></script>

        <!--
        <script src="http://cdn.bootcss.com/tether/1.3.7/js/tether.min.js"></script>
        -->
        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
         <!--
        <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/npm.js"></script>
        -->

        <!--jquery-ui-->
        <script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>    

        @if(isset($user_id))
        <!--上传-->
        <style>
        /*a  upload */
        .a-upload {
            padding: 4px 10px;
            height: 40px;
            margin:5px;
            line-height: 20px;
            position: relative;
            cursor: pointer;
            color: #888;
            background: #fafafa;
            border: 1px solid #ddd;
            border-radius: 4px;
            overflow: hidden;
            display: inline-block;
            *display: inline;
            *zoom: 1;
        }

        .a-upload  input {
            position: absolute;
            font-size: 100px;
            right: 0;
            top: 0;
            opacity: 0;
            filter: alpha(opacity=0);
            cursor: pointer
        }

        .a-upload:hover {
            color: #444;
            background: #eee;
            border-color: #ccc;
            text-decoration: none
        }
        .file {
            position: relative;
            display: inline-block;
            background: #D0EEFF;
            border: 1px solid #99D3F5;
            border-radius: 4px;
            padding: 4px 12px;
            overflow: hidden;
            color: #1E88C7;
            text-decoration: none;
            text-indent: 0;
            line-height: 10px;
            margin:5px;
        }
        .file input {
            position: absolute;
            font-size: 100px;
            right: 0;
            top: 0;
            opacity: 0;
        }
        .file:hover {
            background: #AADFFD;
            border-color: #78C3F3;
            color: #004974;
            text-decoration: none;
        }

        </style>

        <script>
            $(".a-upload").on("change","input[type='file']",function(){
                var filePath=$(this).val();
                if(filePath.indexOf("jpg")!=-1 || filePath.indexOf("png")!=-1){
                    $(".fileerrorTip").html("").hide();
                    var arr=filePath.split('\\');
                    var fileName=arr[arr.length-1];
                    $(".showFileName").html(fileName);
                }else{
                    $(".showFileName").html("");
                    $(".fileerrorTip").html("您未上传文件，或者您上传文件类型有误！").show();
                    return false 
                }
            })
        </script>
        @endif

        @section('css')
            
        @show

        @section('js')
            
        @show
    </head>
    <body>
            <nav class="navbar navbar-default navbar-fixed-top navbar" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/">FreeDrive</a>
                    </div>
                    @if(isset($user_id))
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                        <!--
                            <a href="{{url('avatar_storage')}}" class="file">选择头像
                               <input type="file" name="avatar" id="">
                            </a>
                        -->
                        </li>
                        <li><a href="{{url('exit')}}">退出</a></li>
                    </ul>
                    @else
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{url('login')}}">登陆</a></li>
                        <li><a href="{{url('register')}}">注册</a></li>
                    </ul>
                    @endif
                    
                </div>
            </nav>

        @section('col')
            
        @show
    </body>
</html>