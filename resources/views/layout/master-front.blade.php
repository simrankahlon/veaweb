<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link href="{!! asset('front-theme/css/style.css') !!}" rel="stylesheet" type="text/css">
        <link href="{!! asset('front-theme/css/responsive.css') !!}" rel="stylesheet" type="text/css">
        <link href="{!! asset('front-theme/css/mystyle.css') !!}" rel="stylesheet" type="text/css" />
        <script src="{!! asset('front-theme/js/jquery-5.js') !!}" type="text/javascript"></script>
        <script type="text/javascript" src="{!!asset('front-theme/js/drop.js') !!}"></script>
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <title>.::: Vikrams English Academy :::.</title>
        @yield('styles')
    </head>

    <body>
        <div class="wrap">
            <header>
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="logo"><a href=""><img src="{!! asset('front-theme/images/logo2.png') !!}" width="860" height="110" alt="Logo" title="Vikram's English Academy"></a></div></div>
                        <div class="col-md-1">
                            <div class="social">
                                <ul>
                                    <li><a href="{!! URL::to('/studentlogin') !!}">STUDENT LOGIN</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="tnav">
                                <ul>
                                    <li @if('jobs' === $title): class="active" @endif><a href="{!! URL::to('/') !!}">Home</a></li>
                                    <li @if('aboutsir' === $title): class="active" @endif><a href="{!! URL::to('/aboutsir') !!}">About Vikramjit Sir</a></li>
                                    <li @if('contact' === $title): class="active" @endif><a href="{!! URL::to('/contact') !!}">Contact Us</a></li>
                                    <li @if('sitemap' === $title): class="active" @endif><a href="{!! URL::to('/sitemap') !!}">Sitemap</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="clear"></div>
            <div class="navbg">
                <div class="col-xs-6">
                    <div id="menu-container">
                        <ul class="menu">
                            <li @if('index' === $title): class="active" @endif><a href="{!! URL::to('/') !!}">HOME</a></li>
                            <li @if('event' === $title): class="active" @endif><a href="{!! URL::to('/event') !!}">Event</a></li>
                            <li @if('testimonials' === $title): class="active" @endif><a href="{!! URL::to('/testimonials') !!}">Testimonials</a></li>
                            <li @if('contact' === $title): class="active" @endif><a href="{!! URL::to('/contact') !!}">Contact</a></li>
                            <li @if('download' === $title): class="active" @endif><a href="{!! URL::to('/download') !!}">Download</a></li>
                            <li @if('booster' === $title): class="active" @endif><a href="{!! URL::to('/boosters') !!}">Boosters</a></li>
                            <li @if('results' === $title): class="active" @endif><a href="{!! URL::to('/results') !!}">Results</a></li>
                        </ul>
                        <a href="#" class="trigger">Menu</a> </div>
                </div>
            </div>
            <div class="clear"></div><section></section>
            <section>
                <div class="container-fluid">@yield('bodycontent')</div>
            </section>
              <section>
        <div class="col-xs-6">
            <div class="col-md-4 footerimg"><img src="{!!asset('front-theme/images/footerlogo.jpg') !!}" width="543" height="50"></div>
            <div class="col-sm-3">
                <p>A2/201, Kailash Commercial Complex, Above Jolly Studio, <br>
                    Opp Dreams Mall, 
                    LBS Marg, Bhandup West

                    .<br>
                    305, 
                    Jay Commercial Plaza, 
                    MG. Road, Mulund (W), <br>
                    Mumbai 400 080.</p>
            </div>
            <div class="col-sm-1"><img src="{!!asset('front-theme/images/phone.jpg') !!}" width="18" height="18">: 9769246667
                <br>
                <img src="{!!asset('front-theme/images/phone.jpg') !!}" width="18" height="18">: 022-25602727, 9833602727</div>

        </div>
    </section>  
            <footer>
                <div class="col-xs-6">
                    <div class="col-md-3">
                        <p>© Copyright 2018 all rights reserved vikram's english academy |  <a href="#">Policy</a></p>
                    </div>
                    <div class="col-md-3">
                        <p id="textright"><a href="http://www.perfectionweb.in/" target="_blank">Site by Perfection web</a></p>
                    </div>
                </div>
            </footer>
        </div>
        <!--end wrap -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
        <script src="{!!asset('front-theme/js/responsive-menu.js') !!}"></script> 
        <script>
            $(document).ready(function ()
            {
            $('#menu-container').responsiveMenu();
            });
        </script>
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-36251023-1']);
            _gaq.push(['_setDomainName', 'jqueryscript.net']);
            _gaq.push(['_trackPageview']);
            (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
            })();
         //   swfobject.registerObject("FlashID2");
          //  swfobject.registerObject("FlashID");
        </script>
