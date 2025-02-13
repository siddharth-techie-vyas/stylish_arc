<?php 
$counter=1;
$viewpo=$store->get_stock_po_item($_GET['id']);
?>
<table class="table table-dark">
    <tr>
        <th>S.No.</th>
        <th>Item Name</th>
        <th>HSN</th>
        <th>Qty</th>
    </tr>
    <?php foreach($viewpo as $k => $value){?>
    <tr>
        <th><?php echo $counter++;?></th>
        <td><?php $item=$store->get_item_one($viewpo[$k]['sku']); echo $item[0]['product_name'];?></td>
        <td><?php echo $item[0]['hsn_code'];; ?></td>
        <td><?php echo $viewpo[$k]['sku']; ?></td>
        <td><?php echo $viewpo[$k]['qty']; ?></td>
    </tr>
    <?php }?>
</table>