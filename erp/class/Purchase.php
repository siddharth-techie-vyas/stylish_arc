<?php 
require_once ("DBController.php");
require_once ("Inventory.php");
class Purchase {

private $db_handle;
    function __construct() {
        $this->db_handle = new DBController();
      }

    function addpurchase($bene_id,$ship_due_date,$shipvia,$purchase_order_nu,$payment_terms,$discount,$subtotal,$shipping,$charges,$total,$remark,$port,$shipto,$totalcbm,$nu_container,$container_type)
    {
        
        $total = number_format((float)$total, 2, '.', '');
        $charges = number_format((float)$charges, 2, '.', '');
        $shipping = number_format((float)$shipping, 2, '.', '');
        $subtotal = number_format((float)$subtotal, 2, '.', '');
        $discount = number_format((float)$discount, 2, '.', '');
        $totalcbm = number_format((float)$totalcbm, 2, '.', '');
        
        $status ='pending';
        
       //$paramType = "issssiiiiisssisii";
       $query = "insert into purchase (bene_id,ship_due_date,shipvia,purchase_order_nu,payment_terms,discount,subtotal,shipping,charges,total,remark,port,shipto,totalcbm,status,nu_container,container_type) VALUES ('$bene_id','$ship_due_date','$shipvia','$purchase_order_nu','$payment_terms','$discount','$subtotal','$shipping','$charges','$total','$remark','$port','$shipto','$totalcbm','$status','$nu_container','$container_type')";
        /*$paramType = "issssiiiiisssisii";
        $nu_container = number_format((float)$nu_container, 2, '.', '');
        $paramValue = array(
            $bene_id,$ship_due_date,$shipvia,$purchase_order_nu,$payment_terms,$discount,$subtotal,$shipping,$charges,$total,$remark,$port,$shipto,$totalcbm,$status,$nu_container,$container_type);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        print_r ($paramValue);*/
        
        //exit();
        $result = $this->db_handle->runSingleQuery($query);
        return $result;
    }

    function updatepurchase($bene_id,$ship_due_date,$shipvia,$purchase_order_nu,$payment_terms,$discount,$subtotal,$shipping,$charges,$total,$remark,$port,$shipto,$totalcbm,$nu_container,$container_type,$id)
    {
        
        $total = number_format((float)$total, 2, '.', '');
        $charges = number_format((float)$charges, 2, '.', '');
        $shipping = number_format((float)$shipping, 2, '.', '');
        $subtotal = number_format((float)$subtotal, 2, '.', '');
        $discount = number_format((float)$discount, 2, '.', '');
        $totalcbm = number_format((float)$totalcbm, 2, '.', '');
        
        $status ='pending';
       $query = "UPDATE purchase SET bene_id=?,ship_due_date=?,shipvia=?,purchase_order_nu=?,payment_terms=?,discount=?,subtotal=?,shipping=?,charges=?,total=?,remark=?,port=?,shipto=?,totalcbm=?,status=?,nu_container=?,container_type=? where id=? ";
        $paramType = "issssiiiiisssisiii";
        $nu_container = number_format((float)$nu_container, 2, '.', '');
        $paramValue = array(
            $bene_id,$ship_due_date,$shipvia,$purchase_order_nu,$payment_terms,$discount,$subtotal,$shipping,$charges,$total,$remark,$port,$shipto,$totalcbm,$status,$nu_container,$container_type,$id
        );
        //print_r ($paramValue);
        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
       // exit();
        return $insertId;
    }

    function insertPurchaseProduct($pcode,$pcode_alt,$pdesc,$qty,$rate,$amount,$sid,$cbm)
    {
        $cbm = number_format((float)$cbm, 2, '.','');
        $rate = number_format((float)$rate, 2, '.','');
        $amount = number_format((float)$amount, 2, '.','');
        //$qty_pending = $qty;
        $query = "INSERT INTO purchase_details (pcode,pcode_alt,pdesc,qty,rate,amount,oid,cbm,qty_pending) VALUES ('$pcode','$pcode_alt','$pdesc','$qty','$rate','$amount','$sid','$cbm','$qty')";
        $result = $this->db_handle->runSingleQuery($query);
        
        return $result;
        
    }

    function updatePurchaseProduct($pcode,$pcode_alt,$pdesc,$qty,$rate,$amount,$sid,$cbm,$pid)
    {
        $cbm = number_format((float)$cbm, 2, '.','');
        $rate = number_format((float)$rate, 2, '.','');
        $amount = number_format((float)$amount, 2, '.','');
        //$qty_pending = $qty;
         $query = "UPDATE purchase_details SET pcode='$pcode',pcode_alt='$pcode_alt',pdesc='$pdesc,qty='$qty,rate='$rate',amount='$amount',oid='$oid',cbm='$cbm',qty_pending='$qty' where id='$pid' ";
        $result = $this->db_handle->runSingleQuery($query);
        
        return $result;
        
    }


    //=========== get max id
    function getmaxpurchaseid()
    {
        $query = "SELECT * FROM purchase Order by id DESC";
        
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function getAllPurchase()
    {
        $sql = "SELECT * FROM purchase ORDER BY ship_due_date DESC";  
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function getAllPurchase_limit($lower_limit,$page_limit)
    {
        $sql=" SELECT * FROM purchase ORDER BY ship_due_date DESC limit ". ($lower_limit)." ,  ". ($page_limit). " ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;

    }

    function getPO($id)
    {
        $query = "SELECT * FROM purchase WHERE id = '$id' OR purchase_order_nu = '$id' ";
        $paramType = "i";
        $paramValue = array(
            $id
        );
        
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }
    
    function getPOProduct($id)
    {
        $query = "SELECT * FROM purchase_details WHERE oid = '$id' ";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }


    function get_orderon_status($status)
    {
        $query = "select * from purchase where status = '$status' order by id DESC" ;
        $result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }

    

    function getfielddata($value,$tblname,$col_send,$col_req)
    {
        $query = "select $col_req from $tblname where $col_send = '$value'" ;
        $result = $this->db_handle->runBaseQuery($query);
        if(count($result) == 1)
            {echo $result[0][$col_req];}
        elseif(count($result) > 1)
            {   echo "<option selected='selected'>-- Select --</option>";
                foreach ($result as $k => $v) { echo "<option>".$result[$k][$col_req]."</option>"; }}
        else {echo "No Data Found";}        
        return $result; 
    }

    function get_purchase_field($oid,$pcode,$col_req,$tblname)
    {
        $query = "select $col_req from $tblname where oid = '$oid' AND pcode='$pcode' ";
        $result = $this->db_handle->runSingleQuery($query);
        echo $result;
    }


    //---------- container functions
    function addcontainer($container_size,$container_details,$invoice_number,$cbm,$date_shipment,$status)
    {
        $cbm = number_format((float)$cbm, 2, '.', '');
        $query = "insert into purchase_container (container_size,container_details,invoice_number,totalcbm,date_shipment,status) VALUES (?,?,?,?,?,?)";
        $paramType = "ississ";
        $paramValue = array(
            $container_size,$container_details,$invoice_number,$cbm,$date_shipment,$status
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);

        return $insertId;
    }

    function insertContainerProduct($pcode,$oid,$cid,$qty_shipped,$qty_pending,$cbm,$status)
    {
        $cbm = number_format((float)$cbm, 2, '.', '');
        $query = "insert into purchase_container_products (pcode,oid,cid,qty_shipped,cbm,status) VALUES (?,?,?,?,?,?)";
        $paramType = "siiiis";
        $paramValue = array(
            $pcode,$oid,$cid,$qty_shipped,$cbm,$status
        );
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);

        //--- update purchase_details
        $getdata = "select * from purchase_details where oid = '$oid' AND pcode = '$pcode'";
        $result = $this->db_handle->runBaseQuery($getdata);
        $shipped = $qty_shipped + $result[0]['qty_shipped'];
        $pending = $qty_pending;


         $query1 = "Update purchase_details SET qty_shipped = '$shipped', qty_pending = '$pending' where oid = '$oid' AND pcode = '$pcode'  ";
        $updateId = $this->db_handle->runSingleQuery($query1);
        




        return $insertId;
    }

    function getmaxcontainerid()
    {
        $query="select * from purchase_container Order by id DESC";
        $result=$this->db_handle->runBaseQuery($query);
        return $result;
    }


    function conatinerdata($id)
    {
        $query="select * from purchase_container where id = '$id'";
        $result=$this->db_handle->runBaseQuery($query);
        return $result;
    }

    function conatinerdata_product($id)
    {
             $query="select * from purchase_container_products where cid = '$id'";
        $result=$this->db_handle->runBaseQuery($query);
        return $result;
    }

    function conatinerall()
    {
        $query="select * from purchase_container Order by id DESC ";
        $result=$this->db_handle->runBaseQuery($query);
        return $result;
    }


    function updatecontainer_product($received,$pending,$id,$pcode,$wid, $type)
    {
       $inventory = new Inventory();
       $db = new DBController;
       $current_time = $db->default_timezone();
       // -- get history stock
        $get = "select * from warehouse_stock where product_code = '$pcode' AND wid = '$wid' ";
        $result0 = $this->db_handle->runSingleQuery($get);
        $stock_history_last = $result0[0]["history"];
        $stock_history_cur = $type.' '.$received.' Pcs at '.$current_time.' by '.$_SESSION['uname'];
        $history_stock = $stock_history_cur.','.$stock_history_last;
        $updatedqty = $result0[0]['stock'] + $received;


       //-- get history container
       $sql = "select *  FROM purchase_container_products where id = '$id'";
       $check = $this->db_handle->runBaseQuery($sql);
       $last_history = $check[0]["history"];
       $cur_history = $type.' '.$received.' Pcs at '.$current_time.' by '.$_SESSION['uname'];
       $history = $cur_history.','.$last_history;


        $query = "Update purchase_container_products SET qty_received='$received', qty_pending='$pending', history='$history' where id='$id' " ;
        $result = $this->db_handle->runSingleQuery($query);
        

        //-- add to inventory
        $inventory->updatestock($pcode, $wid, $received, $type);
        
        echo 'Inventory Updated<br>';

        return $result; 
    }

    function updatecontainer_status($status,$id,$date,$wid)
    {
        echo 'Status changed to '.$status.' on '.$date;
        $query="UPDATE purchase_container SET status='$status', date_received = '$date', wid = '$wid' where id = '$id' ";
        $result=$this->db_handle->runBaseQuery($query);

        return $result;
    }

    function deletepo($id)
    {
        $query="delete from purchase where id='$id'";
        $result=$this->db_handle->runSingleQuery($query);

         $query0="delete from purchase_details where oid='$id'";
        $result0=$this->db_handle->runSingleQuery($query0);

        return $result0;

    }

    function update_ship_date($status_update,$ship_date,$id)
    {
        $query0="update purchase SET status='$status_update',ship_date='$ship_date' where id='$id'";
        $result0=$this->db_handle->runSingleQuery($query0);
        return $result0;
    }

    function purchase_order_product_delete($id)
    {
         $query="select * from purchase_details where id = $id";
        $result=$this->db_handle->runBaseQuery($query);
          $cbm = $result[0]['cbm'];
        $amount = $result[0]['amount'];
        $oid = $result[0]['oid'];
        
         $query1 = "select * from purchase where id=$oid";
        $result1=$this->db_handle->runBaseQuery($query1);
        $newcbm = $result1[0]['totalcbm'] - $cbm;
        $newsubtotal = $result1[0]['subtotal'] - $amount;
        $newtotal = $result1[0]['total'] - $amount;

         $query2="UPDATE purchase SET totalcbm = '$newcbm', subtotal='$newsubtotal',total='$newtotal'  where id=$oid";
        $result2=$this->db_handle->runSingleQuery($query2);

        $query3="delete from purchase_details where id = $id";
        $result3=$this->db_handle->runSingleQuery($query3);
        return $result3;


    }

    function update_po_product_receive($received,$pending,$id)
    {
        $query = "Update purchase_details SET qty_received='$received', qty_pending='$pending' where id='$id' " ;
        $result = $this->db_handle->runSingleQuery($query);
        return $query;
    }
    
    function delete_container($id)
    {
        $query="delete from purchase_container where id='$id'";
        $result=$this->db_handle->runSingleQuery($query);

        $query0="delete from purchase_container_products where cid='$id'";
        $result0=$this->db_handle->runSingleQuery($query0);

        return $result0;

    }
}