<?php
session_start();
if(isset($_GET['pack']))
{
    $_SESSION['packno']=$_GET['pack'];
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Purchased</title>
    <style>
        body{
            font-family: sans-serif;
            background-color: black;
        }
        div 
        {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            color: white;
        }
    </style>
</head>
<body>
    <div>
        <h2><?php 
        $conn=mysqli_connect("localhost","root","","profile");
        if($_SESSION['packno']==100)
        {
            echo "Free Pack";
            mysqli_query($conn,"UPDATE users SET pack='Free' WHERE email='sinehan001@gmail.com'");
        }
        if($_SESSION['packno']==101)
        {
            echo "Developer Pack";
            mysqli_query($conn,"UPDATE users SET pack='Developer' WHERE email='sinehan001@gmail.com'");
        }
        if($_SESSION['packno']==102)
        {
            echo "Premium Pack";
            mysqli_query($conn,"UPDATE users SET pack='Premium' WHERE email='sinehan001@gmail.com'");
        }
        if($_SESSION['packno']==103)
        {
            echo "Business Pack";
            mysqli_query($conn,"UPDATE users SET pack='Business' WHERE email='sinehan001@gmail.com'");
        }
        ?> had been purchased successfully! &#x1F60A;</h2>
    </div>
</body>
<script>
    setTimeout(()=>{
        window.location.href="upgrade.php";
    },2000);
</script>
</html>