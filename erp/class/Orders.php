<?php 
require_once ("DBController.php");
require_once ("Store.php");

class Orders {
    private $db_handle;
   
    function __construct() {
        $this->db_handle = new DBController();
        $this->store = new Store();
    }

//--insert 
function create_order($client_name,$order_date,$ship_date,$pi_nu,$pi_date,$country,$usd_inr)
{
    $added_by=$_SESSION['uid'];
    $query = "insert into orders(client,order_date,ship_date,pi_nu,pi_date,country,usd_inr,added_by,status)VALUES(?,?,?,?,?,?,?,?,?)";
    $paramType = "ssssssssi";
    $paramValue = array($client_name,$order_date,$ship_date,$pi_nu,$pi_date,$country,$usd_inr,$added_by,'2');
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertId;  
}

function create_po($order_id,$supplier_id,$delivery_date,$grace_period,$order_date,$po_nu,$potype)
{
    $added_by=$_SESSION['uid'];
    $status='1';
    $query = "insert into orders_po(order_id,supplier_id,delivery_date,grace_period,order_date,added_by,status,order_po_nu,potype)VALUES(?,?,?,?,?,?,?,?,?)";
    $paramType = "ssssssssi";
    $paramValue = array($order_id,$supplier_id,$delivery_date,$grace_period,$order_date,$added_by,$status,$po_nu,$potype);
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertId;
}


function add_product($pid,$oid)
{
    $query = "insert into order_details(pid,oid)VALUES(?,?)";
    $paramType = "ii";
    $paramValue = array($pid,$oid);
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertId;
}

function add_order_details($id,$qty,$price,$total,$hsn,$cbm,$color,$lshape,$cartoon)
{
    $query = "update order_details SET qty='$qty',price_fob='$price',total_usd='$total',hsn='$hsn',cbm_pcs='$cbm',color='$color',lshape='$lshape',cartoon_item='$cartoon' where id='$id' ";
    $insertId = $this->db_handle->update($query);
}

function add_order_details2($opid,$op_detail,$pid,$qty,$blank,$remark)
{
    $query = "insert into order_details2(opid,op_detail,value1,value2,value3,value4)VALUES(?,?,?,?,?,?)";
    $paramType = "isssss";
    $paramValue = array($opid,$op_detail,$pid,$qty,$blank,$remark);
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    //return $insertId;

    //-- reduce stock from store_item tbl
    $reduce="update store_item SET stock=stock-$qty where id='$pid' ";
    $reduce_result = $this->db_handle->update($reduce);

    //-- update history of stock items
    $hremark=$qty.' used in Order # '.$opid;
    $history = $this->store->update_stock_history($qty,$pid,'Dr.',$hremark);

}

function add_product_po($pid,$oid,$poid)
{
    $query = "insert into orders_po_details(pid,oid,poid)VALUES(?,?,?)";
    $paramType = "iii";
    $paramValue = array($pid,$oid,$poid);
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertId;
}

function create_po_material($order_nu,$supplier_id,$delivery_date,$grace_period,$order_date,$order_po_nu,$potype,$id)
{
     $query = "insert into orders_po_material(order_id,supplier_id,delivery_date,grace_period,order_date,order_po_nu,potype,id)VALUES(?,?,?,?,?,?,?,?)";
    $paramType = "iisissii";
    $paramValue = array($order_nu,$supplier_id,$delivery_date,$grace_period,$order_date,$order_po_nu,$potype,$id);
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    return $insertId;
}
//-- view
function view_all_order()
{
    $query = "SELECT * FROM orders ORDER BY id DESC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}
function get_pending_orders()
{
    $query = "SELECT * FROM orders where status='2' ORDER BY id DESC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}
function viewall_po()
{
    $query = "SELECT * FROM orders_po ORDER BY id DESC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}
function get_order_one($id)
{
    $query = "SELECT * FROM orders where id='$id' ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}
function get_po_one($id)
{
    $query = "SELECT * FROM orders_po where id='$id' ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}
function get_po_one_material($id,$type)
{
    $query = "SELECT * FROM orders_po_material where potype='$type' AND id='$id' ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}
function get_order_by_status($status)
{
    echo $query = "SELECT * FROM orders where status='$status' ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}


function get_po_by_status($status)
{
    $query = "SELECT * FROM orders_po where status='$status' ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}


function get_po_one_details($poid)
{
    $query = "SELECT * FROM orders_po_details where poid='$poid' ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function get_product_details($id)
{
    $query = "SELECT * FROM order_details where oid='$id' ORDER BY id ASC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function get_product_detail_one($oid,$pid)
{
    $query = "SELECT * FROM order_details where oid='$oid' AND pid='$pid' ORDER BY id ASC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function check_product_po($pid,$oid,$poid)
{
    $query = "SELECT * FROM orders_po_details where oid='$oid' AND pid='$pid' AND poid='$poid'";
    $result = $this->db_handle->runSingleQuery($query);
    return $result;
}

function get_details_2($opid,$type)
{
    $query = "SELECT * FROM order_details2 where opid='$opid' AND op_detail='$type' ORDER BY id ASC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function get_po_products($id)
{
    echo $query = "SELECT * FROM order_details where oid='$id' ORDER BY id ASC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function po_supplier_products($oid,$poid)
{
    $query = "SELECT * FROM orders_po_details where oid='$oid' AND poid='$poid' ORDER BY id ASC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function check_same_item_in_po($poid,$pid)
{
    $query = "SELECT * FROM orders_po_details where oid='$poid' AND pid='$pid' ORDER BY id ASC";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}
//--- edit
function edit_order($client_name,$order_nu,$order_date,$ship_date,$pi_nu,$pi_date,$country,$usd_inr,$status,$id)
{
    $query = "update orders SET client='$client_name',order_nu='$order_nu',order_date='$order_date',ship_date='$ship_date',pi_nu='$pi_nu',pi_date='$pi_date',country='$country',usd_inr='$usd_inr',status='$status' where id='$id' ";
    $insertId = $this->db_handle->update($query);
      
}

function edit_po($order_id,$supplier_id,$delivery_date,$grace_period,$order_date,$order_po_nu,$id)
{
     $query = "update orders_po SET order_id='$order_id',supplier_id='$supplier_id',delivery_date='$delivery_date',grace_period='$grace_period',order_date='$order_date',order_po_nu='$order_po_nu' where id='$id' ";
    $insertId = $this->db_handle->update($query);
      
}

function edit_order_po_detail($id,$price,$qty,$total,$remark)
{
    $query = "update orders_po_details SET price='$price',qty='$qty',total='$total',remark='$remark' where id='$id' ";
    $insertId = $this->db_handle->update($query);
}
//-- delete
function delete_product_order($id)
{
    $delete="delete from order_details where id='$id'";
    $result = $this->db_handle->update($delete);
    return $result;
}
function delete_order_details2($id)
{
    $delete="delete from order_details2 where id='$id'";
    $result = $this->db_handle->update($delete);
    return $result;
}
function delete_order($id)
{
    $delete="delete from orders where id='$id'";
    $result = $this->db_handle->update($delete);
    return $result;

    $delete0="DELETE FROM order_details JOIN order_details2 ON order_details.id = order_details2.opid where order_details.oid='$id' ";
    $result0 = $this->db_handle->update($delete0);
    return $result0;

    $delete="delete from orders_po where order_id='$id'";
    $result = $this->db_handle->update($delete);
    return $result;

}
function delete_po_item($id)
{
    $delete="delete from orders_po_details where id='$id'";
    $result = $this->db_handle->update($delete);
    return $result;

}

function check_po_qty($poid)
{
    $po="select * from orders_po_details where poid='$poid'";
    $result = $this->db_handle->runBaseQuery($po);
    $counter=0;
    if(COUNT($result)>0)
    {
        foreach($result as $row=> $value)
        {
            $qty_total=$result[$row]['qty'];
            $received_total=$result[$row]['received'];
            if($qty_total!=$received_total)
            {
                $counter++;
            }
        }
    }
    else {$counter='0.5';}    
    return $counter;
}


function update_order_status($poid,$status)
{
    $po="update orders_po SET status='$status' where id='$poid'";
    $result = $this->db_handle->runSingleQuery($po);
    return $result;
}

function get_po_sum($id)
{
    $po="select SUM(total) AS total from orders_po_details where poid='$id'";
    $result = $this->db_handle->runBaseQuery($po);
    return $result[0]['total'];
}

function generate_invoice($irn,$ack_nu,$ack_date,$reverse_charge,$commercial_invoice_nu,$commercial_invoice_date,$performa_invoice_nu,$performa_invoice_date,$eway_nu,$lutnu,$lut_date,$batch_code,$eseal_nu,$container_nu,$vehical_nu,$date_time_ship,$line_nu,$sb_nu,$pre_by,$sb_date,$bill_ladding_nu,$port_discharge,$pre_carrier_place,$port_loading,$vessel_nu,$trade_discount,$freight_charges,$other_charges,$total_usd,$advance_payment,$oid,$amt_usd,$amt_inr)
{
    $added_by=$_SESSION['uid'];
     $query="insert into order_invoice(irn,ack_nu,ack_date,reverse_charge,commercial_invoice_nu,commercial_invoice_date,performa_invoice_nu,performa_invoice_date,eway_nu,lutnu,lut_date,batch_code,eseal_nu,container_nu,vehical_nu,date_time_ship,line_nu,sb_nu,pre_by,sb_date,bill_ladding_nu,port_discharge,pre_carrier_place,port_loading,vessel_nu,trade_discount,freight_charges,other_charges,total_usd,advance_payment,oid,added_by,amt_usd,amt_inr)Values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
     $paramType = "ssssssssssssssssssssssssssssssssss";
     $paramValue = array($irn,$ack_nu,$ack_date,$reverse_charge,$commercial_invoice_nu,$commercial_invoice_date,$performa_invoice_nu,$performa_invoice_date,$eway_nu,$lutnu,$lut_date,$batch_code,$eseal_nu,$container_nu,$vehical_nu,$date_time_ship,$line_nu,$sb_nu,$pre_by,$sb_date,$bill_ladding_nu,$port_discharge,$pre_carrier_place,$port_loading,$vessel_nu,$trade_discount,$freight_charges,$other_charges,$total_usd,$advance_payment,$oid,$added_by,$amt_usd,$amt_inr);
     $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
     return $insertId;
}

function edit_invoice($irn,$ack_nu,$ack_date,$reverse_charge,$commercial_invoice_nu,$commercial_invoice_date,$performa_invoice_nu,$performa_invoice_date,$eway_nu,$lutnu,$lut_date,$batch_code,$eseal_nu,$container_nu,$vehical_nu,$date_time_ship,$line_nu,$sb_nu,$pre_by,$sb_date,$bill_ladding_nu,$port_discharge,$pre_carrier_place,$port_loading,$vessel_nu,$trade_discount,$freight_charges,$other_charges,$total_usd,$advance_payment,$oid,$amt_usd,$amt_inr,$poid)
{
    
     $query="update  order_invoice SET irn='$irn',ack_nu='$ack_nu',ack_date='$ack_date',reverse_charge='$reverse_charge',commercial_invoice_nu='$commercial_invoice_nu',commercial_invoice_date='$commercial_invoice_date',performa_invoice_nu='$performa_invoice_nu',performa_invoice_date='$performa_invoice_date',eway_nu='$eway_nu',lutnu='$lutnu',lut_date='$lut_date',batch_code='$batch_code',eseal_nu='$eseal_nu',container_nu='$container_nu',vehical_nu='$vehical_nu',date_time_ship='$date_time_ship',line_nu='$line_nu',sb_nu='$sb_nu',pre_by='$pre_by',sb_date='$sb_date',bill_ladding_nu='$bill_ladding_nu',port_discharge='$port_discharge',pre_carrier_place='$pre_carrier_place',port_loading='$port_loading',vessel_nu='$vessel_nu',trade_discount='$trade_discount',freight_charges='$freight_charges',other_charges='$other_charges',total_usd='$total_usd',advance_payment='$advance_payment',oid='$oid',added_by='$advance_payment',amt_usd='$amt_usd',amt_inr='$amt_inr' where id='$poid' ";
     $insertId = $this->db_handle->update($query);
     return $insertId;
}

function get_invoice($order_id)
{
     $query = "SELECT * FROM order_invoice where oid='$order_id' ";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function check_po($id)
{
    $po="select * from order_invoice where oid='$id'  ";
    $result = $this->db_handle->runBaseQuery($po);
    return $result;
}

function final_invoice_save($oid,$invoice_nu)
{
    //-- check invoice duplicacy
    $order_in="select id from order_invoice where invoice_nu='$invoice_nu'";
    $result = $this->db_handle->runBaseQuery($order_in);
    if($result)
    {echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=order-invoice-edit&id=$oid&status=4';</script>";}
    
    else{
    $query = "update order_invoice SET invoice_nu='$invoice_nu' where oid='$oid' ";
    $result = $this->db_handle->update($query);   
    //-- change order status
    $query0 = "update orders SET status='1' where id='$oid' ";
    $result0 = $this->db_handle->update($query0); 
    //- forward to print status
    echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=order-invoice-final&id=$_POST[oid]&status=3';</script>";

    }
}

function get_max_po_nu()
{
    $sql = "SELECT MAX(id) AS maxid FROM orders_po";
    $result = $this->db_handle->runBaseQuery($sql);
    $maxid=$result[0]['maxid'];
    return $maxid;
}

function delete_po($id)
{
    $done=array();
    $notdone=array();
    $orderpo=$this->get_po_one($id);
    if(!$orderpo)
    {
        echo '<div class="alert alert-secondary">Something went wrong !!!</div>';
    }
    else {
        $details=$this->get_po_one_details($id);

        $sql = "delete from orders_po where id='".$id."' ";
        $result = $this->db_handle->update($sql);

        foreach($details as $k=>$v)
        {
            $qty_rece = $details[$k]['received'];
            if($qty_rece=='0')
            {
                 $sql = "delete from order_po_details where id='".$details[$k]['id']."' ";
                $result = $this->db_handle->update($sql);
                array_push($done,$details[$k]['pid']);
            }
            else
            {
                array_push($notdone,$details[$k]['pid']);
            }
        }

       if(empty($notdone))
        {
            echo '<div class="alert alert-danger">Item Deleted '.count($done).' & PO deleted successfully. Refresh window to hide row !!!</div>';
        }
       else 
       {
            echo '<div class="alert alert-danger">Item Not Deleted : '.count($notdone).', To delete PO completely you need to cancel PO first.<br>Item Deleted : '.count($done).'</div>';
       } 
        
    }
}


//================ container furctions
//---------- container functions
function addcontainer($container_size,$container_details,$invoice_number,$cbm,$date_shipment,$status)
{
    $cbm = number_format((float)$cbm, 2, '.', '');
    $query = "insert into container (container_size,container_details,invoice_number,totalcbm,date_shipment,status) VALUES (?,?,?,?,?,?)";
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
    $query = "insert into container_products (pcode,oid,cid,qty_shipped,cbm,status) VALUES (?,?,?,?,?,?)";
    $paramType = "siiiis";
    $paramValue = array(
        $pcode,$oid,$cid,$qty_shipped,$cbm,$status
    );
    $insertId = $this->db_handle->insert($query, $paramType, $paramValue);

    //--- update details
    $getdata = "select * from details where oid = '$oid' AND pcode = '$pcode'";
    $result = $this->db_handle->runBaseQuery($getdata);
    $shipped = $qty_shipped + $result[0]['qty_shipped'];
    $pending = $qty_pending;


     $query1 = "Update details SET qty_shipped = '$shipped', qty_pending = '$pending' where oid = '$oid' AND pcode = '$pcode'  ";
    $updateId = $this->db_handle->runSingleQuery($query1);
    




    return $insertId;
}

function getmaxcontainerid()
{
    $query="select * from container Order by id DESC";
    $result=$this->db_handle->runBaseQuery($query);
    return $result;
}


function conatinerdata($id)
{
    $query="select * from container where id = '$id'";
    $result=$this->db_handle->runBaseQuery($query);
    return $result;
}

function conatinerdata_product($id)
{
         $query="select * from container_products where cid = '$id'";
    $result=$this->db_handle->runBaseQuery($query);
    return $result;
}

function conatinerall()
{
    $query="select * from container Order by id DESC ";
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
   $sql = "select *  FROM container_products where id = '$id'";
   $check = $this->db_handle->runBaseQuery($sql);
   $last_history = $check[0]["history"];
   $cur_history = $type.' '.$received.' Pcs at '.$current_time.' by '.$_SESSION['uname'];
   $history = $cur_history.','.$last_history;


    $query = "Update container_products SET qty_received='$received', qty_pending='$pending', history='$history' where id='$id' " ;
    $result = $this->db_handle->runSingleQuery($query);
    

    //-- add to inventory
    $inventory->updatestock($pcode, $wid, $received, $type);
    
    echo 'Inventory Updated<br>';

    return $result; 
}

function updatecontainer_status($status,$id,$date,$wid)
{
    echo 'Status changed to '.$status.' on '.$date;
    $query="UPDATE container SET status='$status', date_received = '$date', wid = '$wid' where id = '$id' ";
    $result=$this->db_handle->runBaseQuery($query);

    return $result;
}


//-------- container functions
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

function get_sales_week()
{
     $query = "select order_details.oid,SUM(order_details.total_usd) AS amount from order_details INNER JOIN orders where orders.id=order_details.id GROUP BY order_details.oid";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

function get_po_week()
{
    $query = "select orders_po_details.oid,SUM(orders_po_details.total) AS amount from orders_po_details INNER JOIN orders where orders.id=orders_po_details.id GROUP BY orders_po_details.oid";
    $result = $this->db_handle->runBaseQuery($query);
    return $result;
}

}