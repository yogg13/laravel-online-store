<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | E-Shopper</title>
    <link href="{{ url('FrontEnd/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('FrontEnd/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('FrontEnd/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ url('FrontEnd/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ url('FrontEnd/css/animate.css') }}" rel="stylesheet">
    <link href="{{ url('FrontEnd/css/main.css') }}" rel="stylesheet">
    <link href="{{ url('FrontEnd/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{ url('FrontEnd/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ url('FrontEnd/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{ url('FrontEnd/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{ url('FrontEnd/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed"
        href="{{ url('FrontEnd/images/ico/apple-touch-icon-57-precomposed.png') }}">
</head><!--/head-->

<body>
    <header id="header"><!--header-->

        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-md-4 clearfix">
                        <div class="logo pull-left">
                            <a href="index.html"><img src="{{ url('FrontEnd/images/home/logo.png') }}"
                                    alt="logo" /></a>
                        </div>

                    </div>
                    <div class="col-md-8 clearfix">
                        <div class="shop-menu clearfix pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                <li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    </header><!--/header-->

    <section id="form" class="container"><!--form-->
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <form action="{{ url('/login') }}" method="POST">
                        @csrf
                        <input type="email" placeholder="Email Address" name="email" value="{{ old('email') }}" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="password" placeholder="Password" name="password" />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                        <div>
                            <strong>
                                Don't have an account? <a href="{{ url('/register') }}">click here</a>
                            </strong>
                        </div>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
        </div>
    </section><!--/form-->

    <footer id="footer"><!--Footer-->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2024 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank"
                                href="{{ url('http://www.themeum.com') }}">Themeum</a></span></p>
                </div>
            </div>
        </div>
    </footer><!--/Footer-->

    <script src="{{ url('FrontEnd/js/jquery.js') }}"></script>
    <script src="{{ url('FrontEnd/js/price-range.js') }}"></script>
    <script src="{{ url('FrontEnd/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ url('FrontEnd/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('FrontEnd/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ url('FrontEnd/js/main.js') }}"></script>
</body>

</html>
