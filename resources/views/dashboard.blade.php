@extends('layout.master-admin')
@section('title','Dashboard')
@section('bodycontent')
<!-- Main content -->
<div class="container main-content main-content-header-eff">
    <div class="row">
        <div class="col-md-12">
            <h3 class="main-content-title">Welcome Admin</h3>
            <ol class="breadcrumb">
                <li class="active">Home</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4 class="">Dashboard</h4>
            @if (Session::has('message'))
                <div class="clearfix alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
                    {{ Session::get('message') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

