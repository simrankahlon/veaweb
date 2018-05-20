<?php
	
	include('includes/application_top.php');

	$arrMessage = array( 'ConnDeleted' => 'Listing detail Is Deleted Successfully !!!','Conn_edited'=>'Listing detail Is Edited Successfully !!!' );

	if(isset($_POST))
	{		
		$actionType = php_db_prepare_input(php_db_input($_POST['actionType']));
	
		if($actionType == "add_content")
		{		
			$StdID = php_db_prepare_input($_POST['cmbStd']);
			$paraone = php_db_prepare_input($_POST['paraone']);
			$title = php_db_prepare_input($_POST['txttitle']);
			
			$add_admin = "INSERT INTO ".TABLE_LISTING." (paraone,title,created) VALUES ('". $paraone ."','".$title."',now())";
			$rsadmin = php_db_query($add_admin);
			$ID = mysql_insert_id();	
		
			php_redirect(php_href_link(CURRENT_PAGE, php_get_all_get_params(array('msg','actionType','ID')) . 'msg=inserted'));
		}
		else if($actionType == "edit_content")
		{
			$paraone = htmlentities($_POST['paraone']);
			$title = php_db_prepare_input($_POST['txttitle']);
			$ID = php_db_prepare_input($_POST['ID']);
				
			$update_Mem =  "UPDATE " . TABLE_LISTING. " SET paraone = '". $paraone ."',title='".$title."' WHERE contentid = '". $ID ."' ";	
			php_db_query($update_Mem) ;
			php_redirect(php_href_link(CURRENT_PAGE, php_get_all_get_params(array('msg','actionType','memID')) . 'msg=edited'));
		}
		else if($actionType == 'delete')
		{
			$ID = php_db_input(php_db_prepare_input((int)$_POST['ID']));
			/*To SQL query for deleting the records*/
			$delete_query ="delete from ". TABLE_LISTING ." where contentid = '". $ID ."' ";
			
			php_db_query( $delete_query);
			php_redirect(php_href_link(CURRENT_PAGE,php_get_all_get_params(array('msg','action_type','ID')) . 'msg=deleted'));
		}
	}
?>
<html>
	<head>
		<title><?php echo TITLE ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link href="css/admin.css" rel="stylesheet" type="text/css">
		<SCRIPT LANGUAGE="JavaScript">
		<!--		
			function SubmitDeleteState(frmName, actionType, ID)
			{
				if(confirm("Are you sure you want to delete this record"))
				{
					frmName.actionType.value = actionType;
					frmName.ID.value = ID
					frmName.submit();
				}	
			}
			function SubmitAdmin(formNm, actionType)
			 {
				 formNm.submit();				
			 }
		//-->
		</SCRIPT>
		<script language="javascript">
		 function viewContactDetail(Id)
		 {
			window.open('ContactView.php?Id='+Id,'Project','toolbar=no,location=center,directories=no,status=no,menubar=no,scrollbars=Yes,resizable=yes,width=800,height=700');	
		 }
		 </script>
		<script type="text/javascript" src="<?php echo DIR_WS_JS . 'general.js';?>"></script>
	</head>
	<body>
		<?php include(DIR_WS_MODULES . 'admintop.php'); ?>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td  width="175" height="21" valign="top"><?php include(DIR_WS_MODULES .'adminleft.php'); ?></td>
				<td valign="top">
					<table width="100%" border="0" cellspacing="1" cellpadding="0">
						<tr>
							<td valign="top">					
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr> 
										<td valign="middle" height="18" class="PageHeading">&nbsp;Listing</td>
										<td valign="middle" height="18" bgcolor="f2f2f2" style="padding-right:40px" class="PageHeading" align="right">&nbsp;</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<?php
					if($_GET['actionType'] == 'content_insert' || $_GET['actionType'] == 'content_update' )
					{
							echo php_draw_form('frmAdmin',php_href_link(CURRENT_PAGE. "?actionType=" . $_GET['actionType'] . "&ID=". $ID , '', 'SSL'), 'post' , 'enctype="multipart/form-data" ' )  . php_draw_hidden_field('ID',$_GET['ID']). php_draw_hidden_field('img_name') .php_draw_hidden_field('col'); 
			   
						if( $_GET['actionType'] == "content_insert" )
						{
							echo php_draw_hidden_field('actionType', 'add_content');
						}
						else if($_GET['actionType'] == 'content_update' )
						{
							$rs_member =  php_db_query(" select * from ". TABLE_LISTING." where contentid ='". $_GET['ID'] ."'");
							$arr_member = php_db_fetch_array($rs_member);
							echo php_draw_hidden_field('actionType', 'edit_content');
						}
					?>
						<table border="0" width="75%" cellspacing="4" style="padding-bottom:125px;">
                         <tr>
                   <td align="right" class="Treb13Purple" valign="top">Title:</td>
                   <td valign="top"><input name="txttitle" id="txttitle" type="text" maxlength="25" title="Enter the title" value="<?php echo $arr_member['title']?>"/></td>
                 </tr>	
								<tr>
									<td align="right" class="Treb13Purple" valign="top" width="30%">Para : </td>
									<td valign="top" width="70%" class="Treb13Purple">
									<textarea name="paraone" rows="20" cols="70"><?php echo $arr_member['paraone']; ?></textarea>
									</td>
								</tr> 	
								<tr>
									<td align="center" class="paddingtopbottom5" colspan="8" valign="top">
									<input type="button" name="button" value="Submit" onClick="javascript:SubmitAdmin(document.frmAdmin,'<?php echo $_GET['actionType']?>')" style="width:75px;">
									&nbsp;
									<input type="Reset" name="reset" value="Reset" style="width:75px;"></td>
                 </tr>								
							</form>								
						</table>
					<?php
					}
					else
					{?>
					<br>					
					 <table border="0" width="100%" cellspacing="1" cellpadding="3">
                         <tr>
                   <td valign="top" colspan="6" style="padding : 5px 0px 5px 15px" class="Treb13Purple">[ <a href="<?php echo php_href_link(CURRENT_PAGE,php_get_all_get_params(array('action_type','ID','msg')) . 'actionType=content_insert') ?>" class="trebuchet13greyN">Add Content </a> ] <br>
            <br></td>
                 </tr>	
						<form name="frmState" id="frmState" method="post">
							<input type="hidden" name="ID" id="ID" value="">
							<input type="hidden" name="actionType" id="actionType" value="">						
							<?php
							if(isset($_GET['msg']))
							{
							?>
							<tr>
								<td valign="top" class="error" align="center" colspan="7"><?php echo $arrMessage[$_GET['msg']]?></td>
							</tr>
							<?php
							}
							?>
							<tr>
								<td valign="top" width="2%" class="list_header" align="center">Sr.No.</td>
                                <td valign="top"  width="10%" class="list_header" align="center">Title</td>
								<td valign="top"  width="10%" class="list_header" align="center">Content</td>
           						<td valign="top" width="20%" class="list_header" align="center">Action</td>
							</tr>
                            
                            <?php
							$IntSrNo = 1;
							$qryState= "select * from ".TABLE_LISTING." order by contentid DESC";

							$state_per_page = '20';
							$state_page_upto = '30';
							$state_split = new splitPageResults($qryState, $state_per_page);
							$state_rs = php_db_query($state_split->sql_query);
							$num_rows = php_db_num_rows($state_rs);
							
							if($num_rows)
							{
								while($arrState = php_db_fetch_array($state_rs))
								{
									?>
                            
                          		  <tr>
										<td  align="center" valign="top" class="list"><?php echo $IntSrNo; ?></td>
                                        <td  align="center" valign="top" class="list"><?php echo $arrState['title']; ?></td>	
										<td  align="center" valign="top" class="list"><?php echo $arrState['paraone']; ?></td>							
										<td  align="center" valign="top" class="list">[ <a href="<?php echo php_href_link(CURRENT_PAGE,php_get_all_get_params(array('actionType','ID','msg' )) . 'actionType=content_update' .'&ID='. $arrState['contentid'] ) ?>">Edit </a>  | <a class="list" href="javascript:SubmitDeleteState(document.frmState,'delete','<?php echo $arrState['contentid']; ?>')">Delete</a>
										]</td>
								 </tr>
                            
								<?php $IntSrNo++;
								}
								?>
								<tr>
								<td valign="top" colspan="6">
									<table width="100%" cellpadding="0" cellspacing="0" border="0">
										<tr>
											<td valign="top">&nbsp;</td>
										</tr>
										<tr>
											<td valign="top" align="right">
											<?php
												echo $state_split->display_links($state_page_upto, php_get_all_get_params(array('page', 'msg' , 'info', 'x', 'y')));
											?>
											</td>
										</tr>
									</table>
								</td>
							</tr>
								<?php
							}else{?>
                             <tr>
								<td valign="top"  class="error" align="center" colspan="6" bgcolor="#6699CC"><b>There is no more contact details .</b></td>
							</tr>                     
                            <?php }?>
                            </form>
                      </table>
					<?php
					}//main else complete
					?>
				
				</td>
			<tr>
		</table>        
		</td>
		</tr>
	</table>   
		<?php include(DIR_WS_MODULES . 'adminbottom.php'); ?>
	</body>
</html>