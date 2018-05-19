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
            <div class="wrap">
                <header>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="logo"><a href=""><img src="{!!asset('front-theme/images/logo2.png') !!}" width="860" height="110" alt="Logo" title="Vikram's English Academy"></a></div></div>                        
                        </div>
                </header>
                <div class="clear"></div>
                <div class="navbg">
                    <div class="col-xs-6">
                        <div id="menu-container">
                            <ul class="menu">                         
<!--                                <li @if('index' === $title): class="active" @endif><a href="{!! URL::to('/') !!}">HOME</a></li>-->
                                <li @if('lesson' === $title): class="active" @endif><a href="{!! URL::to('/lesson') !!}">PREPOSITIONS EXERCISE</a></li>
                                <li @if('Tense' === $title): class="active" @endif><a href="{!! URL::to('/tense') !!}">TENSES EXERCISE</a></li>
                                <li @if('word' === $title): class="active" @endif><a href="{!! URL::to('/student/word') !!}">DOWNLOADABLE WORD FILES</a></li>
                                <li @if('essay' === $title): class="active" @endif><a href="{!! URL::to('/students/essay') !!}">ESSAYS</a></li>
                                <li @if('logout' === $title): class="active" @endif><a href="{!! URL::to('/student/logout') !!}">LOGOUT</a></li>
                            </ul>
                            <a href="#" class="trigger">Menu</a> </div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="container-fluid"> @yield('bodycontent')</div>
                <footer>
                    <div class="col-xs-6">
                        <div class="col-md-3">
                            <p>© Copyright 2017 all rights reserved vikram's english academy |  <a href="#">Policy</a></p>
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
                swfobject.registerObject("FlashID2");
                swfobject.registerObject("FlashID");
            </script>
    </body>
</html>