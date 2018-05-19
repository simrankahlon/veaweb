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
        <div class="col-md-10">Content</div>
        <div class="col-md-1"><a class="btn button-green" href="{{ URL::to('content/create') }}">Add Content</a></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="fun-table" class="table table-striped table-hover func_table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @forelse($content as $c)
                    <tr>
                        <td width="20%">{!! $c->title !!}</td>
                        <td width="50%">{!! $c->paraone !!}</td>
                        <td width="20%"> 
                            {!! Form::open(array('url' => 'content/' . $c->id,'name' => 'frmdel'.$c ->id, 'onsubmit'=> 'return confirm("Do you really want to delete?");')) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                            <a class="btn btn-xs btn-primary" href="{{ URL::to('content/' . $c->id .'/edit') }}"><span aria-hidden="true" class="glyphicon glyphicon-check"></span></a>                                                                        
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

    $(document).ready(function () {
    $('.func_table').DataTable({
    "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 1,2    ] } ],
            "order": [[ 0, 'desc' ]],
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