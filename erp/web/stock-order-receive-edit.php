

<div class="app-wrapper">
      <div class="app-content pt-3 p-md-3 p-lg-4">
  <div class="container-xl">
    <h1 class="app-page-title">Order Stock Managment</h1>
    <?php include('alerts.php');?>
    <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
      <div class="row">
        <div class="col-md-4">
          <form>
            <div class="form-group">
              <label for="orderNu">Order Number:</label>
              <select class="form-control" id="orderNu">
                <option value="">Select Order Number</option>
                <option value="1">Order 1</option>
                <option value="2">Order 2</option>
                <option value="3">Order 3</option>
                <!-- Add more options here -->
              </select>
            </div><br>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
      <h1 class="app-page-title">Product Stock Received</h1>
      <?php include('alerts.php');?>
      <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>S.No</th>
                <th>Product Code</th>
                <th>Order Number</th>
                <th>PO Number</th>
                <th>Supplier Name</th>
                <th>Received</th>
                <th>Proposed</th>
                <th>Delivery Date</th>
                <th>Utility</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>PC001</td>
                <td>ORD001</td>
                <td>PRD001</td>
                <td>Supplier A</td>
                <td>10</td>
                <td>20</td>
                <td>2022-01-01</td>
                <td><button class="btn btn-sm btn-primary">View</button></td>
              </tr>
              <tr>
                <td>2</td>
                <td>PC002</td>
                <td>ORD002</td>
                <td>PRD002</td>
                <td>Supplier B</td>
                <td>15</td>
                <td>30</td>
                <td>2022-01-05</td>
                <td><button class="btn btn-sm btn-primary">View</button></td>
              </tr>
              <!-- Add more rows here -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>