<?php 
ob_start();
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
  <link href="https://fonts.cdnfonts.com/css/times-new-roman" rel="stylesheet">
                

  <!-- Vendor -->
  <link href="vendor/md-snackbars.min.css" rel="stylesheet">
  <link href="vendor/zabuto_calendar.min.css" rel="stylesheet">
  <link href="vendor/dataTables.bootstrap4.min.css" rel="stylesheet">


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>
  <!-- Theme -->
  <link href="css/spark.css" rel="stylesheet">

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script type="text/javascript" src="css/sweetalert2.all.min.js"></script>
</head>
<body class=""> <!-- right-to-left -->

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
        <div class="col-md-3">
          <a class="navbar-brand d-none d-lg-inline-block logo" href="home.php">
            <img src="img/Logo-BVUB.png" alt="">
          </a>
        </div>
        <div class="col-md-9">
          <ul class="nav navbar-nav navbar-right">
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hồ sơ</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#"><span><img src="img/icon/glyphicons-4-user.png" alt=""></span> Xem hồ sơ</a></li>
                <li><a class="dropdown-item" href="#"><span><img src="img/icon/glyphicons-11-envelope.png" alt=""></span> Hộp thư</a></li>
                <li><a class="dropdown-item" href="#"><span><img src="img/icon/glyphicons-137-cogwheel.png" alt=""></span> Cài đặt</a></li>
                <li role="separator" class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="control/logout.php"><span><img src="img/icon/glyphicons-64-power.png" alt=""></span> Đăng xuất</a></li>
              </ul>
            </li>
          
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hộp thư</a>
              <div class="dropdown-menu dropdown-md">
          
                <div class="media-items">
                  <div class="media">
                    <div class="media-left mr-1">
                      <a href="#">
                        <img class="media-object img-circle" src="img/mesenger/mess3.jpg" width="38" height="38">
                      </a>
                    </div>
                    <div class="media-body text-muted">
                      <p class="media-heading">Tran Lam</p>
                      <span class="text-sm">Chào bác sĩ, em bị HI...</span>
                    </div>
                  </div>
          
                  <div class="media">
                    <div class="media-left mr-1">
                      <a href="#">
                        <img class="media-object img-circle" src="img/mesenger/mess2.jpg" width="38" height="38">
                      </a>
                    </div>
                    <div class="media-body text-muted">
                      <p class="media-heading">H.V.Lam</p>
                      <span class="text-sm">Bác sĩ cứu em với, em bị tr...</span>
                    </div>
                  </div>
          
                  <div class="media">
                    <div class="media-left mr-1">
                      <a href="#">
                        <img class="media-object img-circle" src="img/mesenger/mess1.jpg" width="38" height="38">
                      </a>
                    </div>
                    <div class="media-body text-muted">
                      <p class="media-heading">TuyenHuongML</p>
                      <span class="text-sm">Vợ em sắp đẻ, bác sĩ có thể...</span>
                    </div>
                  </div>
          
                  <div class="media">
                    <div class="media-left mr-1">
                      <a href="#">
                        <img class="media-object img-circle" src="img/mesenger/mess4.jpg" width="38" height="38">
                      </a>
                    </div>
                    <div class="media-body text-muted">
                      <p class="media-heading">TTrung</p>
                      <span class="text-sm">Chào bác sĩ, em bị động kinh...</span>
                    </div>
                  </div>
                </div>
          
                <a class="dropdown-menu-footer" href="#">
                  Xem thêm
                </a>
          
              </div>
            </li>
          
            <li class="nav-item dropdown">
            <li class="nav-item">
              <a href="#" class="nav-link">
              Báo cáo sự cố
          </a>
            </li>
                <li class="nav-item">
            <a href="#" class="nav-link text-center avatar">
              <img class="ava" src="img/bs/logo.jpg" alt="Avatar" width="48" height="48" class="avatar img-circle" />
              <p>Quản lý: Trần Minh Thiện </p>
            </a>  
          </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="content">
      <header class="page-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-8 page-title-wrapper hd-tt">
              <div class="tt">
                <h1 class="page-title"> QUẢN LÝ BỆNH NHÂN</h1>
                <h2 class="page-subtitle text-center">NỘI TRÚ</h2>
              </div>
            </div>
            <div class="col-sm-4 d-none d-md-inline-block page-search-wrapper">
            </div>
          </div>
        </div>
      </header>