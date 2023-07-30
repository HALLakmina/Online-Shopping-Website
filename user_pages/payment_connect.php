<?php

$user_id = filter_input(INPUT_POST, 'user_id');
$user_name = filter_input(INPUT_POST, 'user_name');
$payment_type = filter_input(INPUT_POST, 'payment_type');
$card_no = filter_input(INPUT_POST, 'card_no');
$amount = filter_input(INPUT_POST, 'amount');

				
	if(!empty($user_id)) {
			if(!empty($payment_type)) {
				if(!empty($card_no)) {
					if(!empty($amount)) {
	
		
						$host = "localhost";
						$dbusername = "root";
						$dbpassword = "";
						$dbname = "shopping";
						
						
						$oconn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
						
						
						if(mysqli_connect_error()) {
							die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_errno());
							
						}
						else{
							$sql = "INSERT INTO payment (user_id,payment_type,card_no,amount) values ('$user_id','$payment_type','$card_no','$amount')";
							if ($oconn->query($sql)) {
								echo "New Record is Inserted Sucessfully";
								header("Location: UserHomePage.php?user_id=$user_id&user_name=$user_name");
								die;
							}
							else{
								echo "Error: ". $sql . "<br>". $oconn->error;
								
							}
							$oconn->close(); 
							
						}
					}
					else{
						echo "amount empty";
						die();
					}
	
				}
				else{
					echo "card_no empty";
						die();
					
				}
			}
			else{
				echo "payment_type empty";
					die();
				
			}
		}
	else{
		echo "user_id empty";
			die();
		
	}
?>
