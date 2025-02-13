<?php 
$po=$store->get_po_one($_GET['id']);
?>
<div class="app-wrapper">
<div class="app-content pt-3 p-md-3 p-lg-4">
<div class="container-xl">
<h1 class="app-page-title">Edit Store Item PO</h1>
<?php include('alerts.php');?>
<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">


<form name="store_po" action="<?php echo $base_url.'index.php?action=store&query=add-store-po'?>" method="post">
<div class="row">
    <div class="col-sm-3">
        <input type="hidden" name="added_by" value=""/>
        <label class="col-form-label">Invoice Nu# <span class="mendetory">*</span></label>
        <input type="text" class="form-control form-control-sm" name="inv_nu" id="inv_nu" value="<?php echo $po[0]['inv_nu'];?>" required>
    </div>
    <div class="col-sm-3">
        <label class="col-form-label">Supplier Name <span class="mendetory">*</span></label>
        <select class="form-control form-control-sm" name="supplier_name" id="supplier_name" required>
            <option value="" disabled='disbaled' selected='selected'>Select Supplier</option>
            <?php
            $suplier=$accounts->getall_beneficiery_sametype('1');
            foreach($suplier as $k=>$value)
            {
            ?>
            <option value="<?php echo $suplier[$k]['bene_id']?>" <?php if($po[0]['supplier_name']==$suplier[$k]['bene_id']){?>selected="selected"<?php }?> ><?php echo $suplier[$k]['bname']?></option>
            <?php }?>
        </select>
    </div>
    <div class="col-sm-3">
        <label class="col-form-label">Invoice Date <span class="mendetory">*</span></label>
        <input type="date" class="form-control form-control-sm" name="po_date" id="po_date" value="<?php echo $po[0]['po_date'];?>" required>
    </div>

    <div class="col-sm-3"><br>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
        <button type="reset" class="btn btn-secondary btn-block">Reset</button>
    </div>
</div>
</form>

</div>
</div>
</div>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
                
        <form name="addsku" action="<?php echo $base_url.'index.php?action=store&query=add-item-qty';?>" method="post">
        <input type="hidden" value="<?php echo $_GET['id'] ?>" name="poid">
        <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <th>S.No.</th>
                        <th>Item Name / SKU</th>
                        <th>Qty</th>
                    </tr>
                    <?php 
                    ///-- if already adeed
                    $counter=1;
                    $get_items=$store->get_stock_po_item($_GET['id']);
                    foreach($get_items as $k => $value){?>
                    <tr>
                        <th><?php echo $counter++;?></th>
                        <td>
                            <select class="form-control" name="sku[]" >
                                <option disabled="disabled" selected="selected">-Select-</option>
                                <?php $skus=$store->get_items(); 
                                foreach($skus as $j => $value){?>
                                <option value="<?php echo $skus[$j]['id']; ?>" <?php if($get_items[$k]['sku']==$skus[$j]['id']){?>selected="selected"<?php }?>>
                                    <?php echo $skus[$j]['product_name'].' / '.$skus[$j]['hsn_code']; ?>
                                </option>
                                <?php }?>
                            </select>
                        </td>
                        <td>
                            <input type="number" class="form-control" value="<?php echo $get_items[$k]['qty'];?>" name="qty[]">
                        </td>
                    </tr>
                    <?php }?>
                </table>

                <input type="button" class="btn btn-secondary col-sm-3" value="Add Items" id="add"/>
                <input type="submit" class="btn btn-primary col-sm-3" value="Submit" id="submit"/>
        </form>
    </div>
</div>



</div>


<!-- add more items---->
 
<script>
$(document).ready(function(){
var i=1;
$('#add').click(function(){

$('#dynamic_field').append('<tr id="row'+i+'"><td>'+i+'</td><td><select class="form-control" name="sku[]" id="sku'+i+'"><option disabled="disabled" selected="selected">-Select-</option><?php $skus=$store->get_items(); foreach($skus as $k => $value){?><option value="<?php echo $skus[$k]['id']; ?>"><?php echo preg_replace('/\s+/', '',$skus[$k]['hsn_code']); ?></option><?php }?></select></td><td><input type="text" name="qty[]" placeholder="Enter Qty" class="form-control"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
i++;
});
	
$(document).on('click', '.btn_remove', function(){
var button_id = $(this).attr("id"); 
$('#row'+button_id+'').remove();
});
});
</script>