
<?php

switch ($action) {

				
case "dashboard":
 		if($_GET['action']=='dashboard')
 		{
 			
 			//-- no css modal popup
			if(isset($_GET['nocss']))
			{
				if(!file_exists("web/".$_GET['nocss'].".php"))
 						{require_once("web/404.php");}
 					else
 						{require_once("web/".$_GET['nocss'].".php");}
			}
			else if(isset($_GET['page']))
 				{
 					require_once("web/header.php");
					//================ menu active or inactive
					$product_pages=array('add-product','viewall-product','add-category');
					if (in_array($_GET['page'], $product_pages))
					{$product_menu='show'; $product_menu_main='active';}
					else{$product_menu='hide'; $product_menu_main='';}

					
					$store_pages=array('add-store-category','add-sub-category','add-unit','add-item','view-item','add-permanent-transfer','add-temporary-transfer','add-item-stock','view-item-stock','edit-item-stock','view-item-po-stock');
					if (in_array($_GET['page'], $store_pages))
					{$store_menu='show'; $store_menu_main='active';}
					else{$store_menu='hide'; $store_menu_main='';}

					$order_pages=array('order-create','order-view','order-edit','order-po-create','order-po-view','order-po-edit','order-packking-slip','stock-order-receive');
					if (in_array($_GET['page'], $order_pages))
					{$order_menu='show'; $order_menu_main='active';}
					else{$order_menu='hide'; $order_menu_main='';}

					$admin_pages=array('admin_create_user','admin_company','add-meta');
					if (in_array($_GET['page'], $admin_pages))
					{$admin_menu='show'; $admin_menu_main='active';}
					else{$admin_menu='hide'; $admin_menu_main='';}

					$hr_pages=array('');
					if (in_array($_GET['page'], $hr_pages))
					{$hr_menu='show'; $hr_menu_main='active';}
					else{$hr_menu='hide'; $hr_menu_main='';}

					$accounts_pages=array('add-beneficiery');
					if (in_array($_GET['page'], $accounts_pages))
					{$accounts_menu='show'; $accounts_menu_main='active';}
					else{$accounts_menu='hide'; $accounts_menu_main='';}

 					require_once("web/menu.php");
 					//============================================ OPEN ALL PAGES		
 					if(!file_exists("web/".$_GET['page'].".php"))
 						{require_once("web/404.php");}
 					else
 						{require_once("web/".$_GET['page'].".php");}
 					
 					require_once("web/footer.php");
 				}
 			else
 				{require_once("web/dashboard.php");}
 		}
 		break;
//--- dashboard closed

//---- products
case "product":
	if($_GET['action']=='product')
		{
			if($_GET['query']=='add-new-product')
			{
			$picture=$admin->upload_image($_FILES['picture']);	
			$get = $product->save($picture, $_POST['buyer_code'], $_POST['sku_code'], $_POST['shipping_mark'], $_POST['product_name'], $_POST['hsn_code'], $_POST['width'], $_POST['length'], $_POST['height'], $_POST['gross_cbm'], $_POST['color'], $_POST['assembly'], $_POST['case_number'], $_POST['fob'], $_POST['usd'], $_POST['pcs_cartoon'], $_POST['cartoon_per_pcs'], $_POST['lshape']);
			
			if($get)
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=update-product&status=1&id=".$get."';</script>";}   
			else
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-product&status=2';</script>";}
			}

			if($_GET['query']=='add-new-collection')
			{
				echo "called";
				$picture=$admin->upload_image($_FILES['picture']);	
				$get = $product->create_collection($picture, $_POST['collection_name']);
			
			if($get)
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-collection&status=1&id=".$get."';</script>";}   
			else
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-product&status=2';</script>";}
			}

			if($_GET['query']=='add-cartoon')
			{
				$get = $product->add_details($_POST['pid'],$_POST['material'],$_POST['clength'],$_POST['cwidth'],$_POST['cheight'],$_POST['cbm'],$_POST['weight_cartoon'],$_POST['weight_plastic'],$_POST['weight_wood'],$_POST['weight_iron'],$_POST['net_weight'],$_POST['gross_weight']);
				
				if(!$get)
				{
					//-- update cbm of actual product
					$product->update_cbm($_POST['pid']);
					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=update-product&status=3&id=".$_POST['pid']."';</script>";
				}   
				else
				{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-product&status=2&id=".$_POST['pid']."';</script>";}
			}

			if($_GET['query']=='update-product')
			{
			if(!empty($_FILES['picture']['name']))
				{$picture=$admin->upload_image($_FILES['picture']);}
			else{$picture=$_POST['picture0'];}		
			
			$get = $product->update($picture, $_POST['buyer_code'], $_POST['sku_code'], $_POST['shipping_mark'], $_POST['product_name'], $_POST['hsn_code'], $_POST['width'], $_POST['length'], $_POST['height'], $_POST['gross_cbm'], $_POST['color'], $_POST['assembly'], $_POST['case_number'], $_POST['fob'], $_POST['usd'], $_POST['pcs_cartoon'], $_POST['cartoon_per_pcs'], $_POST['lshape'], $_POST['id']);
			
			if($get)
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=update-product&status=3&id=".$_POST['id']."';</script>";}   
			else
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=update-product&status=2&id=".$_POST['id']."';</script>";}
			}

			if($_GET['query']=='product-accesories-details')
					{
						$pid=$_POST['pid'];
						$acce=$_POST['acce'];
						$qty = $_POST['qty'];
						$remark = $_POST['remark'];
						
						for ($i = 0; $i < count($acce); $i++) 
						{
									$acce0 = mysqli_real_escape_string($con, $acce[$i]);
									$qty0=mysqli_real_escape_string($con, $qty[$i]);
									$remark0 = mysqli_real_escape_string($con, $remark[$i]);
									$save=$product->add_product_details($pid,$acce0,$qty0,$remark0);
						}

						echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=update-product&status=3&id=".$pid."';</script>";
						
					}
					
					if($_GET['query']=='delete_product')
					{
						$delete_product=$product->delete_product($_GET['id']);
					}

					if($_GET['query']=='delete_accesories')
					{
						$delete_acce=$product->delete_accesories($_GET['id']);
					}

					if($_GET['query']=='delete_details')
					{
						$delete_product=$product->delete_details($_GET['id']);
					}
		
				}

		break;



//------- store
case "store":
if($_GET['action']=='store')
	{
		
		//=====insert
		if($_GET['query']=='add_store_cat')
		{
			$cat = $_POST['cat'];
			$get = $store->create_cat($cat);
			if($get)
			{	
				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-store-category&status=1';</script>";
			
			}   
			else
			{
				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-store-category&status=2';</script>";
			}
		}


		if($_GET['query']=='add_store_subcat')
		{
			$get = $store->create_subcat($_POST['cat'],$_POST['subcat']);
			if($get)
			{	
				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-sub-category&status=1';</script>";
			
			}   
			else
			{
				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-sub-category&status=2';</script>";
			}
		}

		if($_GET['query']=='add_unit')
		{
			$get = $store->create_unit($_POST['unit']);
			if($get)
			{	
				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-unit&status=1';</script>";
			
			}   
			else
			{
				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-unit&status=2';</script>";
			}
		}

		if($_GET['query']=='add-item')
		{
			//---updalod file 
			$pic=$admin->upload_image($_FILES['pic']);
			$get=$store->create_store_item($_POST['product_name'],$_POST['hsn_code'],$_POST['cat'],$_POST['subcat'],$pic,$_POST['unit']);
			if($get)
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-item&status=1';</script>";}   
			else
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-item&status=2';</script>";}
		}
		if($_GET['query']=='edit-item')
		{
			//---updalod file 
			
			if(!empty($_FILES['pic']['name']))
			{$pic=$admin->upload_image($_FILES['pic']);}
			else
			{$pic=$_POST['pic0'];}
			$get=$store->edit_store_item($_POST['product_name'],$_POST['hsn_code'],$_POST['cat'],$_POST['subcat'],$pic,$_POST['unit'],$_POST['id']);

			if($get)
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=view-item&status=1';</script>";}   
			else
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=view-item&status=2';</script>";}
		}
		if($_GET['query']=='add-store-po')
		{
			
			$get=$store->create_store_po($_POST['inv_nu'],$_POST['supplier_name'],$_POST['po_date']);
			if($get)
			{
				//-- get max id 
				$maxid=$store->maxid('store_po');
				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=edit-item-stock&status=1&id=$maxid';</script>";
			}   
			else
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-item-stock&status=2';</script>";}
		}
		if($_GET['query']=='add-item-qty')
		{
						$sku_array = $_POST['sku'];
						$qty_array = $_POST['qty'];
						$poid = $_POST['poid'];
						
	 					for ($i = 0; $i < count($sku_array); $i++) 
						{
									$sku = mysqli_real_escape_string($con, $sku_array[$i]);
									$qty = mysqli_real_escape_string($con, $qty_array[$i]);
									$poid = mysqli_real_escape_string($con, $poid);
									
									$update=$store->update_item_qty($sku,$qty);
									$save=$store->add_item_po_qty($sku,$qty,$poid);
						}

						echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=edit-item-stock&id=$poid&status=3';</script>";
		}
		//== search
		if($_GET['query']=='view-item-search')
		{
			$linksArray = array_filter($_POST);
			$sql0=array();
			foreach($linksArray as $k => $value)
			{
				$sql0[]= $k." = '".$linksArray[$k]."'";
			}
			$sql1=implode(" AND ",$sql0);
			$store_search = $store->search_item($sql1);
			$_SESSION['search_data']=$store_search;
			if($store_search )
			{				
				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=view-item&status=5';</script>";}   
			else
			{
				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=view-item&status=7';</script>";}
		}
		//=== edit
		if($_GET['query']=='edit_store_cat')
		{
			$get = $store->edit_cat($_POST['cat'],$_POST['id']);
			if($get)
			{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-store-category&status=1';</script>";}   
			else{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-store-category&status=2';</script>";}
		}

		//-- get details
		if($_GET['query']=='get_subcat')
		{
			$id=$_GET['id'];
			$subcat=$store->get_subcat_bycat($id);
			if(COUNT($subcat)>0)
			{
				echo "<option disabled='' selected='selected'>- Select -</option>";
				foreach($subcat as $k =>$value)
				{
					echo "<option value='".$subcat[$k]['id']."'>".$subcat[$k]['subcat']."</option>";
				}
			}
			else{	echo "<option disabled='' selected='selected'>No Sub Category Found</option>";}	
		}
		
		if($_GET['query']=='delete_po')
		{
			$store->delete_po($_GET['id']);
		}

		if($_GET['query']=='delete_item')
		{
			$store->delete_item($_GET['id']);
		}
	}
	break;
	
//-- accounts
case "accounts":
	if($_GET['action']=='accounts')
		{
					if (isset($_GET['query']))
					{
//===== insert
						if($_GET['query']=='add-beneficiery')
						{
						$bname = $_POST['bname'];
						$country_code = $_POST['country_code'];
						$created_date = date('Y-m-d h:i:s');
						$email = $_POST['email'];
						$contact = $_POST['contact'];
						$gstin = $_POST['gstin'];
						$btype = $_POST['btype'];
						$acctype = $_POST['acctype'];
						$address = $_POST['address'];
						$bene_code = $_POST['bene_code'];
						
						$result = $accounts->create_beneficiery($bname,$country_code,$created_date,$email,$contact,$gstin,$btype,$acctype,$address,$bene_code);

						if($result)
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-beneficiery&status=1';</script>";}   
						else{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-beneficiery&status=2';</script>";}
						
						}

						if($_GET['query']=='edit-beneficiery')
						{
							$result = $accounts->edit_beneficiery($_POST['bname'],$_POST['country_code'],$_POST['email'],$_POST['contact'],$_POST['gstin'],$_POST['btype'],$_POST['acctype'],$_POST['address'],$_POST['bene_code'],$_POST['id']);
							if($result)
							{echo "<div class='alert alert-success'>Data Updated !!!</div>";}   
							else{echo "<div class='alert alert-danger'>Something Went Wrong !!!</div>";}
						}

						if($_GET['query']=='delete_beneficiery')
						{
							$result = $accounts->delete_beneficiery($_GET['id']);
						}

					}
		}
		break;

		//-- admin
case "admin":
	if($_GET['action']=='admin')
		{
if (isset($_GET['query']))
{
		//===== insert
		if($_GET['query']=='add-meta')
		{
				$save = $admin->create_meta($_POST['metaname'],$_POST['value1'],$_POST['value2']); 
				if($save)
				{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-meta&status=1';</script>";}   
				else{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-meta&status=2';</script>";}
		}

		if($_GET['query']=='create_user')
		{
		$save=$admin->create_user($_POST['uname'],$_POST['upass'],$_POST['utype'],$_POST['email'],$_POST['contact']);
		if($save)
		{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=admin_create_user&labour=0&status=1';</script>";}   
		else{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=admin_create_user&labour=0&status=2';</script>";}
		}
		
		if($_GET['query']=='add-labour')
		{
			$upass=''; $uemail='';
		$save=$admin->create_user($_POST['uname'],$upass,$_POST['utype'],$uemail,$_POST['contact']);
		if($save)
		{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-user&labour=1&status=1';</script>";}   
		else{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-user&labour=1&status=2';</script>";}
		}
		//-- delete
		if($_GET['query']=='delete-meta')
		{
				$save = $admin->delete_meta($_GET['id']); 
				if($save)
				{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-meta&status=1';</script>";}   
				else{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=add-meta&status=2';</script>";}
		}

		if($_GET['query']=='edit_user')
		{
			$edit=$admin->edit_user($_POST['uname'],$_POST['upass'],$_POST['utype'],$_POST['email'],$_POST['contact'],$_POST['id']);
			if(!$edit)
			{echo "<div class='alert alert-success'>User Edit Successfully</div>";}
			else
			{echo "<div class='alert alert-danger'>Something went wrong !! Please try again later !!</div>";}
				
		}

		if($_GET['query']=='delete_user')
		{
			$delete=$admin->delete_user($_GET['id']);
		}

}
		}
		break;

//-- order module
case "order":
			if($_GET['action']=='order')
				{
					if($_GET['query']=='create-order')
					{
						$save=$order->create_order($_POST['client_name'],$_POST['order_date'],$_POST['ship_date'],$_POST['pi_nu'],$_POST['pi_date'],$_POST['country'],$_POST['usd_inr']);
						if($save)
						{
							$maxid=$store->maxid('orders');
							echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=order-edit&id=$maxid&status=1';</script>";}   
						else{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=order-create&status=2';</script>";}
					}
					if($_GET['query']=='create-po')
					{
						$save=$order->create_po($_POST['order_id'],$_POST['supplier_id'],$_POST['delivery_date'],$_POST['grace_period'],$_POST['order_date'],$_POST['order_po_nu'],$_POST['potype']);
					
						if($save)
						{	//-- get max id 
			                $maxid=$store->maxid('orders_po');
						    echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=order-po-edit&id=$maxid&status=1';</script>";
						    
						}   
						else{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=order-po-create&status=2';</script>";}
					}
					if($_GET['query']=='edit-po')
					{	
						$save=$order->edit_po($_POST['order_nu'],$_POST['supplier_id'],$_POST['delivery_date'],$_POST['grace_period'],$_POST['order_date'],$_POST['order_po_nu'],$_POST['id']);
						$id=$_POST['id'];
						if(!$save)
						{	//-- get max id 
			                echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=order-po-edit&id=$id&status=1';</script>";
						}   
						else{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=order-po-edit&id=$id&status=2';</script>";}
					}
					if($_GET['query']=='create-po-material')
					{	
						$save=$order->create_po_material($_POST['order_nu'],$_POST['supplier_id'],$_POST['delivery_date'],$_POST['grace_period'],$_POST['order_date'],$_POST['order_po_nu'],$_POST['potype'],$_POST['id']);
						$id=$_POST['id'];
					
						if(!$save)
						{	//-- get max id 
			                echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=order-po-edit&id=$id&status=1';</script>";
						}   
						else{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=order-po-edit&id=$id&status=2';</script>";}
					}
					if($_GET['query']=='product_add_po')
					{
						$id=$_POST['oid'];
						//--check duplicary
						$duplicate=$order->check_product_po($_POST['pid'],$_POST['oid'],$_POST['poid']);
						if(!empty($duplicate)>0)
						{
			                echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=order-po-edit&id=$id&status=6';</script>";
						}
						else {
								$save=$order->add_product_po($_POST['pid'],$_POST['oid'],$_POST['poid']);
								if($save)
								{	//-- get max id 
									echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=order-po-edit&id=$_POST[poid]&status=1';</script>";
								}   
								else{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=order-po-edit&id=$_POST[poid]&status=2';</script>";}
							}	
					}
					if($_GET['query']=='edit-order')
					{
						$save=$order->edit_order($_POST['client_name'],$_POST['order_nu'],$_POST['order_date'],$_POST['ship_date'],$_POST['pi_nu'],$_POST['pi_date'],$_POST['country'],$_POST['usd_inr'],$_POST['status'],$_POST['id']);
						
						if(!$save)
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=order-edit&status=3&id=$_POST[id]';</script>";}   
						
					}
					if($_GET['query']=='add-product')
					{
						$save=$order->add_product($_POST['pid'],$_GET['id']);
						if($save)
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=order-edit&id=$_GET[id]&status=3';</script>";}   
						else{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=order-edit&id=$_GET[id]&status=2';</script>";}   
						
					}
					if($_GET['query']=='delete_product_order')
					{
						$save=$order->delete_product_order($_GET['id']);
						if($save)
						{echo "<div class='alert alert-danger'>Deleted !!!</div>";}   
						else{echo "<div class='alert alert-info'>Something Went Wrong !!!</div>";}      
						
					}
					if($_GET['query']=='order_details2_delete')
					{
						$delete=$order->delete_order_details2($_GET['id']);
						if($delete)
						{echo "<div class='alert alert-danger'>Deleted !!!</div>";}   
						else{echo "<div class='alert alert-info'>Something Went Wrong !!!</div>";}      
						
					}
					if($_GET['query']=='order-cartoon-details')
					{
						$opid=$_POST['opid'];
						$op_detail=$_POST['op_detail'];
						$value1_array = $_POST['value1'];
						$value2_array = $_POST['value2'];
						$value3_array = $_POST['value3'];
						$value4_array = $_POST['value4'];

						for ($i = 0; $i < count($value1_array); $i++) 
						{
									$length = mysqli_real_escape_string($con, $value1_array[$i]);
									$width = mysqli_real_escape_string($con, $value2_array[$i]);
									$height = mysqli_real_escape_string($con, $value3_array[$i]);
									$remark = mysqli_real_escape_string($con, $value4_array[$i]);

									$save=$order->add_order_details2($opid,$op_detail,$length,$width,$height,$remark);
						}

						echo "<div class='alert alert-success'>Details Added !!!</div>";
						
					}
					if($_GET['query']=='order-material-details')
					{
						$opid=$_POST['opid'];
						$op_detail=$_POST['op_detail'];
						$value1_array = $_POST['value1'];
						$value4_array = $_POST['value4'];
						for ($i = 0; $i < count($value1_array); $i++) 
						{
									$type = mysqli_real_escape_string($con, $value1_array[$i]);
									$value2='';
									$value3='';
									$remark = mysqli_real_escape_string($con, $value4_array[$i]);
									$save=$order->add_order_details2($opid,$op_detail,$type,$value2,$value3,$remark);
						}

						echo "<div class='alert alert-success'>Details Added !!!</div>";
						
					}
					if($_GET['query']=='order-accesories-details')
					{
						$opid=$_POST['opid'];
						$op_detail=$_POST['op_detail'];
						$value1_array = $_POST['value1'];
						$value2_array = $_POST['value2'];
						$value4_array = $_POST['value4'];
						for ($i = 0; $i < count($value1_array); $i++) 
						{
									$type = mysqli_real_escape_string($con, $value1_array[$i]);
									$qty=mysqli_real_escape_string($con, $value2_array[$i]);
									$value3='';
									$remark = mysqli_real_escape_string($con, $value4_array[$i]);
									$save=$order->add_order_details2($opid,$op_detail,$type,$qty,$value3,$remark);
						}

						echo "<div class='alert alert-sucess'>Details Added !!!</div>";
						
					}
					if($_GET['query']=='add-product-details')
					{
						$post=$_POST;
						$id_array = $_POST['id'];
						$qty_array = $_POST['qty'];
						$price_fob_array = $_POST['price_fob'];
						$total_array = $_POST['total'];
						$hsn_array = $_POST['hsn'];
						$cbm_pcs_array = $_POST['cbm_pcs'];
						$color_array = $_POST['color'];
						$lshape_array = $_POST['lshape'];
						$cartoon_array = $_POST['cartoon_item'];

	 					for ($i = 0; $i < count($id_array); $i++) 
						{
									$id = mysqli_real_escape_string($con, $id_array[$i]);
									$qty = mysqli_real_escape_string($con, $qty_array[$i]);
									$price = mysqli_real_escape_string($con, $price_fob_array[$i]);
									$total = mysqli_real_escape_string($con, $total_array[$i]);
									$hsn = mysqli_real_escape_string($con, $hsn_array[$i]);
									$cbm = mysqli_real_escape_string($con, $cbm_pcs_array[$i]);
									$color = mysqli_real_escape_string($con, $color_array[$i]);
									$lshape = mysqli_real_escape_string($con, $lshape_array[$i]);
									$cartoon = mysqli_real_escape_string($con, $cartoon_array[$i]);

									$save=$order->add_order_details($id,$qty,$price,$total,$hsn,$cbm,$color,$lshape,$cartoon);
						}

						echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=order-edit&id=$_GET[oid]&status=3';</script>";
					}
					if($_GET['query']=='delete-order')
					{
						$save=$order->delete_order($_GET['id']);
					}
					if($_GET['query']=='delete_po_item')
					{ $delete=$order->delete_po_item($_GET['id']);}
					if($_GET['query']=='update_po_products')
					{
						$poid=$_POST['poid'];
						$id_array=$_POST['id'];
						$price_array=$_POST['price'];
						$qty_array = $_POST['qty'];
						$total_array = $_POST['total'];
						$remark_array = $_POST['remark'];
						for ($i = 0; $i < count($id_array); $i++) 
						{
									$id = mysqli_real_escape_string($con, $id_array[$i]);
									$price=mysqli_real_escape_string($con, $price_array[$i]);
									$qty = mysqli_real_escape_string($con, $qty_array[$i]);
									$total = mysqli_real_escape_string($con, $total_array[$i]);
									$remark = mysqli_real_escape_string($con, $remark_array[$i]);
									$save=$order->edit_order_po_detail($id,$price,$qty,$total,$remark);
						}

						echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=order-po-edit&id=$poid&status=3';</script>";
						
					}
					if($_GET['query']=='add_qty_received')
					{
						$msg=array();
						$pid = $_POST['pid'];
						$qty_array = $_POST['qty'];
						$ponu = $_POST['ponu'];
						$id_array = $_POST['id'];
						$sku_array = $_POST['sku'];
						$qty_received_array = $_POST['qty_received'];
						for ($i = 0; $i < count($qty_array); $i++) 
						{
							$sku = mysqli_real_escape_string($con, $sku_array[$i]);		
							$pid = mysqli_real_escape_string($con, $id_array[$i]);		
							$qty = mysqli_real_escape_string($con, $qty_array[$i]);
							$qty_received= mysqli_real_escape_string($con, $qty_received_array[$i]);
									if($qty_received <= $qty && is_numeric($qty_received))
									{
										$remark=$qty." received from po # ".$ponu;
										$save=$store->receive_po_item($pid,$qty_received);
										$history=$store->update_product_history($qty_received,$pid,'Cr.',$remark);
										$msg0= $sku." :- Qty Added for $sku !! ";
									}
									array_push($msg,$msg0);
						}
						echo "<div class='alert alert-info'>".implode("<br>",$msg)."</div>";
						
						
					}
					if($_GET['query']=='change_po_status')
					{ 
						//-- check all qty received or not 
						$qty_check=$order->check_po_qty($_POST['poid']);
						if($qty_check>0)
						{
							echo "<div class='alert alert-warning'>".$qty_check." items / sku are yet not full received.</div>";

							if($_POST['status']=='1' || $_POST['status']=='2')
							{
								$status=$order->update_order_status($_POST['poid'],$_POST['status']);
								echo "<div class='alert alert-info'>Status updated</div>";
							}
							else if($_POST['status']=='5')
							{
								 if($qty_check=='0.5')
									{
										$status=$order->update_order_status($_POST['poid'],$_POST['status']);
										echo "<div class='alert alert-warning'>PO cancelled successfully !!!</div>";
									}
								else
									{	
									echo "<div class='alert alert-danger'>You can not cancelled the po, beacuse some qty is received. To cancelled this po, Go to PO Edit and reduce the qty received.</div>";
									}
							}
							else
							{echo "<div class='alert alert-danger'>Status can not be update untill all qty may receive.</div>";}
						}
						
						else
						{
							if($_POST['status']=='3' || $_POST['status']=='4')
							{
							$status=$order->update_order_status($_POST['poid'],$_POST['status']);
							echo "<div class='alert alert-success'>Status changed successfully !!!</div>";
							}
							else
							{echo "<div class='alert alert-danger'>Status can not be update, because all quantity of PO has been received.</div>";}
						}

					}
					if($_GET['query']=='generate_invoice')
					{ 
						
						$invoice=$order->generate_invoice($_POST['irn'],$_POST['ack_nu'],$_POST['ack_date'],$_POST['reverse_charge'],$_POST['commercial_invoice_nu'],$_POST['commercial_invoice_date'],$_POST['performa_invoice_nu'],$_POST['performa_invoice_date'],$_POST['eway_nu'],$_POST['lutnu'],$_POST['lut_date'],$_POST['batch_code'],$_POST['eseal_nu'],$_POST['container_nu'],$_POST['vehical_nu'],$_POST['date_time_ship'],$_POST['line_nu'],$_POST['sb_nu'],$_POST['pre_by'],$_POST['sb_date'],$_POST['bill_ladding_nu'],$_POST['port_discharge'],$_POST['pre_carrier_place'],$_POST['port_loading'],$_POST['vessel_nu'],$_POST['trade_discount'],$_POST['freight_charges'],$_POST['other_charges'],$_POST['total_usd'],$_POST['advance_payment'],$_POST['oid'],$_POST['total_usd'],$_POST['total_inr']);


						if($invoice)
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=order-invoice-preview&id=$_POST[oid]';</script>";}
						else
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=order-invoice&id=$_POST[oid]&status=0';</script>";}
					}

					if($_GET['query']=='edit_invoice')
					{ 
						
						$invoice=$order->edit_invoice($_POST['irn'],$_POST['ack_nu'],$_POST['ack_date'],$_POST['reverse_charge'],$_POST['commercial_invoice_nu'],$_POST['commercial_invoice_date'],$_POST['performa_invoice_nu'],$_POST['performa_invoice_date'],$_POST['eway_nu'],$_POST['lutnu'],$_POST['lut_date'],$_POST['batch_code'],$_POST['eseal_nu'],$_POST['container_nu'],$_POST['vehical_nu'],$_POST['date_time_ship'],$_POST['line_nu'],$_POST['sb_nu'],$_POST['pre_by'],$_POST['sb_date'],$_POST['bill_ladding_nu'],$_POST['port_discharge'],$_POST['pre_carrier_place'],$_POST['port_loading'],$_POST['vessel_nu'],$_POST['trade_discount'],$_POST['freight_charges'],$_POST['other_charges'],$_POST['total_usd'],$_POST['advance_payment'],$_POST['oid'],$_POST['total_usd'],$_POST['total_inr'],$_POST['poid']);


						if($invoice)
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=order-invoice-edit&id=$_POST[oid]&status=3';</script>";}
						else
						{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=order-invoice-edit&id=$_POST[oid]&status=4';</script>";}
					}

					if($_GET['query']=='final_invoice_submit')
					{
						$invoice_save=$order->final_invoice_save($_POST['oid'],$_POST['final_invoice_nu']);
						

					 }

					 if($_GET['query']=='delete_po')
					 {$order->delete_po($_GET['id']);}

					 if($_GET['query']=='container-managment')
					 {
							print_r($_GET);
							if(isset($_GET['col_send']))
							{
								$field=$order->getfielddata($_GET['value'],$_GET['tblname'],$_GET['col_send'],$_GET['col_req']);
									
							}
							elseif(isset($_GET['oid']))
							{
								$field=$order->get_purchase_field($_GET['oid'],$_GET['pcode'],$_GET['col_req'],$_GET['tblname']);
								
							}
							
						   else { require_once "web/container-managment.php";}
						   break;
					 }
				}
				break;	
}
?>

