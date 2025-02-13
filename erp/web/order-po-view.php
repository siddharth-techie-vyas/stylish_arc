<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
      <h1 class="app-page-title">View Purchase Order(s)</h1>
      <?php include('alerts.php');?>
      <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
     

<div class="table-responsive">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Order Nu</th>
        <th>PO Nu</th>
        <th>Supplier Name</th>
        <th>Amount</th>
        <th>Delivery</th>
        <th>Status</th>
        <th>PO Type / View</th>
        <th>Edit</th>
        <th>Status</th>
        <th>Delete</th>
        
      </tr>
    </thead>
    <tbody>
      <!-- table data will go here -->
       <?php 
       $viewall=$order->viewall_po();
       $counter=1;
       foreach($viewall as $k=>$value){
       ?>
      <tr id="<?php echo $viewall[$k]['id']; ?>">
        <td><?php echo $counter++; ?></td>
        <td><?php echo $_SESSION['order_prefix'].$viewall[$k]['order_id']; ?></td>
        <td><?php echo $_SESSION['po_prefix'].$viewall[$k]['id']; ?></td>
        <td><?php $supid=$accounts->get_beneficiery_one($viewall[$k]['supplier_id']); 
        echo $supid[0]['bname'];
        ?></td>
        <td><?php echo $sum=$order->get_po_sum($viewall[$k]['id']); ?></td>
        <td><?php echo $viewall[$k]['delivery_date']; ?></td>
        <td><?php 
        $status=$admin->get_metaname_byvalue2('po_delivery_status',$viewall[$k]['status']);
        echo $status[0]['value1'];
        ?></td>
        <td>

        <?php if($viewall[$k]['potype']=='0'){?>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="show_page_model('Purchase Order of <?php echo $viewall[$k]['order_po_nu'];?> ','<?php echo $base_url.'index.php?action=dashboard&nocss=order-po-pdf&id='.$viewall[$k]['id'];?>')">Product</button>
        <?php }if($viewall[$k]['potype']=='1'){?>
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="show_page_model('Cartoon Purchase Order of <?php echo $viewall[$k]['order_po_nu'];?> ','<?php echo $base_url.'index.php?action=dashboard&nocss=order-po-pdf&id='.$viewall[$k]['id'];?>')">Cartoon</button>
        <?php }if($viewall[$k]['potype']=='2'){?>
        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="show_page_model('Purchase Order of <?php echo $viewall[$k]['order_po_nu'];?> ','<?php echo $base_url.'index.php?action=dashboard&nocss=order-po-material-pdf&id='.$viewall[$k]['id'];?>')">Material</button>
        <?php }if($viewall[$k]['potype']=='3'){?>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="show_page_model('Purchase Order of <?php echo $viewall[$k]['order_po_nu'];?> ','<?php echo $base_url.'index.php?action=dashboard&nocss=order-po-pdf&id='.$viewall[$k]['id'];?>')">Iron</button>
        <?php }?>
        
      
        </td>
        <td> 
          <a href="<?php echo $base_url.'index.php?action=dashboard&page=order-po-edit&id='.$viewall[$k]['id'];?>"><i class="btn btn-xs btn-success fa fa-pencil"></i></a>
          </td>
        <td>
          <i class="btn btn-xs btn-secondary fa fa-info"  data-bs-toggle="modal"data-bs-target="#exampleModal" onclick="show_page_model('Status & Details of PO# <?php echo $viewall[$k]['order_po_nu'];?> ','<?php echo $base_url.'index.php?action=dashboard&nocss=order-po-status&id='.$viewall[$k]['id'];?>')"></i>
          
        </td>
        <td>
        <span id="msg<?php echo $viewall[$k]['id']; ?>"></span>
        <i class="btn btn-xs btn-danger fa fa-trash" onclick="deleteme('order','delete_po','<?php echo $viewall[$k]['id']; ?>')"></i></td>

      </tr>
      <?php }?>
      <!-- add more table rows as needed -->
    </tbody>
  </table>
</div>

</div>
</div>
</div>
</div>