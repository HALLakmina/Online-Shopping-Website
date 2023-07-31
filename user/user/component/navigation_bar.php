<?php
    session_start();
    include_once("../backend/DBConnection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Negation bar</title>
    <!--link rel="stylesheet" href="../../css/bootstrap-5.2.3-dist/css/bootstrap.min.css"-->
    <link rel="stylesheet" href="../css/bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <!--link rel="stylesheet" href="../../css/simpl_css.css"-->
    <link rel="stylesheet" href="../css/simpl_css.css">
</head>
<body class="body-background" style=" background-image:url(../resources/images/website_images/wallpaper.png);background-attachment:fixed;background-size:cover;background-repeat:no-repeat;overflow: visible;">
    <?php $page=basename($_SERVER['PHP_SELF']); ?>    
    <header>
        <nav class="container-fluid navbar nav bg-dark bg-opacity-75">
			<img src ="../resources/images/website_images/shop_logo.webp" class= "ms-2 nav-item" style="border-radius: 50px; height:50px;width:50px;">

            <ul class="nav list-unstyled nav-underline fw-bold">
                <li class="nav-item"><a href ="home_page.php" class="nav-link link-light <?php if($page == 'home_page.php'): echo 'active';endif;?>">Home</a></li>
                <li class="nav-item"><a href =".php" class="nav-link link-light">Women's</a></li>
                <li class="nav-item"><a href ="men_cloth_page.php" class="nav-link link-light  <?php if($page == 'men_cloth_page.php'): echo 'active';endif;?>">Men's</a></li>
                <li class="nav-item"><a href =".php" class="nav-link link-light">Kid's</a></li>
                <li class="nav-item"><a href =".php" class="nav-link link-light">About Us</a></li>
                <li class="nav-item"><a href =".php" class="nav-link link-light">FeedBack</a></li>
            </ul>
            
            <div class="nav-item">
                <?php
                if(isset($_SESSION['user_name']))
                {
                    echo $user_data['user_name'];
                }
                else
                {
                ?>
                    <a  href="" class="btn nav-link link-light btn-info px-4 me-2 fw-bold">JOIN</a>
                <?php
                }
                ?>
            </div>
        </nav>
    </header>
