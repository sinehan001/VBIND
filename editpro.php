<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="editcss.css">
    <title>Edit Profile</title>
</head>
<body onload="checkup()">
  <div class="head">
    <h2>Edit Profile</h2>
  </div>
  <?php
    $conn = mysqli_connect("localhost","root","","profile");
    $res = mysqli_query($conn,"SELECT * from users WHERE email='sinehan001@gmail.com'");
    while($row=mysqli_fetch_assoc($res))
    {
  ?>
  <div class="form-wrap">
  <div class="container">
    <div class="avatar-upload">
    <form method="POST" id="formimg" action='update.php' enctype="multipart/form-data">
        <div class="avatar-edit">
            <input type='file' name="image" onchange="mserver()" id="imageUpload" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload"></label>
        </div>
    </form>
        <div class="avatar-preview">
            <div id="imagePreview" style="background-image: url(<?php
            if($row['image'])
            {
             echo "img/".$row['image'];
             }
             else
             {
               echo "https://www.kindpng.com/picc/m/690-6904538_men-profile-icon-png-image-free-download-searchpng.png";
             } ?>);">
            </div>
        </div>
    </div>
</div>
<form method="POST" action='<?php echo $_SERVER['PHP_SELF']; ?>' enctype="multipart/form-data">
    <div class="animate-label">
      <input type="email" id="email" name="email" onchange="run()" value="<?php echo $row['email']; ?>" required/>
      <label for="email"> Email Id </label>
      <line></line>
    </div>
    <div class="animate-label">
      <input type="text" id="username" name="uname" value="<?php echo $row['uname']; ?>" required/>
      <label for="username"> Username </label>
      <line></line>
    </div>
    <div class="animate-label">
      <input type="text" id="fname" name="fname" value="<?php echo $row['fname']; ?>" required/>
      <label for="username"> First Name </label>
      <line></line>
    </div>
    <div class="animate-label">
      <input type="text" id="lname" name="lname" value="<?php echo $row['lname']; ?>" required/>
      <label for="lname"> Last Name </label>
      <line></line>
    </div>
    <div class="animate-label">
      <input type="number" id="number" name="phone" value="<?php echo $row['phone']; ?>" required/>
      <label for="number"> Phone Number </label>
      <line></line>
    </div>
    <div class="animate-label">
      <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>" required/>
      <label for="address"> Address </label>
      <line></line>
    </div>
    <div class="animate-label">
      <input type="text" id="bio" name="bio" onkeyup="count(this)" value="<?php echo $row['bio']; ?>" maxlength="120" required/>
      <label for="bio"> About Me </label>
      <line></line>
    </div>
    <p id="char" align="right"></p>
    <br />
    <div class="submitBtn">
      <input type="submit" name="submit" value="submit" onclick="mob()">
    </div>
  </form>
  </div>
  <?php
    }
  ?>
  <br />
  <br />
</body>
<?php 
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
    $conn = mysqli_connect("localhost","root","","profile");
    $id = mysqli_query($conn,"SELECT id from users WHERE email='sinehan001@gmail.com'");
    if($row=mysqli_fetch_assoc($id));
    {
        $_SESSION['id']=$row['id'];
    }
    if(isset($_POST['submit']))
    {
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $bio = $_POST['bio'];
        $sql = "UPDATE users SET fname='$fname',lname='$lname',uname='$uname',email='$email',phone='$phone',address='$address',bio='$bio' WHERE id='".$_SESSION['id']."'";
        if(mysqli_query($conn,$sql))
        {
            header("Location: index.php");
        }
        else 
        {
            header("Location: index.php");
        }
      }
    }
?>
<script>
  function run()
  {
    var val = document.getElementById("email").value;
    if(val.indexOf("@")==-1||val.indexOf("@")==val.length-1)
    {
      document.getElementById("email").value="";
      alert("Please Enter valid email address");
    }
  }
  function mob()
  {
    var num = document.getElementById("number").value;
    var snum = num.toString();
    if(snum.length!=10)
    {
      document.getElementById("number").value="";
      alert("Please enter valid Phone Number");
    }
  }
  function mserver()
  {
    document.getElementById("formimg").submit();
  }
  function checkup()
  {
    var val = document.getElementById('bio').value;
    document.getElementById('char').innerHTML=val.length+'/120 characters';
  }
  function count(obj){
    document.getElementById("char").innerHTML = obj.value.length+'/120 characters';
}
</script>
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
</script>
</html>