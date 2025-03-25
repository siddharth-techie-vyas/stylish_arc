<?php 
require_once ("DBController.php");

class Inventory {

private $db_handle;
   
    function __construct() {
        $this->db_handle = new DBController();
    }

    //========== collection
    function create_collection($picture, $collection_name)
    {
        $query = "INSERT INTO product_category(cat,image,collection)VALUES (?,?,?)";
        $paramType = "ssi";
        $paramValue = array($collection_name, $picture,'1');
        $result=$this->db_handle->insert($query, $paramType, $paramValue);
        return $result;
    }


    function create_category($picture, $cat)
    {
        $query = "INSERT INTO product_category(cat,image,collection)VALUES (?,?,?)";
        $paramType = "ssi";
        $paramValue = array($cat, $picture,'0');
        $result=$this->db_handle->insert($query, $paramType, $paramValue);
        return $result;
    }

    function create_subcategory($picture, $cat, $subcat)
    {
        $query = "INSERT INTO product_category(cat,subcat,image,collection)VALUES (?,?,?,?)";
        $paramType = "sssi";
        $paramValue = array($cat,$subcat, $picture,'0');
        $result=$this->db_handle->insert($query, $paramType, $paramValue);
        return $result;
    }


    function get_all_collection()
    {
        $query = "SELECT * FROM product_category where collection='1' ";
        $result=$this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_all_collection_limit($limit)
    {
        $query = "SELECT * FROM product_category where collection='1' ORDER by rand() LIMIT $limit ";
        $result=$this->db_handle->runBaseQuery($query);
        return $result;
    }
    //----------products

	function save($picture, $buyer_code, $sku_code, $cat, $product_name, $hsn_code, $width, $length, $height, $gross_cbm, $color, $assembly, $case_number, $fob, $usd, $pcs_cartoon, $cartoon_per_pcs, $picture2)
    {

        $fob = number_format((float)$fob, 2, '.', '');
        $query = "INSERT INTO products(picture, buyer_code, sku_code, cat, product_name, hsn_code, width,length,height,gross_cbm,color,assembly,case_number, fob, usd, pcs_cartoon, cartoon_per_pcs, picture_gallery)VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $paramType = "ssssssssssssssssss";
        $paramValue = array($picture, $buyer_code, $sku_code, $cat, $product_name, $hsn_code, $width, $length, $height, $gross_cbm, $color, $assembly, $case_number, $fob, $usd, $pcs_cartoon, $cartoon_per_pcs, $picture2 );
        
        $this->db_handle->insert($query, $paramType, $paramValue);

        //-- get maxid and return
        $sql = "SELECT MAX(id) AS maxid FROM products";
        $result = $this->db_handle->runBaseQuery($sql);
        $maxid=$result[0]['maxid'];
        return $maxid;
    }
	
	function getall()
	{
		$sql = "SELECT * FROM products ORDER BY id DESC";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}
	
	function delete($id)
	{
		$sql = "delete FROM products where id = $id ";
        
        $result = $this->db_handle->runSingleQuery($sql);
        return $result;
	}
	
	function getone($id)
	{
		$sql = "select *  FROM products where id = $id ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}
	
	function getone_product_accessories($id)
	{
		 $sql = "select * FROM product_accessories where pid = '$id' ";
        $result = $this->db_handle->runBaseQuery($sql);
        
        return $result;
	}

    function getone_product_details($id)
	{
		$sql = "select * FROM product_details where pid = '$id' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}

    function getone_product_details_bymaterial($id,$material)
    {
        $sql = "select * FROM product_details where pid = '$id' AND material LIKE '%$material%'";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function getone_product_details_nomaterial($id)
    {
        $sql = "select * FROM product_details where pid = '$id' AND material NOT LIKE '%cartoon%' AND material NOT LIKE '%wood%' AND material NOT LIKE '%iron%' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function getone_product_details_material($id,$material)
	{
		$sql = "select * FROM product_details where pid = '$id' AND material='$material' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}

    function get_product_history($id)
    {
        $sql = "SELECT * FROM product_history ORDER BY id DESC ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function add_details($pid,$material,$clength,$cwidth,$cheight,$cbm,$weight_cartoon,$weight_plastic,$weight_wood,$weight_iron,$net_weight,$gross_weight)
    {
        $query = "INSERT INTO product_details(pid,material,clength,cwidth,cheight,cbm,weight_cartoon,weight_plastic,weight_wood,weight_iron,net_weight,gross_weight)VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
        $paramType = "isssssssssss";
        $paramValue = array($pid,$material,$clength,$cwidth,$cheight,$cbm,$weight_cartoon,$weight_plastic,$weight_wood,$weight_iron,$net_weight,$gross_weight);
        
        $this->db_handle->insert($query, $paramType, $paramValue);
    }
	
	function update($picture, $buyer_code, $sku_code, $shipping_mark, $product_name, $hsn_code, $width, $length, $height, $gross_cbm, $color, $assembly, $case_number, $fob, $usd, $pcs_cartoon, $cartoon_per_pcs, $lshape, $id)
    {
        $query = "update products SET picture='$picture',buyer_code='$buyer_code',sku_code='$sku_code',shipping_mark='$shipping_mark',product_name='$product_name',hsn_code='$hsn_code',width='$width',length='$length',height='$height',gross_cbm='$gross_cbm' ,color='$color',assembly='$assembly',case_number='$case_number',fob='$fob',usd='$usd',pcs_cartoon='$pcs_cartoon',cartoon_per_pcs='$cartoon_per_pcs',l_shape='$lshape' where id='$id' ";
        $insertId = $this->db_handle->update($query);
    	return $insertId;
    }   
    
    function add_product_details($pid,$acce0,$qty0,$remark0)
    {
        $query = "INSERT INTO product_accessories(pid,acce,qty,remark)VALUES (?,?,?,?)";
        $paramType = "iiis";
        $paramValue = array($pid,$acce0,$qty0,$remark0);
        $this->db_handle->insert($query, $paramType, $paramValue);
    }

    function delete_accesories($id)
    {
        $query = "DELETE FROM product_accessories WHERE id = $id";
        $this->db_handle->update($query);
    }

    function delete_details($id)
    {
        $query = "DELETE FROM product_details WHERE id = $id";
        $this->db_handle->update($query);
    }

    function delete_product($id)
    {
        $query = "DELETE FROM products WHERE id = $id";
        $this->db_handle->update($query);
        
        $query0 = "DELETE FROM product_details WHERE pid = $id";
        $this->db_handle->update($query0);

        $query0 = "DELETE FROM product_accesories WHERE pid = $id";
        $this->db_handle->update($query0);

    }

    function update_cbm($pid)
    {
        $sum="select SUM(cbm) AS cbm_f from product_details where pid = '$pid' ";
        $sum=$this->db_handle->runBaseQuery($sum);
        $cbm_f=$sum[0]['cbm_f'];
        //-- update sum
        $update="update products SET gross_cbm='$cbm_f' where id='$pid' ";
        $update = $this->db_handle->update($update);
    	return $update;
    }

    //-- cat and subcatregory
    function get_collection_all()
    {
        $sql = "SELECT DISTINCT(cat) FROM product_category where collection='1' ORDER BY cat ASC ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function get_category($id)
    {
        $sql = "SELECT * FROM product_category where id='$id' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function get_category_all()
    {
        $sql = "SELECT DISTINCT(cat),id,image FROM product_category where cat NOT REGEXP '^[0-9]+$' AND collection='0' ORDER BY cat ASC ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function get_subcategory_all($cat)
    {
        $sql = "SELECT * FROM product_category where cat='$cat' ORDER BY subcat ASC ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function get_subcategories()
    {
        $sql = "SELECT * FROM product_category where cat REGEXP '^[0-9]+$' ORDER BY subcat ASC ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }


    function delete_collection($id)
    {
        $sql = "delete FROM product_category where id='$id'";
        $result = $this->db_handle->update($sql);
        return $result;
    }

    

    function get_all_category()
    {
        $sql = "select * FROM product_category where collection='0' AND cat NOT REGEXP '^[0-9]+$' ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
?>
