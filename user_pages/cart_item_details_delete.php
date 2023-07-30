<!doctype html>
<html>
<head> 
	<title>cart_item details page</title>


</head>
<body>
	<?php
		require_once('connection.php');
		
		
		$id= $_GET['id'];
		$user_id= $_GET['user'];
		$sql = "DELETE FROM cart_item WHERE id='$id'";
		
		$r = mysqli_query($con,$sql);

		if($r==true)
		{
			echo "Remove successfull";
			header("Location: cart_item_details.php?user= echo $user_id;");
		}
		else
		{
			echo "Remove Faild";
			header("Location: cart_item_details.php?user= echo $user_id;");
		}
	?>



</body>
</html>