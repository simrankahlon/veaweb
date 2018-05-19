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
        <style type="text/css">

            .row h1 {
                color: red;
                float: left;
                font-family: "Oswald",sans-serif;
                font-size: 20px;
                height: auto;
                margin-top: 0px !important;
                padding-top: 15px;
            }
        </style>
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="slide">  
                            <!--start slider-wrap -->   
                            <div id="slider-wrap">
                                <div class="flicker-example" data-block-text="false">
                                    <ul>
                                        <li data-background="{!!asset('front-theme/img/slide1.jpg') !!}"></li>
                                        <li data-background="{!!asset('front-theme/img/slide2.jpg') !!}"></li>
                                        <li data-background="{!!asset('front-theme/img/slide3.jpg') !!}"></li>
                                        <li data-background="{!!asset('front-theme/img/slide4.jpg') !!}"></li>
                                        <li data-background="{!!asset('front-theme/img/slide5.jpg') !!}"></li>
                                        <li data-background="{!!asset('front-theme/img/slide6.jpg') !!}"></li>			
                                    </ul>
                                </div>
                                <!--end slider-wrap -->  
                            </div>
                        </div>
                        <section>
                            <div class="bluestrip">
                                <div class="col-xs-6">
                                    <div class="col-md-3">
                                        <div class="download">
                                            <h1 class="whitetext "><a href="{!!asset('front-theme/pdf/prospectus.pdf') !!}" target="_blank"><img src="{!!asset('front-theme/images/pdf.jpg') !!}" width="56" height="42">Download Prospectus</a></h1>
                                        </div>    
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="nav2">
                                                <ul>
                                                    <li></li>
                                                    <li><a href="{!! URL::to('/helpinghand') !!}"><img src="{!!asset('front-theme/images/hand.png') !!}" width="68" height="66" >A HELPING HAND</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="col-xs-6">
                                <div class="col-md-5">
                                    <div class="row">
                                        <h1><span class="blue">WELCOME</span> &nbsp; TO VIKRAM’S ENGLISH ACADEMY</h1><br>
                                        <br>
                                        <br>
                                        <br>
                                        <p class="text3"><img src="{!!asset('front-theme/images/sir.jpg') !!}" width="225" height="260" class="rightimage">
                                            Vikram's English Academy is a melting pot of path breaking approaches towards teaching. These include Bloom's taxonomy, left-right brain coordinated thinking, Multiple Intelligence Theory of Howard Gardener and Experiential Learning to name a few. All these scientific approaches have proved to be the most effective globally to teach-learn. <br>
                                            <br>
                                            These have been assimilated and integrated into special modules for ICSE English curriculum which includes using music for learning grammar, dramatization techniques for English Drama etc. Also Lateral Thinking is taught and encouraged which goes a long way in enhancing the writing skills that would surely give them an edge in English language.<br>
                                            <br>
                                            <strong>Prof.Vikramjit Singh </strong><br>
                                        </p>
                                    </div>
                                    <div class="row">
                                        <div class="dotedline"></div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="row">
                                        <div class="col-box4 bodytext">
                                            <img src="{!!asset('front-theme/images/img1.jpg') !!}" width="214" height="170">
                                            <h2>OUR LOGO</h2>
                                            <p><br>
                                                An ink pot has always been a symbol of great writing. A feather in it symbolises the dipping  into the resource to produce sheer magic in literature. Also the feather displays our initials <strong>V E A</strong> if seen carefully.</p>   
                                            <p class="readmore">&nbsp;</p>                
                                        </div>
                                        <div class="col-box4 bodytext">
                                            <img src="{!!asset('front-theme/images/img2.jpg') !!}" width="214" height="170">
                                            <h2>MILESTONE</h2>
                                            <p><br>
                                                Students of Std X often need a reason to lift spirits and drooping shoulders. To ignite their young minds with the fire to excel in exams and life, 
                                                <br>

                                            <p class="readmore"><strong><a href="boosters.html"><br>
                                                        Read more</a></strong></p>   
                                        </div>
                                        <div class="col-box4 bodytext">
                                            <img src="{!!asset('front-theme/images/img3.jpg') !!}" width="214" height="170">
                                            <h2>ONLINE  TEST</h2>
                                            <p><br>
                                                An innovative program to help the children practice grammar online and immediately verify their answers <br>
                                                <br>
                                                <br>
                                            </p>
                                            <p class="readmore"><strong><a href="http://vikramsenglishacademy.com/index.php"><br>
                                                        EXPLORE</a></strong></p>            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mar-tb">
                                   @include('home.sidebar')
                                </div>
                            </div>
                        </section>
                        <article>
                            <div class=" col-xs-6">
                                @include('home.sidebarstudent')   
                            </div>
                        </article>

                    </div>
                </div>
            </section>
            <section>
               @include('home.footeraddress')
            </section>  
            <footer>
                <div class="col-xs-6">
                    <div class="col-md-3">
                        <p>© Copyright 2014 all rights reserved vikram's english academy |  <a href="#">Policy</a></p>
                    </div>
                    <div class="col-md-3">
                        <p id="textright"><a href="http://www.perfectionweb.in/" target="_blank">Site by Perfection web</a></p>
                    </div>
                </div>
            </footer>
        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
        <script src="{!! asset('front-theme/js/responsive-menu.js') !!}"></script> 
<!--        <script>
            $(document).ready(function ()
            {
            $('#menu-container').responsiveMenu();
            });
        </script>-->
      <!--slider-->
        <!--Required libraries-->
        <script src="{!! asset('front-theme/flicker/min/jquery-v1.10.2.min.js') !!}" type="text/javascript"></script>
        <script src="{!! asset('front-theme/flicker/min/modernizr-custom-v2.7.1.min.js') !!}" type="text/javascript"></script>
        <script src="{!! asset('front-theme/flicker/min/jquery-finger-v0.1.0.min.js') !!}" type="text/javascript"></script>

        <!--Include flickerplate-->
        <link href="{!! asset('front-theme/flicker/flickerplate.css') !!}"  type="text/css" rel="stylesheet">
        <script src="{!! asset('front-theme/flicker/min/flickerplate.min.js') !!}" type="text/javascript"></script>
        <script>
            $(document).ready(function(){

            $('.flicker-example').flicker({
				auto_flick: true,
				auto_flick_delay: 10,

			
			});
            });
        </script>



        <!-- jQuery -->
        <script type="text/javascript" src="{!!asset('front-theme/js/jquery-loader.js') !!}"></script>
        <!-- SmartMenus core CSS (required) -->
        <link href="{!!asset('front-theme/css/sm-core-css.css') !!}" rel="stylesheet" type="text/css" />

        <!-- "sm-blue" menu theme (optional, you can use your own CSS, too) -->
        <link  href="{!!asset('front-theme/css/sm-blue/sm-blue.css') !!}" rel="stylesheet" type="text/css" />

<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
        <script type="text/javascript" src="{!! asset('front-theme/js/jquery.easing.1.3.js') !!}"></script> 
        <!-- the jScrollPane script --> 
        <script type="text/javascript" src="{!! asset('front-theme/js/jquery.mousewheel.js') !!}"></script> 
        <script type="text/javascript" src="{!! asset('front-theme/js/jquery.contentcarousel.js') !!}"></script> 
        <script type="text/javascript">

            $('#ca-container').contentcarousel({
            // speed for the sliding animation
            sliderSpeed: 500,
                    // easing for the sliding animation
                    sliderEasing: 'easeOutExpo',
                    // speed for the item animation (open / close)
                    itemSpeed: 500,
                    // easing for the item animation (open / close)
                    itemEasing: 'easeOutExpo',
                    // number of items to scroll at a time
                    scroll: 3



            });
        </script>
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-36251023-1']);
            _gaq.push(['_setDomainName', 'jqueryscript.net']);
            _gaq.push(['_trackPageview']);
            (function () {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
            })();
        </script>      
<!--        <script src="{!! asset('front-theme/js/jquery.tooltip.js') !!}"></script> 
        <script>
            /* directions */
            $('.top').tooltip({align: 'top'});
            $('.right').tooltip({align: 'right'});
            $('.bottom').tooltip({align: 'bottom'});
            $('.left').tooltip({align: 'left'});
            $('.autotop').tooltip({align: 'autoTop'});
            $('.autoleft').tooltip({align: 'autoLeft'});
            /* effects */
            $('.fade').tooltip({
            // fade:true
            // or with custom options:
            fade: {
            duration: 200,
                    opacity: 0.8,
                    complete: function (hidden) {
                    alert(hidden ? 'hidden' : 'visible');
                    }
            }
            });
            /* attribute */
            $('.attr').tooltip({attr: 'id'});
            /* fallback */
            $('.fallback').tooltip({fallback: 'It was set to nothing!'});
            /* html */
            $('.html').tooltip({html: true});
            /* delay */
            // you can use `false` to disable it completely (default) or
            // `show` and `hide` separately for each.
            $('.delay').tooltip({delay: {show: 150, hide: 300}});
            /* trigger */
            var myTooltip = $('.trigger.show').tooltip({trigger: {}});
            $('.trigger').click(function () {
            myTooltip.trigger('tooltip:' + this.innerText);
            return false;
            });

        </script>-->
