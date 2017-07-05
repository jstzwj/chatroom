@extends('main')


@section('css')


    <style type="text/css">
        body {
            padding-top: 160px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }
        
        .form-signin {
            max-width: 300px;
            padding: 19px 29px 29px;
            margin: 0 auto 20px;
            background-color: #fff;
            border: 1px solid #e5e5e5;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
            box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
        }
        
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin: 20px;
            text-align: center;
        }
        
        .form-signin input[type="text"],
        .form-signin input[type="password"] {
            font-size: 16px;
            height: auto;
            margin-bottom: 15px;
            padding: 7px 9px;
        }
        
        .form-signin .remember-checkbox {
            margin: 30px;
        }
        
        .form-signin .login-btn {
            margin-left: 90px;
        }
    </style>


@stop
    

@section('js')
<script>
        $(function() {
            $("[data-toggle='user_name_popover']").popover({
                trigger: 'manual'
            });
            $("[data-toggle='password_popover']").popover({
                trigger: 'manual'
            });
            //if('<?=isset($error)?$error:""?>'==''){
            //$('#loginAlert').hide();
            //}

        });

        function closeWarning(id) {
            $(id).hide();
        }

        function loginSubmitCheck() {
            var result = true;
            var name = document.getElementsByName("user_name");
            if (name[0].value == "") {
                $("[data-toggle='user_name_popover']").popover('show');
                result = false;
            }
            var pass = document.getElementsByName("user_pw");
            if (pass[0].value == "") {
                $("[data-toggle='password_popover']").popover('show');
                result = false;
            }
            return result;
        }

        function cancelWarning() {
            $("[data-toggle='user_name_popover']").popover('hide');
            $("[data-toggle='password_popover']").popover('hide');
        }
    </script>



@stop



@section('col')
<div class="container">

        <form class="form-signin" role="form" action="{{url('login_check')}}" method="post" onsubmit="return loginSubmitCheck()">
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>
            <h2 class="form-signin-heading">Sign in</h2>
            @if (isset($alert_flag)&& $alert_flag=== 1)
            <div id="loginAlert" class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert" onclick="closeWarning('#loginAlert');">&times;</a>
               用户名或密码错误
            </div>
            @elseif(isset($alert_flag)&& $alert_flag=== 2)
            <div id="loginAlert" class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert" onclick="closeWarning('#loginAlert');">&times;</a>
               注册成功，请登陆
            </div>
            @endif
            

            <p class="a">
                <input type="text" class="input-block-level form-control" data-container="body" data-toggle="user_name_popover" data-placement="right" data-content="请输入用户名" onclick="cancelWarning();" placeholder="username" name="user_name">
            </p>

            <p class="a">
                <input type="password" class="input-block-level form-control" data-container="body" data-toggle="password_popover" data-placement="right" data-content="请输入密码" onclick="cancelWarning();" placeholder="password" name="user_pw">
            </p>

            <input type="checkbox" value="1" id="checkbox_1" name="" />
            Keep me sign in
            <p></p>
            <button class="btn btn-default login-btn a" type="submit">Next</button>
        </form>

    </div>
    <!-- /container -->

@stop
