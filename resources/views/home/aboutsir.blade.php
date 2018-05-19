@extends('layout.master-front')
@section('title','Home')
@section('styles')
@stop
@section('bodycontent')
            <div class="row">
                <div class="slide">
                    <blockquote>
                        <p><a href="#"><img src="{!! asset('front-theme/images/aboutsir.jpg') !!}" width="1582" height="298"></a></p>
                    </blockquote>
                </div>
            </div>
            <section></section>
            <section>
                <div class="col-xs-6">
                    <div class="col-md-5">
                        <div class="row bodytext">
                            <h1><span class="blue">About the Teachers</span></h1><br>
                            <br>
                            <br>

                            <p class="text3"><br>
                                <br>
                                <br>
                                <img src="{!!asset('front-theme/images/vikramsir.jpg') !!}" width="167" height="206"><span class="blue2">Prof. Vikramjit Singh</span><br>
                                <br>
                                An academic livewire, with a God gifted flair for English language and a <br>
                                Masters Degree in English Literature, he has been instrumental in<br>
                                enhancing and enriching the language of thousands of his students. <br>
                                They swear by his innovative techniques (like using music) <br>
                                which make grammar a cake walk for them. Previously the <br>
                                Head of English Department in a premier institute he has not only <br>
                                helped English teachers find the best in themselves, <br>
                                but also produced board toppers across different boards. <br>
                                <br>
                            <div class="clear"></div>
                            <p>&nbsp;</p>

                            <img src="{!!asset('front-theme/images/talekar.jpg') !!}" width="167" height="206"><span class="blue2">Prof. Kripa Talekar D'Mello</span><br>
                            <br>
                            Making the institute her second home, this young lady with Masters in English and a <br>
                            Bachelors degree in Education is just what the doctor ordered to share the <br>
                            burden of enlightening and 
                            enriching the English of so many students. <br>
                            She is master of innovation too and has added a new dimension to the Vikramjit Sir <br> for eight years and has finetuned herself  
                       
                            pedagogy of the institute with her <br>interactive grammar consisting of role play 
                            and grammar games 
                            as her tools.<br> She has been a protege of Vikarmjit Sir for 
                            seven years and has finetuned <br> herself in accordance with the
                            vision and goals of her mentor.<br>
                            <br><strong></strong>
                            </p>
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
