
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Add Sub Category</h1>
          <?php include('alerts.php'); ?>
          <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">

                    <form name="product" action="index.php?action=product&query=add-new-subcategory" method="post" enctype='multipart/form-data'>
                   	
                     <!-- row 1-->
                       <div class="form-group row">
                         
                         <div class="col-sm-4 col-md-4">
                         <label class="col-form-label">Category Name <span class="mendetory">*</span></label>
                           <select name="cat" class="form-control">
                            <option disabled="disbaled" selected="selected">-Select-</option>
                            <?php $cat=$product->get_category_all(); foreach ($cat as $key => $value) { ?>
                                <option value="<?php echo $cat[$key]['id'];?>"><?php echo $cat[$key]['cat'];?></option>
                                <?php }?>
                            </select>
                         </div>

                         <div class="col-sm-4 col-md-4">
                         <label class="col-form-label">Sub Category Name <span class="mendetory">*</span></label>
                           <input type="text" value="" class="form-control form-control-sm" name="subcat"  required>
                         </div>

                         <div class="col-sm-4 col-md-4">
                         <label class="col-form-label">Image <span class="mendetory">*</span></label>
                           <input type="file" class="form-control form-control-sm" name="picture">
                         </div>

                         <div class="col-sm-2"><br>
                         <button type="submit" name="submit" class="btn btn-success btn-icon-split">
                           <span class="icon text-white-50">
                             <i class="fas fa-check"></i>
                           </span>
                           <span class="text">Submit</span>
                         </button>
                         </div>
                         
                    </div>

                    
                  </form>  


          </div>

          <div  class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
          <div class="table-responsive">
            <table class="table app-table-hover mb-0 text-left">
              <thead>
                <tr>
                  <th class="cell">S.No.</th>
                  <th class="cell">Category Name</th>
                  <th>Sub Category</th>
                  <th class="cell">Image</th>
                  <th class="cell">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $counter=1;
                $viewall=$product->get_subcategories();
                foreach ($viewall as $key => $value) {
                ?>
                <tr id="<?php echo $viewall[$key]['id'];?>">
                  <th><?php echo $counter++;?></th>
                  <td><?php $cat=$product->get_category($viewall[$key]['cat']); echo $cat[0]['cat'];?></td>
                  <td><?php echo $viewall[$key]['subcat'];?></td>
                  <td><img src="<?php echo '../assets/images/'.$viewall[$key]['image'];?>" width="100"></td>
                  <td><i class="btn btn-danger fa fa-trash" onclick="deleteme('product','delete-collection','<?php echo $viewall[$key]['id'];?>')"></i></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>


        </div>
      </div>
</div>

