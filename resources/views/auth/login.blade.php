<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CSMed DTS | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/AdminLTE.min.css') }}">
    <link rel="icon" href="{{ asset('/img/favicon.png') }}">
    <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
      <style>
          .title {
              text-align: center;
              font-weight: 300;
              font-size: 25px;
              margin-bottom: 25px;
              line-height: 25px;
          }
          .sub {
              font-weight: 500;
              font-size: 20px;
          }
      </style>
  </head>
  <body class="hold-transition login-page">
    @if(Session::has('ok'))
        <div class="row">
            <div class="alert alert-success text-center">
                <strong class="text-center">{{ Session::get('ok') }}</strong>
            </div>
        </div>
    @endif
    <div class="login-box" style="margin:3% auto;">
        <div class="login-logo" style="margin-bottom: 10px;">
            <img src="{{ asset('/img/doh.png') }}" width="78px" />
            <img src="{{ asset('/img/logo-white.png') }}" width="80px" />
        </div>
        <div class="title">
            <font class="region">Cebu South Medical Center</font><br>
            <font class="sub">Document Tracking System</font>
        </div>
      <form role="form" method="POST" action="{{ url('/login') }}">
          {{ csrf_field() }}
          <div class="login-box-body">
              <p class="login-box-msg">Sign in to start your session</p>
                <!--
                <div class="alert alert-success">For new user: your account is<br>
                    Username: (ID NUMBER)<br>
                    Password: 123
                </div>
                -->
              <div class="form-group has-feedback {{ $errors->has('username') ? ' has-error' : '' }}">
                <input id="username" type="text" placeholder="Login ID" class="form-control" name="username" value="{{ old('username') }}">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div><!-- /.col -->
                    <br>
                    <br>
                    <div class="col-xs-12">
                        Don't have account? <a href="{{ url('register') }}">Register Now!</a>
                    </div>

                    <div class="clearfix"></div>
                </div> 
            </div><!-- /.login-box-body -->
            
      </form>

    @if(session()->has('successFeedback'))
        <div class="alert alert-success">
            <i class="fa fa-check"></i> {{ session()->get('successFeedback') }}
        </div>
    @else
        <hr>
        <form action="{{ asset('sendFeedback') }}" method="POST">
            {{ csrf_field() }}
            <div class="login-box-body">

                <textarea class="form-control" style="resize: none;" rows="3" name="feedback" required placeholder="If you encountered an error in document tracking system, please send us feedback and suggestion. Thank you!"></textarea><br>
                <button class="btn btn-success" type="submit">Send Feedback</button>
            </div>
        </form>
    @endif
    {{--@include('modal.announcement')--}}
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    
    <!-- iCheck -->
  </body>
</html>
