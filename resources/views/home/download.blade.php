@extends('layout.master-front')
@section('title','Home')
@section('styles')
@stop
@section('bodycontent')
            <div class="row">
                <div class="slide">
                    <blockquote>
                        <p><a href="#"><img src="{!!asset('front-theme/images/conta.jpg') !!}" width="1582" height="298"></a></p>
                    </blockquote>
                </div>
            </div>
            <section></section>
            <section>
                <div class="col-xs-6">
                    <div class="col-md-5">
                        <div class="row bodytext">
                            <h1><span class="blue">Download</h1><br>
                            <br>
                           
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="col-md-4 mar-tb">
                           @include('home.sidebar')
                    </div>
                </div>	
                   <article>
					<div class=" col-xs-6">
						@include('home.sidebarstudent')   
					  </div>
</article>
            </section>
@endsection