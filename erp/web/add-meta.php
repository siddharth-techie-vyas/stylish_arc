
<div class="app-wrapper">
<div class="app-content pt-3 p-md-3 p-lg-4">
<div class="container-xl">
<h1 class="app-page-title">Add Meta Data</h1>
<?php include('alerts.php');?>

<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">


<form action="<?php echo $base_url.'index.php?action=admin&query=add-meta'?>" name="add-meta" method="post" >
                    
                     <!----- 1st row------>
                    	<div class="form-group row">
                        <div class="col-lg-3">
                        <label class="form-label">Meta Name</label>
                        <input list="meta_name" name="metaname" id="metaname" class="form-control" required>

                            <datalist id="meta_name">
                                <?php $metaname=$admin->get_metaname();
                                foreach($metaname as $k => $value){?>
                            <option value="<?php echo $metaname[$k]['meta_name']; ?>">
                            <?php }?>
                            </datalist>
                      
                    </div>

                    <div class="col-lg-3">
                      
                        <label class="form-label">Value 1</label>
                        <input class="form-control" type="text" name="value1" required>
                      
                    </div>


                    <div class="col-lg-3">
                      
                        <label class="form-label">Value 2</label>
                        <input class="form-control" type="text" name="value2">
                      
                    </div>


                    <div class="col-lg-3">
                      <br>
                        <input class="btn btn-primary" type="submit" name="submit">
                      
                    </div>
                    
                          
                        </div>
                      
                      
                         
                      
                     </form>

</div>

<div class="shadow-sm mb-4 ">
<table class="table table-bordered table-responsive" id="data-table">
            <thead>
                <tr>
                  <th>S.No.</th>
                  <th>Meta Type</th>
                  <th>Value 1</th>
                  <th>Value 2</th>
                  <th>Utility</th>
                </tr>
            </thead>
            <tbody>
              <?php $metaname=$admin->viewall_meta();
              $counter=1;
              foreach ($metaname as $key => $value) {
              
              ?>
              <tr>
                <td><?php echo $counter++;?></td>
                <td><?php echo $metaname[$key]['meta_name'];?></td>
                <td width="45%" style="white-space: normal !important; word-wrap: break-word;  "><?php echo $metaname[$key]['value1'];?></td>
                <td><?php echo $metaname[$key]['value2'];?></td>
                <td><a onclick="return confirm('Please click on OK to continue.');" href="<?php echo $base_url.'cwp/index.php?action=admin&query=delete-meta&id='.$metaname[$key]['id']; ?>"><i class="fa fa-trash"></i></td>
              </tr>
              <?php }?>
            </tbody>
          </table>
</div>




</div>
</div>
</div>