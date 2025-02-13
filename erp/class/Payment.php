<?php 
require_once ("DBController.php");

class Payment {

private $db_handle;
   
    function __construct() {
        $this->db_handle = new DBController();
    }


    function getpayment($btype,$bid,$payment_status,$from,$to)
    {
    	if($btype=='creditor')
		{
			if(!empty($from))
			{$sql="select * from purchase where bene_id = '$bid' AND payment_status='$payment_status' AND ship_due_date BETWEEN '$from' AND '$to' ";}	
			else
			{$sql="select * from purchase where bene_id = '$bid' AND payment_status='$payment_status' ";}
		}
		else
		{
			if(!empty($from))
			{
				//if($from )

				$sql="select * from sales where bene_id = '$bid' AND payment_status='$payment_status' AND order_date BETWEEN '$from' AND '$to' ";}	
			else
				{$sql="select * from sales where bene_id = '$bid' AND payment_status='$payment_status' ";}
		}	

        $result = $this->db_handle->runBaseQuery($sql);
        return $result;

    }

    function getvoucherdetails($ids)
    {
    	$sql="select * from sales where id IN (".implode(',',$ids).")";
    	$result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function addvoucher($vouchernu,$vdate,$all1,$all2,$all3,$all4,$all1_name,$all2_name,$all3_name,$all4_name,$amount,$remark)
	{
		$status ='pending';
		$query = "insert into payment (vouchernu,vdate,all1,all2,all3,all4,all1_name,all2_name,all3_name,all4_name,amount,status,remark) VALUES ('$vouchernu','$vdate','$all1','$all2','$all3','$all4','$all1_name','$all2_name','$all3_name','$all4_name','$amount','$status','$remark')";
        $insertId = $this->db_handle->runSingleQuery($query);
        return $insertId;

	}
	
	function insertVoucheroid($pid,$oid,$amount,$credit,$debit,$shipping,$discount,$pending,$total)
	{
	 
     	$query = "INSERT INTO payment_details (pid,oid,amount,credit,debit,shipping,discount,pending,total) VALUES ('$pid','$oid','$amount','$debit','$credit','$shipping','$discount','$pending','$total')";
		$insertId = $this->db_handle->runSingleQuery($query);
		return $insertId;
	}

	//=========== get max id
	function getmaxpaymentid()
	{
		$query = "SELECT * FROM payment Order by id DESC";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	//=========== get all
	function getall()
	{
		$query = "SELECT * FROM payment Order by vdate DESC";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	//--- get payment details 
	function getpaymentdetails($ids)
    {
    	$sql="select * from payment where id IN (".implode(',',$ids).")";
    	$result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    //------- update voucher tra id and other payment details
    function addpayment($id,$tradate,$method,$traid,$status)
    {
    	$sql="update payment SET status='$status',tradate='$tradate',method='$method',traid='$traid' where id='$id'";
    	$result = $this->db_handle->runSingleQuery($sql);
        	
        	$payment = new Payment();
    		$ids=$payment->getoids($id);
    		foreach ($ids as $key => $value) {
    			$oid=$ids[$key]['oid'];
    			$status='1';
    			$payment->vouchersubmit($oid,$status);
    		}

        return $result;


    }
    //----- change payment status in sale
    function vouchersubmit($oid,$payment_status)
    {
    	$sql="update sales SET payment_status='$payment_status' where id='$oid'";
    	$result = $this->db_handle->runSingleQuery($sql);
        return $result;
    }

    //----- get oids
    function getoids($voucherid)
    {
    	$sql="select * from payment_details where pid = '$voucherid'";
    	$result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    //----------- get poids
    function getpoids($po)
    {
        $sql="select * from sales where purchase_order_nu = $po ";
        $result = $this->db_handle->runBaseQuery($sql);
        //if(count($result)<1){echo $pos.' Not found !!';}
        return $result;
    }

}