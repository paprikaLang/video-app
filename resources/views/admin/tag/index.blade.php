
@extends('admin.layout.master')
@section('content')
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="/admin/tag">标签列表</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="/admin/tag/create">新增标签</a>
        </li>
    </ul>
    <form action="" method="post" class="form-horizontal col-sm-12" role="form">
        <div class="card">
            <div class="card-header" style="margin-bottom: 12px;">
               视频标签列表
            </div>
            <div class="card-body">
                <table class="table table-hover " >
                    <thead>
                    <tr>
                        <th width="90">编号</th>
                        <th>标签</th>
                        <th width="80">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag['id']}}</td>
                            <td>{{$tag['tag_name']}}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="/admin/tag/{{$tag['id']}}/edit" class="btn btn-default">编辑</a>
                                    <a href="javascript:;" onclick="del({{$tag['id']}})"
                                       class="btn btn-default">删除</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </form>
    <script>
        function del(id) {
            //XHR可查看异步调用接口的返回数据: 资源控制器 destroy 方法返回的值
            require(['hdjs','bootstrap'], function (hdjs) {
                hdjs.confirm('确定删除吗?', function () {
                    $.ajax({
                        url: '/admin/tag/' + id,
                        method: 'DELETE',
                        success: function (response) {
                            hdjs.message(response.message, 'refresh');
                        }
                    })
                })
            })
        }
    </script>
@endsection