<?php
  include('connect.php');

  // Insert data

  for ($i = 1; $i<= (int)$_POST["hdnCount"]; $i++){
    if(isset($_POST["ID$i"]))
    {
        if($_POST["ID$i"] != "" && 
                $_POST["faculty$i"] != "" &&
                $_POST["name$i"] != "" &&
                $_POST["link$i"] != "" &&
                $_POST["ResultID$i"] != "" &&
                $_POST["ResultLink$i"] != "" )
        {
            $sql = "INSERT INTO class (ID, Faculty, Name, Link, ResultID, ResultLink) 
                VALUES ('".$_POST["ID$i"]."','".$_POST["faculty$i"]."','".$_POST["name$i"]."'
                ,'".$_POST["link$i"]."','".$_POST["ResultID$i"]."','".$_POST["ResultLink$i"]."')";
            
            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("เพิ่มห้องเรียน เรียบร้อยแล้ว");window.location="admin_page.php";</script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

?>