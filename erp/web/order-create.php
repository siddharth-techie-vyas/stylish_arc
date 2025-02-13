<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
      <h1 class="app-page-title">Create Sale Order</h1>
      <?php include('alerts.php');?>
      <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
        <!-- form-->
        <form action="<?php echo $base_url.'index.php?action=order&query=create-order';?>" method="post" name="order-create">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="client_name">Client Name</label>
                <select class="form-control" name="client_name">
                  <option disabled='disabled' selected='selected'>- Select Client -</optio>
                  <?php 
                    $client=$accounts->getall_beneficiery_sametype('10');
                    foreach ($client as $k=>$value) {
                      echo "<option value='".$client[$k]['bene_id']."'>".$client[$k]['bname']."</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="order_date">Date</label>
                <input type="date" class="form-control" name="order_date">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="ship_date">Shipment Date</label>
                <input type="date" class="form-control" name="ship_date">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="pi_nu">PI No.</label>
                <input type="text" class="form-control" name="pi_nu" placeholder="Enter PI No.">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="pi_date">PI Date</label>
                <input type="date" class="form-control" name="pi_date">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="country">Country</label>
                <select class="form-control" name="country">
                  <option disabled='disabled' selected='selected'>- Select Country -</optio>
                  <?php 
                    $country=$admin->get_country();
                    foreach ($country as $k=>$value) {
                      echo "<option value='".$country[$k]['name']."'>".$country[$k]['name']."</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="usd_inr">USD To INR Conversion Rate Today</label>
                <input type="number" class="form-control" name="usd_inr" step=".01" placeholder="Enter conversion rate">
              </div>
            </div>
         
            <div class="col-md-4"><br>
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


