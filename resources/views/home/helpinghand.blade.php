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
                             <h1><span class="blue">A HELPING HAND</h1><br>
                            <br>
                                 <p class="text3"><br>
          
          We are all well aware that there are many students around us who do not have the privilege to afford quality education from private institutes. They have the desire and the talent but with the means lacking they fall short of their desired goals. To fill this lacunae we have started a batch of underprivileged students from the BMC schools. <br>
          <br>
          They are tenth standard students from SSC board. With help from some like minded professionals, we plan to teach them Math, Science, English, Social Studies and Hindi absolutely free of cost. <br>
          <br>
          We would like to wholeheartedly thank Prof Samir Deolekar, Prof Sagar Devrukhkar, Prof Milesh Kothari, Prof (Dr) Sagar Gudhka, Prof (Dr) Ashish Upadhyay and Prof Girish Hake as they have given wings to the dreams of these little angels. We welcome any inputs or help from the parents too.<br>
<br>
      </p>
        </div>
        <div class="clear"></div>
        <div class="row ">
        <h1>&nbsp;</h1>
        <p><br>  
                            
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