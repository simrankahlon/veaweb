@extends('layout.master-admin')
@section('title','Tenses | List')
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
        {!! Form::open(array('url' => 'tenses/update/'.$tenses->id,'method'=>'POST', 'class'=>'','id'=>'tensesform')) !!}
    <div class="row">
        <div class="col-md-2">
               {!! Form::label('title', 'Title:', array('class' => '')) !!}
        </div>
         <div class="col-md-8">
            <div class="form-group">
                {!! Form::text('title', $tenses->title, array('class' => 'form-control','required'=>"required",'id'=>"title", 'placeholder'=>"title")) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
             {!! Form::label('content', 'Star Content:', array('class' => '')) !!}
        </div>
        <div class="col-md-8 col-xs-8">
            <div class="form-group">            
                <textarea name='paraone' rows="10" cols="15" class="form-control">{!! $tenses->paraone !!}</textarea>
            </div>
        </div>      
    </div>
    <div class="row">
        <div class="col-md-2">
             {!! Form::label('content', 'Answer:', array('class' => '')) !!}
        </div>
        <div class="col-md-8 col-xs-8">
            <div class="form-group">            
                <textarea name='paratwo' rows="10" cols="15" class="form-control">{!! $tenses->paratwo !!}</textarea>
            </div>
        </div>      
    </div>
    <div class="row">
        <div class="main-content-footer text-center">
            {!! link_to('content/', $title = 'Cancel', $attributes = array('class'=>'btn button-cancel'), $secure = null) !!}       
            {!! Form::submit('Update Content', array('class' => 'btn button-green','id'=>'submit_job')) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
@section('scripts')
<script type="text/javascript" charset="utf8" src="{!!asset('custom-theme/js/vendor/tinymce/tinymce.min.js') !!}"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
</script>
@stop