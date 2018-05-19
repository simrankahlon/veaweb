@extends('layout.master-admin')
@section('title','User Management | List Users')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{!!asset('airvac-theme/css/dataTables.bootstrap.min.css') !!}">
@stop
@section('bodycontent')
<div class="container main-content-header">
    <div class="row">
        <div class="col-xs-12 col-md-8 sub-menu">
            <ul class="nav nav-pills">
                <li @if('user-management' === $activeSegment): class="active" @endif"><a href="{{ URL::to('/user-management') }}">User Management</a></li>               
            </ul>
        </div>
        <div class="col-xs-12 col-md-4 tool-bar-margin">
            <a href="{{ URL::to('/user-management/create') }}" role="button" class="btn button-green pull-right">Add User</a>
        </div>
    </div>
</div>
<div class="container main-content">
    <div class="row">
        <div class="col-md-12">
            <h3 class="main-content-title">User Management</h3>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('/dashboard') }}">Home</a></li>
                <li><a href="{{ URL::to('/user-management') }}">Master Settings</a></li>
                <li class="active">User Management</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('message'))
                <div class="clearfix alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    {{ Session::get('message') }}
                </div>
            @endif

            <table id="data-table" class="table table-striped table-hover func_table">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Contact No.</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->cell_number }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->name }}</td>
                            <td class="no-sort">
                                {!! Form::open(array('url' => 'user-management/' . $user->id,'name' => 'frmdel'.$user->id, 'onsubmit'=> 'return confirm("Do you really want to delete?");')) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    <a class="btn btn-primary btn-xs" title="Edit" href="{{ URL::to('user-management/' . $user->id . '/edit') }}">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    <button type="submit" title="Delete" class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6">No user found!</td></tr>
                    @endforelse
                </tbody>             
            </table>
            <div class="text-center">{!! $users->render() !!}</div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript" charset="utf8" src="{!!asset('airvac-theme/js/jquery.dataTables.min.js') !!}"></script>
    <script type="text/javascript" charset="utf8" src="{!!asset('airvac-theme/js/dataTables.bootstrap.min.js') !!}"></script>
    <script>
        $(document).ready( function () {
            $('.func_table').DataTable({
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 2,3,4,5 ] } ],
                order: [[ 1, 'asc' ]],
                "bFilter": false,
                //"processing": true,
                //"serverSide": true,
                "paging":   false,
                //"ordering": false,
                "info":     false,
                //"bPaginate": false,
                "bLengthChange": false,
                //"ajax": "../server_side/scripts/server_processing.php"
                //"bInfo": false,
                //"bAutoWidth": false
            });
        });
    </script>
@stop