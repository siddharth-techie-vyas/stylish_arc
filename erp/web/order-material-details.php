<?php $oder_details = $order->get_product_detail_one($_GET['id'],$_GET['pid']);?>

<!--- old -->
<div class="col-sm-12 ">
    <table class="table table-bordered table-dark">
        <tr>
        <tr>
            <th>#</th>
            <th>Material</th>
            <th>Remark</th>
            <th></th>
        </tr>
        </tr>
    <?php 
    $counter=1;
    $cartoon=$order->get_details_2($_GET['id'],'material');
    if(!$cartoon)
    {
        echo "<tr><td colspan='5'>No Details Found</td></tr>";
    }
    else{
    foreach($cartoon as $k=>$value)
    {?>
        <tr class="<?php echo $cartoon[$k]['id'];?>">
            <td><?php echo $counter++;?></td>
            <td><?php echo $cartoon[$k]['value1'];?></td>
            <td><?php echo $cartoon[$k]['value4'];?></td>
            <td><span onclick="deleteme('order','order_details2_delete','<?php echo $cartoon[$k]['id'];?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></span></td>
        </tr>
    <?php }}
    ?>
    </table>
</div>


<div class="col-sm-12 ">
<span id="msgmaterial"></span>
<form name="cartoon" method="post" action="<?php echo $base_url.'index.php?action=order&query=order-material-details';?>" id="material">

    <input type="hidden" name="opid" value="<?php echo $_GET['id'];?>">
    <input type="hidden" name="op_detail" value="material">
    
    <table class="table table-bordered" id="dynamic_field"></table>
    
    <input type="button" id="add" name="addmore" value="Add Material" class="col-sm-4 btn btn-primary btn-sm"/>
    <input type="button" name="submit" value="Update" class="col-sm-4 btn btn-secondary btn-sm" onclick="form_submit('material')"/>
    </form>  
</div>

<script>
$(document).ready(function(){
var i=1;
$('#add').click(function(){

$('#dynamic_field').append('<tr id="row'+i+'"><td>'+i+'</td><td><input type="text" name="value1[]" placeholder="Enter material" class="form-control" /></td><td><input type="text" name="value4[]" placeholder="Enter Remark" class="form-control" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
i++;
});
	
$(document).on('click', '.btn_remove', function(){
var button_id = $(this).attr("id"); 
$('#row'+button_id+'').remove();
});
});
</script>