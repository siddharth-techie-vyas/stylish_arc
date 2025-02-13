<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
      <h1 class="app-page-title">View / Update Order(s)</h1>
      <?php include('alerts.php');?>
      <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
        
      <style>
  @media (min-width: 1200px) {
   .modal-lg {
      width: 100%; 
   }
   .modal-body{overflow-x:scroll;}
}
  </style>

<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">S.no.</th>
        <th scope="col">Order Nu</th>
        <th scope="col">Client Name</th>
        <th scope="col">Country</th>
        <th scope="col">Order Date</th>
        <th scope="col">Shipment Date</th>
        <th scope="col">PI Details</th>
        <th scope="col">Added By</th>
        <th scope="col">Status</th>
        <th scope="col">Edit</th>
        <th scope="col">PL</th>
        <th scope="col">PI / IN</th>
        <th scope="col">Report</th>
        <th scope="col">Delete</th>
        
      </tr>
    </thead>
    <tbody>
      <!-- table data will go here -->
       <?php $order_list=$order->view_all_order();
       $counter=1;
       foreach($order_list as $k =>$value)
       {
        $client_name=$accounts->get_beneficiery_one($order_list[$k]['client']);
        ?>
      <tr id="<?php echo $order_lis[$k];?>">
        <th scope="row"><?php echo $counter++;?></th>
        <td><?php echo $_SESSION['order_prefix'].$order_list[$k]['id'];?></td>
        <td><?php echo $client_name[0]['bname'];?></td>
        <td><?php echo $order_list[$k]['country'];?></td>
        <td><?php echo $order_list[$k]['order_date'];?></td>
        <td><?php echo $order_list[$k]['ship_date'];?></td>
        <td><?php echo $order_list[$k]['pi_nu'].'<br><small>'.$order_list[$k]['pi_date'].'</small>';?></td>
        <td><?php $username = $admin->getone_user($order_list[$k]['added_by']); echo $username[0]['uname'];?><br>
        <small><?php echo $order_list[$k]['added_date_time'];?></small>
        </td>
        

        <td><?php $status=$admin->get_metaname_byvalue2('shipment_delivery_status',$order_list[$k]['status']);
        echo $status[0]['value1'];
        ?>
        </td>

        <td><a href="<?php echo $base_url.'index.php?action=dashboard&page=order-edit&id='.$order_list[$k]['id'];?>"><i class='fa fa-pencil btn btn-warning'></i></a></td>

        <td>
          <a href='<?php echo $base_url.'index.php?action=dashboard&page=order-packking-slip&id='.$order_list[$k]['id'];?>' target="_blank"><i class='fa fa-boxes-packing btn btn-secondary' alt="Packing Slip"  ></i></a>
        </td>
        
        <td>
          <a href="<?php echo $base_url.'index.php?action=dashboard&page=order-invoice&id='.$order_list[$k]['id'];?>" target="_blank" alt="Invoice"><i class='fa fa-file-invoice btn btn-success'></i></a>
        </td>

        <td><a href="<?php echo $base_url.'index.php?action=dashboard&page=order-report&id='.$order_list[$k]['id'];?>"><i class='fa fa-info btn btn-info' alt='Info'></i></a></td>

        
        
        <td><i class='fa fa-trash btn btn-danger' onclick="deleteme('order','delete-order','<?php echo $order_list[$k]['id'];?>')"></i></td>
          
        </td>
      </tr>
      <?php }?>
      <!-- add more rows as needed -->
    </tbody>
  </table>
</div>


</div>
</div>
</div>