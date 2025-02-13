<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
      <h1 class="app-page-title">Container Details</h1>
      <?php include('alerts.php');?>
      <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
        

      <form>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="order_nu">Order Nu</label>
        <select id="order_nu" name="order_nu" class="form-control">
          <!-- options will go here -->
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="shipped_date">Shipped Date</label>
        <input type="date" id="shipped_date" name="shipped_date" class="form-control">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="ctype">Container Type</label>
        <select id="ctype" name="ctype" class="form-control">
          <!-- options will go here -->
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="cnu">Container Number</label>
        <input type="text" id="cnu" name="cnu" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="documents">Documents</label>
        <input type="file" id="documents" name="documents" class="form-control" multiple>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
  </div>
</form>

</div>
    </div>
  </div>
</div>


<!--- table -->
<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">

    <h5 class="app-page-title">Item Details</h5>
<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">S.no.</th>
        <th scope="col">Product</th>
        <th scope="col">Qty</th>
        <th scope="col">Price</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    <tbody>
      <!-- table data will go here -->
      <tr>
        <th scope="row">1</th>
        <td>Product 1</td>
        <td>2</td>
        <td>$10.00</td>
        <td>$20.00</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Product 2</td>
        <td>3</td>
        <td>$15.00</td>
        <td>$45.00</td>
      </tr>
      <!-- add more rows as needed -->
    </tbody>
  </table>
</div>

</div>

</div>

</div>
