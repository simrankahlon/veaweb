@extends('layout.master-admin')
@section('title','My Profile')
@section('bodycontent')
<!-- Main content -->
<div class="container main-content main-content-header-eff">
    <div class="row">
        <div class="col-md-12">
            <h3 class="main-content-title">My Profile</h3>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('/dashboard') }}">Home</a></li>
                <li class="active">My Profile</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- form start -->
            {!! Form::model($user, array('route' => array('profile.update', $user->id ), 'method' => 'PUT' , 'class'=>'form-horizontal')) !!}
                    @if ($errors->has())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">Error:</span>
                            @foreach ($errors->all() as $error)
                                <p>{!! $error !!}</p>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group">
                        {!! Form::label('rolename', 'Role:', array('class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-5">
                        {!! Form::text('rolename', $rolename, array('class' => 'form-control','id'=>"rolename", 'readonly'=>'readonly')) !!}
                        </div>
                    </div>
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
                        {!! Form::label('cell_number', 'Contact number:', array('class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-5">
                        {!! Form::text('cell_number', null, array('class' => 'form-control','required'=>"required",'id'=>"cell_number", 'placeholder'=>"Contact No.")) !!}
                        </div>
                    </div>
                <div class="main-content-footer text-center">
                    {!! link_to('/dashboard', $title = 'Cancel', $attributes = array('class'=>'btn button-cancel'), $secure = null) !!}
                    {!! Form::submit('Update', array('class' => 'btn button-green')) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

