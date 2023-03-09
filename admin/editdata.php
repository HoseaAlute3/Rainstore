<?php
include '../connection.php';
if(isset($_POST['sendcomment'])){
  $username = $_POST['comment'];

  $duplicate = mysqli_query($conn, "SELECT * FROM users where email = '$username'");


  if(mysqli_num_rows($duplicate) > 0){
    echo
     "<script> alert('Comment submitted!'); </script>";
  }else{
      $query = "INSERT INTO comment values('".$_SESSION['p_id']."','$username')";
      mysqli_query($conn,$query);
      
      echo "<script>alert('Your comment sending!')</script>";  
     }
    }
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Home - Rain Store</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Rain Store</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="index.php">Home</a>
            </li>
    
            <li>
              <a href="../logout.php">Log Out</a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">

          <nav class="navbar navbar-default">
            <div class="container-fluid">
             <ul class="nav navbar-nav">
             <li><a href="index.php">Books</a></li>
             <li><a href="electronics.php">Electronics</a></li>
             <li><a href="toy.php">Toy</a></li>
             <li><a href="clothes.php">Clothes</a></li>
            </ul>
            </div>
          </nav>
          <hr>
                                

          

          <?php
          error_reporting(0);
        
          $p_id = $_GET['p_id'];
          
          $update = "SELECT * FROM product WHERE p_id='$p_id'";

          $result=mysqli_query($conn,$update);

          while($res=mysqli_fetch_array($result)){
            $p_id=$res['p_id'];
            $p_name=$res['p_name'];
            $manufacture=$res['manufacture'];
            $price=$res['price'];
          }
          
          ?>
  
  
          



          <form action="updateprofile.php" name="form" method="POST" enctype='multipart/form-data'>

                                    <input type="hidden" name="p_id" value="<?php echo $p_id; ?>" />


                                 <div class="form-group mt-5" style="margin: 10px;">
                                   
                                   <input class="form-control mt-2" type="text" name="p_name" value="<?php echo $p_name; ?>" required style="border-color: green;">

                                   <br>

                                  <input type="text" class="form-control mt-2" name="manufacture" value="<?php echo $manufacture; ?>" required style="border-color: green;">
                                  <br>

                                 <input type="text" required class="form-control mt-2" name="price" value="<?php echo $price; ?>" placeholder="Price" required style="border-color: green;">


<br>
                             

                              <input type="submit" class="form-control bg-success" name="change" value="Update Product">

                          </div>

                             </form>






  









        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    

    
   

  </body>

</html>