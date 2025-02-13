<?php 
require_once ("DBController.php");

class Accounts {
    private $db_handle;
   
    function __construct() {
        $this->db_handle = new DBController();
    }

    //=== beneficiery
    function create_beneficiery($bname,$country_code,$email,$contact,$gstin,$btype,$acctype,$address) 
	{
        $query = "INSERT INTO beneficiery(bname,country_code,created_date,email,contact,gstin,btype,acctype,address) VALUES (?,?,?,?,?,?,?,?,?)";
        $paramType = "ssssssiis";
        $paramValue = array($bname,$country_code,$created_date,$email,$contact,$gstin,$btype,$acctype,$address);       
		
         $result = $this->db_handle->insert($query, $paramType, $paramValue);
		 return $result;
    }

    function edit_beneficiery($bname,$country_code,$email,$contact,$gstin,$btype,$acctype,$address,$bene_code,$id) 
	{
         $query="update beneficiery SET bname='$bname',country_code='$country_code',email='$email',contact='$contact',gstin='$gstin',btype='$btype',acctype='$acctype',address='$address',bene_code='$bene_code' where bene_id='$id' ";
        $result = $this->db_handle->update($query);
        return $result;
    }
    function getall_beneficiery()
	{
		$sql = "SELECT * FROM beneficiery ORDER BY bene_id DESC";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}

    function get_beneficiery_one($id)
	{
		$sql = "SELECT * FROM beneficiery where bene_id='$id' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}


    function getall_beneficiery_sametype($btype)
	{
		$sql = "SELECT * FROM beneficiery where btype='$btype' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}

    function delete_beneficiery($id)
    {
		$sql = "DELETE FROM beneficiery where bene_id='$id' ";
        $result = $this->db_handle->update($sql);
    }
}