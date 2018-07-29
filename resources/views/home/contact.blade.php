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
                            <h1><span class="blue">CONTACT  </span>&nbsp;US</h1><br>
                            <br>
                            <div class="testi2 bodytext">
                                <p><strong>VIKRAM'S ENGLISH ACADEMY </strong><br>
                                    A2/201, Kailash Commercial Complex, Above Jolly Studio, <br>
                                    Opp Dreams Mall, LBS Marg, <br>
                                    Bhandup West<br>
                                    <strong>Phone: 9769246667</strong><br>
                                    <br>
                                    <br>
                                    <strong>VIKRAM'S ENGLISH ACADEMY </strong><br>
                                </p>
                                <p>305, Jay Commercial Plaza, M G. Road, <br>
                                    Mulund (w), Mumbai 80. </p>
                                <p><strong>Phone: 022-5602727</strong> <strong>/ 9833 602727</strong></p>
                                <div class="contact">				
                                    <div class="contact_info">
                                        <h2 class="blue">&nbsp;</h2>
                                        <div class="map">
                                        </div>
                                    </div>
                                    <div class="contact-form">
                                        <div class="content">
                                            <h2 class="blue"><span class="titletext">Enquiry form</span></h2>
                                        </div>
                                        <form method="post" action="contact-post.html">
                                            <div>
                                                <span><label>Name</label></span>
                                                <span><input name="userName" type="text" class="textbox"></span>
                                            </div>
                                            <div>
                                                <span><label>E-mail</label></span>
                                                <span><input name="userEmail" type="text" class="textbox"></span>
                                            </div>
                                            <div>
                                                <span><label>Mobile</label></span>
                                                <span><input name="userPhone" type="text" class="textbox"></span>
                                            </div>
                                            <div>
                                                <span><label>Subject</label></span>
                                                <span><textarea name="userMsg"> </textarea></span>
                                            </div>
                                            <div>
                                                <span><input type="submit" class="" value="Submit us"></span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="clear"> </div>		
                                </div>
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
            <!--end wrap -->
@endsection