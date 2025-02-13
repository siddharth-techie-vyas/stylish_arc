<style>.small{font-size:14px;}.tiny{font-size:12px;}
.redtext tbody th td{color:red;}

    table{font-size:0.7em; width:20.5cm; border:1px solid; word-wrap: break-word}
    h2{font-size:14px;}
    h3{font-size:13px;}
    h4{font-size:12px;}
    h5,h6{font-size:11px;}
    td,th {
        border: solid 2px #d8d8d8; padding:1px;
    }
    /* Avoid unexpected sizing on all elements. */

</style>

<?php 
$company=$admin->get_company();
$order_detail=$order->get_order_one($_GET['id']);
$order_pro=$order->get_product_details($_GET['id']);
$bene=$accounts->get_beneficiery_one($order_detail[0]['client']);

?>

<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">

 

  <button type="button" name="excel" class="btn btn-success" onclick="exportToExcel('packing-table','<?php echo $_SESSION['pdf_prefix'].'-PL-'.$order_detail[0]['id'];?>')"><i class="fa fa-file-excel"></i> Download Excel</i></button>

<!-- <button type="button" name="excel" id="export-btn" class="btn btn-info" onclick="generate_pdf('packing-table','<?php echo $_SESSION['pdf_prefix'];?>-PL-<?php echo $order_detail[0]['id'];?>','landscape')"><i class="fa fa-file-pdf"></i> Download PDF</i></button> -->

<button type="button" class='btn btn-info' name="pdf"  type="button" onclick="htmlget('pdfdown','<?php echo $_SESSION['pdf_prefix'].'-PL-'.$order_detail[0]['id'];?>')" value="get html"><i class="fa fa-file-pdf"></i> Download PDF</i></button>
<div id="editor"></div>
<hr>

<style>

table{font-size:10px; border:1px solid; word-wrap: break-word; margin:0% 1% 0% 1%; max-width:95%;}
h2{font-size:14px;}
h3{font-size:13px;}
h4{font-size:12px;}
h5,h6{font-size:11px;}
td,th {
border: solid 1px #d8d8d8;
}

/* Avoid unexpected sizing on all elements. */
</style>
  <div class="container-xl" style="overflow-x:scroll" id="pdfdown">
 
<table  id="packing-table" border="1">
    <thead>
        <tr>
            <td colspan="3">
            <?php   
$path = $base_url.'theme/assets/images/'.$company[0]['logo'];
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>

<img src="<?php echo $base64;?>" width="100" class="images" height="auto"/>    
           
            </td>
            <td colspan="20"><h1 class="text-center"><?php echo $company[0]['cname'];?></h1>
            <h3 class="text-center">Packing List</h3>
            </td>
        
   
        <tr class="redtext">
            <th colspan="2">Buyer Name</th>
            <td colspan="4"><?php echo $bene[0]['bname'];?></td>
            <th>PI Number</th>
            <td colspan="2"><?php echo $order_detail[0]['pi_nu'];?></td>
            <th>PI Date</th>
            <td><?php echo $order_detail[0]['pi_date'];?></td>
            <th>Order #</th>
            <td><?php echo $order_detail[0]['id'];?></td>
            <th>Order Date</th>
            <td><?php echo $order_detail[0]['order_date'];?></td>
            <th>Delivery Date</th>
            <td><?php echo $order_detail[0]['delivery_date'];?></td>
            <th>Country</th>
            <td></td>
        </tr>
        <tr class="small">
            <th>#</th>
            <th>Picture</th>
            <th>Buyer Code</th>
            <th>SKU</th>
            <th>Material Composition</th>
            <th>Product Description</th>
            <th>QTY</th>
            <th>HSN</th>
            <th colspan="3">Dimension (CM)</th>
            <th>Gross CBM</th>
            <th>Color</th>
            <th>Assembly</th>
            <th>Case #</th>
            
            <th>CBM Per Pcs</th>
                <!-- from pro2-->
            <!-- <th colspan="3">Cartoon Size (Inch)</th> -->
            <th>Cartoon & Weight</th>
            <!-- <th colspan="5">Weight (KG)</th>-->
            <th>Cartoon Per Item</th> 
            <th>L Shape</th>
        </tr>
        <tr class="tiny">
            <td colspan="8"></td>
            <th>Length</th>
            <th>Width</th>
            <th>Height</th>
            <td colspan="4"></td>
            <td></td>
            
            <!-- <th>Length</th>
            <th>Width</th>
            <th>Height</th>
            <th>Plastic</th>
            <th>Wood</th>
            <th>Iron</th>
            <th>Net</th>
            <th>Gross</th> -->
            <td colspan="3"></td>
            <!--------- product Details ---------->
    <?php $counter=1; foreach($order_pro as $k=>$value){
        $pro = $product->getone($order_pro[$k]['pid']);
        $pro2 = $product->getone_product_details($order_pro[$k]['pid']);
        ?>
            <tr class="tiny">
                <td><?php echo $counter++;?></td>
                <td>
                    <?php 
                    $filename='theme/assets/images/'.$pro[0]['picture'];
                    if(file_exists($filename)){

                        $item = $filename;
                        $type = pathinfo($item, PATHINFO_EXTENSION);
                        $data = file_get_contents($item);
                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                        ?>
                            <img src="<?php echo $base64;?>" height="40" class="images" width="auto">
                        <?php }else{?>    
                            <i class="fa fa-3x fa-image"></i>
                        <?php } ?>
                </td>
                <td><?php echo $pro[0]['buyer_code'];?></td>
                <td><?php echo $pro[0]['sku_code'];?></td>
                <td></td>
                <td><?php echo $pro[0]['product_name'];?></td>
                
                <td><?php echo $order_pro[$k]['qty'];?></td>
                <td><?php echo $order_pro[$k]['hsn'];?></td>
                <td><?php echo $pro[0]['length'];?></td>
                <td><?php echo $pro[0]['width'];?></td>
                <td><?php echo $pro[0]['height'];?></td>
                <td><?php echo $pro[0]['gross_cbm'];?></td>               
                <td><?php echo $order_pro[$k]['color'];?></td>
                <td><?php echo $pro[0]['assembly'];?></td>
                <td><?php echo $pro[0]['case_number'];?></td>


                <td><?php echo $order_pro[$k]['cbm_pcs'];?></td>
                <!-- cartoon and weight-->
                <td>
                    <table border='1'>
                            <tr>
                                <th >Material</th>
                                <th colspan="3" class='text-center'>Cartoon Size (Inches)</th>
                                <th >CBM</th>
                                <th colspan="5" class='text-center'>Weight (Kg)</th>
                            </tr>    
                            <tr>
                                <td></td>
                                <td>Length</td>
                                <td>Width</td>
                                <td>Height</td>
                                <td></td>
                                <td>Cartoon</td>
                                <td>Plastic</td>
                                <td>Wood</td>
                                <td>Net</td>
                                <td>Gross</th>
                            </tr>    
                            <!-- from pro2-->
                            <?php foreach($pro2 as $k => $value){?>
                                <tr>
                                    <td><?php echo $pro2[$k]['material']?></td>
                                    <td><?php echo $pro2[$k]['clength']?></td>
                                    <td><?php echo $pro2[$k]['cwidth']?></td>
                                    <td><?php echo $pro2[$k]['cheight']?></td>
                                    <td><?php echo $pro2[$k]['cbm']?></td>
                                    <td><?php echo $pro2[$k]['weight_cartoon']?></td>
                                    <td><?php echo $pro2[$k]['weight_plastic']?></td>
                                    <td><?php echo $pro2[$k]['weight_wood']?></td>
                                    <td><?php echo $pro2[$k]['net_weight']?></td>
                                    <td><?php echo $pro2[$k]['gross_weight']?></td>
                                </tr>
                             <?php }?>   

                    </table>
                </td>
                <!-- <td></td>
                <td></td>
                
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td> -->
                
                <td><?php echo $order_pro[$k]['cartoon_item'];?></td>
                <td><?php echo $order_pro[$k]['lshape'];?></td>
            </tr>    
        <?php }?>    
    </tbody>
</table>


    </div>
    </div>
    </div>
