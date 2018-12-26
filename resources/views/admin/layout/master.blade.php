<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Django</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link href="/node_modules/hdjs/package/webuploader/jekyll/css/bootstrap.min.css" rel="stylesheet">
    <link href="/node_modules/hdjs/package/webuploader/jekyll/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/hdjs.css" rel="stylesheet">
    <script>
        hdjs = {
            'base': '/node_modules/hdjs',
            'filesLists': '/component/filesLists?',
            'uploader': '/component/uploader',
            'removeImage': '?s=component/upload/removeImage&m=member&siteid=18',
            'ossSign': '?s=component/oss/sign&m=member&siteid=18',
        };
    </script>
    <script src="/node_modules/hdjs/hdjs.js"></script>
    <script src="/node_modules/hdjs/require.js"></script>
    <script src="/node_modules/hdjs/config.js"></script>

    <script>
    require(['jquery'], function ($) {
       //为异步请求设置CSRF令牌
       $.ajaxSetup({
                headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
       });
    })
    </script>
    <style>
        .btn {
            font-size: 12px;
            line-height: 1.33;
        }
        .pagination {
            margin: 0;
            float: right;
        }
        .form-control {
            font-size: 12px;
            line-height: 1.33;
        }
    </style>

</head>
<body class="site">
<nav class="navbar navbar-expand-md navbar-dark admin-top bg-dark">
    <a class="navbar-brand" href="#">Django</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="'fa-w fa fa-comments-o"></i> 网站首页 <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="'fa-w fa fa-comments-o"></i> 视频单元
                </a>
            </li>

        </ul>
        <ul class="nav-item dropdown my-2 my-lg-0">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-w fa-user"></i>  {{Auth::guard('admin')->user()->username}} <span class="caret"></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
               <a class="dropdown-item" href="/admin/changePassword">账号</a>
                <a class="dropdown-item" href="/admin/logout">退出</a>
            </div>
        </ul>
    </div>
</nav>
<div class="admin_menu container-fluid">
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-lg-2 left-menu">
            <div class="search-menu col-xs-3">
                <input class="form-control input-lg" type="text" placeholder="快速查找"
                       onkeyup="search(this)">
            </div>
            <!--扩展模块动作 start-->
            <div class="card text-center" style="width: 10rem;">
                <!--系统菜单-->
                <div class="card-header">
                      系统管理    <i class="fa fa-chevron-circle-down"></i>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" id="#">
                        <a href="/admin/changePassword">我的资料 </a>
                    </li>
                </ul>
                <div class="card-header">
                     内容管理    <i class="fa fa-chevron-circle-down"></i>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" id="#">
                        <a href="/admin/tag">内容标签 </a>
                    </li>
                    <li class="list-group-item" id="#">
                        <a href="/admin/lesson">
                            视频管理 </a>
                    </li>
                </ul>
            </div>
            <br>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-10 ">
            @yield('content')
        </div>
    </div>
</div>
<div class="master-footer">
    <a href="https://github.com/paprikaLang" style="text-decoration: none; margin-right: 30px;">GITHUB</a>

    <a href="https://paprikalang.github.io">BLOG</a>
</div>
<script>
    require(['bootstrap']);
</script>
</body>
@include('admin.layout.errors')
@include('flash::message')
</html>
