<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="{{asset('demo-theme/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="{{asset('demo-theme/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{asset('demo-theme/css/AdminLTE.css')}}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">
        <div class="form-box" id="login-box">
            <div class="header">Register</div>
            <form method="POST" class="form-horizontal" action="register">
                <div class="body bg-gray">
                    {{ csrf_field() }}
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="first_name" class="col-sm-4 control-label">First name:</label>
                        <div class="col-sm-8">
                            <input placeholder="First name" class="form-control" required="required" type="text" name="first_name" value="{{ old('first_name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="col-sm-4 control-label">Last name:</label>
                        <div class="col-sm-8">
                            <input placeholder="Last name" class="form-control" required="required" type="text" name="last_name" value="{{ old('last_name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username" class="col-sm-4 control-label">Email:</label>
                        <div class="col-sm-8">
                            <input placeholder="Email" class="form-control" required="required" type="email" name="username" value="{{ old('username') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role" class="col-sm-4 control-label">Role:</label>
                        <div class="col-sm-8">
                            {!! Form::select('role',['' => 'Select a Role'] + $roles,null,['class' => 'form-control','required'=>'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cell_number" class="col-sm-4 control-label">Cell Number:</label>
                        <div class="col-sm-8">
                            <input placeholder="Cell number" class="form-control" required="required" type="number" name="cell_number" value="{{ old('cell_number') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-4 control-label">Password:</label>
                        <div class="col-sm-8">
                            <input placeholder="Password" class="form-control" required="required" type="password" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="col-sm-4 control-label">Confirm Password:</label>
                        <div class="col-sm-8">
                        <input placeholder="Confirm password" class="form-control" required="required" type="password" name="password_confirmation">
                        </div>
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Register</button>  
                    <!--<a href="register.html" class="text-center">Register a new membership</a>-->
                </div>
            </form>
        </div>
    </body>
</html>

