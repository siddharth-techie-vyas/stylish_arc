<?php $oder_details = $order->get_product_details($_GET['id']);
$items=$store->get_items();
?>
<span id="msgaccesories"></span>
<!--- old -->
<div class="col-sm-12 ">
    <table class="table table-bordered" style="font-size:11px;">
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Qty</th>
            <th>Remark</th>
            <th></th>
        </tr>
    <?php 
    $counter=1;
    $cartoon=$order->get_details_2($_GET['id'],'accesories');
    if(COUNT($cartoon)<1)
    {
        echo "<tr><td colspan='5'>No Details Found</td></tr>";
    }
    else{
    foreach($cartoon as $k=>$value)
    {
    $item_name = $store->get_item_one($cartoon[$k]['value1']);
    $unit=$store->get_unit_one($item_name[0]['unit']);
    ?>
        <tr class="<?php echo $cartoon[$k]['id'];?>">
            <td><?php echo $counter++;?></td>
            <td><img src="<?php echo $base_url.'theme/assets/images/'.$item_name[0]['image'];?>" width="auto" height="40"></td>
            <td><?php echo $item_name[0]['product_name'];?></td>
            <td><?php echo $cartoon[$k]['value2'].' '.$unit[0]['unit'];?></td>
            <td><?php echo $cartoon[$k]['value4'];?></td>
            <td><span onclick="deleteme('order','order_details2_delete','<?php echo $cartoon[$k]['id'];?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></span></td>
        </tr>
    <?php }}
    ?>
    </table>
</div>

<div class="col-sm-12 card">
<form name="accesories" method="post" action="<?php echo $base_url.'index.php?action=order&query=order-accesories-details';?>" id="accesories">

    <input type="hidden" name="opid" value="<?php echo $_GET['id'];?>">
    <input type="hidden" name="op_detail" value="accesories">
    
    <table class="table table-bordered" id="dynamic_field">
        <tr>
            <th>#</th>
            <th>Item</th>
            <th>Qty</th>
            <th>Remark</th>
        </tr>
    </table>
    <input type="button" id="add" name="addmore" value="Add Accesories" class="col-sm-4 btn btn-primary btn-sm"/>
    <input type="button" name="submit" value="Update" class="col-sm-4 btn btn-secondary btn-sm" onclick="form_submit('accesories')"/>
    </form>
</div>

<script>
$(document).ready(function(){
var i=1;
$('#add').click(function(){

$('#dynamic_field').append('<tr id="row'+i+'"><td>'+i+'</td><td><select name="value1[]" class="form-control"><option disabled="disabled" selected="selected">-Select-</option><?php foreach($items as $k => $value){?><option value="<?php echo $items[$k]['id'];?>"><?php echo $items[$k]['product_name'];?></option><?php }?></select></td><td><input type="text" name="value2[]" placeholder="Enter Qty" class="form-control" /></td><td><input type="text" name="value4[]" placeholder="Enter Remark" class="form-control" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
i++;
});
	
$(document).on('click', '.btn_remove', function(){
var button_id = $(this).attr("id"); 
$('#row'+button_id+'').remove();
});
});
</script>