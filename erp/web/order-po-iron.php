<?php  $order_edit=$order->get_po_one($_GET['id']);
$default_size =$admin->get_metaname_byvalue('default_material_size');
?>

<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
     
<form action="<?php echo $base_url.'index.php?action=order&query=edit-po'?>" method="post" name="create_po">
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="order_nu">Order Nu</label>
          <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
          <select class="form-control" id="order_nu" name="order_nu">
            <!-- options will go here -->
            <option disbaled="disabled">Select Order Nu</option>
            <?php
            $pos=$order->view_all_order();
            foreach($pos as $k=>$value){
            ?>
            <option value="<?php echo $pos[$k]['id'];?>" <?php if($pos[$k]['id']==$order_edit[0]['order_id']){?>selected="selected"<?php } ?> ><?php echo $pos[$k]['id'];?></option>
            <?php }?>
            <!-- add more options as needed -->
          </select>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label for="order_nu">Supplier Name</label>
          <select class="form-control" id="supplier_id" name="supplier_id">
            <!-- options will go here -->
            <option disabled="disabled">Select Suuplier Name</option>
            <?php
            $supplier=$accounts->getall_beneficiery_sametype('1');
            foreach($supplier as $k=>$value){
           
            ?>
            <option value="<?php echo $supplier[$k]['bene_id'];?>" <?php if($supplier[$k]['bene_id']==$order_edit[0]['supplier_id']){?>selected="selected"<?php } ?> ><?php echo $supplier[$k]['bname'];?></option>
            <?php }?>
            <!-- add more options as needed -->
          </select>
        </div>
      </div>


      <div class="col-md-4">
        <div class="form-group">
          <label for="delivery_date">Delivery Date</label>
          <input type="date" class="form-control" id="delivery_date" name="delivery_date" value="<?php echo $order_edit[0]['delivery_date'];?>">
        </div>
      </div>
      
    </div>
    <div class="row">
    <div class="col-md-4">
        <div class="form-group">
          <label for="grace_period">Grace Period</label>
          <input type="number" class="form-control" id="grace_period" name="grace_period" value="<?php echo $order_edit[0]['grace_period'];?>">
        </div>
      </div>

    <div class="col-md-4">
        <div class="form-group">
          <label for="order_date">Order Date</label>
          <input type="date" class="form-control" id="order_date" name="order_date" value="<?php echo $order_edit[0]['order_date'];?>">
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label for="order_date">PO #</label>
          <input type="text" class="form-control" id="order_po_nu" name="order_po_nu" value="<?php echo $order_edit[0]['order_po_nu'];?>" required>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">    <br>
        <input type="submit" name="submit" value="Edit" class="btn btn-secondary"/>    
        </div>
      </div>  
      <!-- add more columns or rows as needed -->
    </div>
  </form>
</div>



<h1 class="app-page-title">Product List(s)</h1>
      
<div class="app-card alert alert-dismissible shadow-sm mb-4" role="alert">

    <div class="table-responsive">

  <table class="table table-bordered table-striped">
    <thead>
      <tr >
        <th colspan="4" style="color:#FFF; background-color:#808080;">
          <h4 style="color:#FFF;">Add Items</h4>
        </th>
        <td colspan="6" style="color:#FFF; background-color:#808080;">
          <form name="product_add_po" action="<?php echo $base_url.'index.php?action=order&query=product_add_po';?>" method="post">
          <div class="row">  
            <div class="col-sm-7">
              <input type="hidden" name="poid" value="<?php echo $order_edit[0]['id'];?>">
              <input type="hidden" name="oid" value="<?php echo $order_edit[0]['order_id'];?>">
              <select name="pid" id="pid" class="form-control">
                <option disabled="disabled" selected="selected">--Select Product--</option>
              <?php 
              //-- get product of sale order
              $products_po=$order->get_po_products($order_edit[0]['order_id']);
              foreach($products_po as $k=>$value)
                {
                  //-- get product name
                  $pname=$product->getone($products_po[$k]['pid']);
                  echo "<option value='".$products_po[$k]['pid']."'>".$pname[0]['sku_code']." / ".$pname[0]['buyer_code']." [QTY : ".$products_po[$k]['qty']."]</option>";
                  echo "<option disabled='disabled'>".$pname[0]['product_name']."</option>";
                }
                
              ?>  
              
              </select>
              </div>
              <div class="col-sm-4">
                <input type="submit" value="Add Product" class="btn btn-xs btn-info text-white">
              </div>
            </div>  
          </form>
        </td>
      </tr>
      <tr>
        <th>S.No.</th>
        <th>Image</th>
        <th>Product Code</th>
        <th>Dimension <br><small><em>(L*W*H) <?php echo $default_size[0]['value1'];?></em></small></th>
        <th>Order Price / Pcs</th>
        <th>Supplier Price / Pcs</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Remark</th>
        <th>Utility</th>
      </tr>
    </thead>
    <tbody>
      <form name="po_qty" action="<?php echo $base_url.'index.php?action=order&query=update_po_products';?>" method="post"> 
      <input type="hidden" name="poid" value="<?php echo $order_edit[0]['id'];?>"/>
      <!-- table data will go here -->
       <?php 
       $counter=1;
       $po_supplier_products=$order->po_supplier_products($order_edit[0]['order_id'],$order_edit[0]['id']);

       foreach($po_supplier_products as $k=>$value){
        //-- product details
        $pname=$product->getone($po_supplier_products[$k]['pid']);

        //-- order price 
        $order_detail=$order->get_product_detail_one($order_edit[0]['order_id'],$po_supplier_products[$k]['pid']);
       ?>
      
      <tr id="<?php echo $po_supplier_products[$k]['id'];?>">
        <th><?php echo $counter++;?></th>
        <td>
                       <?php if(!file_exists($base_url.'theme/assets/images/'.$pname[0]['picture'])){?>
                            <img src="<?php echo $base_url.'theme/assets/images/'.$pname[0]['picture'];?>" height="70" width="auto">
                        <?php }else{?>    
                            <i class="fa fa-3x fa-image"></i>
                        <?php } ?> 
        
       <input type="hidden" name="id[]" value="<?php echo $po_supplier_products[$k]['id'];?>"/>
        </td>
        <td><?php  echo "<b>".$pname[0]['sku_code']." / ".$pname[0]['buyer_code']."</b><br><small>".$pname[0]['product_name']."</small>";?></td>
        <td><small>
          <?php 
          $iron = $product->getone_product_details_bymaterial($pname[0]['id'],'iron');
          echo $iron[0]['clength'].' x '.$iron[0]['cwidth'].' x '.$iron[0]['cheight'];
          ?>
          </small>
        </td>
        <td id="amt<?php echo $po_supplier_products[$k]['id'];?>"><?php echo $order_detail[0]['price_fob'];?></td>
        
        <!-- <td><input type="number" class="form-control" step=".01" name="price[]" id="price_fob<?php echo $po_supplier_products[$k]['id'];?>" value="<?php echo $po_supplier_products[$k]['price'];?>" onkeypress="check_max_amt('<?php echo $po_supplier_products[$k]['id'];?>')"></td> -->

        <td><input type="number" class="form-control" step=".01" name="price[]" id="price_fob<?php echo $po_supplier_products[$k]['id'];?>" value="<?php echo $po_supplier_products[$k]['price'];?>" onkeyup="calc_total('<?php echo $po_supplier_products[$k]['id'];?>')"></td>
        
        <td>
        <?php 
       //-- check if any other po created for this with qty
       $check_po_qty = $order->check_same_item_in_po($po_supplier_products[$k]['oid'],$po_supplier_products[$k]['pid']);
       ?>
       
        <select name="qty[]" class="form-control" id="qty<?php echo $po_supplier_products[$k]['id'];?>" onchange="calc_total('<?php echo $po_supplier_products[$k]['id'];?>')">
        <?php for($i=0; $i<=$order_detail[0]['qty'];$i++){?>  
        <option <?php if($po_supplier_products[$k]['qty']==$i){echo "selected='selected'";}?>value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php }?>
       </select> 

       
        <!-- <input type="number" class="form-control"   name="qty[]" value="<?php echo $po_supplier_products[$k]['qty'];?>"> -->
        
        </td>

        <td>
          <input type="number" class="form-control" id="usd<?php echo $po_supplier_products[$k]['id'];?>" step=".01" name="total[]" value="<?php echo $po_supplier_products[$k]['total'];?>">
        </td>

        <td>
          <input type="remark" class="form-control" name="remark[]" value="<?php echo $po_supplier_products[$k]['remark'];?>">
        </td>

        <td>
          <i class="fa fa-trash btn btn-xs btn-danger" onclick="deleteme('order','delete_po_item','<?php echo $po_supplier_products[$k]['id'];?>')"></i>
        </td>
        
      </tr>
      <?php }?>
      <?php if($po_supplier_products){?>
<tr>
  <td colspan="7"></td>
  <td colspan="2"><input type="submit" value="Update Product Details" class="btn btn-primary text-white"></td>
</tr>
      <?php }?>  
      </form>
      <!-- add more table rows as needed -->
    </tbody>
  </table>
</div>


</div>



<!-- custom function -->
<script>
	// function check_max_amt(id)
	// {
	// 	var amt=parseInt($("#amt"+id).html());
    
	// 	var price=parseInt($("#price_fob"+id).val());
   
  //   if(price > amt)
	// 	alert("Supplier Price Should Not Be Greater then Product Order Amount");
	// 	//$("#price_fob"+id).val('');
	// }
 </script>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $("#pid").select2({
  allowClear:true,
  placeholder: 'Products'
});
</script>