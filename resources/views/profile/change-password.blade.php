@extends('layout.master-admin')
@section('title','Change Password')
@section('bodycontent')
<!-- Main content -->
<div class="container main-content main-content-header-eff">
    <div class="row">
        <div class="col-md-12">
        <h3 class="main-content-title">Change Password</h3>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to('/dashboard') }}">Home</a></li>
            <li class="active">My Profile</li>
        </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <!-- form start -->
        {!! Form::open(array('url' => 'change-password','method'=>'POST', 'class'=>'form-horizontal')) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @if (Session::has('message'))
                <div class="clearfix alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    {{ Session::get('message') }}
                </div>
            @endif
            @if ($errors->has())
                <div class="alert alert-danger">
                    <span class="sr-only">Error:</span>
                    @foreach ($errors->all() as $error)
                        <p>{!! $error !!}</p>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            @endif
            <div class="form-group">
                {!! Form::label('old_password', 'Old Password:', array('class' => 'col-sm-4 control-label')) !!}
                <div class="col-sm-5">
                {!! Form::password('old_password',  array('class' => 'form-control','required'=>"required",'id'=>"old_password", 'placeholder'=>"Old Password")) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('password', 'New Password:', array('class' => 'col-sm-4 control-label')) !!}
                <div class="col-sm-5">
                {!! Form::password('password',  array('class' => 'form-control','required'=>"required",'id'=>"password", 'placeholder'=>"New Password")) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('password_confirmation', 'Confirm New Password:', array('class' => 'col-sm-4 control-label')) !!}
                <div class="col-sm-5">
                {!! Form::password('password_confirmation', array('class' => 'form-control','required'=>"required",'id'=>"password_confirmation", 'placeholder'=>"Confirm New Password")) !!}
                </div>
            </div>
            <div class="main-content-footer text-center">
                {!! link_to('/profile', $title = 'Cancel', $attributes = array('class'=>'btn button-cancel'), $secure = null) !!}
                {!! Form::submit('Change Password', array('class' => 'btn button-green')) !!}
            </div>
        {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

