<?php
include '../connection.php';
if(isset($_POST['register'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['cpassword']);
  $client = $_POST['role'];

  $duplicate = mysqli_query($conn, "SELECT * FROM users where email = '$email'");


  if(mysqli_num_rows($duplicate) > 0){
    echo
     "<script> alert('Username or Email Has Already Taken!'); </script>";
  }else{
    if($password == $cpassword){
      $query = "INSERT INTO users values('','$username','$email','$password','$client')";
      mysqli_query($conn,$query);
      
      echo "<script>alert('Registration Successfully!')</script>";
         
      }else {
         echo 
         "<script> alert('Password Does Not Match!');</script>";

        
     }
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
            <a href="post.html">Add User</a>
          </h2>
          <p class="lead">
            User Info:
          </p>
          
          <form action="#" method="POST">
            <input class="form-control" type="text" name="username" placeholder="Username"><br>
            <input class="form-control" type="email" name="email" placeholder="Email"><br>
            <input class="form-control" type="password" name="password" placeholder="Password"><br>
            <input class="form-control" type="password" name="cpassword" placeholder="Password"><br>
            <select name="role" class="form-control">
                <option>Admin</option>
                <option>client</option>
             </select><br>
            <input class="form-control" name="register" type="submit" value="Add Product" style="background-color: black; color: white;"><br>
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