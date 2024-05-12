<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('administrator/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('administrator/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('administrator/dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('administrator/dist/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('administrator/dist/css/font-awesome.css') }}">

</head>

<body>
    <div>
        <!--header-->
        <div class="header-w3l">
            <h1>Glassy Login Form</h1>
        </div>
        <!--//header-->
        <!--main-->
        <div class="main-w3layouts-agileinfo">
            <!--form-stars-here-->
            <div class="wthree-form">
                <h2>Fill out the form below to login</h2>
                <form action="{{ route('auth.store') }}" method="POST">
                    @csrf
                    @error('email')
                        <p class="error">
                            * {{ $message }}
                        </p>
                    @enderror

                    <div class="form-sub-w3">
                        <input type="text" placeholder="Username " name="email" value="{{ old('email') }}" />
                        <div class="icon-w3">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                    </div>

                    @error('password')
                        <p class="error">
                            * {{ $message }}
                        </p>
                    @enderror

                    <div class="form-sub-w3">
                        <input type="password"placeholder="Password" name="password" value="{{ old('password') }}" />
                        <div class="icon-w3">
                            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        </div>
                    </div>


                    <div class="submit-agileits">
                        <input type="submit" value="Login">
                    </div>

                </form>

            </div>
            <!--//form-ends-here-->

        </div>
        <!--//main-->
        <!--footer-->
        <div class="footer">
            <p>&copy; 2017 Glassy Login Form. All rights reserved | Design by <a
                    href="http://w3layouts.com">W3layouts</a></p>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('administrator/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('administrator/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('administrator/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
