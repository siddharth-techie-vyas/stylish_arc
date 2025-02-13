<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
      <h1 class="app-page-title">Create / Edit User</h1>
      <?php include('alerts.php');?>
      <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
        <!-- form-->
        <form name="user" id="user" action="<?php echo $base_url.'index.php?action=admin&query=create_user';?>" method="post">
		<div class="row">
			<div class="col-sm-2">
            <div class="form-group">
				<label>User Name</label>
				<input type="text" class="form-control" name="uname" value="">
			</div>
            </div>	

			<div class="col-sm-2">
            <div class="form-group">
				<label>Password</label>
				<input type="text" class="form-control" name="upass" value="">
			</div>	
            </div>	

			<div class="col-sm-2">
            <div class="form-group">
				<label>User Type</label>
				<select name="utype" class="form-control">
					<option>-- Select --</option>
					<?php $user = $admin->get_metaname_byvalue('user_type'); 

						//	$user = array_unique($user0);
							foreach($user as $k=>$value)
							{
							    echo "<option value='".$user[$k]['value2']."'>".$user[$k]['value1']."</option>";
							}
					?>
				</select>	
			</div>
            </div>	

			<div class="col-sm-2">
            <div class="form-group">
				<label>Email</label>
				<input type="text" class="form-control" name="email" value="">	
			</div>
            </div>	

			<div class="col-sm-2">
            <div class="form-group">
				<label>Contact</label>
				<input type="text" class="form-control" name="contact" value="">	
			</div>
			</div>	

			<div class="col-sm-2">
            <div class="form-group">    
            <br>
				<input type="submit" name="submit" value="Save" class="btn btn-success btn-md">
				<input type="reset" name="reset" value="reset" class="btn btn-warning btn-md">
			</div>	
            </div>	


		</div>
		</form>
      </div>

      <div class="row">
		<div class="col-sm-12">
			<table class="table">
				<thead>
					<tr>
						<th>S.No.</th>
						<th>Name</th>
						<th>Employee Code</th>
						<th>Password</th>
						<th>Type</th>
						<th>Contact</th>
						<th>Email</th>
						<th colspan="2">Utility</th>
					</tr>
				</thead>
				<tbody>
					<?php $allbranch = $admin->get_alluser(); 
					$counter =1;
					foreach ($allbranch as $k => $value) {
					    
					          $utype=$admin->get_metaname_byvalue2('user_type',$allbranch[$k]['utype']);      
            			
						?>
						
					<tr id="<?php echo $allbranch[$k]['id'];?>">
						<td><?php echo $counter++;?></td>
						<td><?php echo $allbranch[$k]['uname'];?></td>
						<td><?php echo $allbranch[$k]['id'];?></td>
						<td><?php echo $allbranch[$k]['upass'];?></td>
						<td><?php echo $utype[0]['value1'];?></td>
						<td><?php echo $allbranch[$k]['ucontact'];?></td>
						<td><?php echo $allbranch[$k]['uemail'];?></td>
						<th>
						
						<i class="btn btn-xs btn-warning fa fa-info"  data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="show_page_model('Edit User : <?php echo $allbranch[$k]['uname'];?> ','<?php echo $base_url.'index.php?action=dashboard&nocss=admin_edit_user&id='.$allbranch[$k]['id'];?>')"></i>

						
						<i class="btn btn-xs btn-danger fa fa-trash" onclick="deleteme('admin','delete_user','<?php echo $allbranch[$k]['id'];?>')"></i>

						</th>
						<!-- <td><input type="button" onclick="deleteme('admin','delete_user','<?php echo $allbranch[$k]['id'];?>')" class="btn btn-xs btn-danger" value="Delete"></td>-->

					</tr>
				<?php }?>
				</tbody>
			</table>
		</div>
	</div>


    </div>
  </div>
</div>
