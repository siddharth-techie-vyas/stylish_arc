<?php 
require_once ("class/DBController.php");

class Profile {
    private $db_handle;
   
    function __construct() {
        $this->db_handle = new DBController();
    }
	
	function view_profile($id)
	{
		$query = "SELECT * FROM tbluser WHERE id = '$id'";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
	}
	
	function editprofile($ucompany,$ugstin,$ustate,$ustate_code,$uoffice_address,$upass,$upin,$ucontact,$uemail,$uacnu,$uacbank,$uifsc,$uid) {
        $query = "UPDATE tbluser SET  ucompany=?,ugstin=?,ustate=?,ustate_code=?,uoffice_address=?,upass=?,upin=?,ucontact=?,uemail=?,uacnu=?,uacbank=?,uifsc=? WHERE id = ?";
        $paramType = "ssssssssssssi";
        $paramValue = array(
            $ucompany,
			$ugstin,
			$ustate,
			$ustate_code,
			$uoffice_address,
			$upass,
			$upin,
			$ucontact,
			$uemail,
			$uacnu,
			$uacbank,
			$uifsc,
			$uid
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }

	
//========================== E N D	
}	

?>	