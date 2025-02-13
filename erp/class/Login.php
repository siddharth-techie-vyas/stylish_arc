 <?php 
require_once ("DBController.php");
class Login {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
		
    }

	function checklogin($uname,$upass)
	{
		$sql = "SELECT * FROM tbluser where uname='$uname' AND upass='$upass' "; 
        $result = $this->db_handle->runBaseQuery($sql);
        $numrows = count($result);
        if (!empty($result)) 
		{
			
			foreach($result as $row)
			{
			 $_SESSION['uid'] = $row['id'];
			 $_SESSION['uname'] = $row['uname'];
			 $_SESSION['ucompany'] = $row['ucompany'];
			 $_SESSION['uoffice_address'] = $row['uoffice_address'];
			 $_SESSION['ucontact'] = $row['ucontact'];
			 $_SESSION['uemail'] = $row['uemail'];
			 $_SESSION['ugstin'] = $row['ugstin'];
			 $_SESSION['ustate'] = $row['ustate'];
			 $_SESSION['ustate_code'] = $row['ustate_code'];
			 $_SESSION['uacnu'] = $row['uacnu'];
			 $_SESSION['uacbank'] = $row['uacbank'];
			 $_SESSION['uifsc'] = $row['uifsc'];
			 $_SESSION['utype'] = $row['utype'];
			 $_SESSION['uedit'] = $row['uedit'];
			 $_SESSION['udelete'] = $row['udelete'];
			}
			 ?><script type="text/javascript">window.location = "index.php?action=dashboard";</script><?php
			 return $result;
 		}
 		else
		{ ?><script type="text/javascript">window.location = "index.php?action=incorrect-login";</script><?php }
    }
	
	function logout()
	{
			session_start();
			 unset($_SESSION['uid']);
			 unset($_SESSION['uname']);
			 unset($_SESSION['ucompany']);
			 unset($_SESSION['uoffice_address']);
			 unset($_SESSION['ucontact']);
			 unset($_SESSION['uemail']);
			 unset($_SESSION['ugstin']);
			 unset($_SESSION['ustate']);
			 unset($_SESSION['ustate_code']);
			 unset($_SESSION['uacnu']);
			 unset($_SESSION['uacbank']);
			 unset($_SESSION['uifsc']);
			 unset($_SESSION['utype']);
			 unset($_SESSION['uedit']);
			 unset($_SESSION['udelete']);
	?> <script type="text/javascript">alert("Successfully logout!");window.location = "index.php?action=login";</script>		
	<?php }
	
	/*function checksession($url)
	{
		
		if( empty($url) AND !empty($_SESSION['uid']) )
		{

		   echo "<script>Location='index.php?action=login'</script>";
		}	
		elseif(empty($_SESSION['uid']))
		{
			//echo $url;	
		 header('Location:'.$url);
		} 
		elseif(!empty($_SESSION['uid']))
		{
			echo $_SESSION['uname'];	
		  ///header('Location:'.$url);
		} 
		else {
			$login = new Login();
			$login->logout();
		  	echo "<script>Location='index.php?action=login'</script>";
		}
	}*/
	
}
?>