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