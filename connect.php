<?php
  $servername = "mysql.db.mdbgo.com";
  $username = "psjdcol_psjdcol";
  $password = "Psjd123456@";
  $dbname = "psjdcol_psjd";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  mysqli_set_charset($conn, "utf8");
  //echo "Connected successfully  <br>";
?>