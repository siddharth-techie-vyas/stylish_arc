<?php
include_once('class/DBController.php');
include_once('class/Admin.php');
include_once('class/Store.php');
include_once('class/Inventory.php');
include_once('class/Accounts.php');
include_once('class/Orders.php');
include_once('class/Functions.php');

$db_handle = new DBController();

$admin = new Admin();
$product = new Inventory();
$store = new Store();
$admin = new Admin();
$accounts = new Accounts;
$order = new Orders;


$conn = new DBController();
$con = $conn->connectDB();

$action = "";
if (!empty($_GET["action"])) 
	{
    	$action = $_GET["action"];
	}
	else { ?><script type="text/javascript">
                window.location = "logout.php";
                </script><?php }

    
	
?>