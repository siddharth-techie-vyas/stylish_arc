<?php 
if(isset($_GET['status']))
{
    if($_GET['status']=='1')
    {
        echo "<div class='alert alert-success'>Added Successfully !!!</div>";
    }

    if($_GET['status']=='2')
    {
        echo "<div class='alert alert-danger'>Something Went Wrong, Please Try Again !!!</div>";
    }

    if($_GET['status']=='3')
    {
        echo "<div class='alert alert-info'>Updated Successfully !!!</div>";
    }

    if($_GET['status']=='4')
    {
        echo "<div class='alert alert-primary'>Deleted Successfully !!!</div>";
    }

    if($_GET['status']=='5')
    {
        echo "<div class='alert alert-secondary'>Record(s) Found !!!</div>";
    }

    if($_GET['status']=='6')
    {
        echo "<div class='alert alert-secondary'>This Item Has Been Already Added</div>";
    } 
    
    if($_GET['status']=='7')
    {
        echo "<div class='alert alert-secondary'>No Data Found</div>";
    } 
}
?>

<!-- toast -->
<!-- <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="true" class="bg-danger">
  <div class="toast-header">
    <i class="fa fa-bell fa-3x"></i>
    <strong class="mr-auto">Alert</strong>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
   Data Deleted Successfully !!!
  </div>
</div> -->

<div id="delete_msg"></div>