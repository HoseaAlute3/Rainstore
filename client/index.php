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
    <style>
      tr[data-href]{
    cursor: pointer;
}
tr[data-href]:hover{
    background-color: skyblue;
}

      html {
        overflow: scroll;
        overflow-x: auto;
      }

      ::-webkit-scrollbar {
        width: 0px;
        /* remove scrollbar space /
background: transparent; / optional: just make scrollbar invisible /
}
/ optional: show position indicator in red */
// ::-webkit-scrollbar-thumb {
// background: #FF0000;
// }

.drop a:hover, .dropdown-btn:hover {
  color: black;
}
      </style>
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


         $query = "SELECT * FROM product WHERE categories='Books'";

        $query_run = mysqli_query($conn, $query);
        ?>




<table class="table table-bordered" width="100%" cellspacing="0" id="table-name">

                        <div class="overflow-auto">

                        <h5><i><b>Books:</i></b></h5>

                        
            <thead class="bg-success" style="color: white;">

              <tr>  
                <th style="color: black;">Product Name</th>
                <th style="color: black;">Manufacture</th>
                <th style="color: black;">Price</th>
                
              </tr>
              
            </thead>

            <tbody>
            <?php
            if(mysqli_num_rows($query_run) > 0 ){
              while($rows = mysqli_fetch_assoc($query_run))
              {
             ?>

                <tr  data-href="ownproduct.php?p_id=<?php echo $rows['p_id'];?>">
        
                <td><?php echo $rows['p_name']; ?></td>
                <td><?php echo $rows['manufacture']; ?></td>
                <td>ths <?php echo $rows['price']; ?></td>
                
              </tr>
                            <?php
                              }
                            } else {
                              echo "No product found!";
                            }
                            ?>

                          </tbody>

                          <script type="text/javascript">
        $(document).ready(function(){
           $("#search_text").keyup(function(){
              var search = $(this).val();
              $.ajax({
                 url:'action.php',
                 method:'post',
                 data:{query:search},
                 success:function(response){
                  $("#table-name").html(response);
                 }
              });
           });
        });
      </script>
          </table>  
          <script type="text/javascript">
              document.addEventListener("DOMContentLoaded",() => {
                const rows = document.querySelectorAll("tr[data-href]");
                rows.forEach(row => {
                    row.addEventListener("click", () => {
                        window.location.href = row.dataset.href;
                    });
                });
              });
          </script>

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