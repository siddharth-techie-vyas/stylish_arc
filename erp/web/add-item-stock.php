
<div class="app-wrapper">
<div class="app-content pt-3 p-md-3 p-lg-4">
<div class="container-xl">
<h1 class="app-page-title">Add Store Item PO</h1>
<?php include('alerts.php');?>
<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">


<form name="store_po" action="<?php echo $base_url.'index.php?action=store&query=add-store-po'?>" method="post">
<div class="row">
    <div class="col-sm-3">
        <input type="hidden" name="added_by" value=""/>
        <label class="col-form-label">Invoice Nu# <span class="mendetory">*</span></label>
        <input type="text" value="" class="form-control form-control-sm" name="inv_nu" id="inv_nu" required>
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
            <option value="<?php echo $suplier[$k]['bene_id']?>"><?php echo $suplier[$k]['bname']?></option>
            <?php }?>
        </select>
    </div>
    <div class="col-sm-3">
        <label class="col-form-label">Invoice Date <span class="mendetory">*</span></label>
        <input type="date" value="" class="form-control form-control-sm" name="po_date" id="po_date" required>
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
</div>