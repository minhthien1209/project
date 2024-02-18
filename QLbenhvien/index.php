<?php 
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/Logo-BVUB.png">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">

  <title>Quản lý bệnh nhân nội trú - ungbuou</title>

  <!-- NPM Packages -->
  <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="bootstrap/ionicons.min.css" rel="stylesheet">
  <link href="bootstrap/font-awesome.min.css" rel="stylesheet">
  <link href="bootstrap/summernote.css" rel="stylesheet">
  <link href="bootstrap/fullcalendar.min.css" rel="stylesheet">
  <link href="bootstrap/morris.css" rel="stylesheet">

  <!-- Vendor -->
  <link href="vendor/md-snackbars.min.css" rel="stylesheet">
  <link href="vendor/zabuto_calendar.min.css" rel="stylesheet">
  <link href="vendor/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Theme -->
  <link href="css/spark.css" rel="stylesheet">
<!-- css files -->
<link rel="stylesheet" href="css/style_login.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<!-- online-fonts -->
<link href="css/css.css" rel="stylesheet">
<link href="css/css2.css" rel="stylesheet">
<!-- //online-fonts -->
</head>
<body>
<script src='js/jquery_login.min.js'></script><script src="js/monetization_login.js" type="text/javascript"></script>
</head>
<body>
  <div class="splash active">
    <div class="icon"></div>
  </div>

  <div class="wrapper">

    <nav class="navbar navbar-spark navbar-toggleable navbar-expand-md">
      <div class="container-fluid">
        <button type="button" class="sidebar-open d-lg-none">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand d-none d-lg-inline-block logo">
          <img src="img/Logo-BVUB.png" alt="">
        </a>
      </div>
    </nav>

    <div class="content">
      <header class="page-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-8 page-title-wrapper hd-tt">
              <div class="tt">
              	<h1 class="page-title"> QUẢN LÝ BỆNH NHÂN</h1>
              	<h2 class="page-subtitle text-center">KHÁM BỆNH</h2>
              </div>
            </div>
            <div class="col-sm-4 d-none d-md-inline-block page-search-wrapper">
         
            </div>
          </div>
        </div>
      </header>
      <?php 
  $conn = mysqli_connect('localhost','root','','benhnhannoitru');
  mysqli_set_charset($conn,'utf8');
  if (isset($_POST['login'])) {
    $User = $_POST['username'];
    $Pass = $_POST['password'];
    $query_kt = mysqli_query($conn,"SELECT * FROM quanly WHERE taikhoan = '$User' AND matkhau = '$Pass'");
    if(mysqli_num_rows($query_kt) == 1){
      $u = mysqli_fetch_assoc($query_kt); // Fix typo: $qer to $query_kt
      $_SESSION['admin_login'] = $u;

      // Redirect to home.php
      header('Location: home.php');
      exit(); // Make sure to exit after a header redirect
    } else {
      echo '<div class="alert">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>Sai tài khoản hoặc mật khẩu!!!</strong>
            </div>'; 
    }
  }
?>
        <div class="page-body">
        <div class="container-fluid text-center">
          <H1 style="color: #203a45; padding-top: 30px; font-size: 32px; font-weight: bold;">LOGIN</H1>
          <div class="main-content-agile" style="margin-top: -80px;">
          <div class="sub-main-w3"> 
            <form action="" method="POST">
              <div class="pom-agile">
                <input placeholder="Usename" name="username" class="user" type="text" required="" style="border-radius: 5px; border: 1px solid #203a45;padding: 14.4px 87.5px 14.4px 14.4px; ">
              </div>
              <div class="pom-agile">
                <input  placeholder="Password" name="password" class="pass" type="password" required="" style="border-radius: 5px; border: 1px solid #203a45;">
              </div>
              <div class="sub-w3l" style="margin-top: -10px;">
                <div class="right-w3l login">
                        <input type="submit" style="background: #203a45;" value="LOGIN" name="login" >
                </div>
              </div>
            </form>
    </div>
  </div>
        </div>
        </div>
            <footer class="site-footer text-center">
              <div class="ft" style="margin-top: -100px;">
                <p>&copy; 2023 </p>
                <ul class="list-inline">
                  <li class="list-inline-item"><a href="#">21CNTT4</a></li>
                  <li class="list-inline-item"><a href="#">Công nghệ thông tin</a></li>
                  <li class="list-inline-item"><a href="#">Đại Học Sư Phạm Đà Nẵng</a></li>
                </ul>
              </div>
            </footer>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /#wrapper -->

  <!-- NPM Packages -->
  <script src="js/jquery.min.js"></script>

  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.flot.js"></script>
  <script src="js/jquery.flot.resize.js"></script>
  <script src="js/jquery.flot.crosshair.js"></script>
  <script src="js/jquery.flot.stack.js"></script>
  <script src="js/jquery.flot.pie.js"></script>
  <script src="js/jquery.bxslider.min.js"></script>
  <script src="js/jquery-jvectormap.min.js"></script>
  <script src="js/moment.min.js"></script>
  <script src="js/jquery.bootstrap.wizard.min.js"></script>
  <script src="js/summernote.min.js"></script>
  <script src="js/fullcalendar.min.js"></script>
  <script src="js/morris.min.js"></script>
  <script src="js/raphael.min.js"></script>

  <!-- Vendor -->
  <script src="js/jquery.flot.tooltip.min.js"></script>
  <script src="js/jquery.mark.min.js"></script>
  <script src="js/md-snackbars.min.js"></script>
  <script src="js/zabuto_calendar.min.js"></script>
  <script src="js/jquery-jvectormap-world-mill.js"></script>
  <script src="js/jquery-jvectormap-africa-mill.js"></script>
  <script src="js/jquery-jvectormap-asia-mill.js"></script>
  <script src="js/jquery-jvectormap-cn-mill.js"></script>
  <script src="js/jquery-jvectormap-europe-mill.js"></script>
  <script src="js/jquery-jvectormap-in-mill.js"></script>
  <script src="js/jquery-jvectormap-north_america-mill.js"></script>
  <script src="js/jquery-jvectormap-oceania-mill.js"></script>
  <script src="js/jquery-jvectormap-south_america-mill.js"></script>
  <script src="js/jquery-jvectormap-uk_countries-mill.js"></script>
  <script src="js/jquery-jvectormap-us-aea.js"></script>
  <script src="js/gmaps.min.js"></script>

  <!-- Theme -->
  <script src="js/spark.js"></script>
  <script src="js/dashboard.js"></script>

  <script>
  $(document).ready(function () {
    Spark.init();
    Page.init();
  });

  </script>

</body>
</html>