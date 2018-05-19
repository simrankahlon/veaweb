<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Vikramsenglishacademy | @yield('title')</title>
        <meta name="description" content="">
        <link rel="apple-touch-icon" sizes="57x57" href="{!!asset('custom-theme/favicon/apple-icon-57x57.png') !!}">
        <link rel="apple-touch-icon" sizes="60x60" href="{!!asset('custom-theme/favicon/apple-icon-60x60.png') !!}">
        <link rel="apple-touch-icon" sizes="72x72" href="{!!asset('custom-theme/favicon/apple-icon-72x72.png') !!}">
        <link rel="apple-touch-icon" sizes="76x76" href="{!!asset('custom-theme/favicon/apple-icon-76x76.png') !!}">
        <link rel="apple-touch-icon" sizes="114x114" href="{!!asset('custom-theme/favicon/apple-icon-114x114.png') !!}">
        <link rel="apple-touch-icon" sizes="120x120" href="{!!asset('custom-theme/favicon/apple-icon-120x120.png') !!}">
        <link rel="apple-touch-icon" sizes="144x144" href="{!!asset('custom-theme/favicon/apple-icon-144x144.png') !!}">
        <link rel="apple-touch-icon" sizes="152x152" href="{!!asset('custom-theme/favicon/apple-icon-152x152.png') !!}">
        <link rel="apple-touch-icon" sizes="180x180" href="{!!asset('custom-theme/favicon/apple-icon-180x180.png') !!}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{!!asset('custom-theme/favicon/android-icon-192x192.png') !!}">
        <link rel="icon" type="image/png" sizes="32x32" href="{!!asset('custom-theme/favicon/favicon-32x32.png') !!}">
        <link rel="icon" type="image/png" sizes="96x96" href="{!!asset('custom-theme/favicon/favicon-96x96.png') !!}">
        <link rel="icon" type="image/png" sizes="16x16" href="{!!asset('custom-theme/favicon/favicon-16x16.png') !!}">
        <link rel="manifest" href="{!!asset('custom-theme/favicon/manifest.json') !!}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{!!asset('custom-theme/favicon/ms-icon-144x144.png') !!}">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="{!!asset('custom-theme/css/bootstrap.min.css') !!}">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="{!!asset('custom-theme/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') !!}"></script>
        <link rel="stylesheet" href="{!!asset('custom-theme/css/jquery-ui.min.css') !!}">
        <link rel="stylesheet" href="{!!asset('custom-theme/css/jquery-ui.theme.min.css') !!}">
        <link rel="stylesheet" href="{!!asset('custom-theme/css/main.css') !!}">
        @yield('styles')
    </head>
    <body>
        <nav id='header' role="navigation" class="navbar navbar-airvac navbar-fixed-top">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#">
                                    <img alt="Airvac Services" width="450s" src="{!!asset('custom-theme/img/logo.png') !!}">
                                </a>
                            </div>
                            <div class="collapse navbar-collapse" id="navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li @if('index' === $title): class="active" @endif><a href="{!! URL::to('/dashboard') !!}">Home</a></li>                                    
                                    <li @if('lesson' === $title): class="active" @endif><a href="{!! URL::to('/content') !!}">Content</a></li>
                                    <li @if('tenses' === $title): class="active" @endif><a href="{!! URL::to('/tenses') !!}">Tenses</a></li>
                                    <li @if('word' === $title): class="active" @endif><a href="{!! URL::to('/word') !!}">Word</a></li>
                                    <li @if('essay' === $title): class="active" @endif><a href="{!! URL::to('/essay') !!}">Essay</a></li>                                 
                                    <li @if('school' === $title): class="active" @endif><a href="{!! URL::to('/school') !!}">School</a></li>   
									<li @if('student' === $title): class="active" @endif><a href="{!! URL::to('/studentpass') !!}">Student</a></li>   									
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="caret"></span></a>
                                        <ul class="dropdown-menu">                                            
                                            <li><a href="{!! URL::to('/change-password') !!}"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Change Password</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="{!! URL::to('/logout') !!}"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Sign out</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            @yield('bodycontent')
        </div>
        <footer>
            <p>© Copyright 2017 all rights reserved vikram's english academy</p>
        </footer>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="{!!asset("custom-theme/js/vendor/jquery-1.11.2.js") !!}"><\/script>')</script>
        <script src="{!!asset('custom-theme/js/vendor/jquery-ui-1.11.4.js') !!}"></script>
        <script src="{!!asset('custom-theme/js/vendor/bootstrap.min.js') !!}"></script>
        <script src="{!!asset('custom-theme/js/main.js') !!}"></script>
        <!--Dynamic JS added from a view would be pasted here-->
        @yield('scripts')        
    </body>
</html>