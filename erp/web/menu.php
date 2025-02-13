   	
    <header class="app-header fixed-top">	   	            
        <div class="app-header-inner">  
	        <div class="container-flutype py-2">
		        <div class="app-header-content"> 
		            <div class="row justify-content-between align-items-center">
			        
				    <div class="col-auto">
					    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
						    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
					    </a>
				    </div><!--//col-->
		            <div class="search-mobile-trigger d-sm-none col">
			            <i class="search-mobile-trigger-icon fa-solid fa-magnifying-glass"></i>
			        </div><!--//col-->
		            
		            
		            <div class="app-utilities col-auto">
			            <div class="app-utility-item app-notifications-dropdown dropdown">    
				            <a class="dropdown-toggle no-toggle-arrow" id="notifications-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" title="Notifications">
					            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					            <i class='fa fa-bell fa-2x'></i>
					            <span class="icon-badge">3</span>
					        </a><!--//dropdown-toggle-->
					        
					        <div class="dropdown-menu p-0" aria-labelledby="notifications-dropdown-toggle">
					            <div class="dropdown-menu-header p-3">
						            <h5 class="dropdown-menu-title mb-0">Notifications</h5>
						        </div><!--//dropdown-menu-title-->
						        
								<div class="dropdown-menu-content">
							    
									<div class="item p-3">
								        <div class="row gx-2 justify-content-between align-items-center">
									        <div class="col-auto">
										       <img class="profile-image" src="assets/images/profiles/profile-1.png" alt="">
									        </div><!--//col-->
									        <div class="col">
										        <div class="info"> 
											        <div class="desc">Amy shared a file with you. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </div>
											        <div class="meta"> 2 hrs ago</div>
										        </div>
									        </div><!--//col--> 
								        </div><!--//row-->
								        <a class="link-mask" href="notifications.html"></a>
							       </div><!--//item-->

							</div>
							      
						        
							<div class="dropdown-menu-footer p-2 text-center">
								<a href="<?php echo $base_url.'index.php?action=dashboard&page=notification';?>">View all</a>
							</div>
															
							</div>				        
				        </div>
			            <div class="app-utility-item">
				            Welcome, <?php echo $_SESSION['uname']; ?>
					    </div><!--//app-utility-item-->
			            
			            <div class="app-utility-item app-user-dropdown dropdown">
				            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="<?php echo $base_url;?>theme/assets/images/user.png" alt="user profile"></a>
				            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
								<li><a class="dropdown-item" href="account.html">Account</a></li>
								<li><a class="dropdown-item" href="settings.html">Settings</a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="<?php echo $base_url.'logout.php';?>">Log Out</a></li>
							</ul>
			            </div><!--//app-user-dropdown--> 
		            </div><!--//app-utilities-->
		        </div><!--//row-->
	            </div><!--//app-header-content-->
	        </div><!--//container-flutype-->
        </div><!--//app-header-inner-->
        
		<div id="app-sidepanel" class="app-sidepanel"> 
	        <div id="sidepanel-drop" class="sidepanel-drop"></div>
	        <div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		        <div class="app-branding">
		            <a class="app-logo" href="index.html"><img class="logo-icon me-2" src="<?php echo $base_url;?>theme/assets/images/<?php echo $_SESSION['logo'];?>" alt="logo"><span class="logo-text"> <?php echo $_SESSION['cname'];?></span></a>
	
		        </div><!--//app-branding-->  
		        
			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="<?php echo $base_url.'index.php?action=dashboard&page=dashboard';?>">
						        <span class="nav-icon">
						        <i class='fa fa-home'></i>
						         </span>
		                         <span class="nav-link-text">Dashboard</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->


<?php if($_SESSION['utype']=='1' || $_SESSION['utype']=='2' || $_SESSION['utype']=='8' || $_SESSION['utype']=='5'){?>
					    <li class="nav-item has-submenu">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link submenu-toggle <?php echo $product_menu_main;?>" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
						        <span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <i class='fa fa-leaf'></i>
						         </span>
		                         <span class="nav-link-text">Product(s) & Inventory</span>
		                         <span class="submenu-arrow"><i class="fa fa-arrow-down"></i></span><!--//submenu-arrow-->
					        </a><!--//nav-link-->
					        <div id="submenu-1" class="collapse submenu submenu-1 <?php echo $product_menu;?>" data-bs-parent="#menu-accordion">
						        <ul class="submenu-list list-unstyled">
							        <li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=add-product';?>">Add Product</a></li>
							        <li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=viewall-product';?>">Viewall Product</a></li>
									<!-- <li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=add-category';?>">Product Collection</a></li> -->
							        <!-- <li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=add-product';?>">Report(s)</a></li> -->
						        </ul>
					        </div>
					    </li>
<?php }?>						
<?php if($_SESSION['utype']=='1' || $_SESSION['utype']=='5'){?>
						<li class="nav-item has-submenu">
					        <a class="nav-link submenu-toggle <?php echo $store_menu_main;?>" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
						        <span class="nav-icon">
						        <i class='fa fa-umbrella'></i>
						         </span>
		                         <span class="nav-link-text">Store</span>
		                         <span class="submenu-arrow"><i class="fa fa-arrow-down"></i></span><!--//submenu-arrow-->
					        </a><!--//nav-link-->
					        <div id="submenu-2" class="collapse submenu submenu-2 <?php echo $store_menu;?>" data-bs-parent="#menu-accordion">
						        <ul class="submenu-list list-unstyled">
							        <li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=add-store-category';?>">Add / View Category</a>
									<li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=add-sub-category';?>">Add / View Sub-Category</a>
									<li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=add-unit';?>">Unit Master</a></li>
									<li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=add-item';?>">Add Item</a></li>	
									<li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=view-item';?>">View / Update Item</a></li>	
									<!-- <li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=add-permanent-transfer';?>">Permanent Transfer</a></li>
									<li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=add-temporary-transfer';?>">Temporary Transfer</a></li>		 -->
									<li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=add-item-stock';?>">Add Stock</a></li>
									<li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=view-item-po-stock';?>">View / Edit PO Stock</a></li>
									<li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=view-item-stock';?>">View Item Stock(s)</a></li>
									
						        </ul>
					        </div>
					    </li>
<?php }?>						

<!-- order managment -->
<?php if($_SESSION['utype']=='1' || $_SESSION['utype']=='2' || $_SESSION['utype']=='8'){?>
<li class="nav-item has-submenu">
					        <a class="nav-link submenu-toggle <?php echo $order_menu_main;?>" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="false" aria-controls="submenu-3">
						        <span class="nav-icon">
						        <i class='fa fa-boxes'></i>
						         </span>
		                         <span class="nav-link-text">Order Managment</span>
		                         <span class="submenu-arrow"><i class="fa fa-arrow-down"></i></span><!--//submenu-arrow-->
					        </a><!--//nav-link-->
					        <div id="submenu-3" class="collapse submenu submenu-3 <?php echo $order_menu;?>" data-bs-parent="#menu-accordion">
						        <ul class="submenu-list list-unstyled">
							        <li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=order-create';?>">Create Sale Order</a>
									<li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=order-view';?>">View / Update Sale Order</a>
									<!-- <li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=order-status';?>">View Order Status</a></li> -->
									<li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=order-po-create';?>">Create PO</a></li>	
									<li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=order-po-view';?>">View / Update PO</a></li>	
									<li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=stock-order-receive';?>">Receive Item From PO</a></li>
									
									<!-- <li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=order-container-create';?>">Container Managment</a></li>
									<li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=order-container-view';?>">View / Update Container</a></li>		 -->
									
									
						        </ul>
					        </div>
					    </li>
<?php }?>
<!-- accounts -->
<?php if($_SESSION['utype']=='1' || $_SESSION['utype']=='2'){?>
						<li class="nav-item has-submenu">
					        <a class="nav-link submenu-toggle <?php echo $accounts_menu_main;?>" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-4" aria-expanded="false" aria-controls="submenu-4">
						        <span class="nav-icon">
						        <i class='fa fa-inr'></i>
						         </span>
		                         <span class="nav-link-text">Accounts</span>
		                         <span class="submenu-arrow"><i class="fa fa-arrow-down"></i></span><!--//submenu-arrow-->
					        </a><!--//nav-link-->
					        <div id="submenu-4" class="collapse submenu submenu-4 <?php echo $accounts_menu;?>" data-bs-parent="#menu-accordion">
						        <ul class="submenu-list list-unstyled">
							        <li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=add-beneficiery';?>">Add / View Beneficiery</a>
									</li>											
									
						        </ul>
					        </div>
					    </li>
<?php }?>						

<!-- HR -->
<?php if($_SESSION['utype']=='1' || $_SESSION['utype']=='3'){?>
<li class="nav-item has-submenu">
					        <a class="nav-link submenu-toggle <?php echo $hr_menu_main;?>" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-6" aria-expanded="false" aria-controls="submenu-6">
						        <span class="nav-icon">
						        <i class='fa fa-users'></i>
						         </span>
		                         <span class="nav-link-text">HR Managment</span>
		                         <span class="submenu-arrow"><i class="fa fa-arrow-down"></i></span><!--//submenu-arrow-->
					        </a><!--//nav-link-->
					        <div id="submenu-6" class="collapse submenu submenu-6 <?php echo $hr_menu;?>" data-bs-parent="#menu-accordion">
						        <ul class="submenu-list list-unstyled">
							        <li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=add-user&labour=0';?>">Add / Manage Office Staff</a>
									</li>			
									<li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=add-user&labour=1';?>">Add / Manage Factory Staff</a>
									</li>	
						        </ul>
					        </div>
					    </li>
<?php }?>

<!-- admin -->
 <?php if($_SESSION['utype']=='1'){?>
<li class="nav-item has-submenu">
					        <a class="nav-link submenu-toggle <?php echo $admin_menu_main;?>" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-5" aria-expanded="false" aria-controls="submenu-5">
						        <span class="nav-icon">
						        <i class='fa fa-hammer'></i>
						         </span>
		                         <span class="nav-link-text">Admin</span>
		                         <span class="submenu-arrow"><i class="fa fa-arrow-down"></i></span><!--//submenu-arrow-->
					        </a><!--//nav-link-->
					        <div id="submenu-5" class="collapse submenu submenu-5 <?php echo $admin_menu;?>" data-bs-parent="#menu-accordion">
						        <ul class="submenu-list list-unstyled">
							        <li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=add-meta';?>">Meta data</a>
									</li>

									<li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=admin_create_user';?>">User(s)</a>
									</li>

									<li class="submenu-item"><a class="submenu-link" href="<?php echo $base_url.'index.php?action=dashboard&page=admin_company';?>">Company</a>
									</li>

												
						        </ul>
					        </div>
					    </li>						
<?php }?>
						



				    </ul><!--//app-menu-->
			    </nav><!--//app-nav-->
			  <!--//app-sidepanel-->
    </header><!--//app-header-->