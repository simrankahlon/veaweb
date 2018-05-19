@extends('layout.master-admin')
@section('title','School | List')
@section('styles')
<style>.mar-top { margin-top:30px; }
    .error { line-height: 2;padding: 0 0 0 20px; } .fileupload { display:none; }</style>
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
          {!! Form::open(array('url' => 'school/update/'.$school->id,'method'=>'POST','files' => true, 'class'=>'','id'=>'schoolform')) !!}
  
    <div class="row">
        <div class="col-md-2">
               {!! Form::label('school', 'Name:', array('class' => '')) !!}
        </div>
         <div class="col-md-8">
            <div class="form-group">
                {!! Form::text('name', $school->name, array('class' => 'form-control','required'=>"required",'id'=>"school", 'placeholder'=>"school")) !!}
            </div>
        </div>
    </div>      
    <div class="row">
        <div class="main-content-footer text-center">
            {!! link_to('school/', $title = 'Cancel', $attributes = array('class'=>'btn button-cancel'), $secure = null) !!}       
            {!! Form::submit('Submit', array('class' => 'btn button-green','id'=>'submit_job')) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
@section('scripts')
@stop