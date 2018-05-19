@extends('layout.master-admin')
@section('title','User Management | Create User')
@section('styles')   
@stop
@section('bodycontent')
<div class="container main-content-header">
    <div class="row">
        <div class="col-xs-12 col-md-8 sub-menu">
            <ul class="nav nav-pills">
                <li @if('user-management' === $activeSegment): class="active" @endif"><a href="{{ URL::to('/user-management') }}">User Management</a></li>            
            </ul>
        </div>
        <div class="col-xs-12 col-md-4 tool-bar-margin"></div>
    </div>
</div>
<div class="container main-content">
    <div class="row">
        <div class="col-md-12">
            <h3 class="main-content-title">Create User</h3>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('/dashboard') }}">Home</a></li>
                <li><a href="{{ URL::to('/user-management') }}">Master Settings</a></li>
                <li class="active">User Management</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <!-- form start -->
        {!! Form::open(array('url' => 'user-management','method'=>'POST', 'class'=>'form-horizontal')) !!}
                @if ($errors->has())
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        @foreach ($errors->all() as $error)
                            <p>{!! $error !!}</p>
                        @endforeach
                    </div>
                @endif
                <div class="form-group">
                    {!! Form::label('first_name', 'First name:', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-5">
                    {!! Form::text('first_name', null, array('class' => 'form-control','required'=>"required",'id'=>"first_name", 'placeholder'=>"First name")) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('last_name', 'Last name:', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-5">
                    {!! Form::text('last_name', null, array('class' => 'form-control','required'=>"required",'id'=>"last_name", 'placeholder'=>"Last name")) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('username', 'Email:', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-5">
                    {!! Form::email('username', null, array('class' => 'form-control','required'=>"required",'id'=>"username", 'placeholder'=>"Email")) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('cell_number', 'Contact number:', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-5">
                    {!! Form::text('cell_number', null, array('class' => 'form-control','required'=>"required",'id'=>"cell_number", 'placeholder'=>"Contact No.")) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('role', 'Role:', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-5">
                    {!! Form::select('role',$role,null,['class' => 'form-control','required'=>'required','id'=>'role']) !!}
                    </div>
                </div>             
            <div class="main-content-footer text-center">
                {!! link_to('/user-management', $title = 'Cancel', $attributes = array('class'=>'btn button-cancel'), $secure = null) !!}
                {!! Form::submit('Create User', array('class' => 'btn button-green')) !!}
            </div>
        {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('scripts') 
@stop