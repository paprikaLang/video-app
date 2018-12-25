<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <title>Django</title>
  <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link href="/node_modules/hdjs/package/webuploader/jekyll/css/bootstrap.min.css" rel="stylesheet">
  <link href="/node_modules/hdjs/package/webuploader/jekyll/css/font-awesome.min.css" rel="stylesheet">
  <link href="/css/hdjs.css" rel="stylesheet">
</head>
<body class="hdcms-login">
<div class="container logo">
  <div style="background: url('https://paprika-dev.b0.upaiyun.com/4c9xUI0viGduVdZxiAHG7R5ZWPr6OiHXEbUSizX6.jpeg') no-repeat; background-size: contain;height: 60px;"></div>
</div>
<div class="container well">
  <div class="row">
    <div class="col-md-6">
      <form action="/admin/login"  method="post" role="form">
        {{ csrf_field() }}
        <div class="form-group ">
          <label>帐号</label>
          <div class="input-group">
            <div class="input-group-addon" style="margin: 5px 8px 0 0;"><i class="fa fa-w fa-user"></i> </div>
            <input type="text" name="username" class="form-control input-lg"
                   placeholder="请输入帐号" value="">
          </div>
        </div>
        <div class="form-group ">
          <label>密码</label>
          <div class="input-group">
            <div class="input-group-addon" style="margin: 5px 8px 0 0;"><i class="fa fa-w fa-key"></i> </div>
            <input type="password" name="password"
                   class="form-control input-lg" placeholder="请输入密码" value="">
          </div>
        </div>
        @if(session('error'))
          <div class="alert alert-danger">
            {{session('error')}}
          </div>
        @endif
        <button type="submit" class="btn btn-primary btn-lg">登录</button>
      </form>
      <br>
    </div>
    <div class="col-md-6">
      <div style="background: url('https://paprika-dev.b0.upaiyun.com/om3jkIT4nVK8WwYN8K9WyxEghHDk36WpEfgY8Ta3.jpeg') no-repeat;background-size:100%;height:230px;"></div>
    </div>
  </div>

</div>
</body>