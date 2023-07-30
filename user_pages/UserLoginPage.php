<?php
session_start();

	include("connection.php");
	include("function.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//someting was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
			//read from database
			
			$query = "select * from user where user_name = '$user_name' limit 1";
			
			$result = mysqli_query($con,$query);
			
			if($result)
			{
				if($result && mysqli_num_rows($result)>0)
				{
					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{
						$_SESSION['user_id'] = $user_data['user_id']; 
						header("Location: UserHomePage.php?user_name=$user_name&user_id=$user_data[user_id]");
						die;
					}
				}
			}
			
			echo "Please enter some valid information";
			
		}
		else
		{
			echo "Please enter some valid information";
		}
		
	}
	
	
?>

<html>
	<head>
		<title>User login Page</title>
		<link rel="stylesheet" href="../css_file/userLoginStyleSheetOne.css">

	</head>
	<body>
		
		<div class="divBody">
			<div class="adminBox">
				<a href ="AdminLoginPage.php" class="a01">Admin Login</a>
			</div>
			<div class="userLoginBox">
				<form method="POST" action="">
					<div style="font-size: 30px; font-family:Calibri;color :white;font-weight:bold;">LOGIN</div>
					<input id="text" type="text" placeholder="USER NAME" name="user_name"><br><br>
					<input id="text" type="password" placeholder="PASSWORD" name="password"><br><br>
					<input id="button" type="submit" value="LOGIN"><br><br>
					<a href ="UserSiginPage.php" class="a02" style="font-size:15px;font-family:Calibri;color:gray;text-decoration:none;">SIGIN UP</a>
				</form>
			</div>
		</div>
	
	</body>
</html>