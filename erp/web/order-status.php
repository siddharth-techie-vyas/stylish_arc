<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
      <h1 class="app-page-title">Order Status</h1>
      <?php include('alerts.php');?>
      <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
        

<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">S.no.</th>
        <th scope="col">Image</th>
        <th scope="col">Product Code</th>
        <th scope="col">Recived</th>
        <th scope="col">Pending</th>
        <th scope="col">Shipped</th>
      </tr>
    </thead>
    <tbody>
      <!-- table data will go here -->
      <tr>
        <th scope="row">1</th>
        <td><img src="image.png" alt="Product Image" width="100"></td>
        <td>PROD001</td>
        <td>10</td>
        <td>5</td>
        <td>15</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td><img src="image.png" alt="Product Image" width="100"></td>
        <td>PROD002</td>
        <td>20</td>
        <td>0</td>
        <td>20</td>
      </tr>
      <!-- add more rows as needed -->
    </tbody>
  </table>
</div>