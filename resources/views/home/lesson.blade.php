@extends('layout.web-admin')
@section('title','Home')
@section('styles')
<style type="text/css">
    
#ans {
    color: #000;
    display: none;
    margin: 10px;
}
.edit {
    display: block !important;
}
    </style>
@stop
@section('bodycontent')
<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <div class="col-md-12">
                <div class="row bodytext">
                    <!-- Start: -->
                    <div class="col-md-3" id="grammerQ">
                        <br>
                        <div style="display:block;">
                            <form method="post" action="">
                                <p style="font-size:16px;padding-left: 8px; color:red; font-weight: bold;">
                                   {!! $lessontitle !!}
                                </p>
                                <p id="edit">
                                    <textarea style="margin:auto;" rows="15" cols="50">{!! display($id) !!}</textarea>
                                </p>
                                <p style="text-align: center;">
                                     <br>
                                     
                                    <input type="button" value="Submit" id="submit" class="submit_button btn btn-primary"/>
                                </p>
                                <!--<p><a href="#" class="btn submit_button" id="Submit" value="Submit">Submit</a></p>-->
                            </form>
                        </div>
                    </div>
                    <!-- End: --> 

                    <!-- Start: -->
                    <div class="col-md-7 ml20">
                        <div id="ans">
                            <ul>
                                <li><a href="{!! URL::to('/lesson') !!}">Back to Lesson List</a></li>
                                <br>
                                <br>
                                <li>Answer Worksheet</li>
                            </ul>
                            {!! nl2br(html_entity_decode(displayresult($id))) !!} 
                        </div>
                    </div>
                    <!-- End: --> 
                </div>
            </div>
        </div>	
    </div>
</div>  
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
<script>
    
$(document).ready(function() {

	// wrap for products and more pages
	//alert("hello");
	
	
	$("#submit").click(function(){
	
	$("#ans").addClass("edit");
	
	
	})

});

</script>
