
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title"><?php if(isset($_GET['edit'])){ echo "Edit";}else{echo "Add";}?> Item</h1>

<?php include('alerts.php');?>

          <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">

          <form name="product" action="index.php?action=store&query=add-item" method="post" enctype="multipart/form-data">
                   	
                     <!-- row 1-->
                       <div class="form-group row">
                         
                         <div class="col-sm-3">
                         <label class="col-form-label">Item Name <span class="mendetory">*</span></label>
                           <input type="text" value="" class="form-control form-control-sm" name="product_name"  required>
                         </div>
                         
                         <div class="col-sm-3">
                         <label class="col-form-label">HSN Code <span class="mendetory">*</span></label>
                           <input type="text" value="" class="form-control form-control-sm" name="hsn_code"  required>
                         </div>

                         <div class="col-sm-3">
                         <label class="col-form-label">Category <span class="mendetory">*</span></label>
                           <select class="form-control form-control-sm" name="cat" onchange="get_subcat('subcat',this.value,'store')"  required>
                            <option disabled='disabled' selected='selected'>-Select-</option>
                            <?php 
                            $cat=$store->get_cat();
                            foreach($cat as $k=>$value)
                            {
                              echo "<option value='".$cat[$k]['id']."'>".$cat[$k]['cat']."</option>";
                            }
                            ?>  
                          
                          </select>
                         </div>

                         <div class="col-sm-3">
                         <label class="col-form-label">Sub Category <span class="mendetory">*</span></label>
                         <select class="form-control form-control-sm" id="subcat" name="subcat"  required>
                           </select>
                         </div>

                         <div class="col-sm-3">
                         <label class="col-form-label">Unit <span class="mendetory">*</span></label>
                         <select class="form-control form-control-sm" name="unit"   required>
                            <option disabled='disabled' selected='selected'>-Select-</option>
                            <?php 
                            $unit=$store->get_unit();
                            foreach($unit as $k=>$value)
                            {
                              echo "<option value='".$unit[$k]['id']."'>".$unit[$k]['unit']."</option>";
                            }
                            ?>  
                          
                          </select>
                         </div>
                         
                         <div class="col-sm-3">
                         <label class="col-form-label">Image <span class="mendetory">*</span></label>
                           <input type="file" value="" class="form-control form-control-sm" name="pic"   accept=".jpg, .jpeg, .png" required>
                         </div>

                         <div class="col-sm-2"><br>
                         
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
      </div>
</div>

