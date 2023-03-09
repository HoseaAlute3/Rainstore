<?php
include '../connection.php';
session_start();
if(isset($_POST['change']))
{ 
     

      $p_id = $_POST['p_id'];
       $p_name = $_POST['p_name'];
       $manufacture = $_POST['manufacture'];
        $price = $_POST['price'];
                 
    
        $query = 'UPDATE product set p_name="'.$p_name.'",manufacture="'.$manufacture.'",price="'.$price.'" WHERE p_id="'.$p_id.'"';
          $result = mysqli_query($conn, $query) or die(mysqli_error($conn));


         }     
?>  
  <script type="text/javascript">
      alert("You've Edit user Successfully.");
      window.location = "editdata.php";
    </script>

