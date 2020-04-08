<?php 
	session_start();
	error_reporting(0);

	include 'include.php';

	$sql = "SELECT * FROM user ORDER BY userid DESC";

	$result2 =mysqli_query($link,$sql);
	$objResult2 = mysqli_fetch_array($result2,MYSQLI_NUM);

	$id = $_SESSION["userid"] = $objResult2[0]+1;
	$level = $_SESSION["level"] = $objResult2[5];

	mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
	<title>ยินดีต้อนรับเข้าสู่เว็บบอร์ด</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="top-register"><img src="img/new-user.png" width="50"><h1>สมัครสมาชิก</h1></div>
	
	<div id="login">
	<table>
		<form method="POST" action="#">
		<tr hidden><td>รหัสผู้ใช้งาน (Userid) : </td><td><input type="hidden"><?php echo $_SESSION['userid']; ?></td></tr>
		<tr><td>ชื่อผู้ใช้งาน (Username) : </td><td><input type="text" name="username" pattern="[a-zA-Z0-9\s]+" title="กรุณากรอกตัวอักษรหรือตัวเลขเป็นภาษาอังกฤษ" 
		placeholder="กรุณาใส่กรอกข้อมูล" required autofocus></td></tr>
		<tr><td>รหัสผ่าน (Password) : </td><td><input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
		title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
		placeholder="กรุณาใส่กรอกข้อมูล" required></td></tr>
		<tr><td>ชื่อ (Firstname) : </td><td><input type="text" name="name" pattern="[a-zA-Zก-ุฯ-๙\s]*" title="กรุณากรอกตัวอักษร" 
		placeholder="กรุณาใส่กรอกข้อมูล" required></td></tr>
		<tr><td>นามสกุล (Lastname) : </td><td><input type="text" name="lname" pattern="[a-zA-Zก-ุฯ-๙\s]*" title="กรุณากรอกตัวอักษร" 
		placeholder="กรุณาใส่กรอกข้อมูล" required></td></tr>

		<!--tr hidden><td>Email : </td><td><input type="email" name ="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please Enter Email" 
		placeholder="กรุณาใส่กรอกข้อมูล"></td></tr-->
		<tr hidden><td>ระดับ (Level) : </td><td><input type="hidden"><?php echo strtoupper($_SESSION['level']); ?></td></tr>

		<tr><td align="center" ><button type="submit" name="register"><img src="img/new-user.png" width="20" ><p>สมัครสมาชิก</p></button></td><td align="center" ><button onclick="window.location.href='index.php'" style="background-color: #de5e41"><img src="img/exit.png" width="20" ><p>ย้อนกลับ</p></button></td> </tr>
		</form>
	</table>
	</div>

	<?php 
		if (isset($_POST['register'])) {
			$userid = $_SESSION['userid'];
			$username = test_input($_POST["username"]);
			$pass = test_input($_POST["password"]);
			$name = test_input($_POST["name"]);
			$lname = test_input($_POST["lname"]);

			include 'include.php';


			if ( (!preg_match('/^[a-zA-Z0-9 ]+$/', $username)) && (!preg_match('/^[a-zA-Z0-9 ]+$/', $pass)) ) {
				echo "<script>alert('ชื่อผู้ใช้และรหัสผ่าน ไม่สามารถตั้งได้')</script>";
			}else if( (!preg_match('/^[a-zA-Z0-9 ]+$/', $username)) ){
				echo "<script>alert('ชื่อผู้ใช้ ไม่สามารถตั้งได้')</script>";
			}else if( (!preg_match('/^[a-zA-Z0-9 ]+$/', $pass)) ){
				echo "<script>alert('รหัสผ่าน ไม่สามารถตั้งได้')</script>";
			}else if ( (!preg_match("/^[ก-๙a-zA-Z ]*$/",$name)) && (!preg_match("/^[ก-๙a-zA-Z ]*$/",$lname)) ) {
				echo "<script>alert('ชื่อและนามสกุล ไม่สามารถตั้งได้')</script>";
			}else if (!preg_match("/^[ก-๙a-zA-Z ]*$/",$name)){
				echo "<script>alert('ชื่อ ไม่สามารถตั้งได้')</script>";
			}else if (!preg_match("/^[ก-๙a-zA-Z ]*$/",$lname)){
				echo "<script>alert('นามสกุล ไม่สามารถตั้งได้')</script>";
			}else{
				
				$insert = "INSERT INTO user VALUES ('$userid','$username','$pass','$name','$lname','$level')";
				$result = mysqli_query($link,$insert);

				mysqli_close($link);

				if (!$result) {
					echo "<script>alert('ไม่สามารถเพิ่มข้อมูลได้ กรุณาตรวจสอบใหม่อีกครั้ง')</script>";
				}else{
					echo "<script>alert('สมัครสมาชิกสำเร็จ คลิกที่นี่เพื่อกลับหน้าเข้าสู่ระบบ')</script>";
					header('refresh: 0; url=index.php');
				}
			}
		}

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		  }
		


	 ?>

</body>
</html>