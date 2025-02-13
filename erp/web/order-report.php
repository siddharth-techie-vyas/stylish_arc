<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
      <h1 class="app-page-title">Order Report</h1>
      <?php include('alerts.php');?>
      <div class="app-card alert alert-dismissible shadow-sm mb-4 border-top-decoration" role="alert">
        
     

<div class="table-responsive">
<?php 
$order_detail=$order->get_order_one($_GET['id']);

$usd_inr=$order_detail[0]['usd_inr'];
?>

<input type="button" class='btn btn-warning'  name="excel" value="Excel" onclick="exportToExcel('pdfdown','<?php echo $order_detail[0]['pi_nu'];?>')">

<button type="button" class='btn btn-info' name="pdf"  type="button" onclick="htmlget('pdfdown','<?php echo $_SESSION['po_prefix'].$order_detail[0]['pi_nu'];?>')" value="get html"><i class="fa fa-file-pdf"></i> Download PDF</button>
<div id="editor"></div>

<div id="pdfdown">
<table class="table table-bordered" border="1" cellpadding="2" cellspacing="2">
    <tr>
        <th colspan="7" style="background:#008B8B; color:white;">Order Details</th>
    </tr>    
    <tr>
        <th>Client Name</th>
        <td colspan="3"><?php $bene=$accounts->get_beneficiery_one($order_detail[0]['client']); 
        echo $bene[0]['bname'];?></td>
        <th>Order#</th>
        <td colspan="2"><?php echo $order_detail[0]['order_nu'];?></td>
    </tr>
    <tr>
        <th>PI #</th>
        <td colspan="3"><?php echo $order_detail[0]['pi_nu'];?></td>
        <th>PI Date</th>
        <td colspan="2"><?php echo $order_detail[0]['pi_date'];?></td>
    </tr>
    <!--- items -->
    <tr>
        <th colspan="7" style="background:#808000; color:white;">Items</th>
    </tr>
    <tr>
        <th>#</th>
        <th>SKU / Buyer Code</th>
        <th>Qty</th>
        <th>Purchase/Pcs</th>
        <th>Total Purchase (INR)</th>
        <th>Sale / Pcs ($)</th>
        <th>Total Sale (INR)</th>
    </tr>
    <?php $counter=1;
              $pids=$order->get_product_details($_GET['id']);
              if(!$pids)
              {
                echo "<tr><td colspan='4'>No Product Added Yet</td></tr>";
              }
              else{
                $price_po=0;
                $price_sale=0;
              foreach($pids as $k => $value){
                
                $pro = $product->getone($pids[$k]['pid']);
                $pro2 = $product->getone_product_details($pids[$k]['pid']);
                ?>
    <tr>
        <th><?php echo $counter++;?></th>
        <td><?php echo $pro[0]['sku_code'];?></td>
        <th><?php echo $pids[$k]['qty'];?></th>
        <td><?php 
        $po_price=$order->check_same_item_in_po($pids[$k]['oid'],$pids[$k]['pid']);
        if($po_price)
        {echo $po_price[0]['price']; }
        else
        {echo "N/A";}
        ?></td>
        <td><?php echo $po_price[0]['total'];  $price_po += $po_price[0]['total'];?></td>
        <td><?php echo $pids[$k]['price_fob']; ?></td>
        <td><?php echo $usd_in_inr = $pids[$k]['total_usd']*$usd_inr; $price_sale += $usd_in_inr;?></td>
    </tr>
    <?php } }?>
    <tr>
        <th></th>
        <th></th>
        <th style="background:#E9967A; color:white;" colspan="2">Diffrent</th>
        <td>INR <?php echo $price_po;?></td>
        <td></td>
        <td>INR <?php echo $price_sale;?></td>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th colspan="2" style="background:#FEBE10; color:white;">Status</th>
        <th colspan="3">
            <?php 
                if($price_sale > $price_po){echo "Profit";}
                if($price_sale < $price_po){echo "Loss";}
                if($price_sale == $price_po){echo "Balance";}
            ?>
        </th>
        
    </tr>
</table>
</div>



</div>

</div>

</div>
</div>
</div>