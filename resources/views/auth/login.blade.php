<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - srtdash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/login/images/icon/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('admin/login/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/login/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/login/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/login/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/login/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/login/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/login/css/responsive.css') }}">

</head>

<body>
    <!-- login area start -->
    <div class="login-area login-bg">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="login-form-head">
                        <h4>Login</h4>
                        <p>Silahkan login dengan akun yang benar</p>
                    </div>
                    <div class="login-form-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="form-gp">
                            <label for="usernameInput">Username</label>
                            <input type="name" id="usernameInput" name="username" value="{{ old('username') }}">
                            <i class="ti-user"></i>
                            @error('username')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="exampleInputPassword1" name="password">
                            <i class="ti-lock"></i>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4 rmber-area">
                            <div class="text-right">
                                <a href="#">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->
    <script src="{{ asset('admin/login/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('admin/login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/login/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/login/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin/login/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('admin/login/js/scripts.js') }}"></script>

</body>

</html>
