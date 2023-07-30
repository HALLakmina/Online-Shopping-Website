<?php
$user_id =filter_input(INPUT_POST, 'user_id');
$product_name = filter_input(INPUT_POST, 'product_name');
$image = filter_input(INPUT_POST, 'image');
$quantity = filter_input(INPUT_POST, 'quantity');
$price = filter_input(INPUT_POST, 'price');
$page_name = filter_input(INPUT_POST, 'page_name');
$total_price = $quantity * $price;


	if(!empty($product_name)) {
		if(!empty($image)) {
			if(!empty($quantity)) {
				if(!empty($price)) {
					$host = "localhost";
					$dbusername = "root";
					$dbpassword = "";
					$dbname = "shopping";
					
					
					$oconn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
					
					
					if(mysqli_connect_error()) {
						die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_errno());
						
					}
					else{
						$sql = "INSERT INTO cart_item (user_id,product_name, image, quantity, price, total_price) values ('$user_id', '$product_name', '$image', '$quantity', '$price', '$total_price')";
						if ($oconn->query($sql)) {
							echo "New Record is Inserted Sucessfully";
							header("Location: $page_name.php");
							die;
						}
						else{
							echo "Error: ". $sql . "<br>". $oconn->error;
							
						}
						$oconn->close(); 
						
					}
				}
				else{
					echo "Product name should not be empty";
					die();
				}
			}
			else{
				echo "Quantity should not be empty";
				die();
			}
		}
		else{
			echo "Image should not be empty";
			die();
		}
	}
	else{
		echo "Price should not be empty";
		die();
	}
?>