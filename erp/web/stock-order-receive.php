
      <div class="app-wrapper">
      <div class="app-content pt-3 p-md-3 p-lg-4">
  <div class="container-xl">
    <h1 class="app-page-title">Receive Items From PO By Supplier</h1>
    <?php include('alerts.php');?>
    <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
      <div class="row">
        <div class="col-md-4">
          <form action="<?php echo $base_url.'index.php?action=dashboard&page=stock-order-receive'?>" method="post" name="ponu_form">
            <div class="form-group">
              <label for="orderNu">PO Number:</label>
              <select class="form-control" id="ponu" name="ponu" required>
                <option value="">Select PO Number</option>
                <?php $pos=$order->get_po_by_status('1');
                foreach($pos as $k=>$value){
                ?>
                  <option value='<?php echo $pos[$k]['id'];?>'>
                    <?php echo $pos[$k]['order_po_nu'];?>
                  </option>
                <?php }?>
                <!-- Add more options here -->
              </select>
            </div><br>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>

<!-- after form submit -->
<?php if(isset($_POST['ponu'])){?>
  <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
      <div class="row"> 
      <?php $po=$order->get_po_one($_POST['ponu']);
$detail=$order->get_po_one_details($_POST['ponu']);
?>
<span id="msgqtyr"></span>
<form name="qtyr" id="qtyr" method="post" action="<?php echo $base_url.'index.php?action=order&query=add_qty_received';?>">
<input type="hidden" name="poid" value="<?php echo $_POST['ponu'];?>">
<input type="hidden" name="ponu" value="<?php echo $po[0]['order_po_nu'];?>">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>PO # </th>
            <td><?php echo $po[0]['order_po_nu'];?></td>
            <th>Supplier</th>
            <td> <?php $bene=$accounts->get_beneficiery_one($po[0]['supplier_id']); echo $bene[0]['bname'];?></td>
            <th>Date</th>
            <td colspan="2"> <?php echo $po[0]['added_date_time'];?></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>S.No</th>
            <th>Image</th>
            <th>Sku</th>
            <th>Name</th>
            <th>Qty in PO</th>
            <th>Pending</th>
            <th>Received</th>
           
        </tr>
        <?php 
        if(COUNT($detail)<1)
        {echo "<tr><td colspan='7'>No item added</td></tr>";}
        else{
        $counter=1; foreach($detail as $k=>$value){
            //--get product details
            $pdetail=$product->getone($detail[$k]['pid']);
            //-- main order product details
            $opdetail=$order->get_product_detail_one($detail[$k]['oid'],$detail[$k]['pid']);
            ?>
        <tr>
            <th><?php echo $counter++;?></th>
            <td><img src='<?php echo $base_url.'theme/assets/images/'.$pdetail[0]['picture'];?>' width="auto" height="40"></td>
            <td><?php echo $pdetail[0]['sku_code'];?></td>
            <td><?php echo $pdetail[0]['product_name'];?></td>
            <td><?php echo $detail[$k]['qty'];?></td>
            <td><?php $qty=$detail[$k]['qty']; echo $pending=$detail[$k]['qty']-$detail[$k]['received'];?></td>
            <td>
            <input type="hidden" name="id[]" value="<?php echo $detail[$k]['id'];?>" class="form-control">  
            <input type="hidden" name="sku[]" value="<?php echo $pdetail[0]['sku_code'];?>" class="form-control">  
            <input type="hidden" name="pid[]" value="<?php echo $detail[$k]['pid'];?>" class="form-control">  
            <input type="hidden" name="qty[]" value="<?php echo $detail[$k]['qty'];?>" class="form-control">  
            <!-- <input type="number" name="qty_received[]" value="" class="form-control"> -->
            <select clas="form-control" name="qty_received[]">
              <option disbaled='disbaled' selected='selected'>--Select--</option>
              <?php for($i=1;$i<=$pending;$i++){?>
              <option value='<?php echo $i;?>'><?php echo $i;?></option>
              <?php }?>
            </select>
            </td>
          
            
            
        </tr>
        <?php } }?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2"><input type="button" name="save" value="Update" class="btn bnt-xs btn-info" onclick="form_submit_result('qtyr')">
      </tr>
    </tfoot>
</table>
        </form>
</div>
</div>
<?php } ?>

  </div>
</div>
</div>