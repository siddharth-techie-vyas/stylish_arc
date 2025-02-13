<?php $po=$order->get_po_one($_GET['id']);
$detail=$order->get_po_one_details($_GET['id']);
?>

<span id="msgstatuspo"></span>
<form name="postatus" id="statuspo" menthod="post" action="<?php echo $base_url.'index.php?action=order&query=change_po_status';?>">
<table class="table table-dark">
    <tr>
        <th>Status</th>
        <td>
            <input type="hidden" name="poid" value="<?php echo $_GET['id'];?>">
            <select name="status" class="form-control">
                <option disbled='disabled'>--Select--</option>
                <?php $status=$admin->get_metaname_byvalue('po_delivery_status');
                foreach($status as $row => $value){
                ?>
                <option value="<?php echo $status[$row]['value2'];?>"  <?php if($po[0]['status']==$status[$row]['value2']){echo "selected='selected'";}?>><?php echo $status[$row]['value1'];?></option>
                <?php }?>
            </select>
        </td>
        <td>
            <input type="button" name="submit" class="btn btn-success btn-bg" value="Change Status" onclick="form_submit_result('statuspo')">
        </td>
    </tr>
</table>
</form>
<hr>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>PO # </th>
            <td><?php echo $po[0]['order_po_nu'];?></td>
            <th>Supplier</th>
            <td> <?php $bene=$accounts->get_beneficiery_one($po[0]['supplier_id']); echo $bene[0]['bname'];?></td>
            <th>Date</th>
            <td colspan="2"> <?php echo $po[0]['added_date_time'];?></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>S.No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Qty in Order</th>
            <th>Qty in PO</th>
            <th>Received</th>
            <th>Pending</th>
        </tr>
        <?php 
        if(COUNT($detail)<1)
        {echo "<tr><td colspan='7'>No item added</td></tr>";}
        else{
        $counter=1; foreach($detail as $k=>$value){
            //--get product details
            $pdetail=$product->getone($detail[$k]['pid']);
            //-- main order product details
            $opdetail=$order->get_product_detail_one($detail[$k]['oid'],$detail[$k]['pid']);
            ?>
        <tr>
            <th><?php echo $counter++;?></th>
            <td><img src='<?php echo $base_url.'theme/assets/images/'.$pdetail[0]['picture'];?>' width="auto" height="40"></td>
            <td><?php echo $pdetail[0]['product_name'];?></td>
            <td><?php echo $opdetail[0]['qty'];?></td>
            <td><?php echo $detail[$k]['qty'];?></td>
            <td><?php echo $detail[$k]['received'];?></td>
            <td><?php echo $detail[$k]['qty']-$detail[$k]['received'];?></td>            
        </tr>
        <?php } }?>
    </tbody>
</table>