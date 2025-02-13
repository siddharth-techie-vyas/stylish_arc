
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">
          <?php if(isset($_GET['edit'])){ echo "Edit";}else{echo "Add";}?> Store Item Category</h1>

          <?php include('alerts.php');?>

          <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">

          <?php if(isset($_GET['edit'])){  $edit=$store->get_cat_single($_GET['edit']);?>
          <form name="product" action="<?php echo $base_url;?>index.php?action=store&query=edit_store_cat" method="post">
            <input type="text" name="id" value="<?php echo $edit[0]['id'];?>"/>
          <?php }else{?>
            <form name="product" action="<?php echo $base_url;?>index.php?action=store&query=add_store_cat" method="post">
          <?php }?>  
                   	
                     <!-- row 1-->
                       <div class="form-group row">
                         
                       <div class="col-sm-2">
                       <label class="col-form-label">Item Name <span class="mendetory">*</span></label>
                       </div>
                       
                         <div class="col-sm-4">
                         <?php if(isset($_GET['edit'])){?>
                           <input type="text" value="<?php echo $edit[0]['cat'];?>" class="form-control form-control-sm" name="cat"  required>
                           <?php }else{?>
                            <input type="text" value="" class="form-control form-control-sm" name="cat"  required>
                           <?php }?> 
                         </div>                         
                         
                         
                         
                         <div class="col-sm-2">
                         <button type="submit" name="submit" class="btn btn-success btn-icon-split">
                           <span class="icon text-white-50">
                             <i class="fas fa-check"></i>
                           </span>
                           <span class="text">Submit</span>
                         </button>
                         </div>

                         <div class="col-sm-2">
                         <button type="reset" class="btn btn-danger btn-icon-split">
                               <span class="icon text-white-50">
                                 <i class="fas fa-trash"></i>
                               </span>
                               <span class="text">Reset</span>
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
                <th>Utility</th>
              </tr>  
            </thead>
            <tbody>
              <?php 
              $counter=1;
              $viewall=$store->get_cat();
              foreach($viewall as $row => $value){?>
              <tr>
                <th><?php echo $counter++;?></th>
                <th><?php echo $viewall[$row]['cat'];?></th>
                <th>
                <a href="<?php echo $base_url.'index.php?action=dashboard&page=add-store-category&edit='.$viewall[$row]['id'];?>">  <i class="btn btn-warning btn-xs fa fa-pen"></i> </a> 
                <a href="<?php echo $base_url.'index.php?action=store&query=delete-store-category&id='.$viewall[$row]['id'];?>"> <i class="btn btn-danger btn-xs fa fa-trash"></i> </a> 
              </th>
              </tr>
              <?php }?>
            </tbody>
          </table>
        </div>

      </div>
</div>

