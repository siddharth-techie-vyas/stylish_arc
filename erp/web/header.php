<!DOCTYPE html>
<html lang="en"> 
<head>
    <title><?php if(empty($_SESSION['cname'])){echo "Prodhyogiki";}else{echo $_SESSION['cname'];}?> - ERP</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="<?php echo $base_url;?>theme/assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?php echo $base_url;?>theme/assets/css/portal.css?ver=<?php echo rand(0,9999);?>">
    <script src="<?php echo $base_url;?>theme/assets/js/jquery.min.js"></script>

    <!-- data table-->
    <link href="<?php echo $base_url;?>theme/assets/plugins/data-table/datatables.min.css" rel="stylesheet" type="text/css"/>
    <script src="<?php echo $base_url;?>theme/assets/plugins/data-table/datatables.js"></script>

</head> 

<body class="app">   	
