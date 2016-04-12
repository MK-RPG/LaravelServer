<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>eCommerce</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link href='https://fonts.googleapis.com/css?family=Limelight' rel='stylesheet' type='text/css'>

        {{ HTML::style('css/normalize.css') }}
        {{ HTML::style('css/main.css') }}
        @yield('bootstrap')
        {{ HTML::script('js/vendor/modernizr-2.6.2.min.js') }}
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    </head>
    <body>
        <div id="wrapper">
        <header>
            <section>
            <a href="/"><div id="top-area">
            </div> </a>
            </section> <!--end top-area -->
            @yield('top-navigation')

            <div class="container_24">
                <div class="grid_24">
                    <nav class="navigate">
                        <div id="user-menu">
                            @if(Auth::check())
                                <nav class="dropdown">
                                
                                    <ul>
                                        <li id="login">
                                            <a href="#" id="login-trigger">{{ HTML::image('img/signin.png', Auth::user()->firstname) }} {{ Auth::user()->firstname }} {{ HTML::image('img/down-arrow.png', Auth::user()->firstname) }}</a>
                                            <ul id="login-content" style="display:none;">
                                                @if(Auth::user()->admin == 1)
                                                    <li>{{ HTML::link('admin/categories', 'Categories') }}</li>
                                                    <li>{{ HTML::link('admin/products', 'Products') }}</li>
                                                @endif
                                                <li>{{ HTML::link('users/signout', 'Sign Out') }}</li>

                                            </ul>
                                        </li>
                                    </ul>
                                    
                                </nav>
                            @else
                                <nav>
                                    <ul>
                                        <li id="signin">
                                            <a href="#"  id="signin-trigger"><img src="img/signin.png">Sign In<img src="img/down-arrow.png">
                                            </a>
                                            <ul id="signin-content"style="display:none;">
                                                <li>{{ HTML::link('login', 'Sign In') }}</li>
                                                <li>{{ HTML::link('signup', 'Sign Up') }}</li>
                                            </ul>
                                        </li>

                                    </ul>
                                </nav>
                            @endif
                                <li class="li"><a href="/ranking"><img src="/img/top.png">Top Players</a></li>
                                <li><a href="#"><img src="/img/shop.png">{{ HTML::link('store', 'Shop') }}</a></li>
                                <li class="li"><a href="/game"><img src="/img/play.png">Play</a></li>
                        </div><!-- end user-menu -->

                        <div class="clear"></div>
                    </nav>
                </div>
            </div>
            <div class="clear"></div>
        </header>


            @yield('promo')

            @yield('search-keyword')

            <section id="main-content" class="clearfix">
                @if (Session::has('message'))
                    <p class="alert">{{ Session::get('message') }}</p>
                @endif

                @yield('content')
            </section><!-- end main-content -->

            <hr/>

            @yield('pagination')

            <footer>
                <section id="contact">
                   <div id="connect">
                        <h4>CONNECT WITH US</h4>
                        <ul>
                            <a href="#"><li class="fb"></li></a>
                        </ul>
                    </div><!-- end connect -->
                </section><!-- end contact -->

                

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
                        <p id="store-desc" style="color: black">All Rights Reserved.</p>
                        <p id="store-copy">&copy; 2016 TheMazeRunnerGame.</p>
                    </div><!-- end copyright -->
                
                    <div id="payments">
                        <h4>SUPPORTED PAYMENT METHODS</h4>
                        {{ HTML::image('img/payment-methods.gif', 'Supported Payment Methods') }}
                    </div><!-- end payments -->
                </section>
            </footer>
        </div><!-- end wrapper -->

        {{ HTML::script('js/vendor/jquery-1.9.1.min.js') }}
        {{ HTML::script('js/plugins.js') }}
        {{ HTML::script('js/main.js') }}

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));

            $(document).ready(function(){
    $('#login-trigger').click(function() {
        $(this).next('#login-content').slideToggle();
        $(this).toggleClass('active');                    
        
        if ($(this).hasClass('active')) $(this).find('a').html('&#x25B2;')
            else $(this).find('a').html('&#x25BC;')
        })
});

            $(document).ready(function(){
    $('#signin-trigger').click(function() {
        $(this).next('#signin-content').slideToggle();
        $(this).toggleClass('active');                    
        
        if ($(this).hasClass('active')) $(this).find('a').html('&#x25B2;')
            else $(this).find('a').html('&#x25BC;')
        })
});
        </script>
    </body>
</html>
