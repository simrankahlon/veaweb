<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>vikramsenglishacademy.com</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{!!asset('custom-theme/css/bootstrap.min.css') !!}">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="{!!asset('custom-theme/css/bootstrap-theme.min.css') !!}">
        <link rel="stylesheet" href="{!!asset('custom-theme/css/main.css') !!}">

        <script src="{!!asset('custom-theme/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') !!}"></script>
    </head>
    <body class="l-body">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div id="login-box" class="form-box">
            <div class="header"> </div>
            <form method="post" action="login">
                {{ csrf_field() }}
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="b-login__fields">
                    <div class="form-group b-login__control">
                        <input class="b-login__field -icon_login" autocomplete="off" type="email" value="" name="username" placeholder="Email" required="required" value="{{ old('username') }}">
                    </div>
                    <div class="form-group b-login__control">
                        <input class="b-login__field -icon_pass" type="password" placeholder="Password" name="password" required="required">
                        
                    </div>
                </div>
                <div class="footer">
                    <button class="b-login__btn " type="submit">Sign me in</button>
                    <p style="text-align: center"></p>
                </div>
            </form>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="{!!asset("custom-theme/js/vendor/jquery-1.11.2.js") !!}"><\/script>')</script>
        <script src="{!!asset('custom-theme/js/vendor/bootstrap.min.js') !!}"></script>
        <script src="{!!asset('custom-theme/js/main.js')!!}"></script>     
    </body>
</html>