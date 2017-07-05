@extends('commen.user')

@section('col')
            <div class="col-md-12">
                <div class="mb-block">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#">动态</a>
                                </li>
                                <li><a href="#">文章</a></li>
                                <li><a href="#">收藏</a></li>
                                <li><a href="#">他关注的人</a></li>
                                <li><a href="#">关注他的人</a></li>
                            </ul>
                            <ul class="list-group">
                                <li class="list-item">
                                    <div class="event-name">
                                        关注了你
                                    </div>
                                    <div class="user">
                                        <img src="{{asset('image')}}/default.jpg" class="img-circle">&nbsp;
                                        <span class="after-img-info">
                                            <div class="user-name-sm">黄文件</div>
                                            <div class="user-bio-sm">360首席科学家颜水成教授</div>
                                        </span>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="event-name">
                                        发表了新文章
                                    </div>
                                    <div class="user">
                                        <img src="{{asset('image')}}/default.jpg" class="img-circle">&nbsp;
                                        <span class="after-img-info">
                                            <div class="user-name-sm">黄文件</div>
                                            <div class="user-bio-sm">360首席科学家颜水成教授</div>
                                        </span>
                                    </div>
                                    <div>
                                        &nbsp;
                                    </div>
                                    <div class="article-title">
                                        TensorFlow实战
                                    </div>
                                    <div class="article-brief">
                                        这两天 GitHub 对其官网进行了改版，紧接着又发布了一年一度的开源报告，我们程序员比较关心之后的趋势是什么
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="event-name">
                                        评论了你的文章
                                    </div>
                                    <div class="user">
                                        <img src="{{asset('image')}}/default.jpg" class="img-circle">&nbsp;
                                        <span class="after-img-info">
                                            <div class="user-name-sm">黄文件</div>
                                            <div class="user-bio-sm">360首席科学家颜水成教授</div>
                                        </span>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="event-name">
                                        给你留言
                                    </div>
                                    <div class="user">
                                        <img src="{{asset('image')}}/default.jpg" class="img-circle">&nbsp;
                                        <span class="after-img-info">
                                            <div class="user-name-sm">黄文件</div>
                                            <div class="user-bio-sm">360首席科学家颜水成教授</div>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
@stop

