
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Add Product</h1>
          <?php include('alerts.php'); ?>
          <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">

          <form name="product" action="index.php?action=product&query=add-new-product" method="post" enctype='multipart/form-data'>
                   	
                     <!-- row 1-->
                       <div class="form-group row">
                         
                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Product Name <span class="mendetory">*</span></label>
                           <input type="text" value="" class="form-control form-control-sm" name="product_name"  required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Buyer Code</label>
                           <input type="text" value="" class="form-control form-control-sm" name="buyer_code"  >
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Sku Code<span class="mendetory">*</span></label>
                           <input type="text" value="" class="form-control form-control-sm" name="sku_code"  required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Shipping Mark></label>
                           <input type="text" value="" class="form-control form-control-sm" name="shipping_mark"  >
                         </div>
                         
                    </div>

                    <!-- row 2-->
                    <div class="form-group row">
                         
                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Hsn Code<span class="mendetory">*</span></label>
                           <input type="text" value="" class="form-control form-control-sm" name="hsn_code" required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                          <label class="col-form-label">Width<span class="mendetory">*</span></label>
                           <input type="text"  class="form-control form-control-sm" name="width" id="width" onkeyup="cbm()"  required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                          <label class="col-form-label">Length<span class="mendetory">*</span></label>
                           <input type="text" value="" class="form-control form-control-sm" name="length" id="length" onkeyup="cbm()" required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                           <label class="col-form-label">Height<span class="mendetory">*</span></label>
                           <input type="text" value="" class="form-control form-control-sm" name="height" id="height" onkeyup="cbm()"  required>
                         </div>
                         
                    </div>

                    <!-- row 3-->
                    <div class="form-group row">
                         
                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Gross Cbm<span class="mendetory">*</span></label>
                           <input type="text" value="" class="form-control form-control-sm" name="gross_cbm"  id='cbm' required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Color<span class="mendetory">*</span></label>
                           <input type="text" value="" class="form-control form-control-sm" name="color"  required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Assembly></label>
                           <select class="form-control" name="assembly" >
                            <option disabled="disabled" selected="selected">--Selected--</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            </select>  
                          </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Case Number</label>
                           <input type="text" value="" class="form-control form-control-sm" name="case_number">
                         </div>
                         
                    </div>

                    <!-- row 4-->
                    <div class="form-group row">
                         
                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">FOB<span class="mendetory">*</span></label>
                           <input type="text" value="" class="form-control form-control-sm" name="fob"  required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">USD Price (Ex-factory)<span class="mendetory">*</span></label>
                           <input type="text" value="" class="form-control form-control-sm" name="usd"  required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Cartoon Per Pcs</label>
                           <input type="number" value="" class="form-control form-control-sm" name="cartoon_per_pcs"  >
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Pcs In One Cartoon</label>
                           <input type="text" value="" class="form-control form-control-sm" name="pcs_cartoon"  >
                         </div>

                    </div>
                         
                    <!--- last row -->
                    <div class="form-group row">
                    <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">L Shape</label>
                         <select class="form-control" name="lshape">
                            <option disabled="disabled" selected="selected">--Selected--</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            </select> 
                         </div>

                    <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Picture<span class="mendetory">*</span></label>
                           <input type="file" class="form-control form-control-sm" name="picture" accept="image/png, image/jpeg, image/jpg"  required>
                         </div>     

                    <div class="col-sm-2"><br>
                         <button type="reset" name="reset" class="btn btn-warning btn-icon-split">
                           <span class="icon text-white-50">
                             <i class="fas fa-cross"></i>
                           </span>
                           <span class="text">Reset</span>
                         </button>
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

        </div>
      </div>
</div>

