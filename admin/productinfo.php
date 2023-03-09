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
        include '../connection.php';
        error_reporting(0);
        $p_id = $_GET['p_id'];

         $query = "SELECT * FROM product WHERE categories='Books' AND product.p_id='$p_id'";

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

                <tr>
                <td><h4><?php echo $rows['p_name']; ?></h4></td>
                <tr>
                   
                <td><h2>Manafacture:</h2><h4><?php echo $rows['manufacture']; ?></h4></td>
                </tr>
                <tr>
                <td><h2>Price:</h2><h4>ths <?php echo $rows['price']; ?>/=</h4></td>
                </tr><br>

                <tr>
                <td><a href="editdata.php?p_id=<?php echo $rows['p_id'];?>"><b>Edit</b></a></td>
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
    <div class="mb-3">
  <div class="col-12">
  



  
  













  












  </div><hr>
  <p><i><b>User Comment : </b></i></p>


                 <?php
                 include '../connection.php';  
                 $p_id=$_GET['p_id'];
                 $query = "SELECT * FROM  comment WHERE p_id='$p_id'";                         
                              $query_run = mysqli_query($conn, $query);
                               if(mysqli_num_rows($query_run) > 0 ){
              while($rows = mysqli_fetch_assoc($query_run))
              {
                $use = $rows['comment'];
                           
                           }  
                       }
                           ?>  
          
                                
                                  <td>
                                 <p style="color: black;"><i> <b></b> 
                                     <?php
                                
                                    echo $use;
                                  
                                     ?> 
                                 </i></p>
                                </td>
                              
                                

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