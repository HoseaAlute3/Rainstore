<?php
include '../connection.php';
$output='';

if (isset($_POST['query'])) {
	$search = $_POST['query'];
	$stmt=$conn->prepare("SELECT * FROM product where p_name LIKE CONCAT('%',?,'%') OR manufacture LIKE CONCAT('%',?,'%')");
	$stmt->bind_param("ss",$search,$search);
}else{
	$stmt=$conn->prepare("SELECT * FROM product");
}
$stmt->execute();
$result=$stmt->get_result();

if ($result->num_rows>0) {
	$output ="<thead>
          <tr>
                <th>Product Name</th>
                <th>Manufacture</th>
                <th>Price</th>
                
              </tr>
        </thead>
        <tbody>";
        while ($row=$result->fetch_assoc()) {
        	$output .="
        	<tr>
  <td>".$rows['p_name']."</td>
  <td>".$rows['manufacture']."</td>
  <td>".$rows['price']."</td>
  

  
        	</tr>";
        }
        $output .="</tbody>";
        echo $output;
          }else{
          	echo "<h3>No Record Found!</h3>";
          }
?>