<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS - Login</title>
    <!-- Vendor CSS -->
    <link href="{{ asset('public/dashboard') }}/vendors/animate-css/animate.min.css" rel="stylesheet">
    <!-- CSS -->
    <link href="{{ asset('public/dashboard') }}/css/app.min.css" rel="stylesheet">
</head>

<body class="login-content">
    <!-- Login -->
    <div class="lc-block toggled" id="l-login">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-person"></i></span>
                <div class="fg-line">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">
                    @error('email')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-accessibility"></i></span>
                <div class="fg-line">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required placeholder="Password"> @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="">
                    <i class="input-helper"></i>Keep me signed in
                </label>
            </div>
            <button type="submit" class="btn btn-login btn-danger btn-float">
                <i class="md md-arrow-forward"></i>
            </button>
        </form>
        <ul class="login-navigation">
            <li data-block="#l-register" class="bgm-red" style="display:none;">Register</li>
            <li data-block="#l-forget-password" class="bgm-orange">Forgot Password?</li>
        </ul>
    </div>

    <!-- Register -->
    <div class="lc-block" id="l-register">
        <form action="" method="">
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-person"></i></span>
                <div class="fg-line">
                    <input type="text" class="form-control" placeholder="Username">
                </div>
            </div>
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-person"></i></span>
                <div class="fg-line">
                    <input type="text" class="form-control" placeholder="Phone Number">
                </div>
            </div>
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-mail"></i></span>
                <div class="fg-line">
                    <input type="text" class="form-control" placeholder="Email Address">
                </div>
            </div>
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-accessibility"></i></span>
                <div class="fg-line">
                    <input type="password" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="">
                    <i class="input-helper"></i>
                    Accept the license agreement
                </label>
            </div>
            <a href="#" class="btn btn-login btn-danger btn-float"><i class="md md-arrow-forward"></i></a>
        </form>
        <ul class="login-navigation">
            <li data-block="#l-login" class="bgm-green">Login</li>
            <li data-block="#l-forget-password" class="bgm-orange">Forgot Password?</li>
        </ul>
    </div>

    <!-- Forgot Password -->
    <div class="lc-block" id="l-forget-password">
        <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu risus. Curabitur commodo
            lorem fringilla enim feugiat commodo sed ac lacus.</p>
        <form action="" method="">
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-email"></i></span>
                <div class="fg-line">
                    <input type="text" class="form-control" placeholder="Email Address">
                </div>
            </div>
            <a href="#" class="btn btn-login btn-danger btn-float"><i class="md md-arrow-forward"></i></a>
        </form>
        <ul class="login-navigation">
            <li data-block="#l-login" class="bgm-green">Login</li>
            <li data-block="#l-register" class="bgm-red" style="display:none;">Register</li>
        </ul>
    </div>
    <!-- Javascript Libraries -->
    <script src="{{ asset('public/dashboard') }}/js/jquery-2.1.1.min.js"></script>
    <script src="{{ asset('public/dashboard') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/dashboard') }}/vendors/waves/waves.min.js"></script>
    <script src="{{ asset('public/dashboard') }}/js/functions.js"></script>
</body>
</html>
