
<?php
$company=$admin->get_company();
$order_edit=$order->get_po_one($_GET['id']);
$order_details=$order->get_order_one($order_edit[0]['order_id']);
$bene=$accounts->get_beneficiery_one($order_edit[0]['supplier_id']);
//--- po file name
$po_filename = $order_edit[0]['order_po_nu'].'-'.date('d-m-Y',strtotime($order_edit[0]['order_date'])).'-'.$bene[0]['bname'];
?>

<!-- <input type="button" name="pdf" value="PDF" id="pdfbtn" onclick="generate_pdf('po','<?php echo $_SESSION['pdf_prefix'];?>-PO-<?php echo $order_edit[0]['order_po_nu'];?>','portrait')"> -->


<input type="button" class='btn btn-warning'  name="excel" value="Excel" onclick="exportToExcel('pdfdown','<?php echo $po_filename;?>')">

<button type="button" class='btn btn-info' name="pdf"  type="button" onclick="htmlget('pdfdown','<?php echo $po_filename;?>')" value="get html"><i class="fa fa-file-pdf"></i> Download PDF</button>
<div id="editor"></div>



<div class="html-content" id="pdfdown">
<table border="1" class="table table-bordered" id="po" >
   <input type="hidden" name="txtFileName" id="txtFileName" value="qwqw">
    <tr>
        <th colspan="2">
        <?php
$path = $base_url.'theme/assets/images/'.$company[0]['logo'];
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
<img src="<?php echo $base64?>" width="auto" height="90"/> 
        </th>
        <th class="text-center" colspan="4">
            <h3><?php echo $company[0]['cname'];?></h3>
            <h5><?php echo $company[0]['reg_type'].' :- '.$company[0]['regnu']; ?></h5>
            <h6><?php echo 'Contact :-'.$company[0]['phone'].' Email :-'.$company[0]['email']; ?></h6>
            
        </th>
    </tr>
    <tr>
        <th colspan="7" class="text-center bg-warning"><h2>Purchase Order</h2></th>
    </tr>
    <tr>
        <!-- bill to--->
         <tr>
            <th colspan="3">Billing Detail :-</th>
            <th colspan="4">Delivery Address :-</th>
         </tr>
         <tr>
            <th>Name</th>
            <td colspan="2"><?php echo $bene[0]['bname'];?></td>
            <th>Name</th>
            <td colspan="3"><?php echo $company[0]['cname'];?></td>
         </tr>
         <tr>
            <th>GSTIN</th>
            <td colspan="2"><?php echo $bene[0]['gstin'];?></td>
            <th>GSTIN</th>
            <td colspan="3"><?php echo $company[0]['regnu'];?></td>
         </tr>
         <tr>
            <th>Contact</th>
            <td colspan="2"><?php echo $bene[0]['contact'].' / '.$bene[0]['email'];?></td>
            <th>Contact</th>
            <td colspan="3"><?php echo $company[0]['phone'].' / '.$company[0]['email']; ?></td>
         </tr>
         <tr>
            <th>Address</th>
            <td colspan="2"><?php echo $bene[0]['address'];?></td>
            <th>Address</th>
            <td colspan="3"><?php echo $company[0]['address'];?></td>
         </tr>
    </tr>
    <tr>          
        <th>Delivery Date</th>
        <td><?php echo date("d-m-Y", strtotime($order_edit[0]['delivery_date']));?></td>
        <th>PO #</th>
        <td  colspan="2"><?php echo $order_edit[0]['order_po_nu'];?></td>
        
        <th>Order Date</th>
        <td colspan="3"><?php echo date("d-m-Y", strtotime($order_edit[0]['order_date']));?></td>
    </tr>
    <tr>  
        
        <th>Grace Period</th>
        <td><?php echo $order_edit[0]['grace_period'].' Days';?></td>
        <th>PI #</th>
        <td><?php echo $order_details[0]['pi_nu'];?></td>
        <th>Sale Order #</th>
        <td colspan="2"><?php echo $order_details[0]['order_nu'];?></td>
    </tr>
    <tr>
        <th>#</th>
        <th>Image</th>
        <th>Product</th>
        <th>Material (CM)</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Total</th>
    </tr>
    
    <?php 
        $countt=0;
       $counter=1;
       $po_supplier_products=$order->po_supplier_products($order_edit[0]['order_id'],$order_edit[0]['id']);
       foreach($po_supplier_products as $k=>$value){
        //-- product details
        $pdetails=$product->getone_product_details_material($po_supplier_products[$k]['pid'],$po_supplier_products[$k]['remark']); 
        //-- order price 
        $order_detail=$order->get_product_detail_one($order_edit[0]['order_id'],$po_supplier_products[$k]['pid']);
        ?>
    <tr>
        <th width="11%"><?php echo $counter++;?></th>
        <th width="10%">
            <?php 
            $pname=$product->getone($po_supplier_products[$k]['pid']);
            $filename = 'theme/assets/images/'.$pname[0]['picture'];
            if(file_exists($filename)){
            $item = $filename;
            $type = pathinfo($item, PATHINFO_EXTENSION);
            $data = file_get_contents($item);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            ?>
            <img src="<?php echo $base64;?>" height="40" width="auto">
            <?php }else{?>    
            <i class="fa fa-3x fa-image"></i>
            <?php } ?>
        </th>
        <td width="33%"><?php  echo "<b>".$pname[0]['sku_code']." / ".$pname[0]['buyer_code']."</b><br><small>".$pname[0]['product_name']."</small>";?></td>
        <td width="11%"><?php echo $po_supplier_products[$k]['remark'];?>
          <small style="font-size:10px;"><?php 
            //-- item details
           echo $pdetails[0]['clength'].' x '.$pdetails[0]['cwidth'].' x '.$pdetails[0]['cheight'];    
           ?>   </small>  
        </td>
        <td width="11%"><?php echo $po_supplier_products[$k]['price'];?></td>
        <td width="15%"><?php echo $po_supplier_products[$k]['qty'];?></td>
        <td width="20%"><?php echo $po_supplier_products[$k]['total']; $countt=$countt+$po_supplier_products[$k]['total'];?></td>
    </tr>
    <?php }?>
        <tr>
            <td colspan="4" rowspan="4"><h6>For <?php echo $company[0]['cname'];?></h6><hr></td>
            <th class="bg-secondary text-white">Total</th>
            <th><?php echo $countt;?></th>
       </tr>
         <tr>
            <th class="bg-warning text-white">Tax %</th>
            <th>18%</th>
         </tr>       
         <tr>
            <th class="bg-info text-white">Tax Amount</th>
            <th><?php echo $tax=$countt*18/100;?></th>
         </tr>       
         <tr>
           
            <th class="bg-success text-white">Grand Total</th>
            <th><?php echo $countt+$tax;?></th>
         </tr>       
    
        <tr><td colspan="7" class="text-center bg-danger"><h6 class="text-white" ><?php echo $company[0]['address']; ?></h6></td></th>
        <tr>
        <td colspan="7" class="text-left">
        <h4>Rule(s) & Regulation(s)</h4>
        <?php $tandc=$admin->get_metaname_byvalue('tandc'); echo $tandc[0]['value1'];?>
        <hr>
        <p>
        <b>For : </b><?php echo $company[0]['cname'];?><br>
        <?php echo $company[0]['address'];?><br>
        Authorised Sign<br><br>
        </p>
        </td>
    </tr>
    
</table>
       </div>

     