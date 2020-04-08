<?php
 session_start();
 include 'include.php';
 if(!isset($_SESSION["username"])){
    echo '<center><h3 style="color:red;">คุณยังไม่ได้เข้าสู่ระบบกรุณาเข้าสู่ระบบก่อน</h3></center>';
    echo '<center><a href="index.php">เข้าสู่ระบบ</a></center>';
    exit();
}else{
    //$sql = "DELETE FROM MyGuests WHERE id=3";

    $QuestionID = $_GET["QuestionID"];
	$sql = "DELETE FROM webboard
        WHERE QuestionID = '".$QuestionID."'";

    //$query = mysqli_query($conn,$sql);
    
    $sql2 = "DELETE FROM reply
            WHERE QuestionID = '".$QuestionID."' ";
    $query2 = mysqli_query($link,$sql2);

    if ($link->query($sql) === TRUE) {
        echo "<script>alert('ลบกระทู้ ".$QuestionID." แล้ว')</script>";
        header('refresh: 0; url=webboard2.php');
    } else {
        echo "Error deleting record: " . $link->error;
    }
}
$link->close();
?>