<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.4/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.4/select2.min.js"></script>

<?php $oder_details = $order->get_product_detail_one($_GET['id'],$_GET['pid']);?>

<span id="msgcartoon"></span>

<!--- old -->
<div class="col-sm-12 ">
    <table class="table table-bordered table-dark">
        <tr>
            <th>#</th>
            <th>Length</th>
            <th>Width</th>
            <th>Height</th>
            <th>Type</th>
        </tr>
    <?php 
    $counter=1;
    $cartoon=$order->get_details_2($_GET['id'],'cartoon');
    if($cartoon){
        foreach($cartoon as $k=>$value)
        {?>
            <tr class="<?php echo $cartoon[$k]['id'];?>">
                <td><?php echo $counter++;?></td>
                <td><?php echo $cartoon[$k]['value1'];?></td>
                <td><?php echo $cartoon[$k]['value2'];?></td>
                <td><?php echo $cartoon[$k]['value3'];?></td>
                <td><?php echo $cartoon[$k]['value4'];?></td>
                <td><span onclick="deleteme('order','order_details2_delete','<?php echo $cartoon[$k]['id'];?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></span></td>
            </tr>
        <?php }}
    
    else
    {
        echo "<tr><td colspan='5'>No Details Found</td></tr>";
    }?>
    </table>
</div>



<div class="col-sm-12 ">
    <form name="cartoon" method="post" action="<?php echo $base_url.'index.php?action=order&query=order-cartoon-details';?>" id="cartoon">
    
    <input type="hidden" name="opid" value="<?php echo $_GET['id'];?>">
    <input type="hidden" name="op_detail" value="cartoon">
    <table class="table table-bordered" id="dynamic_field">
        
    </table>
    <input type="button" id="add" name="addmore" value="Add Cartoon" class="col-sm-4 btn btn-primary btn-sm"/>
    <input type="button" name="submit" value="Submit" class="col-sm-4 btn btn-secondary btn-sm" onclick="form_submit('cartoon')"/>
    </form>
</div>

<script>
$(document).ready(function(){
var i=1;
$('#add').click(function(){

$('#dynamic_field').append('<tr id="row'+i+'"><td>'+i+'</td><td><input type="text" name="value1[]" placeholder="Enter Length" class="form-control" /></td><td><input type="text" name="value2[]" placeholder="Enter Length" class="form-control" /></td><td><input type="text" name="value3[]" placeholder="Enter Length" class="form-control" /></td><td><input type="text" name="value4[]" placeholder="Enter Remark" class="form-control" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
i++;
});
	
$(document).on('click', '.btn_remove', function(){
var button_id = $(this).attr("id"); 
$('#row'+button_id+'').remove();
});
});
</script>