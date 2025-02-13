<?php 
require('session.php'); 
require('erp/class/DBController.php');
require('erp/class/Admin.php');
require('erp/class/Inventory.php');

$conn= new DBController();

//-- class calls
$product = new Inventory();
$admin = new Admin();




//-- get company details 
$company=$admin->get_company();


//login confirmation
//confirm_home();


if(isset($_GET['action']))
{$action=$_GET['action']; }
else
{   
    
    $_GET['action']="dashboard";
    $_GET['page']="home";
    $action=$_GET['action'];

}



include('case.php');
?>
