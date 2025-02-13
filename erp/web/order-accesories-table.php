
<!--- old -->
<div class="col-sm-12 ">
    <h6>Defailt Added</h6>
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
    $counti=1;
    $acce=$product->getone_product_accessories($_GET['opid']);
    if (is_countable($acce) && count($acce) > 0) {
      $acce_count=count($acce);
      foreach($acce as $k=>$value){
        //-- get product acce
        $store_acce=$store->get_item_one($acce[$k]['acce']);
        echo "<tr class='".$acce[$k]['id']."'>";
        echo "<th>".$counti++."</th>";
        echo "<td>".$store_acce[0]['product_name']."</td>";
        echo "<td>".$acce[$k]['qty']."</td>";
        echo "<td>".$acce[$k]['remark']."</td>";?>
        <?php echo "</tr>";
      }}else{echo "<tr><td colspan='5'>No Accesories Found</td></tr>";}
    ?>
    
</table>
</div>


<!-- new -->
<div class="col-sm-12 ">
    <h6>Custom Added</h6>
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
    $cartoon=$order->get_details_2($_GET['opid'],'accesories');
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
            <td>
            <?php if(file_exists($base_url.'theme/assets/images/'.$item_name[0]['image']))
            {?>    
            <img src="<?php echo $base_url.'theme/assets/images/'.$item_name[0]['image'];?>" width="auto" height="40">
            <?php 
            }else{echo "<i class='fa fa-image'></i>";}
            ?>    
            </td>
            <td><?php echo $item_name[0]['product_name'];?></td>
            <td><?php echo $cartoon[$k]['value2'].' '.$unit[0]['unit'];?></td>
            <td><?php echo $cartoon[$k]['value4'];?></td>
            <td><span onclick="deleteme('order','order_details2_delete','<?php echo $cartoon[$k]['id'];?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></span></td>
        </tr>
    <?php }}
    ?>
    </table>
</div>