<?php
  include('connect.php');

  // Update data
  $userID = $_GET['UserID'];
 
  $sql = "DELETE FROM member WHERE UserID = '$userID'";

  if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Delete เรียบร้อยแล้ว");window.location="admin_page.php";</script>';
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>