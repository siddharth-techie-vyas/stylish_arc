 <form action="<?php echo $base_url.'index.php?action=product&query=add-cartoon'?>" method="post" name="cartoon"> 
  <!-- row 1--->
                  <div class="form-group row">
                         <div class="col-sm-6 col-md-3">
                          <input type="hidden" name="pid" value="<?php echo $_GET['id'];?>">
                         <label class="col-form-label"></label>
                                <label for="cartoon">Cartoon Name <span class="mendetory">*</span></label>
                                <input list="cartoons" name="material" id="cartoon" class="form-control">

                                <datalist id="cartoons">
                                    <?php 
                                        $cartoon=$store->get_material('cartoon');
                                        if($cartoon){
                                        foreach($cartoon as $k=> $l)
                                        {
                                            echo  '<option value="'.$cartoon[$k]['product_name'].'">';
                                        }}
                                    ?>
                                </datalist> 
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Length (<?php echo $default_size[0]['value1']; ?>) <span class="mendetory">*</span></label>
                           <input type="number" step=".01" value="0.0" class="form-control form-control-sm" name="clength" id="clength" onkeypress="cbm_auto('clength','cwidth','cheight','ccbm','<?php echo $default_size[0]['value1']; ?>')"  required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Width (<?php echo $default_size[0]['value1']; ?>)<span class="mendetory">*</span></label>
                           <input type="number" step=".01" value="0.0" class="form-control form-control-sm" name="cwidth" id="cwidth" onkeypress="cbm_auto('clength','cwidth','cheight','ccbm','<?php echo $default_size[0]['value1']; ?>')"  required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Height (<?php echo $default_size[0]['value1']; ?>)<span class="mendetory">*</span></label>
                           <input type="number" step=".01" value="0.0" class="form-control form-control-sm" name="cheight" id="cheight" onkeypress="cbm_auto('clength','cwidth','cheight','ccbm','<?php echo $default_size[0]['value1']; ?>')"  required>
                         </div>
                         
                    </div>

                    <!-- row 2--->
                  <div class="form-group row">
                         <div class="col-sm-6 col-md-3">
                          <label class="col-form-label">CBM (M3)<span class="mendetory">*</span></label>
                           <input type="number" step=".001" value="0.0" class="form-control form-control-sm" name="cbm"  id="ccbm" required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Weight Cartoon (<?php echo $default_weight[0]['value1']; ?>)<span class="mendetory">*</span></label>
                           <input type="number" step=".01" value="0.0" class="form-control form-control-sm" name="weight_cartoon" id="weight_cartoon" onkeyup="weight_calc()" required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Weight Plastic (<?php echo $default_weight[0]['value1']; ?>)<span class="mendetory">*</span></label>
                           <input type="number" step=".01" value="0.0" class="form-control form-control-sm" name="weight_plastic" id="weight_plastic" onkeyup="weight_calc()" required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Weight Wood (<?php echo $default_weight[0]['value1']; ?>)<span class="mendetory">*</span></label>
                           <input type="number" step=".01" value="0.0" class="form-control form-control-sm" name="weight_wood" id="weight_wood" onkeyup="weight_calc()"  required>
                         </div>
                         
                    </div>

                    <!-- row 3--->
                  <div class="form-group row">
                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Weight Iron (<?php echo $default_weight[0]['value1']; ?>)<span class="mendetory">*</span></label>
                           <input type="number" step=".01" value="0.0" class="form-control form-control-sm" name="weight_iron" id="weight_iron" onkeyup="weight_calc()" required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Net Weight (<?php echo $default_weight[0]['value1']; ?>)<span class="mendetory">*</span></label>
                           <input type="number" step=".01" value="0.0" class="form-control form-control-sm" name="net_weight" id="net_weight"  required>
                         </div>

                         <div class="col-sm-6 col-md-3">
                         <label class="col-form-label">Gross Weight (<?php echo $default_weight[0]['value1']; ?>)<span class="mendetory">*</span></label>
                           <input type="number" step=".01" value="0.0" class="form-control form-control-sm" name="gross_weight" id="gross_weight"  required>
                         </div>

                         <div class="col-sm-6 col-md-1"><br>
                        <input type="reset" name="reset" value="Reset" class="btn btn-warning">
                        </div>

                        <div class="col-sm-6 col-md-2"><br>
                        <input type="submit" name="submit" value="Save Details" class="btn btn-info">
                        </div>
                        
                         
                    </div>

                 

              </form>
             
              <hr>
  <table class="table table-bordered" style="font-size:13px;">
    <thead>
              <tr>
                  <th>#</th>
                  <th>Material Name</th>
                  <th>Dimension (L*W*H)</th>
                  <th>CBM</th>
                  <th>Weight Cartoon</th>
                  <th>Weight Plastic</th>
                  <th>Weight Wood</th>
                  <th>Weight Iron</th>
                  <th>Net Weight</th>
                  <th>Gross Weight</th>
                  <th>Utility</th>
              </tr>
              </thead>
              <tbody>
                <?php
                $counterde=1;
                $details=$product->getone_product_details_bymaterial($_GET['id'],'cartoon');
                if (is_countable($details) && count($details) > 0) {$countde=count($details);
                foreach($details as $k=>$value)
                {
                  echo "<tr id='".$details[$k]['id']."'>";
                  echo "<td>".$counterde++."</td>";
                  echo "<td>".$details[$k]['material']."</td>";
                  echo "<td>".$details[$k]['clength'].' * '.$details[$k]['cwidth'].' * '.$details[$k]['cheight']."</td>";
                  echo "<td>".$details[$k]['cbm']."</td>";
                  echo "<td>".$details[$k]['weight_cartoon']."</td>";
                  echo "<td>".$details[$k]['weight_plastic']."</td>";
                  echo "<td>".$details[$k]['weight_wood']."</td>";
                  echo "<td>".$details[$k]['weight_iron']."</td>";
                  echo "<td>".$details[$k]['net_weight']."</td>";
                  echo "<td>".$details[$k]['gross_weight']."</td>";
                  ?>
                  <td><i class="fa fa-trash" onclick="deleteme('product','delete_details','<?php echo $details[$k]['id'];?>')"></i></td>
                  <?php
                  echo "</tr>";
                }
                }
                else{$countde=0;}
                ?>
              </tbody>
              </table>