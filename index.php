<?php 
require('session.php'); 
require('erp/class/DBController.php');
require('erp/class/Admin.php');
require('erp/class/Inventory.php');

$conn= new DBController();

//-- class calls
$product = new Inventory();
$admin = new Admin();
//login confirmation
//confirm_home();
$action=$_GET['action']; 



//-- get company details 
$company=$admin->get_company();



if(empty($action))
{$_GET['action']="dashboard";
    $action=$_GET['action'];
}

include('case.php');
?>
