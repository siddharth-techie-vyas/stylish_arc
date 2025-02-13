
<div class="app-wrapper">
<div class="app-content pt-3 p-md-3 p-lg-4">
<div class="container-xl">
<h1 class="app-page-title">View Store Invoice</h1>
<?php include('alerts.php');?>
<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">


<table class="table table-bordered table-striped table-hover" id="data-table">
    <thead>
        <tr>
            <th>S.No.</th>
            <th>Invoice</th>
            <th>Supplier</th>
            <th>PO Date</th>
            <th>Added By</th>
            <th>Last Updated On</th>
            <th>Utility</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $counter=1; 
        $pos=$store->get_store_po();
        foreach($pos as $k=>$value){
        ?>
        <tr id="<?php echo $pos[$k]['id'];?>">
            <td><?php echo $counter++;?></td>
            <td><?php echo $pos[$k]['inv_nu'];?></td>
            <td><?php echo $pos[$k]['supplier_name'];?></td>
            <td><?php echo $pos[$k]['po_date'];?></td>
            <td><?php echo $pos[$k]['added_by'];?></td>
            <td><?php echo $pos[$k]['added_date_time'];?></td>
            <td>
                <i onclick="show_page_model('View <?php echo $pos[$k]['inv_nu']; ?>','<?php echo $base_url.'index.php?action=dashboard&nocss=view-store-po&id='.$pos[$k]['id'];?>')" class="fa fa-eye btn btn-info"></i>

                <a href="<?php echo $base_url.'index.php?action=dashboard&page=edit-item-stock&id='.$pos[$k]['id'];?>"><i class="fa fa-pencil btn btn-warning"></i></a>
                
                <i class="fa fa-trash btn btn-danger" onclick="deleteme('store','delete_po','<?php echo $pos[$k]['id'];?>')"></i>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>



</div>
</div>
</div>
</div>