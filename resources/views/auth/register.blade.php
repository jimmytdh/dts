<?php
    $dup = array(
        'fname' => '',
        'mname' => '',
        'lname' => '',
    );
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CSMed DTS | Registration</title>
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

<div class="login-box" style="margin:3% auto;">
    <div class="login-logo" style="margin-bottom: 10px;">
        <img src="{{ asset('/img/doh.png') }}" width="78px" />
        <img src="{{ asset('/img/logo-white.png') }}" width="80px" />
    </div>
    <div class="title">
        <font class="region">Cebu South Medical Center</font><br>
        <font class="sub">Document Tracking System</font>
    </div>
    <form role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}
        @if(session('duplicate'))
            <?php $dup = session('duplicate'); ?>
            <div class="alert alert-warning text-center">
                <i class="fa fa-exclamation-trianglec"></i> <strong>{{ $dup['username'] }}</strong> is already taken! Please choose different username.
            </div>
        @endif

        @if(session('status')=='saved')
        <div class="alert alert-success text-center">
            <i class="fa fa-check-circle"></i> Your account has been successfully created! Please contact Administrator to activate your account. <br>Thank you :)
            <br>
            <div class="text-left">
                <a href="{{ url('/login') }}"><i class="fa fa-arrow-left"></i> Back</a>
            </div>

        </div>
        @else
        <div class="login-box-body">
            <p class="login-box-msg">Registration Form</p>
            <!--
            <div class="alert alert-success">For new user: your account is<br>
                Username: (ID NUMBER)<br>
                Password: 123
            </div>
            -->
            <div class="form-group">
                <input type="text" placeholder="First Name" class="form-control" name="fname" value="{{ $dup['fname'] }}" required>
            </div>
            <div class="form-group">
                <input type="text" placeholder="Middle Name" class="form-control" name="mname" value="{{ $dup['mname'] }}">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Last Name" class="form-control" name="lname" required value="{{ $dup['lname'] }}">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Username" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password" class="form-control" name="password" minlength="4" required>
            </div>
            <div class="form-group">
                <select name="designation" id="" class="form-control" required>
                    <option value="">Select Designation...</option>
                    @foreach($designation as $d)
                        <option value="{{ $d->id }}">{{ $d->description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="division" id="division" class="form-control" required>
                    <option value="">Select Division...</option>
                    @foreach($division as $d)
                        <option value="{{ $d->id }}">{{ $d->description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="section" id="section" class="form-control" required>
                    <option value="">Select Section...</option>
                </select>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-success btn-block btn-flat">Register</button>
                </div><!-- /.col -->
                <br>
                <br>
                <div class="col-xs-12">
                    Already have an account? <a href="{{ url('login') }}">Login here!</a>
                </div>

                <div class="clearfix"></div>
            </div>
        </div><!-- /.login-box-body -->
        @endif
    </form>
</div><!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script>
    $(document).ready(function(){
        $("body").on('change', '#division', function(){
            var division = $(this).val();
            filterSection(division);
        });

        function filterSection(id)
        {
            $.ajax({
                url: "{{ url('/register/sections/') }}/"+id,
                type: "GET",
                success: function(data){
                    $('#section').empty()
                        .append($('<option>', {
                            value: '',
                            text : 'Select Section...'
                        }));
                    $.each(data, function (i, item) {
                        $('#section').append($('<option>', {
                            value: item.id,
                            text : item.description
                        }));
                    });
                }
            });
        }
    });
</script>
<!-- iCheck -->
</body>
</html>
