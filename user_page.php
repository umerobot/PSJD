<?php
  session_start();
  include('connect.php');

  $name = $_SESSION['name'];
  $ddlStatus = $_SESSION['status'];
  $fcty = $_SESSION['fcTy'];

  $sqlClass = "SELECT * FROM class WHERE Faculty = '$fcty' ";
  $resultClass = $conn->query($sqlClass);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PSJD</title>
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

    .iframe-in-modal{
      width: 100%;
      min-height: 30em;
      max-height: 50em;
    }

  </style>
</head>
<body>
    <!-- head start -->
    <div class="p-5 or-bg text-white text-center">
      <img src="images/LoGo.png" class="logo-head">
      <p class="h2">ยินดีต้อนรับ</p>
      <p class="h5">คุณครู<?php echo $name; ?></p>
    </div>
    <!-- head end  -->

    <!-- Content start  -->
    <div class="p-5 card-content justify-content-center">
      <h3 class="text-center">Class Select</h3>
      <div class="d-grid gap-3 col-8 mx-auto">
        <!-- Button trigger modal -->

        <?php while($rowCls = $resultClass->fetch_assoc()): ?>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo $rowCls['ID']; ?>">
          <?php echo $rowCls['Name']; ?>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="<?php echo $rowCls['ID']; ?>" tabindex="-1" aria-labelledby="<?php echo $rowCls['ID']; ?>" aria-hidden="true">
          <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="<?php echo $rowCls['ID']; ?>"><?php echo $rowCls['Name']; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- 1:1 aspect ratio -->
                <div class="embed-responsive">
                  <iframe class="embed-responsive-item iframe-in-modal" src="<?php echo $rowCls['Link']; ?>" allowfullscreen></iframe>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#<?php echo $rowCls['ResultID']; ?>" data-bs-toggle="modal" data-bs-dismiss="modal">Result</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- second modal  -->
        
        <div class="modal fade" id="<?php echo $rowCls['ResultID']; ?>" tabindex="-1" aria-labelledby="<?php echo $rowCls['ResultID']; ?>" aria-hidden="true">
          <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="<?php echo $rowCls['ResultID']; ?>"><?php echo $rowCls['Name']; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- 1:1 aspect ratio -->
                <div class="embed-responsive">
                  <iframe class="embed-responsive-item iframe-in-modal" src="<?php echo $rowCls['ResultLink']; ?>" allowfullscreen></iframe><br>
                  <form name="imgUpload">
                    <input type="">
                  </form>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
       <?php endwhile ?>
        <form action="logout.php" class="d-grid">
          <input type="submit" class="btn btn-danger" value="LOGOUT">
        </form>
      </div>
    </div>

    <!-- footer -->
    <div class="or-bg text-white text-center">
      <p>วิทยาลัยการอาชีพพระสมุทรเจดีย์</p>
    </div>
</body>
</html>