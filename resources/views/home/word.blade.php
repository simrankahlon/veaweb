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
    .btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}
.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
   .button-green{background: #24bf86;border: medium none;border-radius: 15px;color: #fff;text-decoration: none;text-transform: uppercase;transition: background 0.2s ease 0s, color 0.2s ease 0s;}
    .button-green:hover{ background-color: #1C9468; color: #fff;}
    .heading { font-family: 'Oswald', sans-serif;padding: 2px; color:#fff; background: #2854A1;}
    .searchtable { border: 5px solid #1C9468; padding: 10px; border-radius: 10px;}
    .resulttable { border: 1px solid #2854A1; border-collapse: collapse; padding: 10px; border-radius: 3px;}
    .searchtd { padding: 10px; font-size: 12px; }
    .resulttd { padding: 8px; font-size: 12px;border: 1px solid #2854A1;  }
    .row img { float:none; margin: auto; }
</style>
@stop
@section('bodycontent')
<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <div class="col-md-12">
                <br><br>
                                                 {!! Form::open(array('url' => 'student/word','method'=>'GET','files' => true, 'class'=>'','id'=>'wordform')) !!}
                            <table class="searchtable" width="70%" cellspacing="3" cellpadding="3" align="center">
                                  <tr>
                                    <td class="searchtd"> Filter:</td>
                                    <td class="searchtd">  {!! Form::select('standard', $standard,$id,array('class' => 'form-control','required'=>"required",'id'=>"standard")) !!}</td>
                                    <td class="searchtd"> {!! Form::select('school', $school,$school_id,array('class' => 'form-control','required'=>"required",'id'=>"school")) !!}</td>
                                    <td class="searchtd">       {!! link_to('#', $titlee = 'Search', $attributes = array('class'=>'btn button-green','id'=>'btnSearch'), $secure = null) !!} </td>                                 
                                </tr>
                            </table>
                        {!! Form::hidden('module','word',array('id'=>'module'))!!}
                            {!! Form::hidden('hdnUrl',url("student/search"),array('id'=>'hdnUrl'))!!}
                            {!! Form::close() !!}
                            <br>
                            <table class="resulttable" width="70%" cellspacing="3" cellpadding="10" align="center">
                                <tr>
                                    <td class="heading">Sr. No.</td>
                                    <td class="heading">Title</td>
                                    <td class="heading">Download Link</td>
                                    <td class="heading">Uploaded Date</td>
                                </tr>
                                @if(!empty($word))  
                                <?php $i=1; ?>
                                @foreach($word as $w)
                                <tr>
                                    <td class="resulttd" width="8%" align="center" valign="top"><?php echo $i; ?></td> 
                                    <td valign="top" class="resulttd" width="55%">
                                      {!! $w->title !!} 
                                    </td>
                                    <td class="resulttd" align="center" valign="top"  width="15%">
                                        <a target="_blank" href="{{ URL::to('uploads/word/' . $w->worddoc) }}">                                            
                                            <img src="{!!asset('front-theme/images/download-icon.jpg') !!}" width="40" height="40" alt="Download Document" title="Download Document">    </a>                     <br>
                                    </td>
                                    <td class="resulttd" valign="top"  width="15%">  
                                        {{ date('d-m-Y',strtotime($w->created_at)) }}
                                    </td> 
                                    

                                </tr>
                                <?php $i++; ?>
                                @endforeach
                                @else                                
                                <tr>
                                   <td class="resulttd" colspan="4" valign="top">
                                       No record exists
                                   </td>
                               </tr>
                                @endif

                            </table>                
                        <div class="clear"></div>
                    </div>	
                 <br><br>
        </div>	    </div>
</div>  
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
    <script type="text/javascript" charset="utf8" src="{!!asset('custom-theme/js/jquery.dataTables.min.js') !!}"></script>
<script type="text/javascript" charset="utf8" src="{!!asset('custom-theme/js/dataTables.bootstrap.min.js') !!}"></script>
<script>  
$(document).ready(function() {	
    $("#btnSearch").click(function(){
	var url = $('#hdnUrl').val();
        var id = $('#standard').val();
        var school = $('#school').val();
        var module = $('#module').val();
        var redirect_url= url+'?standard='+id+'&school='+school+'&module='+module;
        //console.log(redirect_url);
        window.location.replace(redirect_url);
    });
});
</script>

