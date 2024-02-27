<?php
  include('connect.php');

  // Insert data
  $username = $_POST['username'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $faculty = $_POST['faculty'];
  

  $sql = "INSERT INTO member (`Username`, `Password`, `Name`, `Faculty`, `Status`)
  VALUES ('".$username."', '".$password."', '".$name."', '".$faculty."', 'USER')";

  if ($conn->query($sql) === TRUE) {
    echo '<script>alert("ลงทะเบียนเรียบร้อยแล้ว");window.location="admin_page.php";</script>';
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>