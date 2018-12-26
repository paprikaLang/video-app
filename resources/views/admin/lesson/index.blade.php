
@extends('admin.layout.master')
@section('content')
    <div class="container" style="font-size: 12px;">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="/admin/lesson">课程列表</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="/admin/lesson/create">新增课程</a>
        </li>
    </ul>
    <form action="" method="post" class="form-horizontal col-sm-12" role="form">
        <div class="card">
            <div class="card-header" style="margin-bottom: 12px;">
                课程列表
            </div>
            <div class="card-body">
                <table class="table table-hover " >
                    <thead>
                    <tr>
                        <th width="90">编号</th>
                        <th>课程名称</th>
                        <th>视频数量</th>
                        <th width="80">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lessons as $lesson)
                        <tr>
                            <td>{{$lesson['id']}}</td>
                            <td>{{$lesson['title']}}</td>
                            <td>{{$lesson->videos()->count()}}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="/admin/lesson/{{$lesson['id']}}/edit" class="btn btn-default">编辑</a>
                                    <a href="javascript:;" onclick="del({{$lesson['id']}})"
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
    </div>
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