<table class="table table-bordered" id="data-table">
<tr>
    <th>#</th>
    <th>Transaction Type</th>
    <th>Quantity</th>
    <th>Remark</th>
</tr>
<?php 
$pcount=1;
$stock_details = $product->get_product_history($_GET['id']);
foreach($stock_details as $k =>$value){
?>
<tr>
<th><?php echo $pcount++;?></th>
<td><?php echo $stock_details[$k]['tra_type'];?></td>
<td><?php echo $stock_details[$k]['qty'];?></td>
<td><?php echo $stock_details[$k]['remark'];?></td>
</tr>
<?php } ?>
</table>