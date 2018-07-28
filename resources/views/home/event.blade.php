@extends('layout.master-front')
@section('title','Home')
@section('styles')
@stop
@section('bodycontent')
<div class="row">
    <div class="slide">
        <blockquote>
            <p><a href="#"><img src="{!!asset('front-theme/images/evemtimg.jpg') !!}" width="1582" height="298"></a></p>
        </blockquote>
    </div>
</div>
<section></section>
<section>
    <div class="col-xs-6">
        <div class="col-md-5">
            <div class="row bodytext">
                <h1><span class="blue">EXPERIENTIAL </span>&nbsp;LEARNING AT ITS BEST</h1><br>
                <br>
                <br>

                <p>To facilitate the learning process, the students of our institute were introduced to their text book<br>
                    heroes 
                    Vishnu Zende and 
                    Mohammed Taufeek Sheikh the real heroes of 26/11 attacks who helped save <br>
                    many lives with their wit and valour. 
                    The interaction proved really valuable for the students to know <br>
                    about the reality of the day.<br>
                    <br>
                </p>
                <div class="col-md-3"><img src="{!!asset('front-theme/images/feli1.jpg') !!}" width="331" height="185"></div>
                <div class="col-md-3"><img src="{!!asset('front-theme/images/feli8.jpg') !!}" width="331" height="185"></div>


            </div>
            <div class="clear"></div>
            <div class="row bodytext">
                <h1><span class="blue">FELICITATION </span></h1><br>
                <br>
                <br>

                <p>A felicitation programme is conducted to honour the students who excel at the ICSE board exam.<br>
                    This goes a long way in encouraging our current students to be the champions of tomorrow with<br>
                    the glittering customized trophies in their hands.<br>
                    <br>
                </p>
                <div class="col-md-3">
                    <img src="{!!asset('front-theme/images/2018_fel1.jpg') !!}" width="331" height="185" style="border:7px solid #003366">
                </div>
                <div class="col-md-3">
                    <img src="{!!asset('front-theme/images/2018_fel2.jpg') !!}" width="331" height="185" style="border:7px solid #003366">
                </div>
				<div class="col-md-3">
                    <img src="{!!asset('front-theme/images/2018_fel3.jpg') !!}" width="331" height="185" style="border:7px solid #003366">
                </div>
				<div class="col-md-3">
                    <img src="{!!asset('front-theme/images/2018_fel4.jpg') !!}" width="331" height="185" style="border:7px solid #003366">
                </div>
				<div class="col-md-3">
                    <img src="{!!asset('front-theme/images/2018_fel5.jpg') !!}" width="331" height="185" style="border:7px solid #003366">
                </div>
				<div class="col-md-3">
                    <img src="{!!asset('front-theme/images/2018_fel6.jpg') !!}" width="331" height="185" style="border:7px solid #003366">
                </div>
				<div class="col-md-3">
                    <img src="{!!asset('front-theme/images/2018_fel7.jpg') !!}" width="331" height="185" style="border:7px solid #003366">
                </div>
				<div class="col-md-3">
                    <img src="{!!asset('front-theme/images/2018_fel8.jpg') !!}" width="331" height="185" style="border:7px solid #003366">
                </div>


            </div>

            <div class="row bodytext">
                <h1><span class="blue">WEBSITE &nbsp;LAUNCH <br>
                        <br>
                    </span></h1>

                <br>


                <p>
                    <br>
                    <br>
                    <br>
                    The launch of the website of Vikram's English Academy was done by one of <br>
                    India's best selling English writers and an ex student of Vikramjit Sir , Sudeep Nagarkar.<br>
                    <br>
                    <br>
                </p>
                <div class="col-md-3"><img src="{!!asset('front-theme/images/launch.jpg') !!}" width="331" height="185"></div>
                <div class="col-md-3"><img src="{!!asset('front-theme/images/launch2.jpg') !!}" width="331" height="185"></div>


            </div>

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
<!--end wrap -->
@endsection
