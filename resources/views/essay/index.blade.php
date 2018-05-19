@extends('layout.master-admin')
@section('title','Content | List')
@section('styles')
<link rel="stylesheet" type="text/css" href="{!!asset('custom-theme/css/jquery-confirm.min.css') !!}">
<!-- DATA TABLES -->
<link rel="stylesheet" type="text/css" href="{!!asset('custom-theme/css/dataTables.bootstrap.min.css') !!}">
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
    <div class="row">
        <div class="col-md-10">Essay Document</div>
        <div class="col-md-1"><a class="btn button-green" href="{{ URL::to('admin/essay/create') }}">Add Document</a></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="fun-table" class="table table-striped table-hover func_table">
                <thead>
                    <tr>
                        <th>Standard</th>
                        <th>School</th>
                        <th>Title</th>
                        <th>Essay</th> 
                        <th>Created</th> 
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @forelse($essay as $c)
                    <tr>
                        <td width="20%">{!! $c->std_id !!} STD</td>
                        <td width="20%">{!! get_school($c->school_id) !!}</td>
                        <td width="20%">{!! $c->title !!}</td>
                        <td width="20%"><a target="_blank" href="{{ URL::to('uploads/essay/' . $c->essaydoc) }}"><img width="25" height="25" src="custom-theme/img/word.png"></a></td>
                        <td width="20%">{!! date('d-m-Y',strtotime($c->created_at)) !!}</td>
                        <td width="20%"> 
                            {!! Form::open(array('url' => 'essay/' . $c->id,'name' => 'frmdel'.$c ->id, 'onsubmit'=> 'return confirm("Do you really want to delete?");')) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                           <a class="btn btn-xs btn-primary" href="{{ URL::to('essay/' . $c->id .'/edit') }}"><span aria-hidden="true" class="glyphicon glyphicon-check"></span></a>                                                                     
                                            <button type="submit" title="Delete" class="btn btn-danger btn-xs deletecontent">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </button>
                            </a>
                             {!! Form::close() !!}
                        </td>                        
                    </tr>
                    @empty
                    <tr>
                        <td>No record found!</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="text-center"></div>
        </div>
    </div>
</div>
    @endsection
    @section('scripts')
    <script type="text/javascript" charset="utf8" src="{!!asset('custom-theme/js/jquery-confirm.min.js') !!}"></script>
    <script type="text/javascript" charset="utf8" src="{!!asset('custom-theme/js/jquery.dataTables.min.js') !!}"></script>
<script type="text/javascript" charset="utf8" src="{!!asset('custom-theme/js/dataTables.bootstrap.min.js') !!}"></script>
    <script>
/*$(document).ready(function() {
 $( "#expiry_date" ).datepicker({
 changeMonth: true,
 changeYear: true,
 minDate: new Date()
 });
 var d = new Date();
 d.setFullYear(d.getFullYear(), d.getMonth() + 24); 
 $("#expiry_date").datepicker("setDate",d);
 });*/
    $(document).ready(function () {
    $('.func_table').DataTable({
    "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 2,3,4    ] } ],     
            "order": [[ 5, 'desc' ]],
            "bFilter": false,
            //"processing": true,
            //"serverSide": true,
            "paging":   true,
            "lengthMenu": [50, 100, 150, 200],
            //"ordering": false,
            "info":     true,
            //"bPaginate": false,
            "bLengthChange": false,
            //"ajax": "../server_side/scripts/server_processing.php"
            //"bInfo": false,
            //"bAutoWidth": false
    });
    
    $('.deletecontent').on("click",function(e){      
        e.preventDefault();
        $(this).closest('form').submit();
    });
});
   
    </script>
  @stop