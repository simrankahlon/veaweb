@extends('layout.master-front')
@section('title','Home')
@section('styles')
@stop
@section('bodycontent')
<div class="row">
    <div class="slide">
        
    </div>
</div>
<section></section>
<section>
    <div class="col-xs-6">
        <div class="col-xs-6">
            <div id="grammerQ" style="display:block;" class="row bodytext">              
               {!! Form::open(array('url' => 'studentlogin','method'=>'POST', 'class'=>'')) !!}
                    <input type="hidden" name="action_type" value="login" />
                    <p class="formwidth"> UserName : <input type="text" name="username" /></p>
                    <p class="formwidth"> Password : <input type="password" name="password" /></p>
                    <p class="formwidth"> <input type="submit" value="Submit" id="submit" class="submit_button btn btn-primary" /></p>
                  {!! Form::close() !!}
            </div>
            <div class="clear"></div>
        </div>	
    </div>	
 <article>
                            <div class=" col-xs-6">
                                  @include('home.sidebarstudent')      
                            </div>
                        </article>

</section>
@endsection
