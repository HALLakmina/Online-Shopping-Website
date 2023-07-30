<!doctype html>
<html>
<head> 
	<title>cart details page</title>


</head>
<body>
	<?php
	require_once('connection.php');
	
	
	$q= "select * from cart";
	
	$r = @mysqli_query($con,$q);
	
	$num = mysqli_num_rows($r);
	?>
	<table border="5px">
			<tr>
				<th>cart_id</th>
				<th>product_name</th>
				<th>image</th>
				<th>quantity</th>
				<th>price</th>
				<th>total_price</th>
			</tr>
	<?php
	if($num > 0){
		
		while($row = mysqli_fetch_array($r)){
		?>
			<tr>
				<th><?php echo $row['cart_id']?></th>
				<th><?php echo $row['product_name']?></th>
				<th><?php echo $row['image']?></th>
				<th><?php echo $row['quantity']?></th>
				<th><?php echo $row['price']?></th>
				<th><?php echo $row['total_price']?></th>
			</tr>
			<?php
		}
	}
	else{
		echo "No records";
	}
	
	
	
	?>
</table>

	<a href="home.php">Home</a></br>
</body>
</html>