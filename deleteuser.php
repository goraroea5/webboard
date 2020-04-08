<?php
 session_start();
 include 'include.php';
 if(!isset($_SESSION["username"])){
    echo '<center><h3 style="color:red;">คุณยังไม่ได้เข้าสู่ระบบกรุณาเข้าสู่ระบบก่อน</h3></center>';
    echo '<center><a href="index.php">เข้าสู่ระบบ</a></center>';
    exit();
}else{
    
        $UserID = $_GET["UserID"];
	    $sql = "DELETE FROM user
            WHERE UserID = '".$UserID."'";


        if ($link->query($sql) === TRUE) {
             echo "<script>alert('ลบสมาชิก ".$UserID." แล้ว')</script>";
            header('refresh: 0; url=listuser.php');
        } else {
            echo "<script>alert('เกิดข้อผิดพลาด')</script>";
            header('refresh: 0; url=listuser.php');
            $link->error;
        }
    
}
$link->close();
?>