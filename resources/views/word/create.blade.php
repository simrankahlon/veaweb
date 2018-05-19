@extends('layout.master-admin')
@section('title','Content | List')
@section('styles')
<style>.mar-top { margin-top:30px; }
    .error { line-height: 2;padding: 0 0 0 20px; } </style>
@stop
@section('bodycontent')
<div class="container main-c">
</div>
<div class="container main-content">
    <div class="row">
        @if (Session::has('message'))
        <div class="clearfix alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
            {{ Session::get('message') }}
        </div>
        @endif
        @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <p>{!! $error !!}</p>
            @endforeach
        </div>
        @endif
    </div>
    <div class="errormsg"></div>
        {!! Form::open(array('url' => 'admin/word/store','method'=>'POST','files' => true, 'class'=>'','id'=>'wordform')) !!}
     <div class="row">
        <div class="col-md-2">
               {!! Form::label('standard', 'Standard:', array('class' => '')) !!}
        </div>
         <div class="col-md-8">
            <div class="form-group">
               {!! Form::select('std_id', $standard,null,array('class' => 'form-control','required'=>"required",'id'=>"standard")) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
               {!! Form::label('school', 'School:', array('class' => '')) !!}
        </div>
         <div class="col-md-8">
            <div class="form-group">
               {!! Form::select('school', $school,null,array('class' => 'form-control','required'=>"required",'id'=>"school")) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
               {!! Form::label('title', 'Title:', array('class' => '')) !!}
        </div>
         <div class="col-md-8">
            <div class="form-group">
                {!! Form::text('title', null, array('class' => 'form-control','required'=>"required",'id'=>"title", 'placeholder'=>"title")) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
              {!! Form::label('Upload Document', 'Upload Document:', array('class' => 'sr-only')) !!}
              {!! Form::label('file_word', 'Browse:', array('class' => 'sr-only')) !!}
        </div>
        <div class="col-md-8 col-xs-8">
            <div class="form-group">               
                 {!! Form::file('worddoc') !!}
            </div>
        </div>      
    </div>
    <div class="row">
        <div class="main-content-footer text-center">
            {!! link_to('word/', $title = 'Cancel', $attributes = array('class'=>'btn button-cancel'), $secure = null) !!}       
            {!! Form::submit('Upload Word', array('class' => 'btn button-green','id'=>'submit_job')) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
@section('scripts')
@stop