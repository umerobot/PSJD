<?php
  session_start();
  include('connect.php');

  //ตรวจสอบถ้าว่างให้เด้งไปหน้าหลัก
  if($_GET["UserID"]==''){ 
    echo "<script type='text/javascript'>";
    echo "alert('Error Contact Admin !!');";
    echo "window.location = 'admin_page.php'; ";
    echo "</script>"; 
  }

  $UserID = $_GET['UserID'];
  $name = $_SESSION['name'];
  $ddlStatus = $_SESSION['status'];

  if($ddlStatus != 'ADMIN'){
    Header("Location: logout.php");
  }

  $sql = "SELECT * FROM member WHERE UserID = '$UserID'";
  $result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADMIN PSJD</title>
  <link rel="icon" type="image/x-icon" href="/images/LoGo.png">
  <link href="css/style.css" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    .or-bg{
      background-color: #E67E22;
    }

    .card-content{
      background-color: #F0B27A;
    }

  </style>
</head>
<body>
    <div class="p-5 or-bg text-white text-center">
      <img src="images/LoGo.png" class="logo-head">
      <h1>Admin Dashboard</h1>
      <p class="h2">ยินดีต้อนรับ : <?php echo $name;?></p> 
    </div>
    <div class="card-content justify-content-center text-center">
        <br>
          <h3>Edit Teacher</h3>
        <br>
        <div class="d-grid gap-3 col-8 mx-auto">
            <form action="save_editMember.php" method="post">
              <?php while($row = $result->fetch_assoc()): ?>
                    <div class="mb-3 mt-3">
                      <input type="hidden" name="userID" value="<?php echo $row['UserID']; ?>">
                      <label for="id" class="form-label">National ID:</label>
                      <input type="text" class="form-control" id="id" placeholder="Enter National ID" name="username" value="<?php echo $row['Username']; ?>">
                    </div>
                    <div class="mb-3 mt-3">
                      <label for="name" class="form-label">Name:</label>
                      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?php echo $row['Name']; ?>">
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password:</label>
                      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?php echo $row['Password']; ?>">
                    </div>
                    <div class="mb-3">
                      <label for="faculty" class="form-label">Faculty</label>
                      <select class="form-select" id="faculty" name="faculty">
                        <option value="MECHANIC">ช่างยนต์</option>
                        <option value="ELECT">ไฟฟ้ากำลัง</option>
                        <option value="FACTORY">ช่างกลโรงงาน</option>
                        <option value="COMPUTER">คอมพิวเตอร์ธุรกิจ</option>
                        <option value="MARKET">การตลาด</option>
                        <option value="ACCOUNT">การบัญชี</option>
                      </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">UPDATE</button>
              <?php endwhile ?>
            </form>
            <div>
              <button type="button" class="btn btn-warning" onclick="window.location='admin_page.php' ">Cancel</button>
            </div>
          <form action="logout.php">
            <input type="submit" class="btn btn-danger btn-lg" value="LOGOUT">
          </form>
          <br>
        </div>
    </div>
    <div class="or-bg text-white text-center">
      <p>วิทยาลัยการอาชีพพระสมุทรเจดีย์</p>
    </div>
</body>
</html>