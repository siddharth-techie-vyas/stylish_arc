<?php 
require_once ("DBController.php");
require_once ("Inventory.php");
class Sales {
    private $db_handle;
   
    function __construct() {
        $this->db_handle = new DBController();
        
    }
	
	function addsales($bene_id,$order_date,$due_date,$ship_due_date,$billto,$shipto,$shipvia,$shipviadetails,$purchase_order_nu,$invoice_nu,$payment_terms,$discount,$subtotal,$shipping,$charges,$total,$warehouse)
	{
		
		$subtotal = number_format((float)$subtotal, 2, '.', '');
        $discount = number_format((float)$discount, 2, '.', '');
	 	$shipping = number_format((float)$shipping, 2, '.', '');
        $charges = number_format((float)$discount, 2, '.', '');
        $total = number_format((float)$total, 2, '.', '');

		$status ='pending';
		//$sql = "insert into sales (bene_id,order_date,due_date,ship_due_date,billto,shipto,shipvia,shipviadetails,purchase_order_nu,invoice_nu,payment_terms,discount,subtotal,shipping,charges,total,warehouse,status) VALUES ('$bene_id','$order_date','$due_date','$ship_due_date','$billto','$shipto','$shipvia','$shipviadetails','$purchase_order_nu','$invoice_nu','$payment_terms','$discount','$subtotal','$shipping','$charges','$total','$warehouse','$status')";
		$query = "insert into sales (bene_id,order_date,due_date,ship_due_date,billto,shipto,shipvia,shipviadetails,purchase_order_nu,invoice_nu,payment_terms,discount,subtotal,shipping,charges,total,warehouse,status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

       $paramType = "isssssssssssiiiiis";
        $paramValue = array(
            $bene_id,$order_date,$due_date,$ship_due_date,$billto,$shipto,$shipvia,$shipviadetails,$purchase_order_nu,$invoice_nu,$payment_terms,$discount,$subtotal,$shipping,$charges,$total,$warehouse,$status
        );
        //print_r ($paramValue);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        //exit();

       //$result = $this->db_handle->runBaseQuery($sql);
        return $insertId;
	}
	
	function insertSalesProduct($pcode,$pcode_alt,$pdesc,$qty,$rate,$amount,$sid)
	{
	 	$rate = number_format((float)$rate, 2, '.', '');
		$amount = number_format((float)$amount, 2, '.', '');
	 	//$query = "INSERT INTO sales_purchase_details (pcode,pcode_alt,pdesc,qty,rate,amount,oid) VALUES ('$pcode','$pcode_alt','$pdesc','$qty','$rate','$amount','$sid')";
	 	$query = "INSERT INTO sales_purchase_details (pcode,pcode_alt,pdesc,qty,rate,amount,oid) VALUES (?,?,?,?,?,?,?)";
		$paramType = "sssiiii";
		$paramValue = array(
			$pcode,$pcode_alt,$pdesc,$qty,$rate,$amount,$sid
			);
		$insertId = $this->db_handle->insert($query, $paramType, $paramValue);
		return $insertId;
		/*$result = $this->db_handle->runBaseQuery($query);
        return $result;*/
							
		
	}
	
	function getAllSales()
	{
		$sql = "SELECT * FROM sales ORDER BY order_date DESC";  
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}

	function getAllSales_limit($lower_limit,$page_limit)
	{
		$sql=" SELECT * FROM sales ORDER BY order_date DESC limit ". ($lower_limit)." ,  ". ($page_limit). " ";
		$result = $this->db_handle->runBaseQuery($sql);
        return $result;

	}
	
	function getinvoice($id)
	{
		$query = "SELECT * FROM sales WHERE id = '$id' OR purchase_order_nu = '$id' ";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
	}
	
	function getInvoiceProduct($id)
	{
		$query = "SELECT * FROM sales_purchase_details WHERE oid = '$id' ";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function getInvoiceProduct_all($col,$oid)
	{
		$query = "SELECT $col FROM sales_purchase_details WHERE oid = '$oid' ";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	//=========== get max id
	function getmaxsalesid()
	{
		$query = "SELECT * FROM sales Order by id DESC";
        
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
	}
	//============ get lowest id
	function getlowestsalesid($cid)
	{
		$query = "SELECT id FROM sales WHERE cid = '$cid' Order by id ASC";
        $paramType = "i";
        $paramValue = array(
            $cid
        );
        
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
	}
	
	
	
	function GstInvoiceNumber($cid,$id)
	{
		$lowestid = $this->getlowestsalesid($cid);
		$lid = $lowestid[0]["id"];
		$query = "SELECT * FROM sales WHERE cid=$cid AND id BETWEEN $lid AND $id";
        $paramType = "i";

        $paramValue = array(            
					$cid, 
					$id
        			);
        
        $result = $this->db_handle->runBaseQuery($query);
        $count = sizeof($result);
		return($count);
	}
	
	function delinvoice($id)
	{
		//--- delete sales products
		$query="select * from sales where id='$id'";
		$result = $this->db_handle->runBaseQuery($query);
		foreach ($result as $key => $value) 
			{
				$id=$result[$key]['id'];
				//delete_salesproducts($id);
			}	
		//--- delete sales
		$query = "delete from sales WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
       
	}
	
	function recover_invoice($id)
	{
		$query = "UPDATE sales SET  status='' WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
       
	}
	
	function view_edit_sales($id)
	{
		$query = "SELECT * FROM sales WHERE id = '$id'";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
	}
	
	function view_edit_sales_product($id)
	{
		$query = "SELECT * FROM sales_purchase_details WHERE oid = '$id'";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
	}
	
	function editsales($bene_id,$order_date,$due_date,$ship_date,$ship_due_date,$billto,$shipto,$shipvia,$shipviadetails,$purchase_order_nu,$invoice_nu,$payment_terms,$discount,$subtotal,$shipping,$charges,$total,$warehouse,$status,$id)
	 {

	 	$subtotal = number_format((float)$subtotal, 2, '.', '');
        $discount = number_format((float)$discount, 2, '.', '');
	 	$shipping = number_format((float)$shipping, 2, '.', '');
        $charges = number_format((float)$charges, 2, '.', '');
        $total = number_format((float)$total, 2, '.', '');

        $query = "UPDATE sales SET bene_id='$bene_id',order_date='$order_date',due_date='$due_date',ship_date='$ship_date',ship_due_date='$ship_due_date',billto='$billto',shipto='$shipto',shipvia='$shipvia',shipviadetails='$shipviadetails',purchase_order_nu='$purchase_order_nu',invoice_nu='$invoice_nu',payment_terms='$payment_terms',discount='$discount',subtotal='$subtotal',shipping='$shipping',charges='$charges',total='$total',warehouse='$warehouse',status='$status' WHERE id = '$id' ";
     
    // exit();
        
        /*$paramType = "issssssssssiiiiiiisi";
        $paramValue = array(
            $bene_id,$order_date,$due_date,$ship_date,$ship_due_date,$billto,$shipto,$shipvia,$shipviadetails,$purchase_order_nu,$invoice_nu,$payment_terms,$discount,$subtotal,$shipping,$charges,$total,$warehouse,$status,$id);
       //print_r ($paramValue);
		//exit(); 
         $editId = $this->db_handle->update($query, $paramType, $paramValue);*/
         $editId = $this->db_handle->runSingleQuery($query);
		 return $editId;
    }
	
	function editSalesProduct($pcode,$pcode_alt,$pdesc,$qty,$rate,$amount,$pid)
	{
		$rate = number_format((float)$rate, 2, '.', '');
		$amount = number_format((float)$amount, 2, '.', '');

		 $query = "UPDATE sales_purchase_details SET pcode='$pcode',pcode_alt='$pcode_alt',pdesc='$pdesc',qty='$qty',rate='$rate',amount='$amount' WHERE id = '$pid'";
		
        /*$paramType = "sssiiii";
        $paramValue = array(
            $pcode,$pcode_alt,$pdesc,$qty,$rate,$amount,$pid
        );
       
         $editId = $this->db_handle->update($query, $paramType, $paramValue);*/
         $editId = $this->db_handle->runSingleQuery($query);
		 return $editId;
	}
	
	function delete_salesproducts($id)
	{
		$select = "select * from sales_purchase_details where id = $id";
		$selectId = $this->db_handle->runBaseQuery($select);
		$last_amt = $selectId[0]['amount'];
		$oid = $selectId[0]['oid'];
		$pcode = $selectId[0]['pcode'];
		

		$selectfromsales = "select * from sales where id = $oid";
		$selectfrmId = $this->db_handle->runBaseQuery($selectfromsales);
		$total_amt = $selectfrmId[0]['total'];
		$sub_amt = $selectfrmId[0]['subtotal'];
		$warehouse = $selectfrmId[0]['warehouse'];
		$order_date = $selectfrmId[0]['order_date'];

		$total = $total_amt - $last_amt;
		$subtotal = $sub_amt - $last_amt;

		$update = "Update sales SET total = '$total', subtotal = '$subtotal'  where id = $oid";
		$updateId = $this->db_handle->runSingleQuery($update);

		$query = "delete from sales_purchase_details WHERE id = '$id'";
        $deleteId = $this->db_handle->runSingleQuery($query);

        //--- maintain history and stock
        $inventory = new Inventory();
        $inventory->return_item($oid,$warehouse,$pcode,$order_date); 

		header("Location: index.php?action=update-sales&status=danger&type=deleted&id=".$oid);
	}
	
	function beneficiery_all()
	{
		$query = "Select * from sales where cid='".$_SESSION['uid']."' GROUP BY bname Order by bname ASC";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
	}
	
	

	function searchinvoice($x)
	{
		$query = "select * from sales where purchase_order_nu = $x";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;	
	}

	function get_orderon_status($status)
	{
		$query = "select * from sales where status = '$status' order by id DESC" ;
		$result = $this->db_handle->runBaseQuery($query);
        return $result;	
	}

	function get_orderon_status_today($status)
	{
		$today = date('Y-m-d');
		$query = "select * from sales where status = '$status' AND order_date='$today' order by id DESC" ;
		$result = $this->db_handle->runBaseQuery($query);
        return $result;	
	}

	function generate_invoice_number($ship_date,$status,$id)
	{
		$ship_date = $ship_date;
		$status = $status;
		$id = $id;

		$query = "select * from sales where id = $id";
		$result = $this->db_handle->runBaseQuery($query);
        $order_date = $result[0]['order_date'];
        $order_due_date = $result[0]['due_date'];
        $net = $result[0]['payment_terms'];	 
        $due_date = date('Y-m-d', strtotime($ship_date. ' + '.$net.' days'));
        $update="update sales SET invoice_date = '$ship_date' , ship_date='$ship_date', due_date = '$due_date',status='$status' where id='$id' ";
        $result0 = $this->db_handle->runSingleQuery($update);
        return $result0;	 
	}

	function getsales_data_bene($pcode,$oid_array)
	{
		$oids = array();  
		 foreach ($oid_array as $k => $value) {
                             array_push($oids, $oid_array[$k]['id']);
                         }
		$oids1= implode(',', $oids);

 		$sql = "SELECT oid FROM sales_purchase_details WHERE pcode ='$pcode' AND oid IN ($oids1) ";
 		$result0 = $this->db_handle->runBaseQuery($sql);
        return $result0;	 
	}

	function getsalesdetails($data,$datafield,$reqfield)
	{
		$sql = "SELECT $reqfield FROM sales WHERE $datafield ='$data'  ";
 		$result0 = $this->db_handle->runBaseQuery($sql);
        return $result0;	 
	}

	function getfinal_oids($beneid,$from,$to,$pcode,$month)
	{
		 //$query="SELECT id from sales where bene_id='$beneid' AND order_date BETWEEN '$from' AND '$to' ";
		 $year= date('Y');
		 $query="SELECT id from sales where bene_id='$beneid' AND MONTH(order_date) = $month AND YEAR(order_date) = $year ";
 		$result = $this->db_handle->runBaseQuery($query);
        
        //-- get sum fro  array
        $oids = array();  
		 foreach ($result as $k => $value) {
                             array_push($oids, $result[$k]['id']);
                         }
		$oids1= implode(',', $oids); 

		//--- check in sales_purchase
		//$query0="SELECT SUM(qty) AS qty from sales_purchase_details where pcode='$pcode' AND oid IN ($oids1) ";
		$query0="SELECT SUM(qty) AS qty from sales_purchase_details where oid IN ($oids1) AND (pcode='$pcode' OR pcode_alt = '$pcode')   ";

		$result0 = $this->db_handle->runBaseQuery($query0);
		return $result0;

	}

	function get_sales_product_details($pcode,$oid,$col)
	{
		$query0="SELECT $col from sales_purchase_details where pcode='$pcode' AND oid='$oid' ";
		$result0 = $this->db_handle->runSingleQuery($query0);
		if(count($result0)<1){$result0='0.00';}
		return $result0;
	}

	function get_max_saling_price($pcode)
	{
		$query0="SELECT max(rate) from sales_purchase_details where pcode='$pcode' ";
		$result0 = $this->db_handle->runSingleQuery($query0);
		return $result0;
	}

	function get_sales_search($data)
	{
		$query0="SELECT * from sales where purchase_order_nu LIKE '%$data%' OR invoice_date LIKE '%$data%' OR ship_date LIKE '%$data%' ORDER BY order_date DESC  ";
		$result0 = $this->db_handle->runBaseQuery($query0);
		if(count($result0) < 1 )
		{
			 $query0="SELECT * FROM sales_purchase_details INNER JOIN sales ON  sales_purchase_details.pcode LIKE '%$data%' AND sales_purchase_details.oid = sales.id ORDER BY sales.order_date DESC";
			$result0 = $this->db_handle->runBaseQuery($query0);
			return $result0;
		}
		
		return $result0;
	}

	
}	
?>	

