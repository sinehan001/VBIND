<?php 
    session_start();
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
    $conn = mysqli_connect("localhost","root","","profile");
    $id = mysqli_query($conn,"SELECT id from users WHERE email='sinehan001@gmail.com'");
    if($row=mysqli_fetch_assoc($id));
    {
        $_SESSION['id']=$row['id'];
    }
        $filename = $_FILES['image']['name'];
        echo "<script>alert('".$filename."');</script>";
        $tempname = $_FILES['image']['tmp_name'];
        $folder = "img/".$filename;
        if(move_uploaded_file($tempname,$folder))
        {
            $msg ="Image uploaded Successfully";
        }
        else{
            $msg = "Failed to Upload Image";
        }
        $sql = "UPDATE users SET image='$filename' WHERE id='".$_SESSION['id']."'";
        if(mysqli_query($conn,$sql))
        {
            header("Location: editpro.php");
        }
        else 
        {
            header("Location: index.php");
        }
}
?>