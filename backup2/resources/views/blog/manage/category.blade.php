@extends('commen.blogmanage')

@section('css')

<link href="http://cdn.bootcss.com/wangeditor/2.1.20/css/wangEditor.css" rel="stylesheet">

@stop

@section('container')

        <div class="col-md-9 col-sm-7 col-xs-12">
            <div class="mb-block write">
                <div class="mb-block-content">
                    <table class="table">
                        <tr>
                            <th>名称</th>
                            <th>文章数目</th>
                            <th>描述</th>
                            <th width="20%">操作</th>
                        </tr>
                        @if(isset($categorys))
                        @foreach($categorys as $category)
                        <tr>
                            <td id="name_{{$category->id}}" class="black">{{$category->category_name}}</td>
                            <td id="count_{{$category->id}}">{{$category->blog_count}}</td>
                            <td id="desc_{{$category->id}}">{{$category->category_desc}}</td>
                            <td>
                                <a href="{{url('blog/manage/category/delete')}}?id={{$category->id}}" class="btn btn-danger btn-xs">删除</a>
                                <button class="btn btn-info btn-xs edit" value="{{$category->id}}">编辑</button>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                    <button id="add" class="btn btn-success">添加分类</button>
                </div>

            </div>
        </div>
<button id="modal-edit" class="btn hidden" data-toggle="modal" data-target="#myModal"></button>
<form class="form-horizontal form-label-left" action="{{url('blog/manage/category/edit')}}" method="post">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        编辑分类信息
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">分类名称</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" id="edit_name" name="category_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">分类描述</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control col-md-7 col-xs-12" id="edit_desc" name="category_desc"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="edit_id" value="" name="id"/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
</form>
<button id="modal-add" class="btn hidden" data-toggle="modal" data-target="#myModal2"></button>
<form class="form-horizontal form-label-left" action="{{url('blog/manage/category/add')}}" method="post">
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        添加分类
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">分类名称</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" name="category_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">分类描述</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control col-md-7 col-xs-12" name="category_desc"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">添加</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
</form>

@stop

@section('js')

<script>
    $(document).ready(function() {

        $('#add').click(function() {
            $('#modal-add').click();
        });

        $('.edit').click(function() {
            var id = $(this).val();
            $('#edit_name').val($('#name_'+id).text());
            $('#edit_desc').val($('#desc_'+id).text());
            $('#edit_id').val(id);
            $('#modal-edit').click();
        });
    });
</script>

@stop