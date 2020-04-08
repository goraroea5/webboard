<?php
    session_start();
    include 'include.php';
    date_default_timezone_set('Asia/Dhaka');
    $date =date("Y-m-d");
    if(!isset($_SESSION["username"])){
        echo '<center><h3 style="color:red;">คุณยังไม่ได้เข้าสู่ระบบกรุณาเข้าสู่ระบบก่อน</h3></center>';
        echo '<center><a href="index.php">เข้าสู่ระบบ</a></center>';
        exit();
    }else{

        if(isset($_GET["Action"]) == "Save")
        {
            //*** Insert Reply ***//
            $_POST["txtName"] = $_SESSION["username"];
	        $strSQL = "INSERT INTO reply ";
	        $strSQL .="(QuestionID,CreateDate,Details,Name) ";
	        $strSQL .="VALUES ";
	        $strSQL .="('".$_GET["QuestionID"]."','".date("Y-m-d H:i:s")."','".$_POST["txtDetails"]."','".$_POST["txtName"]."') ";
	        $objQuery = mysqli_query($link,$strSQL);
	
	        //*** Update Reply ***//
	        $strSQL = "UPDATE webboard ";
	        $strSQL .="SET Reply = Reply + 1 WHERE QuestionID = '".$_GET["QuestionID"]."' ";
	        $objQuery = mysqli_query($link,$strSQL);	
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>กระทู้ : <?php echo $_GET["QuestionID"] ; ?></title>
    <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="shortcut icon" type="image/x-icon" href="img/board.ico" />
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
<div id="reply">
<?php
//*** Select Question ***//
$strSQL = "SELECT * FROM webboard  WHERE QuestionID = '".$_GET["QuestionID"]."' ";
$objQuery = mysqli_query($link,$strSQL) or die ("Error Query [".$strSQL."]");
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
//*** Update View ***//
$strSQL = "UPDATE webboard ";
$strSQL .="SET View = View + 1 WHERE QuestionID = '".$_GET["QuestionID"]."' ";
$objQuery = mysqli_query($link,$strSQL);	
?>
<div align="center">
<table width="909" border="1">
    <tr>
        <td colspan="2"><center><h1><?=$objResult["Question"];?></h1></center></td>
    </tr>
    <tr>
        <td height="53" colspan="2"><?=nl2br($objResult["Details"]);?></td>
    </tr>
    <tr>
        <td width="397">Name : <?php echo $objResult["Name"];?> Create Date : <?php echo $objResult["CreateDate"];?></td>
        <td width="253">View : <?=$objResult["View"];?> Reply : <?=$objResult["Reply"];?></td>
    </tr>
</table> 
</div>

<br>
<br>

<?php
$intRows = 0;
$strSQL2 = "SELECT * FROM reply  WHERE QuestionID = '".$_GET["QuestionID"]."' ";
$objQuery2 = mysqli_query($link,$strSQL2) or die ("Error Query [".$strSQL."]");
while($objResult2 = mysqli_fetch_array($objQuery2,MYSQLI_ASSOC))
{
	$intRows++;
?>
<table width="738" border="1" cellpadding="1" cellspacing="1"  style="background-color: #bba67f; margin-right: 50px;">
  <tr ><td colspan="2"> &nbsp No : <?php echo $intRows;?></td></tr>
  <tr>
    <td height="53" colspan="2"><?=nl2br($objResult2["Details"]);?></td>
  </tr>
  <tr>
    <td width="397">Name :
        <?=$objResult2["Name"];?>      </td>
    <td width="253">Create Date :
    <?=$objResult2["CreateDate"];?></td>
  </tr>
</table><br>

<?php
}
?>
<br>

<button onclick="window.location.href='webboard.php'" style="margin-left: 500px; padding: 10px 90px 10px 90px; background-color:#de5e41" ><img src="img/back.png" width="20" ><p>ย้อนกลับ</p></button>
<br>
<br>
<br>
<form action="ViewWebboard.php?QuestionID=<?=$_GET["QuestionID"];?>&Action=Save" method="post" name="frmMain" id="frmMain">
  <table width="738" border="1" cellpadding="1" cellspacing="1">
    <tr>
      <td width="78" style="background-color: #836c4d;" align="center">ตอบกระทู้</td>
      <td><textarea name="txtDetails" cols="50" rows="5" id="txtDetails"></textarea></td>
    </tr>
    <tr>
      <td width="78" align="center">Name : </td>
      <td width="647"><input name="txtName" type="hidden" id="txtName" value="" size="50"><?php echo $_SESSION["username"];?></td>
    </tr>
  </table>
     <button type="submit" id="btnSave" name="btnSave" style="margin-left: 350px; margin-top: 20px;"><img src="img/new.png" width="20" ><p>ตอบกระทู้</p></button> 
</form>

      
</div> 



</body>
</html>

<?php
mysqli_close($link);
?>