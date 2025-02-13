
<div class="app-wrapper">
<div class="app-content pt-3 p-md-3 p-lg-4">
<div class="container-xl">
<h1 class="app-page-title">Add Beneficiery</h1>
<?php include('alerts.php');?>
<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">


<form action="<?php echo $base_url.'index.php?action=accounts&query=add-beneficiery'?>" name="add-beneficiery" method="post" >
                    <input type="hidden" name="created_date" value="<?php echo date("Y-m-d");?>" />
                     <!----- 1st row------>
                    	<div class="form-group row">
                          
                          <div class="col-sm-3">
                          <label class="col-form-label">Beneficiery name</label>
                            <input type="text" value="" class="form-control form-control-sm" name="bname"   required>
                          </div>
                          
                          <div class="col-sm-3">
                          <label class="col-form-label">Country Code</label>
                            <input type="text" class="form-control form-control-sm" value="" name="country_code"   required>
                          </div>
                          
                          <div class="col-sm-3">
                          <label class="col-form-label">Email</label>
                            <input type="text" class="form-control form-control-sm" value="" name="email"    required>
                          </div>
                          
                          <div class="col-sm-3">
                          <label class="col-form-label">Contact</label>
                            <input type="text" class="form-control form-control-sm" value="" name="contact"  required>
                          </div>
                      </div>
                      
                       <!----- 2nd row------>
                       <div class="form-group row">   
                          
                          
                          
                     	  <div class="col-sm-3">
                          <label class="col-form-label">GSTIN</label>
                            <input type="text" class="form-control form-control-sm" value="NA" name="gstin"  required>
                          </div>
                          
                          <div class="col-sm-3">
                          <label class="col-form-label">Beneficiery Type</label>
                              <select name="btype"  class="form-control form-control-sm" >  
                              <option selected disabled>-- Select Beneficiery Type --</option>
                              <?php $supplier=$admin->get_metaname_byvalue('beneficiery_type');  
                                foreach($supplier as $k=>$value){?>
                              ?> 
                              <option value="<?php echo $supplier[$k]['id'];?>"><?php echo $supplier[$k]['value1'];?></option>
                              <?php }?>
                             </select>  
                          </div>
                          
                         
                          <div class="col-sm-3">
                          <label class="col-form-label">Account Type</label>
							<select name="acctype" class="form-control">
                            	<option disabled="disabled" selected="selected">-- Select Account Type --</option>
                                <option value="1">Creditor</option>
                                <option value="2">Debtor</option>
                            </select>
                          </div>

                          <div class="col-sm-3">
                          <label class="col-form-label">Address</label>
							<textarea col="3" row="3" name="address" class="form-control"></textarea>
                          </div>

                          
                          
                        </div>
                      
                       <!----- 3rd row------>
                       <div class="form-group row"> 
                       	  
                          
                          <div class="col-sm-3">
                          <br />
                          	 <button type="reset" class="btn btn-danger btn-icon-split">
                                <span class="icon text-white-50">
                                  <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Reset</span>
                              </button>
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

<div class="table-responsive">
                <table class="table table-bordered"  cellspacing="0">
                  <thead>
                    <tr>
                      <th>S.No.</th>
                      <th>Company Name</th>
                      <th>Contact Person</th>
                      <th>Type</th>
                      <th>GSTIN</th>
                      <th>Email</th>
                      <th>Contact</th>
                      <th>Address</th>
                      <th>Utility</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  	<?php $counter = 1;
                        $result=$accounts->getall_beneficiery();
						if (! empty($result)) {
							foreach ($result as $k => $v) {
                                $btype=$admin->get_metaname_byid($result[$k]["btype"]);
                                ?>
                            <tr class='<?php echo $result[$k]['bene_id']; ?>'>
                            	<td><?php echo $counter++;?></td>
                                <td><?php echo $result[$k]["bname"]; ?></td>
                                <td><?php echo $result[$k]["contact_person"]; ?></td>
                                <td><?php echo $btype[0]['value1']; ?></td>
                                <td><?php echo $result[$k]["gstin"]; ?></td>
                                <td><?php echo $result[$k]["email"]; ?></td>
                                <td><?php echo $result[$k]["contact"]; ?></td>
                                <td><?php echo $result[$k]["address"]; ?></td>
                                <td>
                                     <i class='btn btn-warning btn-xs fa fa-pencil' data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="show_page_model('Edit <?php echo $result[$k]['bname']; ?>','<?php echo $base_url.'index.php?action=dashboard&nocss=edit-beneficiery&id='.$result[$k]['bene_id'];?>')"></i>
                                     <i class='btn btn-danger btn-xs fa fa-trash' onclick="deleteme('accounts','delete_beneficiery','<?php echo $result[$k]['bene_id']; ?>')"></i>
                                </td>
                            </tr>
                     <?php } }?>       
                  </tbody>
                </table>
              </div>

</div>
</div>
</div>