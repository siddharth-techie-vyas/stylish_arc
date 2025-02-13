
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Add Product</h1>

          <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">

          <form name="product" action="index.php?action=add-product" method="post">
                   	
                     <!-- row 1-->
                       <div class="form-group row">
                         
                         <div class="col-sm-2">
                         <label class="col-form-label">Collection Name <span class="mendetory">*</span></label>
                           <input type="text" value="" class="form-control form-control-sm" name="product_name"  required>
                         </div>                         
                         
                         
                         <div class="col-sm-2">
                         <button type="reset" class="btn btn-danger btn-icon-split">
                               <span class="icon text-white-50">
                                 <i class="fas fa-trash"></i>
                               </span>
                               <span class="text">Reset</span>
                             </button>
                         
                         <!--<input type="" name="reset" value="Reset">-->
                         </div>
                         <div class="col-sm-2">
                         <!--<input type="submit" name="submit" value="Submit">-->
                         <button type="submit" name="submit" class="btn btn-success btn-icon-split">
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

