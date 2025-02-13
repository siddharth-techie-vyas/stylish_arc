<div class="app-wrapper">
    
  <div class="app-content pt-3 p-md-3 p-lg-4">
  <div class="container-xl">
  <?php include('alerts.php');?>
  <?php 


$company=$admin->get_company();
$order_detail=$order->get_order_one($_GET['id']);

//--check po added or not
$po=$order->check_po($_GET['id']);
if($po[0]['invoice_nu']=='')
{
    echo "<div class='alert alert-success'>PO has been created, edit and process to create INVOICE</div>";
    echo "<a class='btn btn-warning' href='$base_url/index.php?action=dashboard&page=order-view' >Go Back</a>
    <a class='btn btn-info' href='$base_url/index.php?action=dashboard&page=order-invoice-preview&id=$_GET[id]' >Download PI</a> 
    <a class='btn btn-success' href='#' onclick='invoice_nu_get()'>Generate Invoice</a>";
    echo '<h1 class="app-page-title">Proforma Invoice</h1>';
    //-- invoice form
    ?>
    <form name='form_invoice' id='form_invoice' method='post' action='<?php echo $base_url.'index.php?action=order&query=final_invoice_submit';?>'>
    <input type='hidden' name='oid' value='<?php echo $_GET['id'];?>'/>
    <input type='hidden' name='final_invoice_nu' id='final_invoice_nu' value=''/>
</form>
    <?php
}
else{
    echo "<div class='alert alert-warning'>All the details has been already filled..</div>";
    echo "<a class='btn btn-warning' href='$base_url/index.php?action=dashboard&page=order-view' >Go Back</a> ";
    echo "<a class='btn btn-info' href='$base_url/index.php?action=dashboard&page=order-invoice-preview&id=$_GET[id]' >Download PO</a> ";
    echo "<a class='btn btn-success' href='$base_url/index.php?action=dashboard&page=order-invoice-final&id=$_GET[id]'>Download Invoice</a>";
   
    
    echo '<h1 class="app-page-title">Invoice</h1>';
}
?> 



    
      
      
      <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert" style="overflow-x:scroll">
 
<h5 class="text-danger"><em><b>Note:-</b><em> To generate an invoice, please fill all the details and click on Generate Invoice at the bottom right of the page. Before doing that please confirm all the pending quantity has been received from production.</h5>

<form name="generate_invoice" action="<?php echo $base_url.'index.php?action=order&query=edit_invoice';?>" method="post">
<!---hidden values------->
<input type="hidden" name='poid' value="<?php echo $po[0]['id'];?>" />
<input type="hidden" value="<?php echo $_GET['id'];?>" name="oid">
<input type="hidden" value="<?php echo $order_detail[0]['usd_inr'];?>" name="usd_convert" id="usd_convert">

<table class="table table-bordered table-striped"  style ="font-size:0.7em;">
<thead>
<tr>
    <td colspan="10">Tax Invoice</td>
    <td colspan="4">e-Invoice</td>
</tr>    
<tr>
    <td colspan="10">(SUPPLY MEANT FOR EXPORT/SUPPLY TO SEZ UNIT OR SEZ DEVELOPER
    FOR AUtdORISED OPERATIONS ON PAYMENT OF IGST)</td>
    <td  rowspan="4" colspan="4"></td>
</tr>
<tr>
    <td colspan="3">IRN</td>
    <td colspan="10"><input type="text" name="irn" value="<?php echo $po[0]['irn'];?>"></td>
</tr>
<tr>
    <td colspan="3">AcK No.</td>
    <td colspan="10"><input type="text" name="ack_nu" value="<?php echo $po[0]['ack_nu'];?>"></td>
</tr>
<tr>
    <td colspan="3">Ack Date</td>
    <td colspan="10"><input type="date" name="ack_date" value="<?php echo $po[0]['ack_date'];?>"></td>
</tr>

    <tr>
   <th colspan="10" rowspan="3">
     <h2 class="text-primary">PERFOMRA INVOICE</h2>
   </th>
</tr>   
<tr>
    <td></td>
    <th colspan="3">Original for Receipient</th>
</tr>    
<tr>
    <td></td>
    <th colspan="3">Duplicate for Supplier</th>
</tr> 
<tr>
    <th colspan="10"></th>
    <td></td>
    <th colspan="3">Triplicate for Transporter</th>
</tr>
<tr><th colspan="14">Supply Meant for Export on Payment of Integrated Tax (IGST)</th></tr>
<!-- billing details--->
<tr>
<th colspan="7">Exporter Details</th>
<th colspan="2">Reverse Charge</th>
<td colspan="2">
<select name="reverse_charge">
<option disabled='disbaled'>--Select--</option>
<option <?php if($po[0]['reverse_charge']=='Yes'){echo "selected='selected'";}?>>Yes</option>
<option <?php if($po[0]['reverse_charge']=='No'){echo "selected='selected'";}?>>No</option>    
</select>
</td>
<th>IEC</th>
<td colspan="2"><?php echo $company[0]['iec'];?></td>
</tr>

<tr>
<td colspan="7"><?php echo $company[0]['cname'];?></td>
<th colspan="2">Commercial Invoice No.</th>
<td colspan="2">
<input type="text" name="commercial_invoice_nu" value="<?php echo $po[0]['commercial_invoice_nu'];?>" >
</td>
<th>PAN</th>
<td colspan="2"><?php echo $company[0]['pan'];?></td>
</tr>

<tr>
<td colspan="7" rowspan="2"><?php echo $company[0]['address'];?></td>
<th colspan="2">Commercial Invoice Date</th>
<td colspan="2"><input type="date" name="commercial_invoice_date" value="<?php echo $po[0]['commercial_invoice_date'];?>"></td>
<th><?php echo $company[0]['reg_type'];?></th>
<td colspan="2"><?php echo $company[0]['regnu'];?></td>
</tr>

<tr>
<th colspan="2">Proforma Invoice No.</th>
<td colspan="2"><input type="text" name="performa_invoice_nu" value="<?php echo $po[0]['performa_invoice_nu'];?>" ></td>
<th>Buyer's Order No.</th>
<td colspan="2"><?php echo $order_detail[0]['order_nu'];?></td>
</tr>

<tr>
<th colspan="2">Contact</th>
<td colspan="5"><?php echo $company[0]['phone'];?></td>
<th colspan="2">Proforma Invoice Date</th>
<td colspan="2"><input type="date" name="performa_invoice_date" value="<?php echo $po[0]['performa_invoice_date'];?>" required></td>
<th>Buyer's Order Date</th>
<td colspan="2"><?php echo date("Y-m-d", strtotime($order_detail[0]['order_date'])); ?></td>
</tr>

<tr>
<th colspan="2">Email</th>
<td colspan="5"><?php echo $company[0]['email'];?></td>
<th colspan="4">Other Reference's</th>
<th colspan="3">Ship Window Date</th>
</tr>

<tr>
<th colspan="2">Website</th>
<td colspan="5"><?php echo $company[0]['website'];?></td>
<td colspan="2">REX Registration No</th>
<td colspan="2"><?php echo $company[0]['rex'];?></td>
<th colspan="3" rowspan="2">E-Way Bill No.<br>
<input type="text" name="eway_nu" value="<?php echo $po[0]['eway_nu'];?>">
</th>
</tr>

<tr>
<th colspan="2">State</th>
<td colspan="5"><?php echo $company[0]['state'];?></td>
<td>LUT No.</th>
<td><input type="text" name="lutnu" value="<?php echo $po[0]['lutnu'];?>"></td>
<th>LUT Date</th>
<td><input type="text" name="lut_date" value="<?php echo $po[0]['lut_date'];?>"></td>
</tr>

<tr>
<th colspan="2">Country</th>
<td colspan="5"><?php echo $company[0]['country'];?></td>
<td colspan="2">VRIKSH Cert. No.</th>
<td><?php echo $company[0]['vriksh'];?></td>
<th colspan="2" rowspan="2">Batch Code
<input type="text" name="batch_code" value="<?php echo $po[0]['batch_code'];?>">
</th>
</tr>

<tr>
<th colspan="2">State Code</th>
<td colspan="5"><?php echo $company[0]['state_code'];?></td>
<td colspan="2">VRIKSH Ship. Cert. No. :</th>
<td><?php echo $company[0]['vriksh_cert'];?></td>
<th colspan="2">Batch Code<br>
"VRIKSH CERTIFIED MATERIAL"	
</th>
</tr>

<!--- consinae details-->
<tr>
    <th colspan="7">Details of Consignee / Billed To</th>
    <th colspan="7">Details of Receiver / Shipped To</th>
</tr>
<tr>
    <td colspan="7"></td>
    <td colspan="7"></td>
</tr>
</thead>
<!--order details-->
<tbody>
    <!-- container-->
    <tr>
        <th colspan="2">Container No.</th>
        <th colspan="2">Vehicle No.</th>
        <th colspan="2">E-Seal No</th>
        <td colspan="2"><input type="text" name="eseal_nu" value="<?php echo $po[0]['eseal_nu'];?>"></td>
        <th colspan="2">Line Seal No.</th>
        <th colspan="2">Country of Origin of Goods</th>
        <th colspan="2">Country of Final Destination</th>
</tr>    
<tr>
        <th colspan="2"><input type="text" name="container_nu" value="<?php echo $po[0]['container_nu'];?>"></th>
        <th colspan="2"><input type="text" name="vehical_nu" value="<?php echo $po[0]['vehical_nu'];?>"></th>
        <th colspan="2">Date & Time</th>
        <td colspan="2"><input type="text" name="date_time_ship" value="<?php echo $po[0]['date_time_ship'];?>"></td>
        <th colspan="2"><input type="text" name="line_nu" value="<?php echo $po[0]['line_nu'];?>"></th>
        <th colspan="2"><?php echo $company[0]['country'];?></th>
        <th colspan="2"></th>
</tr>    
<tr>
        <th colspan="2">Pre Carriage By</th>
        <th>SB No.</th>
        <td colspan="2"><input type="text" name="sb_nu" value="<?php echo $po[0]['sb_nu'];?>"></td>
        <th colspan="2">Bill of Ladding Number</th>
        <th colspan="2">Port of Discharge</th>
        <th colspan="7">Terms of Delivery and Payment</th>
</tr>
<tr>
        <th colspan="2"><input type="text" name="pre_by" value="<?php echo $po[0]['pre_by'];?>"></th>
        <th>SB Date</th>
        <td colspan="2"><input type="date" name="sb_date" value="<?php echo $po[0]['sb_date'];?>"></td>
        <th colspan="2"><input type="text" name="bill_ladding_nu" value="<?php echo $po[0]['bill_ladding_nu'];?>"></th>
        <th colspan="2"><input type="text" name="port_discharge" value="<?php echo $po[0]['port_discharge'];?>"></th>
        <th colspan="7">Freight    : COLLECT</th>
</tr>    
<tr>
        <th colspan="2">Place of Pre-Carrier</th>
        <td colspan="3">Port of Loading</td>
        <th colspan="2">Vessel / Flieght No.</th>
        <th colspan="2">Final Destination</th>
        <th colspan="7">Prices     : FOB MUNDRA PORT</th>
</tr>    
<tr>
        <th colspan="2"><input type="text" name="pre_carrier_place" value="<?php echo $po[0]['pre_carrier_place'];?>"></th>
        <td colspan="3"><input type="text" name="port_loading" value="<?php echo $po[0]['port_loading'];?>"></td>
        <th colspan="2"><input type="text" name="vessel_nu" value="<?php echo $po[0]['vessel_nu'];?>"></th>
        <th colspan="2"></th>
        <th colspan="7">Payment : BY T. T. (30% ADVANCE & 70% AGAINST B/L)</th>
</tr>    
<!-------- order product details ---->
<tr>
    <th>#</th>
    <th>Buyer's Item Code</th>
    <th>Item Code</th>
    <th>Wood Type</th>
    <th>Name of Product<br><small>INDIAN WOODEN & IRON FURNITURE ITEMS</small></th>
    <th>HSN ACS</th>
    <th>UOM</th>
    <th>Qty</th>
    <th>Price ($)</th>
    <th>Amount ($)</th>
    <th>Total in INR without GST</th>
    <th colspan="2">IGST</th>
    <th>Total in INR including GST</th>
</tr>
<tr>
    <td colspan="11"></td>
    <th>Rate %</th>
    <th>Amount</th>
    <td></td>
</tr>
<?php 
$order_products=$order->get_product_details($_GET['id']);
$ocounter=1;
//-- counters
$total_inr=0;
$gst=0;
$qty=0;
$price_fob=0;
$total_usd=0;
$inr=0;


//-- variables
$total_inr1=0;
$gst1=0;
$qty1=0;
$price_fob1=0;
$total_usd1=0;
$inr1=0;

//--- final load
$net_final=0;
$gross_final=0;
$cbm_final=0;
$cartoon_final=0;
$cbm=0;
$pcs_final=0;


foreach($order_products as $k =>$value){
//--product

$pdetail=$product->getone($order_products[$k]['pid']);
//--product details
$pdetail2=$product->getone_product_details($order_products[$k]['pid']);
//$pcs_count=COUNT($pdetail2);
// --- counter for details
$net_weight=0;
$gross_weight=0;
$pcs=0;
$cartoon=0;
$cbm=0;

foreach($pdetail2 as $k1 =>$value)
{
    $net_weight+=$pdetail2[$k1]['net_weight'];
    $gross_weight+=$pdetail2[$k1]['gross_weight'];
    // $pcs=$pcs_count;
    // $cartoon=$pcs_count;
    $cbm+=$pdetail2[$k1]['cbm'];
}
//-- add into final

$net_final+=$net_weight*$order_products[$k]['qty'];
$gross_final+=$gross_weight*$order_products[$k]['qty'];
$cbm_final+=$cbm*$order_products[$k]['qty'];
$cartoon_final+=$pdetail[0]['cartoon_per_pcs']*$order_products[$k]['qty'];
$pcs_final+=$pdetail[0]['pcs_cartoon']*$order_products[$k]['qty'];
?>
<tr>
    <td><?php echo $ocounter++;?></td>
    <td><?php echo $pdetail[0]['buyer_code'];?></td>
    <td><?php echo $pdetail[0]['sku_code'];?></td>
    <td></td>
    <td><?php echo $pdetail[0]['product_name'];?></td>
    <td><?php echo $order_products[$k]['hsn'];?></td>
    <td></td>
    <td><?php echo $qty1=$order_products[$k]['qty']; 
                //$qty+=$qty1;
                ?>
    </td>
    <td><?php echo $price_fob1=$order_products[$k]['price_fob']; $price_fob+=$price_fob1?></td>
    <td><?php echo $total_usd1=$order_products[$k]['total_usd']; $total_usd+=$total_usd1;?></td>
    <td><?php echo $inr1=$order_products[$k]['total_usd']*$order_detail[0]['usd_inr']; $inr+=$inr1;?></td>
    <td>18</td>
    <td><?php echo $gst1=$inr1*18/100; $gst+=$gst1;?></td>
    <td><?php echo $total_inr1=$inr1+$gst1; $total_inr+=$total_inr1;?></td>
</tr>    
<?php }?>
</tbody>
<tfoot>
    <tr>
        <td></td>
        <th colspan="4">All goods are packed in foam and corrugated box.</th>
        <td colspan="9"></td>   
    </tr>    
    <tr>
        <th class="bg-info text-white" colspan="5">VRIKSH SHIPMENT CERTIFICATE IS ONLY FOR SHEESHAM WOOD ARTICLES</th>
        <th class="bg-danger text-white" colspan="2">Total</th>
        <td class="bg-secondary text-white"><?php echo $qty;?></td>
        <td class="bg-secondary text-white"><?php echo $price_fob;?></td>
        <td class="bg-secondary text-white"><?php echo $total_usd;?></td>
        <td class="bg-secondary text-white"><?php echo $inr;?></td>
        <td></td>
        <td class="bg-secondary text-white"><?php echo $gst;?></td>
        <td class="bg-success"><h4 class="text-white" id="actual_inr"><?php echo $total_round=round($total_inr);?></h4></td>
    </tr>
    <tr>
        <th colspan="6">Amount In Words</th>
        <td colspan="3">Total Net Wt. (Kgs.)</td>
        <th><?php echo $net_final;?></th>
        <td class="bg-danger" colspan="3">Less Trade Discount (INR)</td>
        <th><input type="text" name="trade_discount" id="trade_discount" value="<?php echo $po[0]['trade_discount'];?>" onkeyup="auto_calc()" required></th>
    </tr>
    <tr>
        <th colspan="6" rowspan="4">
            <h5 id="amount" style="text-transform: capitalize;"><?php numToWords($total_round);?></h5>
        </th>
        <td colspan="3">Total Gross Wt. (Kgs.):</td>
        <th><?php echo $gross_final;?></th>
        <td class="bg-danger" colspan="3">Add Freight Charges (INR)</td>
        <th><input type="text" name="freight_charges" id="freight_charges" value="<?php echo $po[0]['freight_charges'];?>" onkeyup="auto_calc()" required></th>
    </tr>
    <tr>
        <td colspan="3">Total Pcs</td>
        <th><?php echo $pcs_final;?></th>
        <td class="bg-danger" colspan="3">Add Other Charges (INR)</td>
        <th><input type="text" name="other_charges" id="other_charges" value="<?php echo $po[0]['other_charges'];?>" onkeyup="auto_calc()" required></th>
    </tr>
    <tr>
        <td colspan="3">Total Cartons</td>
        <th><?php echo $cartoon_final;?></th>
        <td class="bg-danger" colspan="3">Less Advance Payment (INR)</td>
        <th><input type="text" name="advance_payment" id="advance_payment" value="<?php echo $po[0]['advance_payment'];?>" onkeyup="auto_calc()"></th>
    </tr>
    <tr>
        <td colspan="3">Total C.B.M</td>
        <th><?php echo $cbm_final;?></th>
        <td class="bg-success" colspan="3">Total Invoice Value ($)<br>
        <b id='amt_usd'></b></td>
        
        <td class="bg-info" colspan="3">Total Invoice Value (INR)<br>
        <b id='amt_inr'></b>

            <input type="hidden" name="total_usd" id="total_usd_read" value="<?php echo $po[0]['amt_usd'];?>" >
            <input type="hidden" name="total_inr" id="total_inr_read" value="<?php echo $po[0]['amt_inr'];?>" >
        </th>
    </tr>
    <tr>
        <th colspan="5">BENEFICIARY ACCOUNT No.</th>
        <td colspan="5"><?php echo $company[0]['acnu'];?></td>
        <th colspan="3"></th>
        <th></th>
    </tr>
    <tr>
        <th colspan="5">BENEFICIARY SWIFT CODE</th>
        <td colspan="5"><?php echo $company[0]['swift'];?></td>
        <th colspan="3">GST Payble</th>
        <th>YES</th>
    </tr>
    <tr>
        <th colspan="5">A/C WITH INSTITUTION</th>
        <td colspan="5"><?php echo $company[0]['acbank'];?></td>
        <th colspan="3"></th>
        <th></th>
    </tr>
    <tr>
        <th colspan="5">BRANCH ADDRESS </th>
        <td colspan="5"><?php echo $company[0]['bank_address'];?></td>
        <th colspan="4">FOR: <?php echo $company[0]['cname'];?></th>
    </tr>
    <tr>
        <th colspan="10">Terms and Conditions : </th>
        <td colspan="4" rowspan="2"></td>
    </tr>    
    <tr>
        <th colspan="10">DECLARATION:<br> 
<ol>
<li>I/We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct.</li>
<li> We inted to claim rewards under REMISSION OF DUTIES AND TAXES ON EXPORTED PRODUCTS (RoDTEP).</li>
<li> I/We, hereby declare that all the products mentioned here-in above are "INDIAN ORIGIN", according to the rules of Origin of the Generalized System of Preferences of the European Union & met the criterion "P".</li>
</ol>
        </th>
    </tr>    
<tr>
    <td colspan="14" class="text-center">Certified that the particulars given above are true and correct.</td>
</tr>
<tr>
    <th colspan="14" class="text-center"><h3>REX Registration No.: <?php echo $company[0]['rex'];?></h3></th>
</tr>
<tr>
    <td colspan="10"></td>
    <td colspan="2"><a href="#" class="btn btn-warning bt-xs">Move On Top</a></td>
    <td colspan="2"><input type="submit" class="btn btn-success btn-md" name="submit" value="Edit Proforma Invoice"></td>
</tr>
</tfoot>
</table>
</form>
    </div>
    



</div>
    </div>
</div>  


<script>
    function auto_calc()
    {
        //-- actual calculated price
        var actual_inr =  $('#actual_inr').html();
        //-- on key press data 
        var trade_discount = $('#trade_discount').val();
        if(trade_discount==''){$('#trade_discount').val(0);}

        var freight_charges = $('#freight_charges').val();
        if(freight_charges==''){$('#freight_charges').val(0);}

        var other_charges = $('#other_charges').val();
        if(other_charges==''){$('#other_charges').val(0);}

        var advance_payment = $('#advance_payment').val();
        if(advance_payment==''){$('#advance_payment').val(0);}

        //-- inr value
        var amt_inr = parseInt(actual_inr) - parseInt(trade_discount);
        var amt_inr = parseInt(amt_inr) + parseInt(freight_charges) + parseInt(other_charges);
        var amt_inr = parseInt(amt_inr) - parseInt(advance_payment);
        $('#amt_inr').html(amt_inr);

        //-- usd value
        var usd_convert=$('#usd_convert').val();
        var amt_usd=parseInt(amt_inr) / parseInt(usd_convert);
        $('#amt_usd').html(amt_usd);

        //-- add final value in hidden filed
        $("#total_usd_read").val(amt_usd);
        $("#total_inr_read").val(amt_inr);
    }


function invoice_nu_get() {
  let invoice = prompt("Please enter invoice number, Invoice number can not be duplicate and unedtiable in future.", "Example :- INV00001");
  if (invoice != null) {
    $('#final_invoice_nu').val(invoice);
    $('#form_invoice').submit();
  }
}
</script>