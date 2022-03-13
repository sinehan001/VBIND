<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Pricing Tables</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  padding: 20px;
  background: #333;
}
.back{
  width: auto;
  position: absolute;
  left: 20px;
  top: 20px;
  color: white;
  cursor: pointer;
  font-size: 28px;
}
.wrapper{
  max-width: 1090px;
  width: 100%;
  margin: 50px 0px;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
.wrapper .table{
  background: #fff;
  width: calc(33% - 20px);
  padding: 30px 30px;
  position: relative;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
  border-radius: 25px;
}
.table .price-section{
  display: flex;
  justify-content: center;
}
.table .price-area{
  height: 120px;
  width: 120px;
  border-radius: 50%;
  padding: 2px;
}
.price-area .inner-area{
  height: 100%;
  width: 100%;
  border-radius: 50%;
  border: 3px solid #fff;
  line-height: 117px;
  text-align: center;
  color: #fff;
  position: relative;
}
.price-area .inner-area .text{
  font-size: 25px;
  font-weight: 400;
  position: absolute;
  top: -10px;
  left: 17px;
}
.price-area .inner-area .price{
  font-size: 45px;
  font-weight: 500;
  margin-left: 16px;
}
.table .package-name{
  width: 100%;
  height: 2px;
  margin: 35px 0;
  position: relative;
}
.table .package-name::before{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 25px;
  font-weight: 500;
  background: #fff;
  padding: 0 15px;
  transform: translate(-50%, -50%);
}
.table .features li{
  margin-bottom: 15px;
  list-style: none;
  display: flex;
  justify-content: space-between;
}
.features li .list-name{
  font-size: 17px;
  font-weight: 400;
}
.features li .icon{
  font-size: 15px;
}
.features li .icon.check{
  color: #2db94d;
}
.features li .icon.cross{
  color: #cd3241;
}
.table .btn{
  width: 100%;
  display: flex;
  margin-top: 35px;
  justify-content: center;
}
.table .btn button{
  width: 80%;
  height: 50px;
  color: #fff;
  font-size: 20px;
  font-weight: 500;
  border: none;
  outline: none;
  border-radius: 25px;
  cursor: pointer;
  transition: all 0.3s ease;
}
.table .btn button:hover{
  border-radius: 5px;
}
.free .features li::selection{
  background: black;
}
.free ::selection,
.free .price-area,
.free .inner-area{
  background: black;
}
.free .btn button{
  border: 2px solid black;
  background: #fff;
  color: black;
}
.free .btn button:hover{
  background: black;
  color: #fff;
}
.basic .features li::selection{
  background: #D2042D;
}
.basic ::selection,
.basic .price-area,
.basic .inner-area{
  background: #D2042D;
}
.basic .btn button{
  border: 2px solid #D2042D;
  background: #fff;
  color: #D2042D;
}
.basic .btn button:hover{
  background: #D2042D;
  color: #fff;
}
.premium ::selection,
.premium .price-area,
.premium .inner-area,
.premium .btn button{
  background: #a26bfa;
}
.premium .btn button:hover{
  background: #833af8;
}
.ultimate ::selection,
.ultimate .price-area,
.ultimate .inner-area{
  background: #00a884;
}
.ultimate .btn button{
  border: 2px solid #00a884;
  color: #00a884;
  background: #fff;
}
.ultimate .btn button:hover{
  background: #00a884;
  color: #fff;
}
.free .package-name{
    background: black;
}
.basic .package-name{
  background: #ffecb3;
}
.premium .package-name{
  background: #d0b3ff;
}
.ultimate .package-name{
  background: #00a884;
}
.free .package-name::before
{
    content: "Free";
}
.basic .package-name::before{
  content: "Basic";
}
.premium .package-name::before{
  content: "Premium";
  font-size: 24px;
}
.ultimate .package-name::before{
  content: "Ultimate";
  font-size: 24px;
}
@media (max-width: 1020px) {
  .wrapper .table{
    width: calc(50% - 20px);
    margin-bottom: 40px;
  }
}
@media (min-width: 1020px)
{
    .wrapper .ultimate
    {
        margin-top: 50px;
    }
}
@media (max-width: 698px) {
  .wrapper .table{
    width: 100%;
  }
}
::selection{
  color: #fff;
}
.table .ribbon{
  width: 150px;
  height: 150px;
  position: absolute;
  top: -10px;
  left: -10px;
  overflow: hidden;
}
.table .ribbon::before{
  top: 0px;
  right: 15px;
}
.table .ribbon::after{
  bottom: 15px;
  left: 0px;
}
.premium .ribbon::before,
.premium .ribbon::after{
  position: absolute;
  content: "";
  z-index: -1;
  display: block;
  border: 7px solid #4606ac;
  border-top-color: transparent;
  border-left-color: transparent;
}
.premium .ribbon span{
  position: absolute;
  top: 30px;
  right: 0;
  transform: rotate(-45deg);
  width: 200px;
  background: #a26bfa;
  padding: 10px 0;
  color: #fff;
  text-align: center;
  font-size: 17px;
  text-transform: uppercase;
  box-shadow: 0 5px 10px rgba(0,0,0,0.12);
}
.free .ribbon::before,
.free .ribbon::after{
  position: absolute;
  content: "";
  z-index: -1;
  display: block;
  border: 7px solid black;
  border-top-color: transparent;
  border-left-color: transparent;
}
.free .ribbon span{
  position: absolute;
  top: 30px;
  right: 0;
  transform: rotate(-45deg);
  width: 200px;
  background: grey;
  padding: 10px 0;
  color: #fff;
  text-align: center;
  font-size: 17px;
  text-transform: uppercase;
  box-shadow: 0 5px 10px rgba(0,0,0,0.12);
}
.basic .ribbon::before,
.basic .ribbon::after{
  position: absolute;
  content: "";
  z-index: -1;
  display: block;
  border: 7px solid darkred;
  border-top-color: transparent;
  border-left-color: transparent;
}
.basic .ribbon span{
  position: absolute;
  top: 30px;
  right: 0;
  transform: rotate(-45deg);
  width: 200px;
  background: #D2042D;
  padding: 10px 0;
  color: #fff;
  text-align: center;
  font-size: 17px;
  text-transform: uppercase;
  box-shadow: 0 5px 10px rgba(0,0,0,0.12);
}
.ultimate .ribbon::before,
.ultimate .ribbon::after{
  position: absolute;
  content: "";
  z-index: -1;
  display: block;
  border: 7px solid green;
  border-top-color: transparent;
  border-left-color: transparent;
}
.ultimate .ribbon span{
  position: absolute;
  top: 30px;
  right: 0;
  transform: rotate(-45deg);
  width: 200px;
  background: #00a884;
  padding: 10px 0;
  color: #fff;
  text-align: center;
  font-size: 17px;
  text-transform: uppercase;
  box-shadow: 0 5px 10px rgba(0,0,0,0.12);
}
    </style>
</head>
<body>
  <div class="back">
    <span onclick="window.location.href='index.php'"><i class="fas fa-arrow-left"></i></span>
  </div>
  <div class="wrapper">
    <div class="table free">
        <div class="ribbon"><span>Free</span></div>
      <div class="price-section">
        <div class="price-area">
          <div class="inner-area">
            <span class="text">$</span>
            <span class="price">0</span>
          </div>
        </div>
      </div>
      <div class="package-name"></div>
      <ul class="features">
        <li>
          <span class="list-name">One Selected Template</span>
          <span class="icon check"><i class="fas fa-check"></i></span>
        </li>
        <li>
          <span class="list-name">100% Responsive Design</span>
          <span class="icon cross"><i class="fas fa-times"></i></span>
        </li>
        <li>
          <span class="list-name">Credit Remove Permission</span>
          <span class="icon cross"><i class="fas fa-times"></i></span>
        </li>
        <li>
          <span class="list-name">Lifetime Template Updates</span>
          <span class="icon cross"><i class="fas fa-times"></i></span>
        </li>
      </ul>
      <div class="btn"><button class="btn-button" onclick="window.location.href='purchase.php?pack=100'">Purchase</button></div>
    </div>
    <div class="table basic">
        <div class="ribbon"><span>Developer</span></div>
      <div class="price-section">
        <div class="price-area">
          <div class="inner-area">
            <span class="text">$</span>
            <span class="price">29</span>
          </div>
        </div>
      </div>
      <div class="package-name"></div>
      <ul class="features">
        <li>
          <span class="list-name">One Selected Template</span>
          <span class="icon check"><i class="fas fa-check"></i></span>
        </li>
        <li>
          <span class="list-name">100% Responsive Design</span>
          <span class="icon check"><i class="fas fa-check"></i></span>
        </li>
        <li>
          <span class="list-name">Credit Remove Permission</span>
          <span class="icon cross"><i class="fas fa-times"></i></span>
        </li>
        <li>
          <span class="list-name">Lifetime Template Updates</span>
          <span class="icon cross"><i class="fas fa-times"></i></span>
        </li>
      </ul>
      <div class="btn"><button onclick="window.location.href='purchase.php?pack=101'">Purchase</button></div>
    </div>
    <div class="table premium">
      <div class="ribbon"><span>Recommended</span></div>
      <div class="price-section">
        <div class="price-area">
          <div class="inner-area">
            <span class="text">$</span>
            <span class="price">59</span>
          </div>
        </div>
      </div>
      <div class="package-name"></div>
      <ul class="features">
        <li>
          <span class="list-name">Five Existing Templates</span>
          <span class="icon check"><i class="fas fa-check"></i></span>
        </li>
        <li>
          <span class="list-name">100% Responsive Design</span>
          <span class="icon check"><i class="fas fa-check"></i></span>
        </li>
        <li>
          <span class="list-name">Credit Remove Permission</span>
          <span class="icon check"><i class="fas fa-check"></i></span>
        </li>
        <li>
          <span class="list-name">Lifetime Template Updates</span>
          <span class="icon cross"><i class="fas fa-times"></i></span>
        </li>
      </ul>
      <div class="btn"><button onclick="window.location.href='purchase.php?pack=102'">Purchase</button></div>
    </div>
    <div class="table ultimate">
        <div class="ribbon"><span>Business</span></div>
      <div class="price-section">
        <div class="price-area">
          <div class="inner-area">
            <span class="text">$</span>
            <span class="price">99</span>
          </div>
        </div>
      </div>
      <div class="package-name"></div>
      <ul class="features">
        <li>
          <span class="list-name">All Existing Templates</span>
          <span class="icon check"><i class="fas fa-check"></i></span>
        </li>
        <li>
          <span class="list-name">100% Responsive Design</span>
          <span class="icon check"><i class="fas fa-check"></i></span>
        </li>
        <li>
          <span class="list-name">Credit Remove Permission</span>
          <span class="icon check"><i class="fas fa-check"></i></span>
        </li>
        <li>
          <span class="list-name">Lifetime Template Updates</span>
          <span class="icon check"><i class="fas fa-check"></i></span>
        </li>
      </ul>
      <div class="btn"><button onclick="window.location.href='purchase.php?pack=103'">Purchase</button></div>
    </div>
  </div>
</body>
<script>
  var a = document.getElementsByTagName('button')[
      <?php
          $conn = mysqli_connect("localhost","root","","profile");
          $res = mysqli_query($conn,"SELECT * from users WHERE email='sinehan001@gmail.com'");
          while($row=mysqli_fetch_assoc($res))
          {
           if($row['pack']=='Free')
           {
               echo "0";
           }
           if($row['pack']=='Developer')
           {
               echo "1";
           }
           if($row['pack']=='Premium')
           {
               echo "2";
           }
           if($row['pack']=='Business')
           {
               echo "3";
           }
          }
    ?>];
    a.innerHTML="Purchased";
    a.style.backgroundColor="transparent";
    a.style.color="black";
    a.style.border="none";
    a.addEventListener('click', () => {
        alert("Already Purchased");
    }); 
    if(a.innerHTML=='Purchased')
    {
      a.onclick='';
    }
</script>
</html>