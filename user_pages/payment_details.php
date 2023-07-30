<!doctype html>
<html>
<head> 
	<title>payment details page</title>


</head>
<body>
	<?php
	require_once('connection.php');
	
	
	$q= "select * from payment";
	
	$r = @mysqli_query($con,$q);
	
	$num = mysqli_num_rows($r);
	
	if($num > 0){
		
		while($row = mysqli_fetch_array($r)){
			
			echo "<p>";
			echo "<span class = 'name'>";
			echo $row['payment_id']."<br>";
			echo "</span>";
			echo "<span class = 'details'>";
			echo $row['payment_type']."<br>";
			echo $row['card_no']."<br>";
			echo $row['amount']."<br>";
			

			echo "</p>";
		}
	}
	else{
		echo "No records";
	}
	
	
	
	?>


	<a href="home.php">Home</a></br>
</body>
</html>