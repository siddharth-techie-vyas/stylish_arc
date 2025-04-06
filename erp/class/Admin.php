<?php 
require_once ("DBController.php");

class Admin {
    private $db_handle;
   
    function __construct() {
        $this->db_handle = new DBController();
    }

//==== utility	
	function upload_image($pic)
	{
		$a=$pic;
		$filename = $a['name'];
		$tempname = $a["tmp_name"];
		
        //-- rename file
        $temp = explode(".", $filename);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $folder = "../assets/images/". $newfilename;


		if (move_uploaded_file($tempname, $folder)) {
			return $newfilename;
		} else {
			return 0;
		}
	}

//========= users
    function create_user($uname,$upass,$utype,$email,$contact)
	{
		
		$query = "insert into tbluser(uname,upass,utype,uemail,ucontact)VALUES(?,?,?,?,?)";
        $paramType = "sssss";
        $paramValue = array($uname,$upass,$utype,$email,$contact);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    	return $insertId;    
    }

    function get_maxid()
    {
    	$query="select MAX(id) as id from tbluser";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

	function edit_user($uname,$upass,$utype,$email,$contact,$id)
	{
		$query = "Update tbluser SET uname='$uname',upass='$upass',utype='$utype',uemail='$email',ucontact='$contact' where id='$id' ";
        $insertId = $this->db_handle->update($query);
        //return $insertId;
	}

	function delete_user($id)
	{
		$query="delete from tbluser where id='$id' ";
		$result = $this->db_handle->runSingleQuery($query);
        return $result;	
	}

	function get_alluser()
	{
		$query="select * from tbluser";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

    function get_officeuser()
	{
		$query="select * from tbluser";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}


	function getone_user($id)
	{
		$query="select * from tbluser where id = $id";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function getonetype_user($utype)
	{
		$query="select * from tbluser where utype = $utype Order by uname DESC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;	
	}

	//================META DATA
	
    function get_metaname()
    {
        $query = "select * from meta_data GROUP BY meta_name DESC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_metaname_byvalue($meta_name)
    {
        $query = "select * from meta_data where meta_name='$meta_name'";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

	function get_metaname_byvalue2($meta_name,$value2)
    {
        $query = "select * from meta_data where meta_name='$meta_name' AND value2='$value2' ";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_metaname_byid($id)
    {
        $query = "select * from meta_data where id='$id'";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function create_meta($metaname,$value1,$value2)
    {
        $query = "insert into meta_data(meta_name,value1,value2)VALUES(?,?,?)";
        $paramType = "sss";
        $paramValue = array($metaname,$value1,$value2);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
		return $insertId;
    }

	function viewall_meta()
    {
        $query = "select * from meta_data ORDER BY id DESC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function delete_meta($id)
    {
        $query = "delete from meta_data where id='".$id."' ";   
        $result = $this->db_handle->runSingleQuery($query);
        return $result;
    }


//========== company
function get_company()
{
        $query = "select * from company_details where id='1'";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;    
}


//======== country state city (ALL)
function get_country()
{
    $query = "select * from countries Order by name ASC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}
function get_states($country_id)
{
    $query = "select * from states where country_id='$country_id' Order by name ASC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}
function get_cities($state_id)
{
    $query = "select * from cities where state_id='$state_id' Order by name ASC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

//======== country state city (single)
function get_country_one($id)
{
    $query = "select * from countries where id='$id'";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}
function get_states_one($id)
{
    $query = "select * from states where id='$id'";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}
function get_cities_one($id)
{
    $query = "select * from cities where  id='$id'";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}


function update_company($cname,$acnu,$acbank,$ifsc,$bank_address,$iec,$vriksh,$vriksh_cert,$pan,$cnwebsiteame,$logo,$banner,$address,$phone,$reg_type,$regnu,$state,$state_code,$country,$swift,$rex)
{
    $query = "update company_details SET cname='$cname',acnu='$acnu',acbank='$acbank',ifsc='$ifsc',bank_address='$bank_address',iec='$iec',vriksh='$vriksh',vriksh_cert='$vriksh_cert',pan='$pan',website='$cnwebsiteame',logo='$logo',banner='$banner',address='$address',phone='$phone',reg_type='$reg_type',regnu='$regnu',state='$state',state_code='$state_code',country='$country',swift='$swift',rex='$rex' where id='1' ";
    $result = $this->db_handle->update($query);
    return $result;
}

//========= website config
function get_website_config($ctype)
{
    $query = "select * from website_config where ctype='$ctype'";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function get_random_product()
{
    $query = "select * from products ORDER by RAND() LIMIT 8";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function get_testimonials_limit($limit)
{
    $query = "select * from testimonials ORDER by RAND() LIMIT $limit";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}
//===========class end 
}

