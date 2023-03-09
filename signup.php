<?php
include 'connection.php';
if(isset($_POST['register'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['cpassword']);
  $client = $_POST['client'];

  $duplicate = mysqli_query($conn, "SELECT * FROM users where email = '$email'");


  if(mysqli_num_rows($duplicate) > 0){
    echo
     "<script> alert('Username or Email Has Already Taken!'); </script>";
  }else{
    if($password == $cpassword){
      $query = "INSERT INTO users values('','$username','$email','$password','$client')";
      mysqli_query($conn,$query);
      
      echo "<script>alert('Registration Successfully!')</script>";
     echo "<script type='text/javascript'> document.location ='index.php'; </script>";
         
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

    <title>Signup - Rainstore</title>

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

          <h1>Sign up</h1>

          <form action="#" method="post" class="login-form">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" name="username" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="username">Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="password">Corfirm Password</label>
              <input type="password" name="cpassword" class="form-control" required>
            </div>

            <select name="client" hidden>
                    <option>client</option>
                  </select>

            <input type="submit" class="form-control" name="register" value="Sign up" style="background-color: black; color: white;"><br>

            <p>You have an account? <a href="index.php">Log in</a></p>
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
<?php
if (isset($_POST['email']) == true && empty($_POST['email']) == false) {
     $email = $_POST['email'];
     if (filter_var($email, FILTER_VALIDATE_EMAIL) == true) {
       echo 'That\'s a Valid Email Adress! ';
     }else{
        echo "Not a valid Email";
     }
   }
   ?>