<!DOCTYPE html>
<html lang="en">

  <head>

  <title> Home - Rain Store</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel = "icon" href="image/img/thtutitle.png" type = "image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

        <script type="text/javascript">
            $(function(){
                $(document) .on ("click","btn",function(){
                    var getselectedvalues=$(".table input:checked").parents("tr").clone().appendTo($(".stable tbody").add(getselectedvalues));
                })
            }

            
        </script>

    

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


         $query = "SELECT * FROM product WHERE categories='Clothes'";

        $query_run = mysqli_query($conn, $query);
        ?>




<div class="container" id="DashReport">
                    <div id="printableArea">

          <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">

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

                <tr data-href="productinfoclothes.php?p_id=<?php echo $rows['p_id'];?>">
        
                <td><?php echo $rows['p_name']; ?></td>
                <td><?php echo $rows['manufacture']; ?></td>
                <td>ths <?php echo $rows['price']; ?>/=</td>
                
                
              </tr>
              



                            <?php
                              }
                            } else {
                              echo "No product found!";
                            }
                            ?>

                          </tbody>   
        
          </table>
          </div>
          </div>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
    <script src="assets/demo/datatables-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>

</html>