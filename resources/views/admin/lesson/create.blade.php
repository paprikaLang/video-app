@extends('admin.layout.master')
@section('content')
    <div class="container" style="font-size: 12px;">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link disabled" href="/admin/lesson">课程列表</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/admin/lesson/create">课程标签</a>
        </li>
    </ul>

    <form action="/admin/lesson" method="post" class="form-horizontal" role="form">
        {{csrf_field()}}
        <div class="card">
            <div class="card-header">
                课程管理
            </div>
            <ul class="list-group list-group-flush">
               <li class="list-group-item" style="display: flex; flex-direction: row;">
                   <label for="" class="col-sm-2 control-label">课程名称</label>
                   <div class="col-sm-6">
                       <input type="text" class="form-control" name="title" required="required">
                   </div>
               </li>
                <li class="list-group-item" style="display: flex; flex-direction: row;">
                    <label for="" class="col-sm-2 control-label">课程简介</label>
                    <div class="col-sm-10">
                        <textarea name="desc" class="form-control" rows="1"></textarea>
                    </div>
                </li>
                <li class="list-group-item" style="display: flex; flex-direction: row;">
                    <label for="" class="col-sm-2 control-label">预览图</label>
                    <div class="col-sm-8">
                        <div class="input-group mb-1">
                            <input class="form-control  form-control-sm" name="preview" readonly="" value="/images/noll.jpg">
                            <div class="input-group-append">
                                <button onclick="upImagePc(this)" class="btn btn-secondary" type="button">单图上传</button>
                            </div>
                        </div>
                        <div style="display: inline-block;position: relative;">
                            <img src="{{ asset('/images/noll.jpg') }}" class="img-responsive img-thumbnail" width="150">
                            <em class="close" style="position: absolute;top: 3px;right: 8px;" title="删除这张图片"
                                onclick="removeImg(this)">×</em>
                        </div>
                    </div>
                    <script>
                        require(['hdjs','bootstrap']);
                        //上传图片
                        function upImagePc() {
                            require(['hdjs'], function (hdjs) {
                                var options = {
                                    multiple: false,//是否允许多图上传

                                };
                                hdjs.image(function (images) {
                                    //上传成功的图片，数组类型
                                    $("[name='preview']").val(images[0]);
                                    $(".img-thumbnail").attr('src', images[0]);
                                }, options)
                            });
                        }
                        //移除图片
                        function removeImg(obj) {
                            $(obj).prev('img').attr('src', '../dist/static/image/nopic.jpg');
                            $(obj).parent().prev().find('input').val('');
                        }
                    </script>
                </li>
                <li class="list-group-item" style="display: flex; flex-direction: row;">
                    <label for="" class="col-sm-2 control-label">推荐</label>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <input type="radio" name="iscommend" value="1"> 是
                        </label>
                        <label>    </label>
                        <label class="radio-inline">
                            <input type="radio" name="iscommend" value="0" checked> 否
                        </label>
                    </div>
                </li>
                <li class="list-group-item" style="display: flex; flex-direction: row;">
                    <label for="" class="col-sm-2 control-label">热门</label>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <input type="radio" name="ishot" value="1"> 是
                        </label>
                        <label>    </label>
                        <label class="radio-inline">
                            <input type="radio" name="ishot" value="0" checked> 否
                        </label>
                    </div>
                </li>
                <li class="list-group-item" style="display: flex; flex-direction: row;">
                    <label for="" class="col-sm-2 control-label">点击数</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="title" required="required" value="0">
                    </div>
                </li>
            </ul>
        </div>
        <br>
        <div class="card" id="videoapp">
            <div class="card-header">
                视频管理
            </div>
            <div class="card-body">
                <div class="card" v-for="(v, k) in videos" style="margin-bottom: 10px;">
                    <div class="card-body">
                        <div  style="display: flex; flex-direction: row;">
                            <label for="" class="col-sm-2 control-label">视频名称</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="title" v-model="v.title">
                            </div>
                        </div>
                        <br>
                        <div  style="display: flex; flex-direction: row;">
                            <label for="" class="col-sm-2 control-label">视频地址</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="title" v-model="v.path">
                            </div>
                        </div>
                        </div>
                    <div class="card-footer">
                        <button class="btn-success" @click.prevent="del(k)">删除视频</button>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary" @click.prevent="add">添加视频</button>
            </div>
            <textarea name="" cols="30" rows="8" hidden>@{{ videos }}</textarea>
        </div>
        <br>
        <button class="btn btn-primary">保存课程</button>
    </form>
    </div>
    <script>
        require(['vue'], function(Vue) {
            new Vue({
                el: '#videoapp',
                data:{
                    videos: [{title: '', path: ''}],
                },
                methods: {
                    add: function () {
                        this.videos.push({title: '', path: ''});
                    },
                    del: function (k) {
                        this.videos.splice(k, 1);
                    }
                }
            })
        })
    </script>

@endsection