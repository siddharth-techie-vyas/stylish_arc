
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">View Item</h1>

<?php include('alerts.php');?>

          <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">

          <form name="product" action="index.php?action=store&query=view-item-search" method="post">
                   	
                     <!-- row 1-->
                       <div class="form-group row">
                         
                         <div class="col-sm-3">
                         <label class="col-form-label">Item Name <span class="mendetory">*</span></label>
                           <input type="text" value="" class="form-control form-control-sm" name="product_name"  >
                         </div>
                         
                         <div class="col-sm-3">
                         <label class="col-form-label">HSN Code <span class="mendetory">*</span></label>
                           <input type="text" value="" class="form-control form-control-sm" name="hsn_code"  >
                         </div>

                         <div class="col-sm-3">
                         <label class="col-form-label">Category <span class="mendetory">*</span></label>
                           <select class="form-control form-control-sm" name="cat" onchange="get_subcat('subcat',this.value,'store')"  >
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
                         <select class="form-control form-control-sm" id="subcat" name="subcat" >
                            
                          </select>
                         </div>

                    

                         <div class="col-sm-2"><br>
                         
                         <button type="submit" name="submit" class="btn btn-danger btn-xs btn-icon-split">
                           <span class="icon text-white-50">
                             <i class="fas fa-check"></i>
                           </span>
                           <span class="text">Search</span>
                         </button>
                         </div>
         </div>
                           
                  </form>  


          </div>
<span id="delete_msg"></span>

          <?php 
            if(isset($_SESSION['search_data']))
            {
              
              echo "<table class='table table-bordered'>";
                  echo "<tr>";
                    echo "<th>S.No.</th>";
                    echo "<th>Image</th>";
                    echo "<th>Name</th>";
                    echo "<th>HSN Code</th>";
                    echo "<th>Category</th>";
                    echo "<th>Sub Category</th>";
                    echo "<th>Utility</th>";
                  echo "<tr>";

              if(COUNT($_SESSION['search_data'])>0)
              {
                $search=$_SESSION['search_data'];
                $counter=1;
                
                foreach($search as $k => $value)
                {
                  //-cat
                  $cat=$store->get_cat_single($search[$k]['cat']);
                  //-cat
                  $subcat=$store->get_subcat_single($search[$k]['subcat']);
                  echo "<tr id='".$search[$k]['id']."'>";
                    echo "<th>".$counter++."</th>";
                    echo "<td><img src='".$base_url.'theme/assets/images/'.$search[$k]['image']."' height='40' width='auto'></td>";
                    echo "<td>".$search[$k]['product_name']."</td>";
                    echo "<td>".$search[$k]['hsn_code']."</td>";
                    echo "<td>".$cat[0]['cat']."</td>";
                    echo "<td>".$subcat[0]['subcat']."</td>";
                    ?><td>
                      <i class='btn btn-warning btn-xs fa fa-pencil' data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="show_page_model('Edit <?php echo $search[$k]['product_name'];?>','<?php echo $base_url.'index.php?action=dashboard&nocss=edit-store-item&id='.$search[$k]['id'];?>')"></i> 
                      
                      <i class='btn btn-danger btn-xs fa fa-trash' onclick="deleteme('store','delete_item','<?php echo $search[$k]['id'];?>');"></i></td>
                    <?php
                  echo "<tr>";
                }
                
              }
              else
              {
                echo "<tr><td colspan='5'>No Data Found</td></tr>";
              }
              echo "</table>";
            }
          ?>
        </div>
      </div>
</div>

