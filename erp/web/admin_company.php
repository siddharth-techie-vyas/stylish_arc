<?php  $cn=$admin->get_company();?>
<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
      <h1 class="app-page-title">Update Company Details</h1>
      <?php include('alerts.php');?>
      <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
        <!-- form-->
        <form name="user" id="user" action="<?php echo $base_url.'index.php?action=admin&query=update_company';?>" method="post" enctype="multipart/form-data">
		<div class="row">
            <div class="col-sm-4">
            <div class="form-group">
				<label>Company Name</label>
				<input type="text" class="form-control" name="cname" value="<?php echo $cn[0]['cname'];?>">
			</div>	
            </div>

			<div class="col-sm-4">
            <div class="form-group">
				<label>Ac Number</label>
				<input type="text" class="form-control" name="acnu" value="<?php echo $cn[0]['acnu'];?>">
			</div>	
            </div>
            
			<div class="col-sm-4">
            <div class="form-group">
				<label>Bank Name</label>
				<input type="text" class="form-control" name="acbank" value="<?php echo $cn[0]['acbank'];?>">
			</div>	
            </div>
            
			<div class="col-sm-4">
            <div class="form-group">
				<label>Ifsc Code</label>
				<input type="text" class="form-control" name="ifsc" value="<?php echo $cn[0]['ifsc'];?>">
			</div>	
            </div>

            <div class="col-sm-4">
            <div class="form-group">
				<label>Bank Address</label>
				<input type="text" class="form-control" name="bank_address" value="<?php echo $cn[0]['bank_address'];?>">
			</div>	
            </div>
            
			<div class="col-sm-4">
            <div class="form-group">
				<label>IEC Code</label>
				<input type="text" class="form-control" name="iec" value="<?php echo $cn[0]['iec'];?>">
			</div>	
            </div>
            
			<div class="col-sm-4">
            <div class="form-group">
				<label>Vriksh</label>
				<input type="text" class="form-control" name="vriksh" value="<?php echo $cn[0]['vriksh'];?>">
			</div>	
            </div>
            
			<div class="col-sm-4">
            <div class="form-group">
				<label>Vriksh Cert</label>
				<input type="text" class="form-control" name="vriksh_cert" value="<?php echo $cn[0]['vriksh_cert'];?>">
			</div>	
            </div>
            
			<div class="col-sm-4">
            <div class="form-group">
				<label>Pan Number</label>
				<input type="text" class="form-control" name="pan" value="<?php echo $cn[0]['pan'];?>">
			</div>	
            </div>
            
			<div class="col-sm-4">
            <div class="form-group">
				<label>Website</label>
				<input type="text" class="form-control" name="cnwebsiteame" value="<?php echo $cn[0]['website'];?>">
			</div>	
            </div>
            
			<div class="col-sm-4">
            <div class="form-group">
				<label>Company Logo</label>
			    <input type="file" class="form-control" name="logo" >
				<input type="hidden" name="last_logo" value="<?php echo $cn[0]['logo']; ?>">
				<?php if($cn[0]['logo'] != ''){?>
				<img src='<?php echo $base_url.'theme/assets/images/'.$cn[0]['logo'];?>' width="50" height="auto"/>
				<?php }?>
            </div>
            </div>
            
            <div class="col-sm-4">
            <div class="form-group">
				<label>Login Banner</label>
				<input type="file" class="form-control" name="banner" >
				<input type="hidden" name="last_banner" value="<?php echo $cn[0]['banner']; ?>">
				<?php if($cn[0]['banner'] != ''){?>
				<img src='<?php echo $base_url.'theme/assets/images/'.$cn[0]['banner'];?>' width="50" height="auto"/>
				<?php }?>
			</div>	
            </div>
            
			<div class="col-sm-4">
            <div class="form-group">
				<label>Address</label>
				<input type="text" class="form-control" name="address" value="<?php echo $cn[0]['address'];?>">
			</div>	
            </div>
            
			<div class="col-sm-4">
            <div class="form-group">
				<label>Phone</label>
				<input type="text" class="form-control" name="phone" value="<?php echo $cn[0]['phone'];?>">
			</div>	
            </div>
            
			<div class="col-sm-4">
            <div class="form-group">
				<label>Registration Type</label>
				<input type="text" class="form-control" name="reg_type" value="<?php echo $cn[0]['reg_type'];?>">
			</div>	
            </div>

            <div class="col-sm-4">
            <div class="form-group">
				<label>Registration Number</label>
				<input type="text" class="form-control" name="regnu" value="<?php echo $cn[0]['regnu'];?>">
			</div>	
            </div>

            <div class="col-sm-4">
            <div class="form-group">
				<label>State</label>
				<input type="text" class="form-control" name="state" value="<?php echo $cn[0]['state'];?>">
			</div>	
            </div>

            <div class="col-sm-4">
            <div class="form-group">
				<label>State code</label>
				<input type="text" class="form-control" name="state_code" value="<?php echo $cn[0]['state_code'];?>">
			</div>	
            </div>

            <div class="col-sm-4">
            <div class="form-group">
				<label>Country</label>
				<input type="text" class="form-control" name="country" value="<?php echo $cn[0]['country'];?>">
			</div>	
            </div>

            <div class="col-sm-4">
            <div class="form-group">
				<label>Swift Code</label>
				<input type="text" class="form-control" name="swift" value="<?php echo $cn[0]['swift'];?>">
			</div>	
            </div>

            <div class="col-sm-4">
            <div class="form-group">
				<label>Rex Code</label>
				<input type="text" class="form-control" name="rex" value="<?php echo $cn[0]['rex'];?>">
			</div>	
            </div>





			<div class="col-sm-4">
            <div class="form-group">    
            <br>
				<input  type="submit" name="submit" value="Save" class="btn btn-success btn-md">
				<input type="reset" name="reset" value="reset" class="btn btn-warning btn-md">
			</div>	
            </div>	


		</div>
		</form>
      </div>

      


    </div>
  </div>
</div>
