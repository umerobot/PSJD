<?php
  session_start();
  include('connect.php');
  // Query data
  $username = $_POST['id'];
  $password = $_POST['password'];

  // echo "$ID";
  // echo "$password";

	$sql = "SELECT * FROM member WHERE Username ='$username' AND Password ='$password'";
  $result = $conn->query($sql);
	
  if($result->num_rows > 0){
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $_SESSION['UserID'] = $row['UserID'];
      $_SESSION['username'] = $row['Username'];
      $_SESSION['password'] = $row['Password'];
      $_SESSION['name'] = $row['Name'];
      $_SESSION['fcTy'] = $row['Faculty'];
      $_SESSION['status'] = $row['Status'];

      //เช็คว่ามีตัวแปร session อะไรบ้าง
      //   print_r($_SESSION);
 
      //  exit();// 
      
      if($_SESSION['status'] == "ADMIN"){
        echo "<script>"; 
          echo "window.location='admin_page.php'";
        echo "</script>";
      }else if($_SESSION['status'] == "USER" && $fcTy != " "){
        echo "<script>"; 
          echo "window.location='user_page.php'";
        echo "</script>";
      }else{
        echo "<script>";
          echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
          echo "window.history.back()";
        echo "</script>";
      }
    }
  } else {
    echo "<script>";
      echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
      echo "window.history.back()";
    echo "</script>";
  }

  // $conn->close();

?>

