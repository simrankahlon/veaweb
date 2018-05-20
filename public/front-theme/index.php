<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<link href="css/mystyle.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-5.js" type="text/javascript"></script>
<script type="text/javascript" src="js/drop.js"></script>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<title>.::: Vikrams English Academy :::.</title>
</head>

<body>
<div class="wrap">
<header>
<div class="col-xs-6">
<div class="row">
<div class="col-md-3">
 <div class="logo"><a href="index.html"><img src="images/logo2.png" width="860" height="110" alt="Logo" title="Vikram's English Academy"></a></div></div>
 
 
 
 
 <div class="col-md-1">
 <div class="social">
 <ul>
 	<li><a href="http://vikramsenglishacademy.com/index.php">STUDENT LOGIN</a></li>
 
 </ul>
 
 </div>
 
 
 </div>

 <div class="col-md-2">
   <div class="tnav">
  <ul>
	<li><a href="index.html">Home</a></li>
                         <li><a href="">Directors Message</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="">Career</a></li>
                        

</ul>


</div>




</div>
 
 

</div>

</div>

</header>
<div class="clear"></div>
<!--<div class="navbg">
<div class="col-xs-6">
<div id="menu-container">
<ul class="menu">
                        <li><a href="index.html">ABOUT ACADEMY</a></li>
                        <li><a href="lesson_list.php">LESSON</a></li>
                        <li><a href="word.php">WORD</a></li>
                        <li><a href="essay.php">ESSAY</a></li>
</ul>

<a href="#" class="trigger">Menu</a> </div>

</div>


</div>-->
<div class="clear"></div>
<section>
		<div class="col-xs-6">
<div id="grammerQ" style="display:block;" class="row bodytext"> 
                <?php if($_GET['error']) { ?>
                <p style="color:#F00;"> Please enter correct username and password. </p>
                <?php } ?>
                <form method="post" action="login_process.php">
                <input type="hidden" name="action_type" value="login" />
                <p class="formwidth"> UserName : <input type="text" name="username" /></p>
                <p class="formwidth"> Password : <input type="password" name="password" /></p>
                <p class="formwidth"> <input type="submit" value="Submit" id="submit" class="submit_button btn btn-primary" /></p>
                </form>
                </div>
        <div class="clear"></div>

		</div>	


</section>


<footer>
<div class="col-xs-6">

<div class="col-md-3">
<p>© Copyright 2014 all rights reserved vikrams english academy |  <a href="#">Policy</a></p>
</div>

<div class="col-md-3">
  <p id="textright"><a href="http://www.perfectionweb.in/" target="_blank">Site by Perfection web</a></p>
</div>


</div>


</footer>





</div>
<!--end wrap -->


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
<script src="js/responsive-menu.js"></script> 
<script>
    $(document).ready(function()
    {
        $('#menu-container').responsiveMenu();
    });
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>







</body>
</html>


