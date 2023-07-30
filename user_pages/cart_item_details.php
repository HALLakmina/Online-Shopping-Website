<?php
	session_start();
	$db_name = "shopping";
	$connection = mysqli_connect("localhost","root","",$db_name);

	$user_name= $_GET['user_name'];
	$user_id= $_GET['user_id'];
?>

<!doctype html>
<html>
<head>
	
	<title>cart_item details page</title>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="styleSheetOne.css">
	<link rel="stylesheet" href="styleSheetProduct.css">



</head>
<body>
	<?php
		require_once('connection.php');
		
		$q= "select * from cart_item";
		
		$r = @mysqli_query($con,$q);
		
		$num = mysqli_num_rows($r);
	?>

<div>
		
		<table border="5px">
			<tr>
				<th>Product Image</th>
				<th>Product Name</th>
				<th>Quantity</th>
				<th>Price Details</th>
				<th>Total Price</th>
				<th>Remove Item</th>
			</tr>
				<?php
					$total=0;
					$count=0;
					if($num > 0)
					{?>
						
						<?php
						
							while($row = mysqli_fetch_array($r))
							{
								
								?>
								
									<tr>
										<td><img src="../selling_product_image/<?php echo $row["image"];?>" width="170px" height="200px"></td>
										<td><?php echo $row['product_name'];?></td>
										<td><?php echo $row['quantity'];?></td>
										<td><?php echo $row['price'];?></td>
										<td><?php echo $row['total_price'];?></td>
										<td><a href="cart_item_details_delete.php?id=<?php echo $row['id']; ?>&user=<?php echo $user_id; ?>">REMOVE ITEM</a></td>
									</tr>
									
									<?php
										$total = $total + ($row["quantity"]*$row["price"]);
										$count++;
							}
						?>
						<tr>
								<td colspan="3" Style="text-align: center;">Totle</td>
								<td align="right"><?php echo number_format($total,2); ?> </td>

								<form method="POST" action="cart_connect.php?">

									<input type="hidden" name="totle" value="<?php echo number_format($total,2); ?>">
									<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
									<input type="hidden" name="user_name" value="<?php echo $user_name;?>">

									<td style="text-align: center;"><input type="submit" name="buy" value="BUY" style="text-align: center;width:100px;height:30px;background-color:green;border:none;"></td>
								</from>	
								<td></td>
								
							
						</tr>
						
						<?php
					}
				?>
		</table>
		

	</div>
</body>
</html>
