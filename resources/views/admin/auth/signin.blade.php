<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('admin/images/favicon.ico') }}">

    <title>Unique Admin - Log in </title>

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css') }}">

    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-extend.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/css/master_style.css') }}">

    <!-- Unique_Admin skins -->
    <link rel="stylesheet" href="{{ asset('admin/css/skins/_all-skins.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="hold-transition login-page">
<section class="h-p100">
    <div class="container h-p100">
        <div class="row h-p100 align-items-center justify-content-md-center">
            <div class="col-lg-4 col-md-8 col-12">
                <div class="box box-body rounded">
                    <h3 class="login-box-msg">Sign in</h3>
                    <form action="{{ route('signin') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                            <span class="ion ion-email form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <span class="ion ion-locked form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="checkbox text-center">
                                    <input type="checkbox" id="basic_checkbox_12" >
                                    <label for="basic_checkbox_12">Remember Me</label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btn-block mb-15">SIGN IN</button>
                            </div>
                            <!-- /.col -->
                            <div class="col-12 text-center">
                                <div class="fog-pwd">
                                    <a href="javascript:void(0)"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <div class="social-auth-links text-center text-white">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-rounded btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
                    <a href="#" class="btn btn-rounded btn-google"><i class="fa fa-google"></i> Google</a>
                </div>
                <!-- /.social-auth-links -->

                <div class="margin-top-30 text-center text-white">
                    <p>Don't have an account? <a href="register.html" class="text-info m-l-5">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- jQuery 3 -->
<script src="{{ asset('admin/assets/vendor_components/jquery/dist/jquery.min.js') }}"></script>

<!-- popper -->
<script src="{{ asset('admin/assets/vendor_components/popper/dist/popper.min.js') }}"></script>

<!-- Bootstrap 4.0-->
<script src="{{ asset('admin/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

</body>
</html>
