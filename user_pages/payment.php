<?php
	session_start();
	$db_name = "shopping";
	$connection = mysqli_connect("localhost","root","",$db_name);

	$user_name=$_GET['user_name'];
	$user_id= $_GET['user_id'];
  $cost = $_GET['cost'];
?>

<!doctype html>
<html>
<head>
	<title>payment</title>
	
    <meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="../css_file/feedbackSheet.css">


</head>
  <body>
	
    <form method="POST" action="payment_connect.php" style="margin-top:150px;" autocomplete="on">
      <center><table style="font-family:Calibri;padding:20px; border-radius: 10px; background-color:rgba(255, 255, 255);box-sizing:border-box;box-shadow:-10px -10px 25px gray,10px 10px 25px black;"cellspacing="10" width="300px" height="500px">
              
        <tr>
          <th><center><h2 style="color:black;">PAYMENT</h2></center></th>
        </tr>
        <tr>
          <th><input type="text" placeholder="Name" class="details" id="back" name="name"></th>
        </tr>
        <tr border="20px">
          <th ><input type="email" placeholder="Email"  class="details" id="back" name="email"></th>
        </tr>
        <tr border="20px">
        <th > <select placeholder="payment_type" name="payment_type" class="details" id="back" style="width:170px;">
            <option value="VISA">VISA</option>
            <option value="MASTER">MASTER</option>
          </select></th >
        </tr>
        <tr border="20px">
          <th ><input type="number" placeholder="card_no"  class="details" id="back" name="card_no"></th>
        </tr>
        <tr border="20px">
          <th ><input type="text" step="0.01" value="<?php echo $cost; ?>" class="details" id="back" name="amount" ></th>
        </tr>
        <tr>
          <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
          <input type="hidden" name="user_name" value="<?php echo $user_name;?>">

          <th COLSPAN="2"><input class="updateButton" type="submit" value="PAY"></th>
        </tr>
      </table></center><br><br><br>
    </form>
  </body>
</html>

