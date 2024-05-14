<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout | E-Shopper</title>
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
    </header><!--/header-->

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div><!--/breadcrums-->


            <div class="review-payment">
                <h2>Review & Payment</h2>
            </div>

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="name_product">Name Product</td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td>Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($checkouts as $checkout)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="{{ asset('images/' . $checkout->image) }}"alt="image"
                                            width="110"></a>
                                </td>
                                <td class="cart_description">
                                    <h4>{{ $checkout->name_product }}</h4>
                                </td>
                                <td class="cart_price">
                                    <p class="cart_total_price">Rp.{{ $checkout->price }}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <p>{{ $checkout->quantity }}</p>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">
                                        {{ (int) $checkout->price * (int) $checkout->quantity }}
                                    </p>
                                </td>
                                <td class="cart_delete">
                                    <form action="{{ url('/checkout/' . $checkout->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class=" btn btn-danger" type="submit"><i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @php
                                $total = 0;
                                foreach ($checkouts as $checkout) {
                                    $total += (int) $checkout->price * (int) $checkout->quantity;
                                }
                            @endphp
                        @empty
                            <tr>
                                <td colspan="5">No Data</td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Cart Sub Total</td>
                                    @foreach ($checkouts as $checkout)
                                        <td>{{ (int) $checkout->quantity }} x Rp.{{ (int) $checkout->price }}</td>
                                    @endforeach
                                </tr>
                                <tr @style('background: #f7f7f7; border-radius: 20px;')>
                                    <td @style('font-weight: bold; font-size: 18px; ')>Total</td>
                                    <td><span>Rp.{{ $total }}</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{ url('/confirmation') }}">
                                            <button @style('background: #fe980f; color: #fff') class="btn"
                                                type="submit">Confirmation</button>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="payment-options">
            </div>
        </div>
    </section> <!--/#cart_items-->

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
