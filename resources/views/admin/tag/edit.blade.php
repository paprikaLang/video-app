@extends('admin.layout.master')
@section('content')
    <div class="container" style="font-size: 12px;">
    <form action="/admin/tag/{{$tag['id']}}" method="post" class="form-horizontal" role="form">
        {{csrf_field()}}
        {{--{{ method_field('PUT') }} 伪造表单方法--}}
        {{ method_field('PUT') }}
        <div class="card">
            <div class="card-header">
                修改标签
            </div>
            <div class="card-body" style="display: flex; flex-direction: row;">
                <label for="" class="col-sm-2 control-label">标签名称</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="tag_name" required="required" value="{{$tag['tag_name']}}">
                    @if ($errors->has('tag_name'))
                        <span class="alert-danger">
                                <strong>{{ $errors->first('tag_name') }}</strong>
                            </span>
                    @endif
                </div>
            </div>
        </div>
        <br>
        <button class="btn btn-primary">保存标签</button>
    </form>
    </div>
@endsection