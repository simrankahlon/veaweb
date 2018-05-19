@extends('layout.web-admin')
@section('title','Home')
@section('styles')
<style>
   
.lesson-id ul li a {
    background: #dfd7d7 none repeat scroll 0 0;
    color: #000;
    padding: 5px;
    text-decoration: none;
}
</style>
@stop
@section('bodycontent')
<div class="container-fluid">
<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <div class="col-md-5">
                <div class="lesson-id row bodytext">
                    <br>
                    @forelse($list as $l)  
                    <ul>                              
                      <li>
                      {!! link_to('/lesson/'.$l->id, $titlee=$l->title, $attributes = array('class'=>''), $secure = null) !!}
                      </li>
                    </ul>
                    @empty
                    <ul>No jobs found!</ul>
                    @endforelse
                </div>
            </div>
        </div>	
</div>
</div> 
    </div>
 @endsection
