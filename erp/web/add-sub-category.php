
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
        <h1 class="app-page-title">
          <?php if(isset($_GET['edit'])){ echo "Edit";}else{echo "Add";}?> Store Item Sub Category</h1>

          <?php include('alerts.php');?>

          <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">

          <form name="product" action="index.php?action=store&query=add_store_subcat" method="post">
                   	
                     <!-- row 1-->
                       <div class="form-group row">
                         
                       <div class="col-sm-3">
                         <label class="col-form-label">Category <span class="mendetory">*</span></label>
                           <select name="cat" class="form-control">
                            <option disabled='disabled' selected='selected'>- Select -</option>
                            <?php 
                            $cat=$store->get_cat();
                            foreach($cat as $row=>$value)
                            {
                              echo "<option value='".$cat[$row]['id']."'>".$cat[$row]['cat']."</option>";
                            }
                            ?>
                           </select>
                         </div>

                         <div class="col-sm-3">
                         <label class="col-form-label">Item Sub Category <span class="mendetory">*</span></label>
                           <input type="text" value="" class="form-control form-control-sm" name="subcat"  required>
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
                <th>Category</th>
                <th>Sub Category</th>
                <th>Utility</th>
              </tr>  
            </thead>
            <tbody>
              <?php 
              $counter=1;
              $viewall=$store->get_subcat();
              foreach($viewall as $row => $value){?>
              <tr>
                <th><?php echo $counter++;?></th>
                <th><?php $cat=$store->get_cat_single($viewall[$row]['cat']); 
                echo $cat[0]['cat'];
                ?></th>
                <th><?php echo $viewall[$row]['subcat'];?></th>
                <th>
                <a href="<?php echo $base_url.'index.php?action=dashboard&page=add-store-subcategory&edit='.$viewall[$row]['id'];?>">  <i class="btn btn-warning btn-xs fa fa-pen"></i> </a> 
                <a href="<?php echo $base_url.'index.php?action=store&query=delete-store-subcategory&id='.$viewall[$row]['id'];?>"> <i class="btn btn-danger btn-xs fa fa-trash"></i> </a> 
              </th>
              </tr>
              <?php }?>
            </tbody>
          </table>
        </div>


      </div>
</div>

