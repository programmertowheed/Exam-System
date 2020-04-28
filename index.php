<?php
    ob_start();
    ini_set('display_errors','1');
    include "lib/Session.php";
    Session::init();
    Session::checkLogin();
?>
<?php 
  include "lib/Database.php";
  include "helpers/Format.php";
  include "classes/Controller.php";
?>
<?php
  $db  = new Database();
  $fm  = new Format();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Exam system</title>

  <!-- Favicon -->
  <link href="assets/img/favicon.png" rel="icon" type="image/png">

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for datatable -->
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!--Jquery-ui-css styles for datepicker -->
  <link rel="stylesheet" href="assets/css/jquery-ui.css">
 
  <!-- My styles for this template-->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- coustom style-->
  <style type="text/css">
    
    label {
        margin-bottom: 0;
    }
    .form-control {
        display: inline-block;
    }
    .lfrom-inner {
        padding: 20px;
        margin: 0px auto;
        margin-top: 50px;
        margin-bottom: 50px;
        border: 1px solid #F98D79;
        border-radius: 5px;
        background-color: #0504044d;
        color: #F9F9F9;
    }
    .lfrom-inner h4.log-text.text-center.mb-4 {
        font-size: 25px;
        padding-bottom: 10px;
        margin: 20px 61px;
    }
    .lfrom-inner .form-group {
        margin: 10px 0;
    }
    .lfrom-inner label {
        font-size: 17px;
        padding: 5px 0;
    }
    .lfrom-inner svg:not(:root).svg-inline--fa {
        font-size: 16px;
    }
    .lfrom-inner .form-control {
      font-size: 1em;
    }
    .lfrom-inner .tomato{
      background-color:tomato;
      color:#fff;
      border:1px solid #ce7867;
      font-size: 18px;
        padding: 5px;
        margin-bottom: 10px;
    }
    .lfrom-inner .tomato:hover{
      background-color:#cf442b;
    }

    .lfrom-inner a{
      color:#52ded2;
    }

    .lfrom-inner a:hover{
      text-decoration: none;
      color:#2abdb1;
    }
    .form-check-input{
      margin-top: 11px;
    }
    @media only screen and (max-width: 992px){
      .lfrom-inner {
          width: 50% !important;
      }
    }
    
    @media only screen and (max-width: 768px){
      .lfrom-inner {
          width: 60% !important;
      }
    }

    @media only screen and (max-width: 560px){
      .lfrom-inner {
          width: 90% !important;
      }
    }

  </style>

</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
<?php
   if(isset($_SERVER['SCRIPT_NAME'])){
    $apage = $_SERVER['SCRIPT_NAME'];
    $apage = basename($apage,".php");
   }
?>

    <!-- Sidebar -->
    <?php //include('sidebar-nav.php');?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column" style="background-image:linear-gradient(#00000075, #00000075),linear-gradient(#00000075, #00000075),url(assets/img/sliderbackpic.jpg);background-repeat:no-repeat;background-size:cover;background-attachment: fixed;">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button> -->

          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                  <div class="sidebar-brand-icon">
                    <i class="fas fa-laugh-wink"></i>
                  </div>
                  <div class="sidebar-brand-text mx-3">Online Exam System</div>
              </a>

        </nav>
        <!-- End of Topbar -->


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-10 m-auto">
            <div class="row">
              <div class="col-md-4">

                <div class="lbgpic">
                  <div class="lfrom-inner">
                    <form action="" method="post" id="signin">
                      <h4 class="log-text text-center mb-4"><span class="b-bottom">Log In</span></h4>
                      <div id="logrespons"></div>
                      <div class="form-group">
                        <label for="email"><i class="fas fa-envelope mr-2"></i>Email</label>
                        <input type="text" class="form-control" id="lemail" name="email" placeholder="Enter your email">
                      </div>
                      <div class="form-group">
                        <label for="password"><i class="fas fa-key mr-2"></i>Password</label>
                        <input type="password" class="form-control" id="lpassword" name="password" placeholder="Password">
                      </div>

                      
                      <div class="form-group">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="remember" name="remember" >
                          <label for="remember" class="form-check-label">Remember Me</label>
                        </div>
                      </div>

                      <div class="text-center">
                      <button type="submit" class="btn col-6 tomato" id="loginsubmit" name="submit" >Log in</button>
                      </div>
                      <div class="form-group fgbutton  mb-0">
                      <a class="" href="password/forgetpass.php">Forget Password?</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="col-md-8">
                 <div class="lbgpic">
                    <div class="lfrom-inner">
                      <form action="" method="post" id="signup">
                        <h4 class="log-text text-center mb-4"><span class="b-bottom">Register</span></h4>
                        
                        <div id="msgrespons"></div>
                        <div class="form-group">
                          <label for="username"><i class="fas fa-pencil-alt mr-2"></i>User Name</label>
                          <input type="text" class="form-control" id="susername" name="username" placeholder="Enter your user name">
                          <!--<span style='color:red;font-size:18px;display:block'>Feild must not be empty!!</span>-->
                        </div>
                        <div class="form-group">
                          <label for="mobile"><i class="fas fa-phone mr-2"></i>Mobile</label>
                          <input type="text" class="form-control" id="smobile" name="mobile" placeholder="Enter your mobile number">
                        </div>
                        <div class="form-group">
                          <label for="email"><i class="fas fa-envelope mr-2"></i>Email</label>
                          <input type="text" class="form-control" id="semail" name="email" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                          <label for="password"><i class="fas fa-key mr-2"></i>Password</label>
                          <input type="password" class="form-control" id="spassword" name="password" placeholder="Password">
                          <!--<span style='color:red;font-size:18px;display:block'>Feild must not be empty!!</span>-->
                        </div>

                        <div class="text-center">
                            <button type="submit" id="regsubmit" class="btn col-6 tomato mt-3" name="regsubmit" >Register</button>
                        </div>
                      </form>
                    </div>
                  </div>
              </div>

            </div>
           </div>
        </div>

    </div>
    <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>