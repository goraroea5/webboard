<?php
    session_start();
    include 'include.php';
    //session_destroy();
    if(!isset($_SESSION["username"])){
      echo '<center><h3 style="color:red;">คุณยังไม่ได้เข้าสู่ระบบกรุณาเข้าสู่ระบบก่อน</h3></center>';
      echo '<center><a href="index.php">เข้าสู่ระบบ</a></center>';
      exit();
    }else{
        if(isset($_GET["Action"]) == "Save")
        {
            //*** Insert Question ***//
            $_POST["txtName"] = $_SESSION["username"];
	        $strSQL = "INSERT INTO webboard ";
	        $strSQL .="(CreateDate,Question,Details,Name) ";
	        $strSQL .="VALUES ";
	        $strSQL .="('".date("Y-m-d H:i:s")."','".$_POST["txtQuestion"]."','".$_POST["txtDetails"]."','".$_POST["txtName"]."') ";
	        $objQuery = mysqli_query($link,$strSQL);
	
	        header("location:webboard.php");
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>ตั้งกระทู้ใหม่</title>
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
<div id="login">
<div align="center">
<form action="NewQuestion.php?Action=Save" method="post" name="frmMain" id="frmMain">
<table width="909" border="1">
  <tr><img src="img/new.png" width="50"><h1 style="margin-bottom: 20px;">ตั้งกระทู้คำถามใหม่</h1></tr>'
  <tr><td colspan = "6" align="right" style="background-color: #ad700e; color: white; "><?php echo "ชื่อผู้ใช้งาน : ".$_SESSION["username"]." &nbsp"  ;?></td></tr>
    <tr>
      <td width="100">ชื่อกระทู้ตั้งคำถาม : </td>
      <td><input name="txtQuestion" type="text" id="txtQuestion" value="" size="70"></td>
    </tr>
    <tr>
      <td width="90">รายละเอียด : </td>
      <td><textarea name="txtDetails" cols="50" rows="5" id="txtDetails"></textarea></td>
    </tr>
    <tr>
      <td width="90">ชื่อผู้ใช้งาน : </td>
      <td width="647"><input name="txtName" type="hidden" id="txtName" value="" size="50"><?php echo $_SESSION["username"];?></td>
    </tr>
    <tr>
        <td colspan= "2" align="center"><button type="submit" id="btnSave" name="btnSave"><img src="img/new.png" width="20" ><p>ตั้งกระทู้ใหม่</p></button></td>

    </tr>
</table> 
</form>
</div> 
</div>

</body>
</html>