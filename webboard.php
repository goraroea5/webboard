<?php
  session_start();
  include 'include.php';
  //session_destroy();
  if(!isset($_SESSION["username"])){
    echo '<center><h3 style="color:red;">คุณยังไม่ได้เข้าสู่ระบบกรุณาเข้าสู่ระบบก่อน</h3></center>';
    echo '<center><a href="index.php">เข้าสู่ระบบ</a></center>';
    exit();
  }else{

    $sql = "SELECT * FROM webboard";

    $result2 = mysqli_query($link,$sql);
    //$objResult = mysqli_fetch_array($result2,MYSQLI_NUM);

    $Num_Rows = mysqli_num_rows($result2);

    $Per_Page = 10;   // Per Page
    
    @$Page = $_GET["Page"];
    if(!isset($_GET["Page"]))
    {
	    $Page=1;
    }

    $Prev_Page = $Page-1;
    $Next_Page = $Page+1;

    $Page_Start = (($Per_Page*$Page)-$Per_Page);
    if($Num_Rows<=$Per_Page)
    {
	    $Num_Pages =1;
    }
    else if(($Num_Rows % $Per_Page)==0)
    {
	    $Num_Pages =($Num_Rows/$Per_Page) ;
    }
    else
    {
	    $Num_Pages =($Num_Rows/$Per_Page)+1;
	    $Num_Pages = (int)$Num_Pages;
    }

    $sql = "SELECT * FROM webboard ORDER BY QuestionID DESC LIMIT $Page_Start , $Per_Page";
    //$sql .= " order  by QuestionID DESC LIMIT $Page_Start , $Per_Page";
    $result2 = mysqli_query($link,$sql) or die ("Error Query [".$sql."]");

    //mysqli_close($link);
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>ยินดีต้อนรับเข้าสู่เว็บบอร์ด</title>
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
<table width="909" border="1" style="border-radius: 5px;">
  <tr>
    
    <td colspan = "6" align="right" style="background-color: #ad700e; color: white; "><?php echo "ชื่อผู้ใช้งาน : ".$_SESSION["username"]." &nbsp"  ;?></td>
  </tr>
  <tr>
    <th width="99"> <div align="center">QuestionID</div></th>
    <th width="458"> <div align="center">Question</div></th>
    <th width="90"> <div align="center">Name</div></th>
    <th width="130"> <div align="center">CreateDate</div></th>
    <th width="45"> <div align="center">View</div></th>
    <th width="47"> <div align="center">Reply</div></th>
  </tr>
  <?php
    while($objResult2 = mysqli_fetch_array($result2,MYSQLI_NUM))
    {
    ?>
  <tr>
    <td><div align="center"><?php echo $objResult2[0];?></div></td>
    <td><a href="ViewWebboard.php?QuestionID=<?php echo $objResult2[0];?>"><?php echo $objResult2[2];?></a></td>
    <td><?php echo $objResult2[4];?></td>
    <td><div align="center"><?php echo $objResult2[1];?></div></td>
    <td align="right"><?php echo $objResult2[5];?></td>
    <td align="right"><?php echo $objResult2[6];?></td>
    
  </tr>
    <?php
    }
    ?>
</table> 

<br>
จำนวนกระทู้ <?php echo $Num_Rows;?> จำนวนหน้า : <?php echo $Num_Pages;?> Page :
<?php
if($Prev_Page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Next>></a> ";
}
mysqli_close($link);
?>
</div> 
</div>

</body>
</html>