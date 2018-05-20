<?php
	/*
		Date :- 28/07/14
		Author :- Shraddha Rane	
		Filename :- login_process.php
		Purpose :- login_process.php page is used to process the login username and password supplied in the login.php page.	
	*/

		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if($_POST['action_type']=='login')
		{
			if($username=='veaefe' && $password == 'RQdL9SA*f}lN')
			{
				session_start();
				$_SESSION["Status"] = "LoggedIn";
				header("Location:lesson_list.php");
			}
			else	
			{
				header("Location:index.php?error=1");
			}
		}
		else	
		{ 			
			session_start();			
			if ($_SESSION["Status"]) {
				unset($_SESSION["Status"]);
			}
			session_destroy();
			header("Location:index.php");
		}
?>