@extends('admin.layout.master')
@section('content')
    <form action="/admin/changePassword" method="post" class="form-horizontal" role="form" style="font-size: 12px;">
        {{csrf_field()}}
        <div class="card" style="width: 30rem;">
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
@endsection