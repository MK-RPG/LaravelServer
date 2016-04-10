<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>eCommerce</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link href='https://fonts.googleapis.com/css?family=Walter+Turncoat' rel='stylesheet' type='text/css'>

        {{ HTML::style('css/normalize.css') }}
        {{ HTML::style('css/main.css') }}
        {{ HTML::script('js/vendor/modernizr-2.6.2.min.js') }}
    </head>
    <body>
        <div id="wrapper">
        <header>
            <section id="top-area">
            </section> <!--end top-area -->
            @yield('top-navigation')

            <div class="container_24">
                <div class="grid_24">
                    <div class="left_stripe"></div>
                    <div class="rigth_stripe"></div>
                    <nav class="navigate">
                        <div id="user-menu">
                            @if(Auth::check())
                                <nav class="dropdown">
                                    <ul>
                                        <li>
                                            <a href="#">{{ HTML::image('img/user-icon.gif', Auth::user()->firstname) }} {{ Auth::user()->firstname }} {{ HTML::image('img/down-arrow.gif', Auth::user()->firstname) }}</a>
                                            <ul>
                                                @if(Auth::user()->admin == 1)
                                                    <li>{{ HTML::link('admin/categories', 'Manage Categories') }}</li>
                                                    <li>{{ HTML::link('admin/products', 'Manage Products') }}</li>
                                                @endif
                                                <li>{{ HTML::link('users/signout', 'Sign Out') }}</li>

                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            @else
                                <nav id="signin" class="dropdown">
                                    <ul>
                                        <li>
                                            <a href="#">{{ HTML::image('img/user-icon.gif', 'Sign In') }} Sign In {{ HTML::image('img/down-arrow.gif', 'Sign In') }}
                                            </a>
                                            <ul>
                                                <li>{{ HTML::link('login', 'Sign In') }}</li>
                                                <li>{{ HTML::link('signup', 'Sign Up') }}</li>
                                            </ul>
                                        </li>

                                    </ul>
                                </nav>
                            @endif
                                <li class="li"><a href="#">Top Players</a></li>
                                <li>{{ HTML::link('store', 'Shop') }}</li>
                                <li class="li"><a href="#">Profile</a></li>
                        </div><!-- end user-menu -->

                        <div class="clear"></div>
                    </nav>
                </div>
            </div>
            <div class="clear"></div>
        </header>


            @yield('promo')

            @yield('search-keyword')

            <hr />

            <section id="main-content" class="clearfix">
                @if (Session::has('message'))
                    <p class="alert">{{ Session::get('message') }}</p>
                @endif

                @yield('content')
            </section><!-- end main-content -->

            <hr />

            @yield('pagination')

            <footer>
                <section id="contact">
                   <div id="connect">
                        <h4>CONNECT WITH US</h4>
                        <ul>
                            <li class="twitter"><a href="#">Twitter</a></li>
                            <li class="fb"><a href="#">Facebook</a></li>
                        </ul>
                    </div><!-- end connect -->
                </section><!-- end contact -->

                <hr />

                <section id="links">
                    <div id="my-account">
                        <h4>MY ACCOUNT</h4>
                        <ul>
                            <li>{{ HTML::link('users/signin', 'Sign In') }}</li>
                            <li>{{ HTML::link('users/newaccount', 'Sign Up') }}</li>
                            <li><a href="store/cart">Shopping Cart</a></li>
                        </ul>
                    </div><!-- end my-account -->
                    <div id="info">
                        <h4>INFORMATION</h4>
                        <ul>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div><!-- end info -->
                    <div id="extras">
                        <h4>EXTRAS</h4>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li>{{ HTML::link('store/contact', 'Contact Us') }}</li>
                        </ul>
                    </div><!-- end extras -->
                </section><!-- end links -->

                <hr />

                <section class="clearfix">
                    <div id="copyright">
                        <p id="store-desc">All Rights Reserved.</p>
                        <p id="store-copy">&copy; 2016 Game. Design.</p>
                    </div><!-- end copyright -->
                    <div id="connect">
                        <h4>CONNECT WITH US</h4>
                        <ul>
                            <li class="twitter"><a href="#">Twitter</a></li>
                            <li class="fb"><a href="#">Facebook</a></li>
                        </ul>
                    </div><!-- end connect -->
                    <div id="payments">
                        <h4>SUPPORTED PAYMENT METHODS</h4>
                        {{ HTML::image('img/payment-methods.gif', 'Supported Payment Methods') }}
                    </div><!-- end payments -->
                </section>
            </footer>
        </div><!-- end wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        {{ HTML::script('js/vendor/jquery-1.9.1.min.js') }}
        {{ HTML::script('js/plugins.js') }}
        {{ HTML::script('js/main.js') }}

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
