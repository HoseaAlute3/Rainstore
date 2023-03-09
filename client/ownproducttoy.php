<?php
include '../connection.php';
error_reporting(0);
session_start();
if(isset($_POST['sendcomment'])){

  $username = $_POST['comment'];
  $pid=$_POST['p_id'];

  $duplicate = mysqli_query($conn, "SELECT * FROM users where email = '$username'");


  if(mysqli_num_rows($duplicate) > 0){
    echo
     "<script> alert('Comment submitted!'); </script>";
  }else{
      $query = "INSERT INTO comment values('','$pid','$username')";
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
        include '../connection.php';
        error_reporting(0);

        $p_id = $_GET['p_id'];

         $query = "SELECT * FROM product WHERE categories='Toy' AND product.p_id='$p_id'";

        $query_run = mysqli_query($conn, $query);
        ?>




          <table>

                        <div class="overflow-auto">

                        <h5><i><b>Books Info:</i></b></h5>

                        
            <thead>

              <tr>  
                <th style="color: black;"><h3>Product Name</h3></th>
                
                
              </tr>
              
            </thead>

            <tbody>
            <?php
            if(mysqli_num_rows($query_run) > 0 ){
              while($rows = mysqli_fetch_assoc($query_run))
              {
             ?>
            <?php $pid=$rows['p_id']; ?>

                <tr>
                <td><h4><?php echo $rows['p_name']; ?></h4></td>
                <tr>
                   
                <td><h2>Manafacture:</h2><h4><?php echo $rows['manufacture']; ?></h4></td>
                </tr>
                <tr>
                <td><h2>Price:</h2><h4>ths <?php echo $rows['price']; ?>/=</h4></td>
                </tr>
                
              </tr>
                            <?php
                              }
                            } else {
                              echo "No product found!";
                            }
                            ?>

                          </tbody>
          </table>  
          <hr>

                        <form action="#" method="POST">
                          <input type="hidden" name="p_id" value="<?php  echo $pid    ?>">
    <div class="mb-3">
  <label>Comment</label>
  <textarea class="form-control" name="comment" required rows="4" placeholder="Comment here" required>

  </textarea><br>

  <div class="col-12">
      <input type="submit" class="form-control" name="sendcomment" value="Submit" style="background-color: black; width: 50%; color: white;">
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
    

   

  </body>

</html>