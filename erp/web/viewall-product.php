
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Manage Products</h1>

          <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">

          <div class="col-sm-12 ">
                    <div class="table-responsive">
                <table class="table table-bordered" id="data-table" >
                  <thead>
                    <tr>
                      <th width="5%;">S.No.</th>
                      <th>Images</th>
                      <th>Product Name</th>
                      <th>Buyer Code</th>
                      <th>SKU Code</th>
                      <th>HSN Code</th>
                      <th>L x W x H (Inch)</th>
                     
                      <th>Utility</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  	<?php $counter = 1;
                    $result=$product->getall();
						if (! empty($result)) {
							foreach ($result as $k => $v) {?>
                            <tr class="<?php echo $result[$k]['id'];?>">
                            	<td><?php echo $counter++;?></td>
                              <td>
                                <?php 
                                $file='../assets/images/'.$result[$k]["picture"];
                                if(file_exists($file)){?>
                              <img src="<?php echo '../assets/images/'.$result[$k]["picture"]; ?>" wisth="auto" height="40">
                                  <?php }else{echo "<i class='fa fa-image'></i>";}?>
                            </td>  
                              <td><?php echo $result[$k]["product_name"]; ?></td>
                                <td><?php echo $result[$k]["buyer_code"]; ?></td>
                                <td><?php echo $result[$k]["sku_code"]; ?></td> 
                                <td><?php echo $result[$k]["hsn_code"]; ?></td>

                                <td><?php echo $result[$k]["length"].' X '.$result[$k]["width"].' X '.$result[$k]["height"] ; ?></td>
                                
                                <td>
                                    <a href="index.php?action=dashboard&page=update-product&id=<?php echo $result[$k]["id"]; ?>" target="_blank"><i class="fa fa-pen"></i></a>
                                    
                                    <i class="fa fa-trash" onclick="deleteme('product','delete_product','<?php echo $result[$k]['id'];?>')"></i>
                                    
                                    <i class="fa fa-info btn btn-xs btn-warning " data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="show_page_model('Stock history of <?php echo $result[$k]['product_name'];?>','<?php echo $base_url.'index.php?action=dashboard&nocss=product-stock-details&id='.$result[$k]['id'];?>')" ></i>

                                </td>
                            </tr>
                     <?php } }?>       
                  </tbody>
                </table>
                
               </div>

          </div>

</div>
</div>
</div>
