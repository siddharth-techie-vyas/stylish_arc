<?php $maxpo_nu=$order->get_max_po_nu();
$po_prefix =$_SESSION['po_prefix'];
$maxpo_nu=$maxpo_nu+1;
$default_po=$po_prefix.$maxpo_nu;
?>

<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
      <h1 class="app-page-title">Create Purchase Order(s)</h1>
      <?php include('alerts.php');?>
      <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
     
      <form action="<?php echo $base_url.'index.php?action=order&query=create-po'?>" method="post" name="create_po">
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="order_nu">Order Nu <small class='text-danger'>(Pending Only)</small></label>
          <select class="form-control" id="order_nu" name="order_id" required>
            <!-- options will go here -->
            <option disbaled='disabled' selected='selected'>Select Order Nu  </option>
            <?php 
            $pending_order=$order->get_pending_orders();
            foreach($pending_order as $k => $value){ ?>
            <option value="<?php echo $pending_order[$k]['id']; ?>"><?php echo $_SESSION['order_prefix'].$pending_order[$k]['id'];?></option>
            <?php } ?>
            <!-- add more options as needed -->
          </select>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label for="order_nu">Supplier Name</label>
          <select class="form-control" id="supplier_id" name="supplier_id" required>
            <!-- options will go here -->
            <option value="">Select Suuplier Name</option>
            <?php 
            $supplier=$accounts->getall_beneficiery_sametype('1');
            foreach($supplier as $k => $value){
            ?>
            <option value="<?php echo $supplier[$k]['bene_id']?>">
            <?php echo $supplier[$k]['bname']?></option>
            <?php }?>
            <!-- add more options as needed -->
          </select>
        </div>
      </div>


      <div class="col-md-4">
        <div class="form-group">
          <label for="delivery_date">Delivery Date</label>
          <input type="date" class="form-control" id="delivery_date" name="delivery_date" required>
        </div>
      </div>
      
    </div>
    <div class="row">
    <div class="col-md-4">
        <div class="form-group">
          <label for="grace_period">Grace Period</label>
          <input type="number" class="form-control" id="grace_period" name="grace_period" required>
        </div>
      </div>

    <div class="col-md-4">
        <div class="form-group">
          <label for="order_date">Order Date</label>
          <input type="date" class="form-control" id="order_date" name="order_date" value="<?php echo date('Y-m-d');?>" required>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label for="order_date">PO #</label>
          <input type="text" class="form-control" id="order_po_nu" name="order_po_nu" value="<?php echo $default_po;?>" readonly='readonly' required>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label for="order_date">PO For</label>
          <select name="potype" id="potype" class="form-control" required>
              <option disbaled="disabled" selected="selected">--Select--</option>
              <option value="0">Products</option>
              <option value="1">Cartoon</option>
              <option value="2">Material</option>
              <option value="3">Iron</option>
            </select>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">    <br>
        <input type="submit" name="submit" value="Create & Process" class="btn btn-primary"/>    
    </div>
        </div>  
      <!-- add more columns or rows as needed -->
    </div>
  </form>
</div>