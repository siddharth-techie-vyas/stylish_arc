
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
    <!-- title -->
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
        <th colspan="7">
            <h3><?php echo $company[0]['cname'];?></h3>
            <h5><?php echo $company[0]['reg_type'].' :- '.$company[0]['regnu']; ?></h5>
            <h6><?php echo 'Contact :-'.$company[0]['phone'].' Email :-'.$company[0]['email']; ?></h6>
        </th>
    </tr>
    <!-- po header --->
     <tr>
        <th colspan="9" style="border:2px solid #000; background-color:#000; color:#FFF;; text-align:center; font-size:20px;">Purchase Order</th>
     </tr>
     <!-- supplier details ---->
      <tr>
        <th colspan="2">Supplier Name</th>
        <th colspan="2">Delivery Address</th>
        <th>Delivery Terms</th>
        <th>Delievery Date</th>
        <th>PO #</th>
        <th>PO Date</th>
        <th>SO#</th>
      </tr>
      <tr style="font-size:12px;">
        <td colspan="2"><b><?php echo $bene[0]['bname'];?></b><br><small><?php echo $bene[0]['address'];?></small></td>
        <td colspan="2"><b><?php echo $company[0]['cname'];?></b><br><small><?php echo $company[0]['address'];?></small></td>
        <td></td>
        <td><?php echo date("d-m-Y", strtotime($order_edit[0]['delivery_date']));?></td>
        <td><?php echo $order_edit[0]['order_po_nu'];?></td>
        <td><?php echo date("d-m-Y", strtotime($order_edit[0]['order_date']));?></td>
        <td><?php echo  $order_details[0]['order_nu'];?></td>
      </tr>
      <!-- product details -->
       <tr>
        <th>Image</th>
        <th>SKU</th>
        <th>HSN</th>
        <th>Desc.</th>
        <th>Size (LxWxH)</th>
        <th>Qty</th>
        <th>UoM</th>
        <th>Unit Price</th>
        <th>Total</th>
       </tr>
       <?php 
       $countt=0;
       $counter=1;
       $po_supplier_products=$order->po_supplier_products($order_edit[0]['order_id'],$order_edit[0]['id']);
       foreach($po_supplier_products as $k=>$value){
        //-- order price 
        $order_detail=$order->get_product_detail_one($order_edit[0]['order_id'],$po_supplier_products[$k]['pid']);
        ?>
            <tr>
                <th>
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
                <td><?php  echo "<b;?>".$pname[0]['sku_code']." / ".$pname[0]['buyer_code'];?></td>
                <td><?php echo $pname[0]['hsn_code'];?></td>
                <td><?php echo "<small>".$pname[0]['product_name']."<small>";?></td>
                <td><?php echo $pname[0]['length'].' x '.$pname[0]['width'].' x '.$pname[0]['height'];?></td>
                <td><?php echo $po_supplier_products[$k]['qty'];?></td>
                <td></td>
                <td><?php echo $po_supplier_products[$k]['price'];?></td>                
                <td><?php echo $po_supplier_products[$k]['total']; $countt=$countt+$po_supplier_products[$k]['total'];?></td>
            </tr>
            <?php }?>

            <!-- footer-->
            <tr>
                <td colspan="5">
                    <b>Amount in Words :</b>

                </td>
                <th colspan="2">Total Without Tax</th>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="6" rowspan="2"><b>Rule(s) & Regulation(s)</b><br>
                <small><?php $tandc=$admin->get_metaname_byvalue('tandc'); echo $tandc[0]['value1'];?></td></small>
                <td colspan="3">
                    <!-- gst table -->
                     <table style="border:1px solid; width:100%;" border="1">
                        <tr>
                            <th>GST</th>
                            <td>18%</td>
                        </tr>
                        <tr>
                            <th >GST Amount</th>
                            <td ><?php echo $tax=$countt*18/100;?></td>
                        </tr>
                        <tr>
                            <th >Grand Total</th>
                            <td ><?php echo $countt+$tax;?></td>
                        </tr>
                     </table>
                </td>
                
            </tr>
            <tr>
                <td colspan="3">
                <b>For : </b><br>
                        <b><?php echo $company[0]['cname'];?></b><br>
                        <small><?php echo $company[0]['address'];?></small><br><br><br>
                        Authorised Sign
                </td>
            </tr>
            <tr>
                <th colspan="3">Received By</th>
                <th colspan="3">Prepared By</th>
                <th colspan="3">Authorised By</th>
            </tr>
            <tr style="border-top:2px solid;">
                <th colspan="3"><br><br><br><br></th>
                <th colspan="3"><br><br><br><br></th>
                <th colspan="3"><br><br><br><br></th>
            </tr>
            
</table>
</div>

     