@extends('commen.user')

@section('css')
<link href="{{asset('')}}fileinput/css/fileinput.css" rel="stylesheet">
<style>
    .tab-div{
        min-height:400px;
    }
</style>
<style>

.kv-avatar .file-input {
    display: table-cell;
    max-width: 220px;
}
</style>
@stop

@section('col')
            <div class="col-md-12">
                <div class="mb-block">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="tabcordion">
                                <ul class="nav nav-tabs">
                                    {{-- <li class="active"><a href="#" data-target="#dynamic">动态</a></li> --}}
                                    <li class="active"><a data-target="#article" href="#">文章</a></li>
                                    {{-- <li><a href="#">收藏</a></li> --}}
                                    <li><a data-target="#user_follow" href="#">他关注的人</a></li>
                                    <li><a data-target="#follow_user" href="#">关注他的人</a></li>
                                    <li><a data-target="#message" href="#">留言</a></li>
                                    <li><a data-target="#profile" href="#">个人信息</a></li>
                                </ul>

                                <div class="tab-content">

                                    <div id="article" class="active in tab-div">
                                        <ul class="list-group">
                                            @if(isset($blogs) && count($blogs) > 0)
                                                @foreach($blogs as $blog)
                                                <li class="list-item">
                                                    <div class="article-title">
                                                        <a href="{{url('blog')}}?id={{$blog->id}}">{{$blog->blog_title}}</a>
                                                    </div>
                                                    <div class="article-brief">
                                                        {!!$blog->blog_summary!!}
                                                    </div>
                                                </li>
                                                @endforeach
                                            @else
                                            <li class="list-item">
                                                <center>博主尚未发布任何文章</center>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>

                                    <div id="user_follow" class=" tab-div">
                                        <ul class="list-group">
                                            @if(isset($user_follow) && count($user_follow) > 0)
                                            @foreach($user_follow as $user)
                                            <li class="list-item"> 
                                                <div class="user">
                                                    <img src="{{$user->user_image_path}}" class="img-circle">&nbsp;
                                                    <span class="after-img-info">
                                                        <div class="user-name-sm">{{$user->user_name}}</div>
                                                        <div class="user-bio-sm">{{$user->user_desc}}</div>
                                                    </span>
                                                </div>
                                            </li>
                                            @endforeach
                                            @else
                                            <li class="list-item">
                                                <center>博主尚未关注任何人</center>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>

                                    <div id="follow_user" class=" tab-div">
                                        <ul class="list-group">
                                            @if(isset($follow_user) && count($follow_user) > 0)
                                            @foreach($follow_user as $user)
                                            <li class="list-item"> 
                                                <div class="user">
                                                    <img src="{{$user->user_image_path}}" class="img-circle">&nbsp;
                                                    <span class="after-img-info">
                                                        <div class="user-name-sm">{{$user->user_name}}</div>
                                                        <div class="user-bio-sm">{{$user->user_desc}}</div>
                                                    </span>
                                                </div>
                                            </li>
                                            @endforeach
                                            @else
                                            <li class="list-item">
                                                <center>尚未有任何人关注博主</center>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>

                                    <div id="message" class=" tab-div" style="max-height: 600px; overflow:auto;">
                                        <ul class="list-group">
                                            @if(isset($messages) && count($messages) > 0)
                                            @foreach($messages as $message)
                                            <li class="list-item"> 
                                                <div class="user">
                                                    <img src="{{$user->user_image_path}}" class="img-circle">&nbsp;
                                                    <span class="after-img-info">
                                                        <div class="user-name-sm">{{$user->user_name}}</div>
                                                        <div class="user-bio-sm">{{$user->user_desc}}</div>
                                                    </span>
                                                </div>
                                                <div>{{$message->message_content}}</div>
                                            </li>
                                            @endforeach
                                            @else
                                            <li class="list-item">
                                                <center>尚未有任何人给博主留言</center>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>

                                    <div id="profile" class=" tab-div" style="max-height: 600px;">
                                        <ul class="list-group">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <li class=""> 
                                                <form class="form-horizontal form-label-left">
                                                    <div class="form-group">
                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">用户名</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12" width="200px;">
                                                            <input id="avatar-1" name="avatar-1" type="file" class="file-loading">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">用户名</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input class="form-control col-md-7 col-xs-12" type="text" name="user_name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">密码</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input class="form-control col-md-7 col-xs-12" type="password" name="user_password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">邮箱</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input class="form-control col-md-7 col-xs-12" type="email" name="user_email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">手机</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input class="form-control col-md-7 col-xs-12" type="user_phone" name="user_phone">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">QQ</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input class="form-control col-md-7 col-xs-12" type="user_qq" name="user_qq">
                                                        </div>
                                                    </div>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
@stop

@section('js')

<script src="{{asset('')}}tabcordion/tabcordion.js"></script>
<script src="{{asset('')}}fileinput/js/fileinput.js"></script>
<script>
    $('.tabcordion').tabcordion();
</script>
<script>
$("#avatar-1").fileinput({
    overwriteInitial: true,
    maxFileSize: 1500,
    showClose: false,
    showCaption: false,
    showRemove: false,
    showUpload: false,
    showBrowse: false,
    browseOnZoneClick: true,
    defaultPreviewContent: '<img src="{{$user_info->user_image_path}}" alt="用户头像" style="width:160px">',
    allowedFileExtensions: ["jpg", "png", "gif"]
}).on("filebatchselected", function(event, files) {
            $(this).fileinput("upload");
        }).on("fileuploaded", function(event, data) {
          if(data.response)
          {
            location.reload(true);
          }
        });
</script>
@stop

