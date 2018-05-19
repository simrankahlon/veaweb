@extends('layout.master-admin')
@section('title','User Management | Update User')
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
            <h3 class="main-content-title">Edit User</h3>
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
        {!! Form::model($user, array('route' => array('user-management.update', $user->id), 'method' => 'PUT' , 'class'=>'form-horizontal')) !!}
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
                    {!! Form::email('username', null, array('class' => 'form-control','required'=>"required",'id'=>"username", 'readonly'=>'readonly', 'placeholder'=>"Email")) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('cell_no', 'Contact number:', array('class' => 'col-sm-4 control-label')) !!}
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
                {!! link_to('/user-management/'.$user->id, $title = 'Delete User', $attributes = array('data-method'=>"delete", 'class'=>'btn btn-danger button-delete', 'data-confirm'=>"Do you really want to delete?"), $secure = null) !!}
                {!! Form::submit('Update User', array('class' => 'btn button-green')) !!}
            </div>
        {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    window.csrfToken = $('meta[name="csrf-token"]').attr('content');
    (function() {
        var laravel = {
            initialize: function() {
                this.registerEvents();
            },
            registerEvents: function() {
                $('body').on('click', 'a[data-method]', this.handleMethod);
            },
            handleMethod: function(e) {
                var link = $(this);
                var httpMethod = link.data('method').toUpperCase();
                var form;
                // If the data-method attribute is not PUT or DELETE,
                // then we don't know what to do. Just ignore.
                if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
                    return;
                }
                // Allow user to optionally provide data-confirm="Are you sure?"
                if ( link.data('confirm') ) {
                    if ( ! laravel.verifyConfirm(link) ) {
                        return false;
                    }
                }
                form = laravel.createForm(link);
                form.submit();
                e.preventDefault();
            },
            verifyConfirm: function(link) {
                return confirm(link.data('confirm'));
            },
            createForm: function(link) {
                var form =
                    $('<form>', {
                        'method': 'POST',
                        'action': link.attr('href')
                    });
                var token =
                    $('<input>', {
                        'name': '_token',
                        'type': 'hidden',
                        'value': window.csrfToken
                    });
                var hiddenInput =
                    $('<input>', {
                        'name': '_method',
                        'type': 'hidden',
                        'value': link.data('method')
                    });
                return form.append(token, hiddenInput)
                    .appendTo('body');
            }
        };
        laravel.initialize();
    })();
</script>
@stop