@extends('admin.layout.master')
@section('content')
    <div class="container" style="font-size: 12px;">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link disabled" href="/admin/tag">标签列表</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/admin/tag/create">新增标签</a>
        </li>
    </ul>

        <form action="/admin/tag" method="post" class="form-horizontal" role="form">
            {{csrf_field()}}
            <div class="card">
                <div class="card-header">
                    标签管理
                </div>
                <div class="card-body" style="display: flex; flex-direction: row;">
                        <label for="" class="col-sm-2 control-label">标签名称</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tag_name">
                            {{--@if ($errors->has('tag_name'))--}}
                                {{--<span class="alert-danger">--}}
                                {{--<strong>{{ $errors->first('tag_name') }}</strong>--}}
                            {{--</span>--}}
                            {{--@endif--}}
                        </div>
                </div>
            </div>
            <br>
            <button class="btn btn-primary">保存标签</button>
        </form>
    </div>
@endsection