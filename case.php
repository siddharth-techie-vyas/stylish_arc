
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
			if (isset($_GET['page']))
 				{
					
 					require_once("web/header.php");
					
 					//============================================ OPEN ALL PAGES		
 					if(!file_exists("web/".$_GET['page'].".php"))
 						{require_once("web/404.php");}
 					else
 						{require_once("web/".$_GET['page'].".php");}
 					
 					require_once("web/footer.php");
 				}
				 
 		}
 		break;
//--- dashboard closed

}
?>

