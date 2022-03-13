<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Profile</title>
    <style>
    body 
{
    margin: 0;
    font-family: sans-serif;
}
.inner-wrapper
{
    width: 100%;
    height: 300px;
    <?php $conn=mysqli_connect("localhost","root","","profile");
       $rescol = mysqli_query($conn,"SELECT * from users WHERE email='sinehan001@gmail.com'");
       while($col = mysqli_fetch_assoc($rescol))
       {
           $_SESSION['color'] = $col['pack'];
       }
       if($_SESSION['color']=='Free')
       {
           echo "background-color: black;";
       }
       if($_SESSION['color']=='Developer')
       {
           echo "background-color: #e60023;";
       }
       if($_SESSION['color']=='Business')
       {
           echo 'background-color: #00a884;';
       }
       if($_SESSION['color']=='Premium')
       {
           echo 'background-color: #1a73e8;';
       }
     ?>
}
.img1
{
    width: 125px;
    height: 125px;
    border-radius: 50%;
    display: block;
    margin: 0 auto;
    padding: 50px 0px;
}
.left-arrow
{
    position: absolute;
    top: 0;
    left: 10px;
    color: white;
    font-size: 34px;
    font-weight: bold;
    cursor: pointer;
}
.edit
{
    position: absolute;
    top: 10px;
    right: 20px;
    font-size: 24px;
    font-weight: bold;
    color: white;
    cursor: pointer;
}

.nav
{
    display: none;
    position: absolute;
    right: 20px;
    top: 50px;
    background-color: white;
    border-radius: 15px;
    color: black;
    border: 2px solid grey;
    text-align: center;
}
.navchild
{
    padding: 0px 20px;
    cursor: pointer;
}
.navchild:hover 
{
    background-color: lightblue;
}
.profile-stat
{
    display: grid;
    grid-template-columns: 50% 50%;
    text-align: center;
    color: white;
}
.g-stat
{
    align-self: center;
    justify-self: center;
    margin-top: 50px;
}
.g-stat:nth-child(1)
{
    margin-left: 55%;
}
.g-stat:nth-child(2)
{
    margin-right: 55%;
}
.profile-stat h2,.profile-stat h3 
{
    margin-top: -20px;
}
.profile-stat h3 
{
    padding: 0 10px;
}
.plan
{
    font-size: 20px;
    font-weight: bold;
}
.upgrade button
{
    border: none;
    background-color: white;
    <?php
           if($_SESSION['color']=='Free')
           {
               echo "color: black;";
           }
           if($_SESSION['color']=='Developer')
           {
               echo "color: #e60023;";
           }
           if($_SESSION['color']=='Business')
           {
               echo "color: #00a884;";
           }
           if($_SESSION['color']=='Premium')
           {
               echo "color: #1a73e8;";
           }
    ?>
    font-size: 22px;
    font-weight: bold;
    cursor: pointer;
    margin-left: 3px;
    padding: 5px 15px;
    border-radius: 20px;
}

.upgrade button:hover
{
    <?php
           if($_SESSION['color']=='Free')
           {
               echo "color: black;";
           }
           if($_SESSION['color']=='Developer')
           {
               echo "color: #e60023;";
           }
           if($_SESSION['color']=='Business')
           {
               echo "color: #00a884;";
           }
           if($_SESSION['color']=='Premium')
           {
               echo "color: #1a73e8;";
           }
    ?>
    background-color: #dddddd;
}

::selection 
{
    color: black;
    background: white;
}

.display-info
{
    margin: 10px;
    border: 2px solid gray;
    border-radius: 10px;
}

.info-uname
{
    margin: 20px;
    display: grid;
    grid-template-columns: 50% 50%;
    text-align: center;
    line-height: 30px;
    font-weight: bold;
}

.uname-stat:nth-child(1)
{
    color: grey;
}

@media (max-width: 800px)
{
    .g-stat:nth-child(1)
    {
        margin-left: 40%;
    }
    .g-stat:nth-child(2)
    {
        margin-right: 40%;
    }
}
@media (max-width: 560px)
{
    .g-stat:nth-child(1)
    {
        margin-left: 20%;
    }
    .g-stat:nth-child(2)
    {
        margin-right: 20%;
    }
    .info-uname
    {
        grid-template-columns: auto;
        text-align: center;
    }
}
@media (max-width: 450px)
{
    .profile-stat
    {
        grid-template-columns: auto;
    }
    .g-stat:nth-child(1),.g-stat:nth-child(2)
    {
        margin: 0px 0px;
    }
    .inner-wrapper
    {
        height: 400px;
    }
}
@media (max-width: 320px)
{
    .inner-wrapper
    {
        height: 450px;
    }
}
    </style>
</head>
<body>
    <?php
    $conn = mysqli_connect("localhost","root","","profile");
    $res = mysqli_query($conn,"SELECT * from users WHERE email='sinehan001@gmail.com'");
    while($row=mysqli_fetch_assoc($res))
    {
    ?>
    <div class="wrapper">
        <div class="inner-wrapper">
            <span class="left-arrow">&#10539;</span>
            <span class="edit"><i class="fa fa-bars" style="font-size: 28px;"></i></span>
            <div class="nav" id="nav">
                <div class="navchild" onclick="window.location.href='editpro.php'">
                    <h2>Edit Profile</h2>
                </div>
                <hr />
                <div class="navchild" onclick="window.location.href='editpro.php'">
                    <h2>Logout</h2>
                </div>
            </div>
            <div class="profile-stat">
                <div class="g-stat">
                    <img class="img1" src="<?php 
                    if($row['image'])
                    {
                    echo "img/".$row['image'];
                    }
                    else 
                    {
                        echo "https://www.kindpng.com/picc/m/690-6904538_men-profile-icon-png-image-free-download-searchpng.png";
                    } ?>">
                </div>
                <div class="g-stat">
                    <h2><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></h2>
                    <h3><?php echo $row['bio']; ?></h3>
                    <p class="plan"><?php echo $row['pack']; ?> Pack</p>
                    <span class="upgrade"><button onclick="window.location.href='upgrade.php'">UPGRADE</button></span>
                </div>
            </div>
        </div>
        <h2 align="center">Personal Details</h2>
        <div class="display-info">
            <div class="info-uname">
                <div class="uname-stat">UserName</div>
                <div class="uname-stat"><?php echo $row['uname']; ?></div>
            </div>
            <hr />
            <div class="info-uname">
                <div class="uname-stat">Email</div>
                <div class="uname-stat"><?php echo $row['email']; ?></div>
            </div>
            <hr />
            <div class="info-uname">
                <div class="uname-stat">FirstName</div>
                <div class="uname-stat"><?php echo $row['fname']; ?></div>
            </div>
            <hr />
            <div class="info-uname">
                <div class="uname-stat">LastName</div>
                <div class="uname-stat"><?php echo $row['lname']; ?></div>
            </div>
            <hr />
            <div class="info-uname">
                <div class="uname-stat">Phone Number</div>
                <div class="uname-stat"><?php echo $row['phone']; ?></div>
            </div>
            <hr />
            <div class="info-uname">
                <div class="uname-stat">Address</div>
                <div class="uname-stat"><?php echo $row['address']; ?></div>
            </div>
        </div>
    </div>
    <?php } ?>
</body>
<script>
    $(document).ready(function(){
  $(".edit").click(function(){
    $(".nav").toggle();
  });
});
</script>
</html>