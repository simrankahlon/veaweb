@extends('layout.master-admin')
@section('title','Word | List')
@section('styles')
<style>.mar-top { margin-top:30px; }
    .error { line-height: 2;padding: 0 0 0 20px; } .fileupload{ display: none;} </style>
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
    {!! Form::open(array('url' => 'word/update/'.$word->id,'method'=>'POST','files' => true, 'class'=>'','id'=>'wordform')) !!}
    <div class="row">
        <div class="col-md-2">
            {!! Form::label('Standard', 'Standard:', array('class' => '')) !!}
        </div>
        <div class="col-md-8">
            <div class="form-group">
                {!! Form::select('std_id', $standard,$word->std_id,array('class' => 'form-control','required'=>"required",'id'=>"standard")) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            {!! Form::label('School', 'School:', array('class' => '')) !!}
        </div>
        <div class="col-md-8">
            <div class="form-group">
                {!! Form::select('school', $school,$word->school_id,array('class' => 'form-control','required'=>"required",'id'=>"school")) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            {!! Form::label('title', 'Title:', array('class' => '')) !!}
        </div>
        <div class="col-md-8">
            <div class="form-group">
                {!! Form::text('title', $word->title, array('class' => 'form-control','required'=>"required",'id'=>"title", 'placeholder'=>"title")) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            {!! Form::label('Upload Document', 'Upload Document:', array('class' => '')) !!}
            {!! Form::label('file_word', 'Browse:', array('class' => 'sr-only')) !!}
        </div>
        @if($word->worddoc!='')
        <div class="col-md-8 col-xs-8 docupload">
            <div class="form-group">  
                <a target="_blank" href="{{ URL::to('uploads/word/' . $word->worddoc) }}"><img width="25" height="25" src="{{ URL::to('custom-theme/img/word.png') }}"></a>
                <input type="button" class="deletefile" data-id="{!! $word->id !!}" data-img="{!! $word->worddoc !!}" value="Delete File">
                {!! Form::hidden('worddoc',$word->worddoc) !!}
            </div>
        </div> 
        <div class="col-md-8 col-xs-8 fileupload">
            <div class="form-group">               
                {!! Form::file('worddoc') !!}
            </div>
        </div>
        @else
        <div class="col-md-8 col-xs-8">
            <div class="form-group">               
                {!! Form::file('worddoc') !!}
            </div>
        </div>
        @endif        
    </div>
    <div class="row">
        <div class="main-content-footer text-center">
            {!! link_to('word/', $title = 'Cancel', $attributes = array('class'=>'btn button-cancel'), $secure = null) !!}       
            {!! Form::submit('Update Word', array('class' => 'btn button-green','id'=>'submit_job')) !!}
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
<script type="text/javascript">
    $(document).ready(function () {

        $(".deletefile").on("click", function (e) {
            e.preventDefault();
            var img = $(this).data("img");
            var id = $(this).data("id");
            var base_url = '{{ url() }}';
            var url = base_url + '/word/' + id + '/delete_single_image';
            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    if (response == 1) {
                        $(".docupload").hide();
                        $(".fileupload").show();
                    } else
                    {
                        //$(".fileupload").show();
                    }
                }
            });
        });
    });
</script>    
@stop