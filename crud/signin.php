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

  if(isset($_REQUEST['email']) || isset($_REQUEST['password']) ){
    $email     = $fm->validation($_REQUEST['email']);
    $password  = $fm->validation($_REQUEST['password']);

    if(empty($email) || empty($password)){
      echo "<span style='color:red;font-size:18px'>Feild must not be empty!!</span>";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      echo "<span style='color:red;font-size:18px'>Invalid Email Address!!</span>";
    }else{
      $userEmail = md5(sha1($email));
      $userPass  = md5(sha1($password));
      $auth      = md5(sha1($userPass.$userEmail));

      $query = "SELECT * FROM tbl_user WHERE userEmail='$email' && userPass='$userPass' && auth='$auth' && publication_status='1' ";
      $result = $db->select($query);
      if($result != false){
        $value = mysqli_fetch_array($result);
        $row   = mysqli_num_rows($result);
        if($row > 0){
          Session::set("examuserlogin", true);
          Session::set("examuserauth", $value['auth']);
          Session::set("examuseremail", $value['userEmail']);
          Session::set("examuserId", $value['id']);
          echo "login";
        }else{
          echo "<span style='color:red;font-size:18px'>Result not found!</span>";
        }
      }else{
        echo "<span style='color:red;font-size:18px'>Email or Password not matched!!</span>";
      }
    }

                      
  }
?>