<?php
require('session.php');
require("class/DBController.php");
require("class/Admin.php");
$db = new DBController;
$conn = $db->connectDB();
$admin= New Admin();
if (isset($_POST['btnlogin'])) {


  $uname = $_POST['uname'];
  $upass = $_POST['password'];
  

  
if ($upass == '' || $uname==''){ $error = "Something is missing";
     ?>    <script type="text/javascript">
                //alert("Something is missing!");
                window.location = "web/login.php?error=<?php echo $error;?>";
                </script>
        <?php
}
else{
//create some sql statement             
        $sql = "SELECT * FROM  tbluser WHERE  uname =  '" . $uname . "' AND  upass =  '" . $upass . "'";
        $result = mysqli_query($conn, $sql);

        if ($result){
             //get the number of results based n the sql statement
        $numrows = mysqli_num_rows($result);
     
        //check the number of result, if equal to one   
        //IF theres a result
            if ($numrows == 1) {
                //store the result to a array and passed to variable found_user
                $found_user  = mysqli_fetch_array($result);

                //fill the result to session variable
               
               $_SESSION['uid'] = $found_user['id'];
               $_SESSION['uname'] = $found_user['uname'];
               $_SESSION['utype'] = $found_user['utype'];
               $_SESSION['email'] = $found_user['uemail'];
               $_SESSION['phone'] = $found_user['ucontact'];
               $_SESSION['menu'] = 'dashboard';
               //-- get po and order prefix
               $po_prefix=$admin->get_metaname_byvalue('po_prefix');
               $order_prefix=$admin->get_metaname_byvalue('order_prefix');
               $pdf_prefix=$admin->get_metaname_byvalue('pdf_prefix');
               $_SESSION['po_prefix']=$po_prefix[0]['value1'];
               $_SESSION['order_prefix']=$order_prefix[0]['value1'];
               $_SESSION['pdf_prefix']=$pdf_prefix[0]['value1'];
               //-- get company details
               $company=$admin->get_company();
               $_SESSION['cname']=$company[0]['cname'];
               $_SESSION['logo']=$company[0]['logo'];
               $_SESSION['website']=$company[0]['website'];
               $_SESSION['address']=$company[0]['address'];
               $_SESSION['country']=$company[0]['country'];
               $_SESSION['email']=$company[0]['email'];
               $_SESSION['phone']=$company[0]['phone'];
              ?>
                    <script type="text/javascript">
                      //then it will be redirected to index.php
                      window.location = "index.php?action=dashboard&page=dashboard";
                  </script>
            <?php
                
            } else {
            //IF theres no result
              ?>    <script type="text/javascript">
                //alert("Username or upassword Not Registered! Contact Your Administrator.");
                window.location = "web/login.php?status=1";
                </script>
        <?php

            }

         } else {
                 # code...
        // die("Table Query failed: " );
          ?>    <script type="text/javascript">
                      //then it will be redirected to index.php
                     // alert("Query Failed !!! , Contact Your Administrator")
                      window.location = "web/login.php?status=2";
                  </script>
             <?php   
        }
        
    }       
} 
 
?>