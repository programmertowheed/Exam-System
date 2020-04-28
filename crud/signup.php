<?php
  ob_start();
  ini_set('display_errors','1');
  include "./../lib/Session.php";
  Session::init();
  Session::checkLogin();
?>
<?php
  include "./../lib/Database.php";
  include "./../helpers/Format.php";
?>
<?php
  $db = new Database();
  $fm = new Format();
?>
<?php 

  if(isset($_REQUEST['username']) || isset($_REQUEST['mobile']) || isset($_REQUEST['email']) || isset($_REQUEST['password']) ){
    $username  = $fm->validation($_REQUEST['username']);
    $mobile    = $fm->validation($_REQUEST['mobile']);
    $email     = $fm->validation($_REQUEST['email']);
    $password  = $fm->validation($_REQUEST['password']);

    if(empty($email) || empty($password) || empty($username) || empty($mobile)){
      echo "<span style='color:red;font-size:18px'>Feild must not be empty!!</span>";
    }elseif(strlen($mobile) > 15){
      echo "<span style='color:red;font-size:18px'>Invalid mobile number!!</span>";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      echo "<span style='color:red;font-size:18px'>Invalid Email Address!!</span>";
    }else{
      $userEmail = md5(sha1($email));
      $userPass  = md5(sha1($password));
      $auth      = md5(sha1($userPass.$userEmail));

      $query = "SELECT * FROM tbl_user WHERE userEmail='$email'";
      $result = $db->select($query);
      if($result != false){
        echo "<span style='color:red;font-size:18px'>Email address already exist!!</span>";
      }else{
        $insert ="INSERT INTO  tbl_user (username,userEmail,userPass,auth,mobile)
            VALUES ('$username','$email','$userPass','$auth','$mobile')";
        $run = $db->insert($insert);
        if($run== true){
          echo "<span style='color:green;font-size:18px'>Registration successfull</span>";
        }else{
          echo "<span style='color:red;font-size:18px'>Registration not successfull something wrong!!</span>";
        }
        
      }
    }

  }
?>