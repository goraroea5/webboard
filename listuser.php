<?php
  session_start();
  include 'include.php';
  //session_destroy();
  if(!isset($_SESSION["username"])){
    echo '<center><h3 style="color:red;">คุณยังไม่ได้เข้าสู่ระบบกรุณาเข้าสู่ระบบก่อน</h3></center>';
    echo '<center><a href="index.php">เข้าสู่ระบบ</a></center>';
    exit();
  }else{
      if($_SESSION["level"] == "admin"){
        //echo "<script>alert('admin')</script>";
        //$sql = "SELECT * FROM Data WHERE Firstname='ram'"; 
        $sql = "SELECT * FROM user WHERE level = 'user' ORDER BY userid ASC";

	    $result = mysqli_query($link,$sql);
	    
      }else{
        echo "<script>alert('user')</script>";
      }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>จัดการสมาชิก</title>
    <meta charset="UTF-8">
	<link rel="shortcut icon" type="image/x-icon" href="img/board.ico" />
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div id="top">
   <?php 
          if ($_SESSION["level"]=='admin') {
           ?>
            <div id="nav">
              <ul>
                <li><a href="webboard.php"><img src="img/house.png" width="30">หน้าแรก</a></li>
                <li><a href="NewQuestion.php"><img src="img/new.png" width="30">ตั้งกระทู้ใหม่</a></li>
                <li><a href="webboard2.php"><img src="img/new.png" width="30">จัดการกระทู้</a></li> 
                <li><a href="listuser.php"><img src="img/new.png" width="30">จัดการสมาชิก</a></li> 
                <li style="background-color: #de5c41"><a href="logout.php"> <img src="img/exit.png" width="30">Logout</a></li>
              </ul>
            </div>
    <?php 
          }else{
            ?>
             <div id="nav">
              <ul style="margin-left: 100px;">
                <li style="margin-left: 80px;"><a href="webboard.php"><img src="img/house.png" width="30">หน้าแรก</a></li>
                <li style="margin-left: 80px;"><a href="NewQuestion.php"><img src="img/new.png" width="30">ตั้งกระทู้ใหม่</a></li> 
                <li style="background-color: #de5c41; margin-left: 80px;"><a href="logout.php"> <img src="img/exit.png" width="30">Logout</a></li>
              </ul>
            </div>
      <?php  
          }
     ?>
   </div>
<div align="center">
<div id="login">
<table width="909" border="1">
<tr>
 <td colspan = "5" align="right" style="background-color: #ad700e; color: white; "><?php echo "ชื่อผู้ใช้งาน : ".$_SESSION["username"]." &nbsp"  ;?></td>
</tr>
<tr>
    <th width="99"> <div align="center">UserID</div></th>
    <th width="458"> <div align="center">Username</div></th>
    <th width="90"> <div align="center">Name</div></th>
    <th width="130"> <div align="center">Lastname</div></th>
    <?php
      if($_SESSION["level"] == "admin") 
      { 
        echo "<th>Delete</td>";
      }
    ?>
  </tr>
  <?php
    while($objResult = mysqli_fetch_array($result,MYSQLI_NUM))
    {
    ?>
  <tr>
    <td><div align="center"><?php echo $objResult[0];?></div></td>
    <td><div align="center"><?php echo $objResult[1];?></div></td>
    <td><div align="center"><?php echo $objResult[3];?></div></td>
    <td><div align="center"><?php echo $objResult[4];?></div></td>
    
    <?php
      if($_SESSION["level"] == "admin") 
      { 
        echo "<td><a href=\"deleteuser.php?UserID=$objResult[0]\"> Delete</a></td>";
      }
    ?>
    
  </tr>
    <?php
    }//end while loop
    date_default_timezone_set("Asia/Bangkok");
    if($_SESSION["level"] == "admin") 
    { 
      echo "<tr><td colspan=\"7\" align=\"center\">Today is " . date("d/m/Y") .  "<br> The time is " . date("H:i") ."</td></tr>";
    }else{
      echo "<tr><td colspan=\"6\" align=\"center\">Today is " . date("d/m/Y") .  "<br> The time is " . date("H:i") ."</td></tr>";
    }
    mysqli_close($link);
    ?>

</table> 
</div>
</div> 


</body>
</html>