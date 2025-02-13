
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Dashboard</h1>
			    
			    <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				    <div class="inner">
					    <div class="app-card-body p-3 p-lg-4">
						    <h3 class="mb-3">Welcome, <?php echo $_SESSION['uname'];?>!</h3>
						    <div class="row gx-5 gy-3">
						        <div class="col-12 col-lg-9">
							        
							        <div>No New Notification !!!  <a class="btn app-btn-primary" href="#">View</a></div>
							    </div>
						    </div>
						    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					    </div>
					    
				    </div><!--//inner-->
			    </div>
				    
			    <div class="row g-4 mb-4">
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Total Store Products</h4>
							    <div class="stats-figure"><?php $store->total_item();?></div>
							    
						    </div>
						    <a class="app-card-link-mask" href="#"></a>
					    </div>
				    </div>
				    
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">New Po(s) Added</h4>
							    <div class="stats-figure"><?php $store->total_po();?></div>
							    
						    </div>
						    <a class="app-card-link-mask" href="#"></a>
					    </div>
				    </div>
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Low Stock</h4>
							    <div class="stats-figure"><?php $store->total_item_low_stock();?></div>
							    <div class="stats-meta"></div>
						    </div>
						    <a class="app-card-link-mask" href="#"></a>
					    </div>
				    </div>
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Vendor(s)</h4>
							    <div class="stats-figure"><?php $store->total_store_vendor();?></div>
						    </div>
						    <a class="app-card-link-mask" href="#"></a>
					    </div>
				    </div>
			    </div>
			   
				
				<div class="row g-4 mb-4">
				    <div class="col-12 col-lg-6">
				        <div class="app-card app-card-progress-list h-100 shadow-sm">
					        <div class="app-card-header p-3">
						        <div class="row justify-content-between align-items-center">
							        <div class="col-auto">
						                <h4 class="app-card-title">Recentaly Added PO(s)</h4>
							        </div>
							        <div class="col-auto">
								        <div class="card-header-action">
									        <a href="<?php echo $base_url.'index.php?action=dashboard&page=add-item-stock';?>">All PO(s)</a>
								        </div>
							        </div>
						        </div>
					        </div>
					        <div class="app-card-body">
							     <table class='table table-bordered'>
                                    <tr>
                                        <th>Supplier Name</th>
                                        <th>Date</th>
                                        <th>Added By</th>
                                        <th>PO date</th>
                                        <th>Invoice Number</th>
                                    </tr>
                                    <?php 
                                    $top5po=$store->po_dashboard();
                                    if($top5po)
                                    {
                                        foreach($top5po as $r => $v)
                                        {
                                            echo "<tr>";
                                                echo "<td>".$top5po['supplier_name']."</td>";
                                                echo "<td>".$top5po['added_date_time']."</td>";
                                                echo "<td>".$top5po['added_by']."</td>";
                                                echo "<td>".$top5po['po_date']."</td>";
                                                echo "<td>".$top5po['inv_nu']."</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    else
                                    {echo "<tr><td colspan='5'>No Po Found !!!</td></tr>";}    
                                    ?>
                                 </table>
		
					        </div>
				        </div>
			        </div>
			        <div class="col-12 col-lg-6">
				        <div class="app-card app-card-stats-table h-100 shadow-sm">
					        <div class="app-card-header p-3">
						        <div class="row justify-content-between align-items-center">
							        <div class="col-auto">
						                <h4 class="app-card-title">Store Item Categories</h4>
							        </div>
							       
						        </div>
					        </div>
					        <div class="app-card-body p-3 p-lg-4">
						        <div class="table-responsive">
							        <table class="table table-border mb-0">
										<thead>
											<tr>
												<th class="meta">#</th>
												<th class="meta stat-cell">Category</th>
												<th class="meta stat-cell">Subcategories Available(s)</th>
											</tr>
										</thead>
										<tbody>
                                             <?php 
                                             $cat_count=$store->cat_count();
                                             $count=1;
                                             foreach($cat_count as $r => $v)
                                             {
                                                //-- get cat name 
                                                $cat_name = $store->get_cat_single($cat_count[$r]['cat']);
                                                if($cat_name==''){$cat_name='No Category';}
                                                else{$cat_name=$cat_name[0]['cat'];}
                                                echo "<tr>";
                                                    echo "<td>".$count++."</td>";
                                                    echo "<td class='meta stat-cell'>".$cat_name."</td>";
                                                    echo "<td class='meta stat-cell'>".$cat_count[$r]['count']."</td>";
                                                echo "</tr>";
                                             }
                                             ?>   
										</tbody>
									</table>
						        </div>
					        </div>
				        </div>
			        </div>
			    </div>
			    
			    
		    </div>
	    </div>
	    

