<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		body{
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
		}


		table{
			border-collapse: collapse;
			width:50%;
		}

		h2{
			color:red;
			font-weight: bold;
		}
	</style>
	<title>INNER JOIN</title>
</head>
<body>

	<?php
	$_GET['category'] = 2;
	 // Parse the query string
 if (isset($_GET['category'])) {
 $category_num = $_GET['category'];
 } else {
 	echo 'The "category" parameter is missing!<br>';
    echo 'We are done here, sorry.';
 exit(0);


 }

 // Store the database connection parameters
 $host = 'localhost';
 $user = 'root';
 $password = '';
 $database = 'mytest';

 // create a new mysqli object with the database connection
 $mysqli = new mysqli($host, $user, $password, $database);

 // create select query
 $sql = "SELECT products.product_name,
 products.unit_price,
 products.unit_in_stock,
 categories.category_name
 FROM products
 INNER JOIN categories
 ON products.category_id = categories.category_id
 WHERE products.category_id = $category_num";
  $result = $mysqli->query($sql);
 $result2 = $mysqli->query($sql);
 $Category = $result2->fetch_array();
 ?>



 <h2>Product Category:<?php echo $Category['category_name']; ?> </h2>



  

 <table border="1">
 	<thead>
 		<tr>
 		<th>Products </th>
 		<th>Unit Price </th>
 		<th>Stock Units </th>	
 		</tr>
 	</thead>
 	<tbody>


 <?php

 // Get the query result

 while($rows = $result->fetch_assoc()){?>
 	     <tr>
 	    <td><?php echo $rows['product_name']; ?> </td>
 	    <td><?php echo $rows['unit_price']; ?> </td>
 	    <td><?php echo $rows['unit_in_stock']; ?> </td>
 	     </tr>
<?php
 }

 

 




	?>

	</tbody>

	</table>

</body>
</html>
 