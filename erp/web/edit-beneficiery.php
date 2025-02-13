<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
<?php 
$edit=$accounts->get_beneficiery_one($_GET['id']);
?>
<span id="msgedit_bene"></span>
<form action="<?php echo $base_url.'index.php?action=accounts&query=edit-beneficiery'?>" name="add-beneficiery" method="post" id="edit_bene">
                    <input type="hidden" name="id" value="<?php echo $edit[0]['bene_id'];?>" />
                     <!----- 1st row------>
                    	<div class="form-group row">
                          
                          <div class="col-sm-3">
                          <label class="col-form-label">Beneficiery name</label>
                            <input type="text" value="<?php echo $edit[0]['bname'];?>" class="form-control form-control-sm" name="bname"   required>
                          </div>
                          
                          <div class="col-sm-3">
                          <label class="col-form-label">Country Code</label>
                            <input type="text" class="form-control form-control-sm" value="<?php echo $edit[0]['country_code'];?>" name="country_code"   required>
                          </div>
                          
                          <div class="col-sm-3">
                          <label class="col-form-label">Email</label>
                            <input type="text" class="form-control form-control-sm" value="<?php echo $edit[0]['email'];?>" name="email"    required>
                          </div>
                          
                          <div class="col-sm-3">
                          <label class="col-form-label">Contact</label>
                            <input type="text" class="form-control form-control-sm" value="<?php echo $edit[0]['contact'];?>" name="contact"  required>
                          </div>
                      </div>
                      
                       <!----- 2nd row------>
                       <div class="form-group row">   
                          
                          
                          
                     	  <div class="col-sm-3">
                          <label class="col-form-label">GSTIN</label>
                            <input type="text" class="form-control form-control-sm" value="<?php echo $edit[0]['gstin'];?>" name="gstin"  required>
                          </div>
                          
                          <div class="col-sm-3">
                          <label class="col-form-label">Beneficiery Type</label>
                              <select name="btype"  class="form-control form-control-sm" >  
                              <option selected disabled>-- Select Beneficiery Type --</option>
                              <?php $supplier=$admin->get_metaname_byvalue('beneficiery_type');  
                                foreach($supplier as $k=>$value){?>
                              ?> 
                              <option <?php if($supplier[$k]['id']==$edit[0]['btype']){?>selected="selected"<?php }?> value="<?php echo $supplier[$k]['id'];?>"><?php echo $supplier[$k]['value1'];?></option>
                              <?php }?>
                             </select>  
                          </div>
                          
                          <div class="col-sm-3">
                          <label class="col-form-label">Beneficiery Code</label>
                          <input type="text" name="bene_code" Value="<?php echo $edit[0]['bene_code'];?>" class='form-control' required/>
                                </div>
                         
                          <div class="col-sm-3">
                          <label class="col-form-label">Account Type</label>
							<select name="acctype" class="form-control">
                            	<option disabled="disabled" selected="selected">-- Select Account Type --</option>
                                <option value="1" <?php if($edit[0]['acctype']=='1'){?>selected="selected"<?php }?>>Creditor</option>
                                <option value="2" <?php if($edit[0]['acctype']=='2'){?>selected="selected"<?php }?>>Debtor</option>
                            </select>
                          </div>

                          <div class="col-sm-3">
                          <label class="col-form-label">Address</label>
							<textarea col="3" row="3" name="address" class="form-control"><?php echo $edit[0]['address'];?></textarea>
                          </div>

                          
                          
                        </div>
                      
                       <!----- 3rd row------>
                       <div class="form-group row"> 
                       	  
                          
                          <div class="col-sm-6">
                          <br />
                          	 <button type="reset" class="btn btn-danger btn-icon-split" >
                                <span class="icon text-white-50">
                                  <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Reset</span>
                              </button>
                          <button type="button" name="submit" class="btn btn-success btn-icon-split" onclick="form_submit('edit_bene')">
                            <span class="icon text-white-50">
                              <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Submit</span>
                          </button>
                          </div>
                          
                         
                       </div>
                     </form>

</div>