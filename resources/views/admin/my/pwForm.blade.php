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
                        @if ($errors->has('original_password'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('original_password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">新密码</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="password">
                        @if ($errors->has('password'))
                            <span class="alert-danger">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">确认密码</label>
                    <div class="col-sm-12">
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
        <br>
        <button class="btn btn-primary">保存修改</button>
    </form>
@endsection