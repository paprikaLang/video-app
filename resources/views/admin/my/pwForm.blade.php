@extends('admin.layout.master')
@section('content')
    <div class="container" style="font-size: 12px;">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <label class="label-success">我的资料</label>
            </li>
        </ul>
    <form action="/admin/changePassword" method="post" class="form-horizontal" role="form">
        {{csrf_field()}}
        <div class="card col-sm-5">
            <div class="card-header">
                修改密码
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">原密码</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="original_password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">新密码</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">确认密码</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="password_confirmation">
                    </div>
                </div>
            </div>
        </div>
        <br>
        {{--data-toggle="modal" data-target="#exampleModal"--}}
        <button class="btn btn-primary">保存修改</button>
    </form>
    </div>
@endsection