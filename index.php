<?php
include 'connection.php';

if (isset($_POST["login"])) {
  $email = $_POST['username'];
  $password = md5($_POST['password']);

  $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
  $row = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) > 0) {
    if ($password == $row['password']) {
        //session//
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];

        if($row["role"]=="client"){
          header("location:client/index.php");

      }elseif($row["role"]=="Admin"){
        $_SESSION['email']=$email;
          header("location:admin/index.php");

      }else{
          echo "";
      }
        
    }else {
        echo 
        "<script> alert('Wrong Password!');</script>";
    }
    
}else {
    echo 
    "<script> alert('Email Not Register!');</script>";
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

    <title>Login - Rainstore</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
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
          <a class="navbar-brand" href="index.html">Rain Store</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
      
            <li>
              <a href="index.php">Login</a>
            </li>
            <li>
              <a href="signup.php">Sign up</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">

      <div class="row">

        <div class="col-lg-2"></div>

        <div class="col-lg-8 login">

          <h1>Login</h1>

          <form action="#" method="post" class="login-form">

            <div class="form-group">
              <label for="username">Username</label>
              <input type="email" name="username" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>

            <input type="submit" class="form-control" name="login" value="Log in" style="background-color: black; color: white;"><br>


            <p>Don't have an account? <a href="signup.php">Sign Up Now</a></p>
          </form>

        </div>

        <div class="col-lg-2"></div>

      </div>

    </div>

    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>

</html>
