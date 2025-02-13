
<div class="app-wrapper">
<div class="app-content pt-3 p-md-3 p-lg-4">
<div class="container-xl">
<h1 class="app-page-title">View Store Item Stock</h1>
<?php include('alerts.php');?>
<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">


<table class="table table-bordered table-striped table-hover" id="data-table">
    <thead>
        <tr>
            <th>S.No.</th>
            <th>Image</th>
            <th>Item Name</th>
            <th>SKU</th>
            <th>HSN</th>
            <th>Last Updated On</th>
            <th>Last Inv Received</th>
            <th>Stock</th>
            <th>Utility</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $counter=1; 
        $pos=$store->get_items();
        foreach($pos as $k=>$value){
        ?>
        <tr>
            <td><?php echo $counter++;?></td>
            <td><?php if(file_exists($base_url.'theme/assets/images/'.$pos[$k]['image'])){?>
            <img src="<?php echo $base_url.'theme/assets/images/'.$pos[$k]['image'];?>" height="40" width="auto">
            <?php } else {?>
                <i class="fa fa-2x fa-image"></i>
            <?php }?>    
            </td>
            <td><?php echo $pos[$k]['product_name'];?></td>
            <td><?php echo 'ST'.$pos[$k]['subcat'].'-'.$pos[$k]['id'];?></td>
            <td><?php echo $pos[$k]['hsn_code'];?></td>
            <td></td>
            <td></td>
            <td><?php echo $pos[$k]['stock'];?></td>
            <td>
                <span class="btn btn-xs btn-warning " data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="show_page_model('Stock detail of <?php echo $pos[$k]['product_name'];?>','<?php echo $base_url.'index.php?action=dashboard&nocss=store-item-stock-details&id='.$pos[$k]['id'];?>')" ><i class="fa fa-info"></i></span>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>



</div>
</div>
</div>
</div>