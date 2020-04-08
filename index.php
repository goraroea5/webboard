<?php 
	session_start();
	error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>กรุณาล๊อคอินเพื่อใช้งาน</title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="image/x-icon" href="img/board.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php 
		include 'include.php';
		if (isset($_POST["login"])) {
			if(isset($_POST["username"]) && isset($_POST["password"])) {
				$username = $_POST["username"];
				$pass = $_POST["password"];


				$sql = "SELECT * FROM user WHERE username = '".mysqli_real_escape_string($link,$_POST['username'])."'
				and Password = '".mysqli_real_escape_string($link,$_POST['password'])."'";

				$result = mysqli_query($link,$sql);
				$objResult = mysqli_fetch_array($result,MYSQLI_NUM);
				$level = $_SESSION["level"] = $objResult[5];

				if(!$objResult){

					echo "<script>alert('ชื่อผู้ใช้งาน หรือ รหัสผ่านไม่ถูกต้อง')</script>";
				}
				else
				{
					  
					//$_SESSION["pass"] = $pass;
					$showname = $_SESSION["username"]=$objResult[3];

					session_write_close();

					if($level == "admin")
					{
						//echo "<script>alert('ยินดีต้อนรับคุณ ".$showname." เข้าสู่ระบบ, คุณมีสิทธิ์อยู่ในระดับ ".strtoupper($level)."')</script>";
						echo "<script>alert('ยินดีต้อนรับคุณ ".$showname." เข้าสู่ระบบ')</script>";
						header('refresh: 0; url=webboard.php');
					}
					else
					{
						echo "<script>alert('ยินดีต้อนรับคุณ ".$showname." เข้าสู่ระบบ')</script>";
						header('refresh: 0; url=webboard.php');
					}
				}
				mysqli_close($link);
			}
			
		}/*else{
			echo "<script>alert('ไม่พบข้อมูล')</script>";
		}*/

	 ?>
	<div id="top"><img src="img/login.png" width="110" style="margin-top: 10px;"><h1>กรุณาล๊อคอินเข้าสู่ระบบ</h1></div>

	<div id="login">
		<table align="center">
			<form method="POST" action="index.php">
			<tr><td><img src="img/user.png" width="70"></td><td><input type="text" name="username" placeholder="กรอกชื่อผู้ใช้งาน" required ></td></tr>
			<tr><td><img src="img/key.png" width="70"></td><td><input type="password" name="password" placeholder="กรอกรหัสผ่าน" required></td></tr>
			<tr><td colspan="2" align="center"><button type="submit" name="login"><img src="img/enter.png" width="20" ><p>เข้าสู่ระบบ</p></button></td> </tr>
			<tr><td colspan="2" align="center" ><button onclick="window.location.href='register.php'"><img src="img/new-user.png" width="20" ><p>สมัครสมาชิก</p></button></td> </tr>
			</form>
		</table>
	</div>

</body>

</html>