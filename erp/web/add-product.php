
    
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
                         <label class="col-form-label">Product Name </label>
                           <input type="text" value="" class="form-control form-control-sm" name="product_name"  >
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Buyer Code</label>
                           <input type="text" value="" class="form-control form-control-sm" name="buyer_code"  >
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Sku Code</label>
                           <input type="text" value="" class="form-control form-control-sm" name="sku_code"  >
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Product Category</label>
                           <select name="cat" class="form-control" id="cat">
                            <option disabled="disabled" selected="selected">--Select--</option>
                            <?php $pro=$product->get_category_all(); foreach($pro as $k=>$value){ 
                              
                              echo "<option disabled='disabled' style='color:#FFF; background:#000;' value='".$pro[$k]['id']."'>".$pro[$k]['cat']."</option>";
                              //-------- get sub category
                              $sub=$product->get_subcategory_all($pro[$k]['id']);
                              foreach($sub as $k1=>$value1){
                                echo "<option value='".$sub[$k1]['id']."'>".$sub[$k1]['subcat']."</option>";
                              }
                            
                            }?>  

                           </select>
                         </div>
                         
                    </div>

                    <!-- row 2-->
                    <div class="form-group row">
                         
                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Hsn Code</label>
                           <input type="number" value="" class="form-control form-control-sm" name="hsn_code" >
                         </div>

                         <div class="col-sm-6 col-md-3">
                          <label class="col-form-label">Width</label>
                           <input type="number" step=".01" class="form-control form-control-sm" name="width" id="width" onkeyup="cbm()"  >
                         </div>

                         <div class="col-sm-6 col-md-3">
                          <label class="col-form-label">Length</label>
                           <input type="number" step=".01" value="" class="form-control form-control-sm" name="length" id="length" onkeyup="cbm()" >
                         </div>

                         <div class="col-sm-6 col-md-3">
                           <label class="col-form-label">Height</label>
                           <input type="number" step=".01" value="" class="form-control form-control-sm" name="height" id="height" onkeyup="cbm()"  >
                         </div>
                         
                    </div>

                    <!-- row 3-->
                    <div class="form-group row">
                         
                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Gross Cbm</label>
                           <input type="text" value="" class="form-control form-control-sm" name="gross_cbm"  id='cbm' >
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Color</label>
                           <input type="text" value="" class="form-control form-control-sm" name="color"  >
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Assembly</label>
                           <select class="form-control" name="assembly" >
                            <option disabled="disabled" selected="selected">--Selected--</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                            </select>  
                          </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Collection</label>
                         <select name="collection" class="form-control" id="collection">
                            <option disabled="disabled" selected="selected">--Select--</option>
                            <?php $collection=$product->get_collection_all(); foreach($collection as $k=>$value){ 
                              
                              echo "<option value='".$collection[$k]['id']."'>".$collection[$k]['cat']."</option>";
                             
                              
                            
                            }?>  

                           </select>
                         </div>
                         
                    </div>

                    <!-- row 4-->
                    <div class="form-group row">
                         
                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Ex Showroom Price</label>
                           <input type="text" value="" class="form-control form-control-sm" name="exinr"  >
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Price (without GST)</label>
                           <input type="text" value="" class="form-control form-control-sm" name="inr"  >
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
                        <div class="col-sm-3 col-md-3">
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
                    </div>
                  </form>  


          </div>

        </div>
      </div>
</div>

