<style>
 .form-control{border:1px solid; width:100%;}
  .small-font{font-size:11px;}
  
</style>
<?php 
$order_detail=$order->get_order_one($_GET['id']);
?>

<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
      <h1 class="app-page-title">Edit Sale Order # <?php echo $_SESSION['order_prefix'].$order_detail[0]['id'];?></h1>
      <?php include('alerts.php');?>
      <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
        <!-- form-->
        <form action="<?php echo $base_url.'index.php?action=order&query=edit-order';?>" method="post" name="edit-order">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="client_name">Client Name</label>
                <input type="hidden" name="id" value="<?php echo $order_detail[0]['id'];?>"/>
                <select class="form-control" name="client_name" id="client_name">
                  <option disabled='disabled'>- Select -</option>
                <?php 
                    $client=$accounts->getall_beneficiery_sametype('10');
                    foreach ($client as $k=>$value) {
                      echo "<option ";
                      if($client[$k]['bene_id']==$order_detail[0]['client'])
                      {echo "selected='selected'";}
                      echo "value='".$client[$k]['bene_id']."'>".$client[$k]['bname']."</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="pi_date">Buyer's Order #</label>
                <input type="text" class="form-control" name="order_nu" value="<?php echo $order_detail[0]['order_nu']?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="order_date">Buyer's Order Date</label>
                <input type="date" class="form-control" name="order_date" value="<?php echo $order_detail[0]['order_date']?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="ship_date">Shipment Date</label>
                <input type="date" class="form-control" name="ship_date" value="<?php echo $order_detail[0]['ship_date']?>">
              </div>
            </div>
          
            <div class="col-md-4">
              <div class="form-group">
                <label for="pi_nu">PI No.</label>
                <input type="text" class="form-control" name="pi_nu" placeholder="Enter PI No." value="<?php echo $order_detail[0]['pi_nu']?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="pi_date">PI Date</label>
                <input type="date" class="form-control" name="pi_date" value="<?php echo $order_detail[0]['pi_date']?>">
              </div>
            </div>
            
            
            <div class="col-md-4">
              <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" name="country" value="<?php echo $order_detail[0]['country']?>">
              </div>
            </div>
          
            <div class="col-md-4">
              <div class="form-group">
                <label for="usd_inr">USD To INR Conversion Rate Today</label>
                <input type="number" step=".01" class="form-control" name="usd_inr" placeholder="Enter conversion rate" value="<?php echo $order_detail[0]['usd_inr']?>">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="usd_inr">Status</label>
                <select class='form-control' name="status">
                  <?php 
                  $status = $admin->get_metaname_byvalue('shipment_delivery_status');
                  foreach ($status as $key => $value) {
                  ?>
                  <option value="<?php echo $status[$key]['value2'];?>" <?php if($order_detail[0]['status']==$status[$key]['value2']) {echo "selected='selected'";}?> >
                    <?php echo $status[$key]['value1'];?>
                  </option>
                  <?php }?>
                  </select>
              </div>
            </div>
          
            <div class="col-md-4"><br>
              <button type="submit" class="btn btn-warning">Edit</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!---- product details -->
<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
      <h1 class="app-page-title">Add Products Details</h1>
      <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
        
      
      <div class="table-responsive">
      <form name="add_product" action="<?php echo $base_url.'index.php?action=order&query=add-product&id='.$_GET['id'];?>" method="post">
      <table class="table table-bordered table-hover" id="myTable">
        <tr>
          <th>Add Products</th>
          <td>
          <select id="Products" name="pid"  style="width:100%;">
              <option value=""></option>
              <?php $product_list=$product->getall();
              foreach($product_list as $k => $value)
              {?>
              <option value="<?php echo $product_list[$k]['id'];?>"><?php echo $product_list[$k]['product_name'].' / '.$product_list[$k]['sku_code'];?></option>
              <?php }?>
          </select>
          </td>
          <td><input type="submit" name="Save" class="btn btn-secondary btn-xs" value="Add Product"/></td>
        </tr>    
      </table>
      </form>  
      </div>
      
      
      
      <div class="table-responsive"> 
        <form name="pids_details" action="<?php echo $base_url.'index.php?action=order&query=add-product-details&oid='.$_GET['id'];?>" method="post">
        <table class="table  table-bordered" id="myTable" border="1"> 
            <thead> 
                <tr class="small"> 
                    <th width="3%">#</th>
                    <th width="22%">SKU / Buyer Code</th> 
                    <th width="9%">Qty</th> 
                    <th width="9%">Price FOB</th> 
                    <th width="9%">USD Total</th> 
                    <th width="9%">HSN Code</th> 
                    <th width="9%">CBM / Pcs</th> 
                    <th width="10%">Color</th> 
                    <th width="10%">L Shape</th> 
                    <th width="10%">Cartoon Per Item</th> 
                    
                </tr> 
            </thead> 
            <tbody> 
              <?php 
              $counter=1;
              $pids=$order->get_product_details($_GET['id']);
              if(!$pids)
              {
                echo "<tr><td colspan='10'>No Product Added Yet</td></tr>";
              }
              else{
              foreach($pids as $k => $value){
                //-- get product details
                $p_id=$pids[$k]['pid'];
                $pro = $product->getone($pids[$k]['pid']);
                $pro2 = $product->getone_product_details($pids[$k]['pid']);
                
                //--- default details replaced if found in order_details
                if($pids[$k]['price_fob']=='0'){$fob=$pro[0]['fob'];}else{$fob=$pids[$k]['price_fob'];}
                if($pids[$k]['total_usd']=='0'){$usd=$pro[0]['usd'];}else{$usd=$pids[$k]['total_usd'];}
                if(empty($pids[$k]['hsn'])){$hsn=$pro[0]['hsn_code'];}else{$hsn=$pids[$k]['hsn'];}
                if($pids[$k]['cbm_pcs']=='0'){$cbm=$pro2[0]['cbm'];}else{$cbm=$pids[$k]['cbm_pcs'];}
                if(empty($pids[$k]['color'])){$color=$pro[0]['color'];}else{$color=$pids[$k]['color'];}
                if(empty($pids[$k]['lshape'])){$lshape=$pro[0]['l_shape'];}else{$lshape=$pids[$k]['lshape'];}
                if(empty($pids[$k]['cartoon_per_pcs'])){$cartoon_pcs=$pro[0]['cartoon_per_pcs'];}else{$cartoon_pcs=$pids[$k]['cartoon_per_pcs'];}
                
                ?>
                <tr id="<?php echo $pids[$k]['id'];?>">
                  
                    <td rowspan="3" width="3%"><?php echo $counter++;?></td>
                    <td rowspan="3" width="22%">
                        <?php if(!file_exists($base_url.'theme/assets/images/'.$pro[0]['picture'])){?>
                            <img src="<?php echo $base_url.'theme/assets/images/'.$pro[0]['picture'];?>" height="70" width="auto">
                        <?php }else{?>    
                            <i class="fa fa-3x fa-image"></i>
                        <?php } ?>    
                    <br>
                    <small>
                    <?php 
                    echo "<small>";
                    echo '<b>SKU :</b> '.$pro[0]['sku_code'].' / '.$pro[0]['buyer_code'];
                    echo "<br>";
                    echo '<b>Product Name : </b>'.$pro[0]['product_name'];
                    echo "<br>";
                    echo "<b>Dimension (L*W*H) :</b> ".$pro[0]['length'].'x'.$pro[0]['width'].'x'.$pro[0]['height']; 
                    echo "</small>";
                    ?>
                    <hr>
                    <span  class="badge bg-danger" onclick="deleteme('order','delete_product_order','<?php echo $pids[$k]['id'];?>')" class="btn btn-danger btn-xs" ><i class="fa fa-trash" ></i> Delete</span>
                    </td>
                    
                    <td width="9%">
                      <input type="hidden" value="<?php echo $pids[$k]['id'];?>" name="id[]" class="form-control">  
                      <input type="number" name="qty[]" class="form-control" value="<?php echo $pids[$k]['qty'];?>" onkeyup="calc_total('<?php echo $p_id;?>')" id='qty<?php echo $p_id;?>' required>
                    </td>
                    <td  width="9%">
                      <input type="number" name="price_fob[]" class="form-control" value="<?php echo $fob;?>" id="price_fob<?php echo $p_id;?>" step=".01" onkeyup="calc_total('<?php echo $p_id;?>')" required>
                    </td>
                    <td width="9%">
                      <input class="form-control" type="number" name="total[]" value="<?php echo $usd;?>" id="usd<?php echo $p_id;?>" step=".01"  required>
                    </td>
                    <td width="9%"><?php echo $hsn;?>
                      <input type="hidden" name="hsn[]" class="form-control" value="<?php echo $hsn;?>" readonly="readonly" required>
                    </td>
                    <td width="9%"><?php echo $cbm;?>
                      <input class="form-control" type="hidden" name="cbm_pcs[]" value="<?php echo $cbm;?>" step=".01" readonly="readonly" required>
                    </td>
                    <td width="10%"><?php echo $color;?>
                      <input type="hidden" name="color[]" class="form-control" value="<?php echo $color;?>" readonly="readonly"  required>
                    </td>
                    <td width="10%"><?php echo $lshape;?>
                      <input class="form-control" type="hidden" name="lshape[]" value="<?php echo $lshape;?>" readonly="readonly" required>
                    </td>
                    <td width="10%"><?php echo $cartoon_pcs;?>
                      <input class="form-control" type="hidden" name="cartoon_per_pcs[]" value="<?php echo $cartoon_pcs;?>" readonly="readonly" required>
                    </td>
                </tr>
                <tr >
                    <td colspan="4" rowspan="2">
                            <table class='table table-bordered small-font'>
                              <tr>
                                <th colspan="5">Default Cartoon & Material Details :- </th>
                            <tr>
                                <th>#</th>
                                <td>D</td>
                                <td>W</td>
                                <td>H</td>
                                <td>Material</td>
                            </tr>  
                            <?php $pcount=1; foreach($pro2 as $k=>$value){?>    
                            <tr>
                                <th><?php echo $pcount++;?></th>
                                <td><?php echo $pro2[$k]['clength'];?></td>
                                <td><?php echo $pro2[$k]['cwidth'];?></td>
                                <td><?php echo $pro2[$k]['cheight'];?></td>
                                <td><?php echo $pro2[$k]['material'];?></td>
                            </tr>  
                            <?php } ?>
                            </table>
                         
                      <span  class="badge bg-success"  data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="show_page_model('Cartoon detail of <?php echo $pro[0]['sku_code'];?> From Order # <?php echo $_SESSION['order_prefix'].$order_detail[0]['id'];?>','<?php echo $base_url.'index.php?action=dashboard&nocss=order-cartoon-details&id='.$_GET['id'].'&pid='.$p_id;?>')"><i class="fa fa-box-open"></i> Add More Cartoon(s)</span>

                        <span  class="badge bg-warning"  data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="show_page_model('Material detail of <?php echo $pro[0]['sku_code'];?> From Order # <?php echo $_SESSION['order_prefix'].$order_detail[0]['id'];?>','<?php echo $base_url.'index.php?action=dashboard&nocss=order-material-details&id='.$_GET['id'].'&pid='.$p_id;?>')"><i class="fa fa-bolt"></i> Add More Material</span>  
                    </td>
                    <td colspan="4">
                        <b style="font-size:12px;">Accesories & Qty</b>
                        <div id="accesories<?php echo $p_id;?>" style="height:200px; max-height:250px; overflow:scroll;"></div>
                        <script>
                        $(document).ready(function() {
                          // divload("<?php echo $base_url.'index.php?action=dashboard&nocss=order-accesories-table&opid='.$p_id;?>","accesories<?php echo $p_id;?>");
                          $('#accesories<?php echo $p_id;?>').load("<?php echo $base_url.'index.php?action=dashboard&nocss=order-accesories-table&opid='.$pro2[$k]['pid'];?>");
                        });
                        </script>
                        
                    </td>
                    
                </tr>
                <tr>
                    <td colspan="2">
                        <!--<span class="badge bg-secondary" onclick="load_div('<?php echo $base_url.'index.php?action=dashboard&nocss=order-accesories-table&opid='.$p_id;?>','accesories<?php echo $p_id;?>')"><i class="fa fa-recycle"></i> Refresh Expenses</span>-->
                    </td>
                    <td colspan="2">
                    <span  class="badge bg-info"  data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="show_page_model('Accessories detail of <?php echo $pro[0]['sku_code'];?> From Order # <?php echo $_SESSION['order_prefix'].$order_detail[0]['id'];?>','<?php echo $base_url.'index.php?action=dashboard&nocss=order-accesories-details&id='.$p_id;?>')"><i class="fa fa-universal-access"></i> Add Expenses</span>
                    </td>
                   
                
                </tr>
                <?php }}?>

                <!---- footer--->
                <tr class="table-primary">
                  <td colspan="8" class="text-danger">
                    Note * :- Product details can be editable till the order status is pending. You can not change the details when order is <em><b>Shipped</b></em>.
                  </td>
                  <td colspan="2">
                    <input type="submit" name="submit" value="Update Product Details" class="btn btn-md btn-warning">
              </td> 
              </tbody> 
        </table> 
        </form>       
    </div>


    </div>
    </div>
  </div>
</div>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $("#Products").select2({
  allowClear:true,
  placeholder: 'Products'
});
</script>