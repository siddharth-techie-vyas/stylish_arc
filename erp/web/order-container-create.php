<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
      <h1 class="app-page-title">Container Managment</h1>
      <?php include('alerts.php');?>
      <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
        

      <div class="row">
          <form name="contaier" action="index.php?action=container-managment-submit" method="post" id="containerform">
            

          <!-- View all Row -->
          <div class="col-xl-12 col-lg-11">
            <div class="row">

            <div class="col-lg-8">

              <!-- Overflow Hidden -->
              <div class="card mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-info"> <span class="btn btn-info btn-circle btn-xs">1</span> Add Purchase Order and Products</h6>
                </div>
                <div class="card-body">
                          <div class="form-group row border-left-info ">
                              <div class="col-sm-4">
                              <label class="col-form-label">Purchase Order</label>
                                    <select class="form-control" name="purchase_order_nu[]" id="purchase_order_nu0" onchange="purchase_fields('purchase_order_nu0','oid','purchase_details','pcode','pcode0')" required>
                                      <option selected="selected" disabled="disabled">-- Select Po# --</option>
                                      <?php
                                      $pos=$order->get_order_by_status('2');
                                      foreach($pos as $k=>$value){
                                      ?>
                                      <option value="<?php echo $pos[$k]['id'];?>"><?php echo $pos[$k]['pi_nu'].' / '.$pos[$k]['invoice_nu'] ;?></option>
                                      <?php }
                                      ?>
                                      </select>
                               </div>
                                <div class="col-sm-4">
                                <label class="col-form-label">Product Code</label>
                                <select class="form-control pcode" onchange="get_purchase_field('purchase_order_nu0','pcode0','qty_pending','purchase_details','qty0')" name="pcode[]" id="pcode0"></select>
                                </div>

                              <div class="col-sm-4">
                                <label class="col-form-label">Qty Available</label>
                                <input type="text" class="form-control" name="qty[]" id="qty0" readonly="">
                              </div>

                              
                      </div>
                      
                        <div class="form-group row border-left-info ">

                              <div class="col-sm-4">
                                <label class="col-form-label">Qty To Ship</label>
                                <input type="number" onchange="calculate_cbm('0')" class="form-control" name="qty_shipped[]" minlength="0"  id="qty_shipped0">
                              </div>
                              <div class="col-sm-4">
                                <label class="col-form-label">Pending Qty</label>
                                <input type="text" name="qty_pending[]" class="form-control" id="qty_pending0">
                              </div>
                              <div class="col-sm-4">
                                <label class="col-form-label">Total CBM</label>
                                <input type="hidden" name="cbm_val" value=""  id="cbm_val0">
                                <input type="text" readonly="" name="cbm[]" class="form-control cbm" id="cbm0">
                              </div>
                          </div>  

                          <div id="addmore_div"></div>
                         
                         
                          <div class="form-group row border-left-info ">


                          <div class="col-sm-6">  
                             <button  class="btn btn-info btn-md btn-rounded control-group add-more" name="add_more" id="addmore_btn"><i class="fa fa-plus"></i> Add More Po and Products</button>
                          </div>   
                          <div class="col-sm-4">  
                           
                          </div>  
                          <div class="col-sm-4">  
                          </div>
                         </div> 
                </div>


              </div>

              
              

            </div>



            <!----------- contaier status ------>  
            <div class="col-lg-4">
              <div class="card">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><span class="btn btn-primary btn-circle btn-xs">2</span> Container Status</h6>
                </div>
                <div class="card-body text-center">

                  <div class="form-group row border-left-primary ">
                    <div class="col-sm-6">  
                      <label>Container Size</label>
                                     <select onchange="total_cotainer_cbm()" class="form-control" name="container_size" id="container_type">
                                       <option disabled="">Type Of Container</option>
                                       <option value="65" selected="">40 HQ</option>
                                       <option value="60">40 Feet </option>
                                       <option value="28">20 Feet</option>
                                       <option value="70">Custom</option>
                                     </select>
                    </div>
                    <div class="col-sm-6">
                       <label>Total CBM</label>
                      <input type="text" id="totalcbm" name="totalcbm" class="form-control">
                    </div>
                
              </div>                  
              <div class="form-group row border-left-info ">

                    <div class="col-sm-6">
                       <label>Container Details</label>
                      <input type="text" name="container_details" class="form-control">
                    </div>
                  
                  
                    <div class="col-sm-6">
                       <label>Documents</label>
                      <input type="file" class="form-control" name="document">
                    </div>  

              </div>
              <div class="form-group row border-left-info">


                    <div class="col-sm-6">
                       <label>Date Of Shipment</label>
                      <input type="date" class="form-control" name="date_shipment">
                    </div>  

                    <div class="col-sm-6">
                       <label>Invoice Numbers</label>
                      <input type="text" class="form-control" name="invoice_number">
                    </div>  
                  
              </div>
              <div class="form-group row border-left-info ">

                  <div class="mb-1 medium">Container Space Status</div>
                  <div class="progress mb-4">
                    <div class="progress-bar"  id="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                   <button class="btn btn-md btn-primary" onclick="sure_submit('containerform')" name="submit" type="submit"> <i class="fa fa-save"></i> Save Products and Fill Container Details</button>
                    
                </div>
              </div>

            </div>

          </div>
                       
            </div>
        </form>
        </div>

        <!-- /.container-fluid -->
                                      </div>
    </div>
  </div>
</div>
