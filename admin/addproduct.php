<?php
include '../connection.php';
if(isset($_POST['addproduct'])){
  $username = $_POST['p_name'];
  $email = $_POST['manufacture'];
  $password = $_POST['price'];
  $client = $_POST['categories'];

  $duplicate = mysqli_query($conn, "SELECT * FROM users where email = '$email'");


  if(mysqli_num_rows($duplicate) > 0){
    echo
     "<script> alert('Username or Email Has Already Taken!'); </script>";
  }else{
      $query = "INSERT INTO product values('','$username','$email','$password','$client')";
      mysqli_query($conn,$query);
      
      echo "<script>alert('Registration Successfully!')</script>";
          
     }
    }

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
              <a href="addproduct.php">Add Product</a>
            </li>
            <li>
              <a href="adduser.php">Add User</a>
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

          <!-- First Blog Post -->
          <h2 class="post-title">
            <a href="post.html">Add Product</a>
          </h2>
          <p class="lead">
            Product Info:
          </p>
          
          <form action="#" method="POST">
            <input class="form-control" name="p_name" type="text" name="productname" placeholder="Product Name" required><br>
            <input class="form-control" name="manufacture" type="text" name="productname" placeholder="Manufacture" required><br>
            <input class="form-control" name="price" type="number" name="productname" placeholder="Price" required><br>
            <select name="categories" class="form-control" required>
                <option>Clothes</option>
                <option>Toy</option>
                <option>Electronics</option>
                <option>Books</option>
             </select><br>
            <input class="form-control" name="addproduct" type="submit" value="Add Product" style="background-color: black; color: white;"><br>
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

  </body>

</html>