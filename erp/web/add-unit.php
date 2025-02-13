
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
        <h1 class="app-page-title">
          <?php if(isset($_GET['edit'])){ echo "Edit";}else{echo "Add";}?> Unit</h1>

          <?php include('alerts.php');?>

          <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">

          <form name="product" action="index.php?action=store&query=add_unit" method="post">
                   	
                     <!-- row 1-->
                       <div class="form-group row">
                         
                         <div class="col-sm-5">
                         <label class="col-form-label">Item Quantity Unit <span class="mendetory">*</span></label>
                           <input type="text" value="" class="form-control form-control-sm" name="unit"  required>
                         </div>                         
                         
                         
                         <div class="col-sm-2"><br>
                         <!--<input type="submit" name="submit" value="Submit">-->
                         <button type="submit" name="submit" class="btn btn-success btn-xs btn-icon-split">
                           <span class="icon text-white-50">
                             <i class="fas fa-check"></i>
                           </span>
                           <span class="text">Submit</span>
                         </button>
                         </div>
                         <div class="col-sm-8"></div>
         </div>
                           
                  </form>  


          </div>

        </div>

        <div class="container-xl">
          <table class="table table-responsive table-bordered" id="data-table">
            <thead>
              <tr>
                <th>S.No.</th>
                <th>Unit</th>
                <th>Utility</th>
              </tr>  
            </thead>
            <tbody>
              <?php 
              $counter=1;
              $viewall=$store->get_unit();
              foreach($viewall as $row => $value){?>
              <tr>
                <th><?php echo $counter++;?></th>
                <th><?php echo $viewall[$row]['unit'];?></th>
                <th>
                <a href="<?php echo $base_url.'index.php?action=dashboard&page=add-unit&edit='.$viewall[$row]['id'];?>">  <i class="btn btn-warning btn-xs fa fa-pen"></i> </a> 
                <a href="<?php echo $base_url.'index.php?action=store&query=delete-unit&id='.$viewall[$row]['id'];?>"> <i class="btn btn-danger btn-xs fa fa-trash"></i> </a> 
              </th>
              </tr>
              <?php }?>
            </tbody>
          </table>
        </div>


      </div>
</div>

