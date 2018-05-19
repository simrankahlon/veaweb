@extends('layout.master-front')
@section('title','Home')
@section('styles')
@stop
@section('bodycontent')
            <div class="row">
                <div class="slide">
                    <blockquote>
                        <p><a href="#"><img src="{!!asset('front-theme/images/boost.jpg') !!}" width="1582" height="298"></a></p>
                    </blockquote>
                </div>
            </div>
            <section></section>
            <section>
                <div class="col-xs-6">
                    <div class="col-md-5">
                        <div class="row bodytext">
                            <h1><span class="blue">BOOSTERS</span></h1><br>
                            <br>
                            <br>
                            <h1><span class="blue">MILESTONE</span></h1>
                            <p class="text3"><br>
                                <br>
                                <br>
                                <img src="{!!asset('front-theme/images/mile.jpg') !!}" width="331" height="185">Students of Std X often need a reason to lift their spirits and drooping shoulders. To ignite their young minds with the fire to excel in exams and life, a special motivational lecture called 'Milestone' is kept in the month of September. For many it proves to be the game changer they desperately need.<br>
                                <br>
                            </p>
                        </div>
                        <div class="clear"></div>
                        <div class="row ">
                            <p>
                        </div>
                        <div class="row ">
                            <h1><span class="blue">ONLINE GRAMMAR PRACTICE<br>
                                </span></h1>
                            <p><br>
                                <br>
                            </p>
                            <p>&nbsp;</p>
                            <p class="text3"><img src="{!!asset('front-theme/images/onlinepractise.jpg') !!}" width="331" height="185">We have noticed the students found wanting in grammar practice especially in topics like 'Prepositions' and ‘Tenses’. The only way to be perfect is by practising hard. For this very reason we have created a special software by which they can solve exercises online and   the moment they submit their answers , they are given the solution to the exercise. Unlimited practice can be done in this way to perfect their prepositions.<br>
                                <br>
                            </p>
                        </div>

                        <div class="row ">
                            <h1><span class="blue">ESSAYS<br>
                                </span></h1>
                            <p><br>
                                <br>
                            </p>
                            <p>&nbsp;</p>
                            <p class="text3"><img src="{!!asset('front-theme/images/essy.jpg') !!}" width="331" height="185">We do notice many of our students who, though conceptually brilliant in their understanding of English language and literature ,are handicapped while attempting questions which are related to writing skills (Composition and letter writing). To help them enhance their creativity, some well written essays by the students will be posted online for them to browse through.<br>
                                <br>
                            </p>
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
            @endsection

