<?php 
require_once ("DBController.php");
class Beneficiery {

private $db_handle;
   
    function __construct() {
        $this->db_handle = new DBController();
    }
	
	function save($bname,$country_code,$created_date,$email,$contact,$gstin,$export_format,$btype,$acctype,$supplier_id) 
	{
        $query = "INSERT INTO beneficiery (bname,country_code,created_date,email,contact,gstin,export_format,btype,acctype,supplier_id) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $paramType = "ssssisssss";
        $paramValue = array(
            $bname,$country_code,$created_date,$email,$contact,$gstin,$export_format,$btype,$acctype,$supplier_id
        );
        
		
         $result = $this->db_handle->insert($query, $paramType, $paramValue);
		 return $result;
    }
	
function update($bname,$country_code,$email,$contact,$gstin,$export_format,$btype,$acctype,$supplier_id,$id) {
        $query = "UPDATE beneficiery SET bname=?,country_code=?,email=?,contact=?,gstin=?,export_format=?,btype=?,acctype=?,supplier_id=? where bene_id=?";
        $paramType = "sssisssssi";
        $paramValue = array(
            $bname,$country_code,$email,$contact,$gstin,$export_format,$btype,$acctype,$supplier_id,$id
        );
        
        $result = $this->db_handle->update($query, $paramType, $paramValue);
		return $result;
    }
	
function getall()
	{
		$sql = "SELECT * FROM beneficiery ORDER BY bene_id DESC";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}

	function getall_choice($type)
	{
		$sql = "SELECT * FROM beneficiery where acctype = '$type' ORDER BY bene_id ASC";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}
	
	function delete($id)
	{
		$sql = "delete FROM beneficiery where bene_id = $id ";
        $result = $this->db_handle->runSingleQuery($sql);
		return $result;
	}
	
	function getone($id)
	{
		$sql = "select *  FROM beneficiery where bene_id = $id ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}
	
	function getexcelformat($id)
	{
		$sql = "select *  FROM excel_format where bene_id = $id Order by serial_nu"; 
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}
	
	function insert_excel_format($bene_id,$colname,$manual_colname,$example,$serial_nu)
	{
	 $query = "INSERT INTO excel_format (bene_id,colname,manual_colname,example,serial_nu) VALUES (?,?,?,?,?)";
        $paramType = "isssi";
        $paramValue = array(
            $bene_id,$colname,$manual_colname,$example,$serial_nu
        );
        
        $insert = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insert;
	}

	function update_excel_format($colname,$manual_colname,$example,$id)
	{
	   $query = "UPDATE excel_format SET colname=?,manual_colname=?,example=? where id=?";
        $paramType = "sssi";
        $paramValue = array(
           $colname,$manual_colname,$example,$id
        );
        
       $update =  $this->db_handle->insert($query, $paramType, $paramValue);
       //exit();
       return $update;

	}
	
	function getmaxbeneid()
	{
		$sql = "select * FROM portal_products Order by id DESC ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}
	
	function addextrafield($title, $value)
	{
		$sql = "insert into extra_fields (title, value) Values (?,?) ";
        $paramType = "ss";
        $paramValue = array(
            $title, $value
        );
        
        $this->db_handle->insert($sql, $paramType, $paramValue);
	}
	
	function getall_extrafields()
	{
		$sql = "SELECT * FROM  extra_fields ORDER BY id DESC";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}
	
	function getall_extrafields_report()
	{
		$sql = "SELECT * FROM  extra_fields GROUP BY title";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}
	
	function getall_exel_format()
	{
		$sql = "SELECT * FROM excel_format GROUP BY bene_id";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}
	
	function deleteexcelformat($id)
	{
		$sql = "delete FROM excel_format where bene_id = '$id' ";
        $result = $this->db_handle->runSingleQuery($sql);
        return $result;
	}
	
	function getportalproduct($bene_id)
	{
		$sql = "select * FROM portal_products where bene_id = '$bene_id' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}

	function deleteportalproducts($id)
	{
	$sql = "delete FROM portal_products where bene_id = '$id' ";
        $result = $this->db_handle->runSingleQuery($sql);
        return $result;
    }    
}
?>