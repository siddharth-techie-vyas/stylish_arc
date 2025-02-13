<style>
  option:disabled {
  color: #999999;
  font-size:12px;
}
</style>
<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
      <h1 class="app-page-title">Edit Purchase Order(s)</h1>
      <?php include('alerts.php');
      $order_edit=$order->get_po_one($_GET['id']);
      ?>
      
</div>
</div>
</div>


<!------- product list---------->
<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">

<!------- div ------------>
<div id="page_content"></div>

<!-- condition --->
<?php if($order_edit[0]['potype']==0){ include('order-po-product.php');}?>
    
<?php if($order_edit[0]['potype']==1){ include('order-po-cartoon.php');} ?>
   
<?php if($order_edit[0]['potype']==2){ include('order-po-material.php');} ?>

<?php if($order_edit[0]['potype']==3){ include('order-po-iron.php');} ?>
    

</div>  

</div>
</div>





<!--- page closed--->
</div>