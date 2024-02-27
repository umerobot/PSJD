<?php
  include('connect.php');

  // Update data
  $userID = $_POST['userID'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $faculty = $_POST['faculty'];

  $sql = "UPDATE member SET 
  `Username` = '$username', 
  `Password` = '$password',
  `Name` = '$name',
  `Faculty` = '$faculty',
  `Status` = 'USER' 
  WHERE UserID = '$userID'";

  if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Update เรียบร้อยแล้ว");window.location="admin_page.php";</script>';
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>