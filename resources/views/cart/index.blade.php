<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | E-Shopper</title>
    <link href="{{ url('FrontEnd/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/FrontEnd/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('/FrontEnd/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ url('FrontEnd/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ url('FrontEnd/css/animate.css') }}" rel="stylesheet">
    <link href="{{ url('FrontEnd/css/main.css') }}" rel="stylesheet">
    <link href="{{ url('FrontEnd/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{ url('/FrontEnd/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ url('/FrontEnd/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{ url('FrontEnd/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{ url('/FrontEnd/images/ico/apple-touch-icon-72-precomposed.png') }}">
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
                            <a href="index.html"><img src="{{ url('/FrontEnd/images/home/logo.png') }}"
                                    alt="" /></a>
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

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="name_product">Name Product</td>
                            <td class="quantity">Quantity</td>
                            <td class="price">Price</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($carts as $cart)
                            <tr>
                                <td class="cart_product">
                                    <img src="{{ asset('images/' . $cart->image) }}" alt="" width="110">
                                </td>
                                <td class="cart_description">
                                    <h4>{{ $cart->name_product }}</h4>
                                </td>
                                <td class="cart_price">
                                    <p>{{ $cart->quantity }}</p>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">Rp.{{ $cart->price }}</p>
                                </td>
                                <form action="{{ url('/carts/' . $cart->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <td class="cart_delete">
                                        <button class=" btn btn-danger" type="submit"><i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </form>
                            </tr>
                            @php
                                $price = 0;
                                foreach ($carts as $cart) {
                                    $price += (int) $cart->price * (int) $cart->quantity;
                                }
                            @endphp
                        @empty
                            <tr>
                                <td colspan="5">No Data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                </div>
                <form action="{{ url('/checkout') }}" method="POST">
                    @csrf
                    <div class="col-sm-6">
                        <div class="total_area">
                            @foreach ($carts as $cart)
                                <p @style('margin-inline:40px 10px')>Sub Total
                                    <span> {{ $cart->quantity }} X Rp.{{ $cart->price }}</span>
                                </p>
                            @endforeach
                            <ul>
                                <input type="hidden" name="data_checkout" value="{{ $carts }}">
                                <li>Total <span>Rp.{{ $price }}</span></li>
                            </ul>
                            <button class="btn btn-default check_out" type="submit">
                                Check Out
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section><!--/#do_action-->

    <footer id="footer"><!--Footer-->

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank"
                                href="{{ url('http://www.themeum.com') }}">Themeum</a></span></p>
                </div>
            </div>
        </div>

    </footer><!--/Footer-->

    <script src="{{ url('FrontEnd/js/jquery.js') }}"></script>
    <script src="{{ url('FrontEnd/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('FrontEnd/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ url('FrontEnd/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ url('FrontEnd/js/main.js') }}"></script>
</body>

</html>
