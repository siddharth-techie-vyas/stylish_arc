<?php $edit=$product->getone($_GET['id']); 
$default_size =$admin->get_metaname_byvalue('default_material_size');
$default_weight =$admin->get_metaname_byvalue('default_weight');
?>
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Update Product</h1>
          <?php include('alerts.php'); ?>
          <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">

          

          
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Product Detail</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Accesories Details</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="cartoon-tab" data-bs-toggle="tab" data-bs-target="#cartoon" type="button" role="tab" aria-controls="cartoon" aria-selected="false">Cartoon</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="wooden-tab" data-bs-toggle="tab" data-bs-target="#wooden" type="button" role="tab" aria-controls="wooden" aria-selected="false">Wooden</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="iron-tab" data-bs-toggle="tab" data-bs-target="#iron" type="button" role="tab" aria-controls="iron" aria-selected="false">Iron</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="other-tab" data-bs-toggle="tab" data-bs-target="#other" type="button" role="tab" aria-controls="other" aria-selected="false">Other(s)</button>
  </li>
</ul>


<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <form name="product" action="index.php?action=product&query=update-product" method="post" enctype='multipart/form-data'>
                   	<input type="hidden" name="id" value="<?php echo $edit[0]['id'];?>">
                     <!-- row 1-->
                       <div class="form-group row">
                         
                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Product Name <span class="mendetory">*</span></label>
                           <input type="text" value="<?php echo $edit[0]['product_name'];?>" class="form-control form-control-sm" name="product_name"  required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Buyer Code</label>
                           <input type="text" value="<?php echo $edit[0]['buyer_code'];?>" class="form-control form-control-sm" name="buyer_code" >
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Sku Code<span class="mendetory">*</span></label>
                           <input type="text" value="<?php echo $edit[0]['sku_code'];?>" class="form-control form-control-sm" name="sku_code"  required>
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
                                if($sub[$k1]['id']==$edit[0]['cat']){$selected="selected='selected'";}
                                else{$selected="";}
                                echo "<option value='".$sub[$k1]['id']."' $selected>".$sub[$k1]['subcat']."</option>";
                              }
                            
                            }?>  

                           </select>
                         </div>
                         
                    </div>

                    <!-- row 2-->
                    <div class="form-group row">
                         
                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Hsn Code<span class="mendetory">*</span></label>
                           <input type="text" value="<?php echo $edit[0]['hsn_code'];?>" class="form-control form-control-sm" name="hsn_code"  required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Width<span class="mendetory">*</span></label>
                           <input type="text" value="<?php echo $edit[0]['width'];?>" class="form-control form-control-sm" name="width"  required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Length<span class="mendetory">*</span></label>
                           <input type="text" value="<?php echo $edit[0]['length'];?>" class="form-control form-control-sm" name="length"  required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Height<span class="mendetory">*</span></label>
                           <input type="text" value="<?php echo $edit[0]['height'];?>" class="form-control form-control-sm" name="height"  required>
                         </div>
                         
                    </div>

                    <!-- row 3-->
                    <div class="form-group row">
                         
                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Gross Cbm<span class="mendetory">*</span></label>
                           <input type="text" value="<?php echo $edit[0]['gross_cbm'];?>" class="form-control form-control-sm" name="gross_cbm" readonly="readonly" required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Color<span class="mendetory">*</span></label>
                           <input type="text" value="<?php echo $edit[0]['color'];?>" class="form-control form-control-sm" name="color"  required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Assembly<span class="mendetory">*</span></label>
                           <select class="form-control" name="assembly" required>
                            <option disabled="disabled" selected="selected">--Selected--</option>
                            <option value="yes" <?php if($edit[0]['assembly']=='yes'){?>selected='selected'<?php }?> >Yes</option>
                            <option value="no" <?php if($edit[0]['assembly']=='no'){?>selected='selected'<?php }?>>No</option>
                            </select>  
                          </div>

                          <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Collection</label>
                         <select name="collection" class="form-control" id="collection">
                            <option disabled="disabled" selected="selected">--Select--</option>
                            <?php $collection=$product->get_collection_all(); foreach($collection as $k=>$value){ 
                              if($collection[$k]['id']==$edit[0]['collection']){$selected="selected='selected'";}
                              else{$selected="";}
                              echo "<option value='".$collection[$k]['id']."' $selected>".$collection[$k]['cat']."</option>";
                              }?>  

                           </select>
                         </div>
                         
                    </div>

                    <!-- row 4-->
                    <div class="form-group row">
                         
                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Ex Showroom Price<span class="mendetory">*</span></label>
                           <input type="text" value="<?php echo $edit[0]['exinr'];?>" class="form-control form-control-sm" name="exinr"  required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Price<span class="mendetory">*</span></label>
                         <!-- to do place fob somewhere not to use -->
                         <input type="text" value="<?php echo $edit[0]['inr'];?>" class="form-control form-control-sm" name="inr"  required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Cartoon Per Pcs<span class="mendetory">*</span></label>
                           <input type="number" value="<?php echo $edit[0]['cartoon_per_pcs'];?>" class="form-control form-control-sm" name="cartoon_per_pcs"  required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Pcs In One Cartoon<span class="mendetory">*</span></label>
                           <input type="text" value="<?php echo $edit[0]['pcs_cartoon'];?>" class="form-control form-control-sm" name="pcs_cartoon"  required>
                         </div>
                         
                        
                         
                    </div>
                         
                    <!--- last row -->
                    <div class="form-group row">
                      
                    <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">L Shape</label>
                         <select class="form-control" name="lshape">
                            <option disabled="disabled" selected="selected">--Selected--</option>
                            <option value="yes" <?php if($edit[0]['lshape']=='yes'){?>selected='selected'<?php }?>>Yes</option>
                            <option value="no"  <?php if($edit[0]['lshape']=='no'){?>selected='selected'<?php }?>>No</option>
                            </select> 
                         </div>

                    <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Picture</label>
                           <input type="file" class="form-control form-control-sm" name="picture" accept="image/png, image/jpeg, image/jpg">
                         </div>     

                         <div class="col-sm-6 col-md-2">
                          <?php if(!empty($edit[0]['picture'])){?>
                            <input type="hidden" name="picture0" value="<?php echo $edit[0]['picture'];?>">
                            <img src="<?php echo $base_url.'theme/assets/images/'.$edit[0]['picture'];?>" width="auto" height="90">
                          <?php }else{?>
                            <i class='fa fa-image'></i>
                          <?php }?>    
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
                           <span class="text">Update</span>
                         </button>
                         </div>
                    </div>
                  </form>  

  </div>
  <!--- accesocries --->
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

        <div class="col-sm-12 card">
        <?php $items=$store->get_items();?>
      <form name="accesories" method="post" action="<?php echo $base_url.'index.php?action=product&query=product-accesories-details';?>" id="accesories">
      <input type="hidden" name="pid" value="<?php echo $_GET['id'];?>">   

      <table class="table table-bordered" id="dynamic_field">
              <tr>
                  <th>#</th>
                  <th>Item</th>
                  <th>Qty</th>
                  <th>Remark</th>
                  <th>Utility</th>
              </tr>
              <?php 
              $counti=1;
              $acce=$product->getone_product_accessories($_GET['id']);
              if (is_countable($acce) && count($acce) > 0) {
                $acce_count=count($acce);
                foreach($acce as $k=>$value){
                  //-- get product acce
                  $store_acce=$store->get_item_one($acce[$k]['acce']);
                  echo "<tr class='".$acce[$k]['id']."'>";
                  echo "<th>".$counti++."</th>";
                  echo "<td>".$store_acce[0]['product_name']."</td>";
                  echo "<td>".$acce[$k]['qty']."</td>";
                  echo "<td>".$acce[$k]['remark']."</td>";?>
                  <td><i class='fa fa-trash' onclick="deleteme('product','delete_accesories','<?php echo $acce[$k]['id'];?>')"></td>
                  <?php echo "</tr>";
                }}else{$acce_count=0;}
              ?>
          </table>
          <input type="button" id="add" name="addmore" value="Add Accesories" class="col-sm-2 btn btn-primary btn-sm"/>
          <input type="submit" name="submit" value="Submit" class="col-sm-4 btn btn-secondary btn-sm" id="submitbtn" style="display:none;"/>
          </form>
      </div>
  </div>

  <!-- cartoon --->
<div class="tab-pane fade" id="cartoon" role="tabpanel" aria-labelledby="cartoon-tab">
<?php include('update-product-cartoon.php');?>                  
</div>


  <!-- wooden --->
  <div class="tab-pane fade" id="wooden" role="tabpanel" aria-labelledby="wooden-tab">
  <?php include('update-product-wooden.php');?>                  
  </div>

  <!-- wooden --->
  <div class="tab-pane fade" id="iron" role="iron" aria-labelledby="iron-tab">
  <?php include('update-product-iron.php');?>                  
  </div>

  <!-- others --->
  <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
  <?php include('update-product-other.php');?>                  
  </div>



</div>
</div>

        </div>
      </div>
</div>
<?php  $straaray=array('(',')','/',';',' ','-');?>
<script type="text/javascript">
$(document).ready(function(){
var i=<?php echo $acce_count;?>+1;
$('#add').click(function(){
$('#submitbtn').show();
$('#dynamic_field').append('<tr id="row'+i+'"><td>'+i+'</td><td><select name="acce[]" class="form-control"><option disabled="disabled" selected="selected">-Select-</option><?php foreach($items as $k => $value){?><option value="<?php echo $items[$k]['id'];?>"><?php echo preg_replace('/\s+/', '', $items[$k]['product_name']);?></option><?php }?></select></td><td><input type="text" name="qty[]" placeholder="Enter Qty" class="form-control" /></td><td><input type="text" name="remark[]" placeholder="Enter Remark" class="form-control" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
i++;
});
	
$(document).on('click', '.btn_remove', function(){
var button_id = $(this).attr("id"); 
  $('#row'+button_id+'').remove();
});
});
</script>
