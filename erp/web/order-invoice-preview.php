
<?php 
$company=$admin->get_company();
$order_detail=$order->get_order_one($_GET['id']);
$invoice=$order->get_invoice($_GET['id']);
?>  


<div class="app-wrapper">


  <div class="app-content pt-3 p-md-3 p-lg-4">
  
<input type="button" name="excel" class="btn btn-warning" onclick="window.history.go(-1); return false;" value="Go Back"> 

<button type="button" name="excel" class="btn btn-success" onclick="exportToExcel('pdfdown','<?php echo $_SESSION['pdf_prefix'].'-PO-'.$invoice[0]['performa_invoice_nu'];?>')" ><i class="fa fa-file-excel"></i> Download Excel</button>

<button type="button" class='btn btn-info' name="pdf"  type="button" onclick="htmlget('pdfdown','<?php echo $_SESSION['pdf_prefix'].'-PI-'.$invoice[0]['performa_invoice_nu'];?>')" value="get html"><i class="fa fa-file-pdf"></i> Download PDF</i></button>
  

<div id="editor"></div>
<hr>



    <div class="container-xl" id='pdfdown' style="border:1px solid #000">

<style>

table{font-size:10px; border:1px solid; word-wrap: break-word; margin:0% 1% 0% 1%; min-width:100%;}
h2{font-size:14px;}
h3{font-size:13px;}
h4{font-size:12px;}
h5,h6{font-size:11px;}
td,th {
border: solid 1px #d8d8d8;
}

/* Avoid unexpected sizing on all elements. */
</style>

     
      




<table id="invoice-table" >
<thead>
<tr>
    <th colspan="14"> <h1 class="app-page-title">Proforma Invoice</h1></th>
</tr>    
<tr>
    <td colspan="14" style="color:red;">      
    <em><b>Note:-</b><em> To generate an invoice, please fill all the details and click on Generate Invoice at the bottom right of the page. Before doing that please confirm all the pending quantity has been received from production.
    </td>
</tr>    
<tr>
    <td colspan="10"><b>Tax Invoice</b></td>
    <td colspan="4"><b>e-Invoice</b></td>
</tr>    
<tr>
    <td colspan="10">(SUPPLY MEANT FOR EXPORT/SUPPLY TO SEZ UNIT OR SEZ DEVELOPER
    FOR AUTHORISED OPERATIONS ON PAYMENT OF IGST)</td>
    <td  rowspan="4" colspan="4"></td>
</tr>
<tr>
    <td colspan="3">IRN</td>
    <td colspan="7"><?php echo $invoice[0]['irn'];?></td>
</tr>
<tr>
    <td colspan="3">AcK No.</td>
    <td colspan="7"><?php echo $invoice[0]['ack_nu'];?></td>
</tr>
<tr>
    <td colspan="3">Ack Date</td>
    <td colspan="7"><?php echo date("d-m-Y", strtotime($invoice[0]['ack_date']));?></td>
</tr>

    <tr>
    <th colspan="10" rowspan="2">
        <h2 style="color:green;">PROFORMA INVOICE</h2>
    </th>
    <th colspan="2">Original for Receipient</th>
    <td colspan="2"></td>
</tr>   
<tr>
    <th colspan="2">Duplicate for Supplier</th>
    <td colspan="2"></td>
</tr> 
<tr>
    <th colspan="10"></th>
    <th colspan="2">Triplicate for Transporter</th>
    <td colspan="2"></td>
</tr>
<tr>
    <th colspan="14">Supply Meant for Export on Payment of Integrated Tax (IGST)</th>
</tr>
<!-- billing details--->
<tr>
<th colspan="5">Exporter Details</th>
<th colspan="3">Reverse Charge</th>
<td colspan="2">
<?php echo $invoice[0]['reverse_charge'];?>
</td>
<th>IEC</th>
<td colspan="3"><?php echo $company[0]['iec'];?></td>
</tr>

<tr>
<td colspan="5" rowspan="2"><b><?php echo $company[0]['cname'];?></b><br><?php echo $company[0]['address'];?></td>
<th colspan="3">Commercial Invoice No.</th>
<td colspan="2">
<?php echo $invoice[0]['commercial_invoice_nu'];?>
</td>
<th>PAN</th>
<td colspan="3"><?php echo $company[0]['pan'];?></td>
</tr>

<tr>
<th colspan="3">Commercial Invoice Date</th>
<td colspan="2"><?php echo date("d-m-Y", strtotime($invoice[0]['commercial_invoice_date']));?></td>
<th><?php echo $company[0]['reg_type'];?></th>
<td colspan="3"><?php echo $company[0]['regnu'];?></td>
</tr>

<tr>
<th colspan="3" style="color:green;">Proforma Invoice No.</th>
<td colspan="4"><?php echo $invoice[0]['performa_invoice_nu'];?> </td>
<th colspan="3">Buyer's Order No.</th>
<td colspan="4"><?php echo $order_detail[0]['order_nu'];?></td>
</tr>

<tr>
<th colspan="2">Contact</th>
<td colspan="3"><?php echo $company[0]['phone'];?></td>
<th colspan="2">Proforma Invoice Date</th>
<td colspan="3"><?php echo date("d-m-Y", strtotime($invoice[0]['performa_invoice_date']));?> </td>
<th colspan="2">Buyer's Order Date</th>
<td colspan="4"><?php echo date("d-m-Y", strtotime($order_detail[0]['order_date']));?> </td>
</tr>

<tr>
<th colspan="2">Email</th>
<td colspan="3"><?php echo $company[0]['email'];?></td>
<th colspan="3">Other Reference's</th>
<th colspan="3">Ship Window Date</th>
<th colspan="3"></th>
</tr>

<tr>
<th colspan="2">Website</th>
<td colspan="3"><?php echo $company[0]['website'];?></td>
<th colspan="3">REX Registration No</th>
<td colspan="3"><?php echo $company[0]['rex'];?></td>
<th colspan="3" rowspan="2">E-Way Bill No.<hr>
    <?php echo $invoice[0]['eway_nu'];?></th>
</tr>

<tr>
<th colspan="2">State</th>
<td colspan="3"><?php echo $company[0]['state'];?></td>
<th>LUT No.</th>
<td colspan="2"><?php echo $invoice[0]['lutnu'];?></td>
<th colspan="">LUT Date</th>
<td colspan="3"><?php echo date("d-m-Y", strtotime($invoice[0]['lut_date']));?></td>
</tr>

<tr>
<th colspan="2">Country</th>
<td colspan="3"><?php echo $company[0]['country'];?></td>
<th colspan="2">VRIKSH Cert. No.</th>
<td colspan="3"><?php echo $company[0]['vriksh'];?></td>
<th colspan="4" rowspan="2">Batch Code<hr>
<?php echo $invoice[0]['batch_code'];?>
</th>
</tr>

<tr>
<th colspan="2">State Code</th>
<td colspan="3"><?php echo $company[0]['state_code'];?></td>
<td colspan="2">VRIKSH Ship. Cert. No. :</th>
<td><?php echo $company[0]['vriksh_cert'];?></td>
<th colspan="3">
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
        <td colspan="2"><?php echo $invoice[0]['eseal_nu'];?></td>
        <th colspan="2">Line Seal No.</th>
        <th colspan="2">Country of Origin of Goods</th>
        <th colspan="2">Country of Final Destination</th>
</tr>    
<tr>
        <th colspan="2"><?php echo $invoice[0]['container_nu'];?></th>
        <th colspan="2"><?php echo $invoice[0]['vehical_nu'];?></th>
        <th colspan="2">Date & Time</th>
        <td colspan="2"><?php echo $invoice[0]['date_time_ship'];?></td>
        <th colspan="2"><?php echo $invoice[0]['line_nu'];?></th>
        <th colspan="2"><?php echo $company[0]['country'];?></th>
        <th colspan="2"></th>
</tr>    
<tr>
        <th colspan="2">Pre Carriage By</th>
        <th>SB No.</th>
        <td colspan="2"><?php echo $invoice[0]['sb_nu'];?></td>
        <th colspan="2">Bill of Ladding Number</th>
        <th colspan="2">Port of Discharge</th>
        <th colspan="5">Terms of Delivery and Payment</th>
</tr>
<tr>
        <th colspan="2"><?php echo $invoice[0]['pre_by'];?></th>
        <th>SB Date</th>
        <td colspan="2"><?php echo $invoice[0]['sb_date'];?></td>
        <th colspan="2"><?php echo $invoice[0]['bill_ladding_nu'];?></th>
        <th colspan="2"><?php echo $invoice[0]['port_discharge'];?></th>
        <th colspan="5">Freight    : COLLECT</th>
</tr>    
<tr>
        <th colspan="2">Place of Pre-Carrier</th>
        <td colspan="3">Port of Loading</td>
        <th colspan="2">Vessel / Flieght No.</th>
        <th colspan="2">Final Destination</th>
        <th colspan="5">Prices     : FOB MUNDRA PORT</th>
</tr>    
<tr>
        <th colspan="2"><?php echo $invoice[0]['pre_carrier_place'];?></th>
        <td colspan="3"><?php echo $invoice[0]['port_loading'];?></td>
        <th colspan="2"><?php echo $invoice[0]['vessel_nu'];?></th>
        <th colspan="2"></th>
        <th colspan="5">Payment : BY T. T. (30% ADVANCE & 70% AGAINST B/L)</th>
</tr>
</table>



<!-------- order product details ---->
<table >
<tr>
    <th style="width:5%;">#</th>
    <th style="width:10%;">Buyer's Item Code</th>
    <th style="width:10%;">Item Code</th>
    <th style="width:5%;">Wood Type</th>
    <th style="width:20%;">Name of Product<br><small>INDIAN WOODEN & IRON FURNITURE ITEMS</small></th>
    <th style="width:5%;">HSN ACS</th>
    <th style="width:5%;">UOM</th>
    <th style="width:5%;">Qty</th>
    <th style="width:8%;">Price ($)</th>
    <th style="width:8%;">Amount ($)</th>
    <th style="width:7%;">Total in INR without GST</th>
    <th style="width:5%;" colspan="2">IGST</th>
    <th style="width:7%;">Total in INR including GST</th>
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
//$pcs_count=count($pdetail2);
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
    <td><?php echo $qty1=$order_products[$k]['qty']; $qty+=$qty1;?></td>
    <td><?php echo $price_fob1=$order_products[$k]['price_fob']; $price_fob+=$price_fob1?></td>
    <td><?php echo $total_usd1=$order_products[$k]['total_usd']; $total_usd+=$total_usd1;?></td>
    <td><?php echo $inr1=$order_products[$k]['total_usd']*$order_detail[0]['usd_inr']; $inr+=$inr1;?></td>
    <td>18</td>
    <td><?php $gst_round= $inr1*18/100; echo $gst1=round($gst_round,2); $gst+=$gst1;?></td>
    <td><?php $total_inr_round=$inr1+$gst1; echo $total_inr1=round($total_inr_round,2); 
    $total_inr+=$total_inr1;?></td>
</tr>    
<?php }?>
</tbody>
<tfoot>
    <tr>
        <th colspan="14">All goods are packed in foam and corrugated box.</th>
    </tr>    
    <tr>
        <th style="background:#C4B454; color:white;"  colspan="2" style="width:3cm">VRIKSH SHIPMENT CERTIFICATE IS ONLY FOR SHEESHAM WOOD ARTICLES</th>
        <th style="background:red; color:white;" colspan="2">Total</th>
        <td style="background:green; color:white;"><?php echo $qty;?></td>
        <td style="background:#818589; color:white;"><?php echo $price_fob;?></td>
        <td style="background:#808080; color:white;"><?php echo $total_usd;?></td>
        <td style="background:#899499; color:white;" colspan="2"><?php echo $inr;?></td>
        <td></td>
        <td style="background:#899499; color:white;" colspan="2"><?php echo $gst;?></td>
        <td style="background:blue; color:white;" colspan="2"><h4 class="text-white" id="actual_inr"><?php echo $total_round=round($total_inr);?></h4></td>
    </tr>
    <tr>
        <th colspan="4">Amount In Words</th>
        <td colspan="2">Total Net Wt. (Kgs.)</td>
        <th colspan="2"><?php echo $net_final;?></th>
        <td style="background:#FF5733; color:white;" colspan="3">Less Trade Discount (INR)</td>
        <th colspan="3"><?php echo $invoice[0]['trade_discount'];?></th>
    </tr>
    <tr>
        <th colspan="4" rowspan="4">
            <h5 id="amount" style="text-transform: capitalize;"><?php numToWords($total_round);?></h5>
        </th>
        <td colspan="2">Total Gross Wt. (Kgs.):</td>
        <th colspan="2"><?php echo $gross_final;?></th>
        <td style="background:#FF5733; color:white;" colspan="3">Add Freight Charges (INR)</td>
        <th colspan="3"><?php echo $invoice[0]['freight_charges'];?></th>
    </tr>
    <tr>
        <td colspan="2">Total Pcs</td>
        <th colspan="2"><?php echo $pcs_final;?></th>
        <td style="background:#FF5733; color:white;" colspan="3">Add Other Charges (INR)</td>
        <th colspan="3"><?php echo $invoice[0]['other_charges'];?></th>
    </tr>
    <tr>
        <td colspan="2">Total Cartons</td>
        <th colspan="2"><?php echo $cartoon_final;?></th>
        <td style="background:#FF5733; color:white;" colspan="3">Less Advance Payment (INR)</td>
        <th colspan="3"><?php echo $invoice[0]['advance_payment'];?></th>
    </tr>
    <tr>
        <td colspan="2">Total C.B.M</td>
        <th colspan="2"><?php echo $cbm_final;?></th>
        <td style="background:#097969; color:white;"  colspan="3">Total Invoice Value ($)<br>
        <b id='amt_usd'><?php $USD_FINAL = round($total_usd,2); 
        //-- by devide by inr
        $USD_FINAL = $USD_FINAL / $order_detail[0]['usd_inr'];
        echo number_format($USD_FINAL, 2, ",", " ");?></b></td>
        
        <td style="background:#40B5AD; color:white;" colspan="3">Total Invoice Value (INR)<br>
        <b id='amt_inr'><?php $INR_FINAL = round($total_round,2); echo number_format($INR_FINAL, 2, ",", " ");?></b>

           
        </th>
    </tr>
</table>


<!--- other details --------->
<table >
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
        <th colspan="3">FOR: <?php echo $company[0]['cname'];?></th>
    </tr>
    <tr>
        <th colspan="10">Terms and Conditions : </th>
        <td colspan="4"></td>
    </tr>    

    <tr>
        <th colspan="14">DECLARATION:<br> 
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

</tfoot>
</table>

</div>
    


</div>

    



</div>
    </div>

