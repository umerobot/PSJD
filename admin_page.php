<?php
  session_start();
  include('connect.php');

  $name = $_SESSION['name'];
  $ddlStatus = $_SESSION['status'];

  if($ddlStatus != 'ADMIN'){
    Header("Location: logout.php");
  }

  $sql = "SELECT * FROM `member` WHERE `Status` = 'USER' ORDER BY `member`.`Date` ASC";
  $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
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
    <div class="card-content justify-content-center">
        <br>
          <h3 class="text-center">Menu Select</h3>
        <br>
        <div class="d-grid gap-3 col-8 mx-auto">
          <!-- Button to Open the Modal -->
          <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#addTeacher">
            เพิ่มครูประจำชั้น
          </button>
          <!-- The Modal -->
          <div class="modal" id="addTeacher">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header or-bg text-white">
                  <h4 class="modal-title">เพิ่มครูที่ปรึกษา</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body card-content">
                  <form action="save_addTeacher.php" method="post">
                    <div class="mb-3 mt-3">
                      <label for="id" class="form-label">National ID:</label>
                      <input type="text" class="form-control" id="id" placeholder="Enter National ID" name="username">
                    </div>
                    <div class="mb-3 mt-3">
                      <label for="name" class="form-label">Name:</label>
                      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password:</label>
                      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
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
                    
                    <button type="submit" class="btn btn-primary">Register</button>
                  </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

              </div>
            </div>
          </div>
          <!-- Button to Open the Modal -->
          <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#edit">
            แก้ไข / ลบ / รายชื่อครู
          </button>
          <!-- The Modal -->
          <div class="modal" id="edit">
            <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header or-bg text-white">
                  <h4 class="modal-title">แก้ไข / ลบ / รายชื่อครู</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body card-content">
                  <table class="table">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Last Update</th>
                        <th scope="col">Edit/Delete</th>
                      </tr>
                    </thead>
                    <tbody class="table-secondary">
                    <?php while($row = $result->fetch_assoc()): ?>
                      <tr>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['Username']; ?></td>
                        <td><?php echo $row['Password']; ?></td>
                        <td><?php echo $row['Date']; ?></td>
                        <td>
                          <a href="edit_member.php?UserID=<?php echo $row['UserID']; ?>" class="btn btn-warning">Edit</a>
                          <a href="delete_member.php?UserID=<?php echo $row['UserID']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                      <?php endwhile ?>
                    </tbody>
                  </table>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

              </div>
            </div>
          </div>
            <a href="addClass.html" class="btn btn-primary btn-lg">เพิ่มห้องเรียน</a>
            <form action="logout.php" class="d-grid gap-3 col-6 mx-auto">
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