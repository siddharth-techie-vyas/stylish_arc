<?php 
//echo $_SESSION['utype'];

//-- admin
if($_SESSION['utype']=='1')
{include('admin_dashboard.php');}
//-- store
if($_SESSION['utype']=='5')
{include('store_dashboard.php');}

//------------------------ yet to final

//-- merchent
if($_SESSION['utype']=='8')
{include('dashboard_soon.php');}
//-- store
if($_SESSION['utype']=='6')
{include('dashboard_soon.php');}
//-- store
if($_SESSION['utype']=='4')
{include('dashboard_soon.php');}
//-- store
if($_SESSION['utype']=='3')
{include('dashboard_soon.php');}
//-- store
if($_SESSION['utype']=='2')
{include('dashboard_soon.php');}

?>