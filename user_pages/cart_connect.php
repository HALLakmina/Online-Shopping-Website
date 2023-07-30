<?php
	require_once('connection.php');
	
	$user_id = filter_input(INPUT_POST, 'user_id');
	$user_name = filter_input(INPUT_POST, 'user_name');
	$total = filter_input(INPUT_POST, 'totle');

	require_once('connection.php');
	
	$q= "select * from cart_item where user_id = $user_id";
	$r = @mysqli_query($con,$q);

	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "shopping";
	$oconn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

	$num = mysqli_num_rows($r);

	if($num > 0){
		
		while($row = mysqli_fetch_array($r))
		{
			$user_id = $row['user_id'];
			$product_name = $row['product_name'];
			$image = $row['image'];
			$quantity = $row['quantity'];
			$price = $row['price'];
			$total_price = $row['total_price'];

			$sql = "INSERT INTO cart (user_id,product_name,image,quantity,price,total_price) values ('$user_id','$product_name','$image','$quantity','$price','$total_price')";
			$oconn->query($sql);
		}
		header("Location: payment.php?user_id=$user_id&cost=$total&user_name=$user_name");
		$oconn->close(); 
		
	}
	else{
		echo "No records";
	}
	