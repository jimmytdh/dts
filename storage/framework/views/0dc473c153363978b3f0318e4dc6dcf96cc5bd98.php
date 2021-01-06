<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DOHRO7 DTS | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/bootstrap.min.css')); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/AdminLTE.min.css')); ?>">
    <link rel="icon" href="<?php echo e(asset('/img/favicon.png')); ?>">
    <script src="<?php echo e(asset('/assets/js/jquery.min.js')); ?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo e(asset('/assets/js/bootstrap.min.js')); ?>"></script>
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
    <?php if(Session::has('ok')): ?>
        <div class="row">
            <div class="alert alert-success text-center">
                <strong class="text-center"><?php echo e(Session::get('ok')); ?></strong>
            </div>
        </div>
    <?php endif; ?>
    <div class="login-box" style="margin:3% auto;">
        <div class="login-logo" style="margin-bottom: 10px;">
            <img src="<?php echo e(asset('/img/doh.png')); ?>" width="78px" />
            <img src="<?php echo e(asset('/img/logo-white.png')); ?>" width="80px" />
        </div>
        <div class="title">
            <font class="region">Talisa District Hospital</font><br>
            <font class="sub">Document Tracking System</font>
        </div>
      <form role="form" method="POST" action="<?php echo e(url('/login')); ?>">
          <?php echo e(csrf_field()); ?>

          <div class="login-box-body">
              <p class="login-box-msg">Sign in to start your session</p>
                <!--
                <div class="alert alert-success">For new user: your account is<br>
                    Username: (ID NUMBER)<br>
                    Password: 123
                </div>
                -->
              <div class="form-group has-feedback <?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                <input id="username" type="text" placeholder="Login ID" class="form-control" name="username" value="<?php echo e(old('username')); ?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <?php if($errors->has('username')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('username')); ?></strong>
                    </span>
                <?php endif; ?>
              </div>
              <div class="form-group has-feedback<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <?php if($errors->has('password')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                <?php endif; ?>
              </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="form-group">
                            <label style="cursor:pointer;">
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div><!-- /.col -->
                </div> 
            </div><!-- /.login-box-body -->
            
      </form>

    <?php if(session()->has('successFeedback')): ?>
        <div class="alert alert-success">
            <i class="fa fa-check"></i> <?php echo e(session()->get('successFeedback')); ?>

        </div>
    <?php else: ?>
        <hr>
        <form action="<?php echo e(asset('sendFeedback')); ?>" method="POST">
            <?php echo e(csrf_field()); ?>

            <div class="login-box-body">

                <textarea class="form-control" style="resize: none;" rows="3" name="feedback" required placeholder="If you encountered an error in document tracking system, please send us feedback and suggestion. Thank you!"></textarea><br>
                <button class="btn btn-success" type="submit">Send Feedback</button>
            </div>
        </form>
    <?php endif; ?>
    <?php /*<?php echo $__env->make('modal.announcement', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>*/ ?>
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    
    <!-- iCheck -->
  </body>
</html>
