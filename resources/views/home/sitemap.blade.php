@extends('layout.master-front')
@section('title','Home')
@section('styles')
@stop
@section('bodycontent')
<div class="row">
    <div class="slide">
        <blockquote>
            <p><a href="#"><img src="{!!asset('front-theme/images/sitemap.jpg') !!}" width="1582" height="298"></a></p>
        </blockquote>
    </div>
</div>
<section></section>
<section>
    <div class="col-xs-6">
        <div class="col-md-5">
            <div class="row bodytext">
                <h1><a href="{!! URL::to('/sitemap') !!}" target="_blank" class="blue2"><span class="blue">Site Map</span></a></h1><br>
                <br>
                <div class="testi2">
                    <ul>
                        <li><a href="{!! URL::to('/') !!}">HOME</a></li>
                        <li><a href="{!! URL::to('/event') !!}">EVENTS</a></li>
                        <li><a href="{!! URL::to('/testimonials') !!}">TESTIMONIALS</a></li>
                        <li><a href="{!! URL::to('/contact') !!}">CONTACT US</a></li>
                        <li><a href="{!! URL::to('/download') !!}">DOWNLOAD</a></li>
                        <li><a href="{!! URL::to('/boosters') !!}">BOOSTERS</a></li>     
                        <li><a href="{!! URL::to('/results') !!}"">RESULTS</a></li> 
                        <li><a href="{!! URL::to('/studentlogin') !!}"">Student Login</a></li> 
                    </ul>
                </div>
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

