<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PSJD</title>
    <link rel="icon" type="image/x-icon" href="/images/LoGo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>  
  </head>
  <body>
    
    <div class="container-fluid">
      <div class="head">
        <img src="images/LoGo.png" class="card-img-top logo-head">
      </div>
      <div class="card">
        <h4 class="card-header or-bg text-white">LOGIN</h4>
        <div class="card-body card-content">
          <form action="login.php" onsubmit="return showPosition(position)" method="post">
          <div class="mb-3">
            <label for="id" class="form-label"><b>National ID</b></label>
            <input type="text" class="form-control" id="id" name="id" placeholder="Input National ID">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label"><b>Password</b></label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Input password">
          </div>
          <div class="d-grid gap-2 col-10 mx-auto">
            <input name="submit" id="submit" class="btn btn-success" type="submit" value="LOGIN">
          </div>
        </form>
        </div>
      </div>
      <div class="text-center fixed-bottom or-bg">
        วิทยาลัยการอาชีพพระสมุทรเจดีย์
      </div>
    </div>
        
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>  </body>
</html>