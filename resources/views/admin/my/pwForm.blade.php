@extends('admin.layout.master')
@section('content')
    <form action="/admin/changePassword" method="post" class="form-horizontal" role="form">
        {{csrf_field()}}
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">修改密码</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">原密码</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="original_password">
                        @if ($errors->has('original_password'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('original_password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">新密码</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="password">
                        @if ($errors->has('password'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">确认密码</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="password_confirmation">
                        @if ($errors->has('password_confirmation'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary">保存修改</button>
    </form>
@endsection