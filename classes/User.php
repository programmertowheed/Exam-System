<?php

/**
 * User class
 */
class User extends Controller{
	
	public $msg = array();

	function __construct(){
		 parent::__construct();
	}

	public function getUser(){
		$query = "SELECT * FROM tbl_subject WHERE publication_status='1' ORDER BY name ASC";
  	$red = $this->db->select($query);
  	return $red;
	}


  public function getUserList(){
      $query = "SELECT * FROM tbl_user ORDER BY id DESC";
      $red = $this->db->select($query);
      return $red;
  }
	

	public function getUserByID($id){
		$query = "SELECT * FROM tbl_user WHERE id= '$id' ";
    $red = $this->db->select($query);
  	return $red;
	}
  

  public function getUserByEmail($email){
    $query = "SELECT * FROM tbl_user WHERE userEmail = '$email' ";
    $red = $this->db->select($query);
    if($red){
      return $red;
    }else{
      return false;
    }
  }

	public function addUser($data){
      $username            = $this->fm->validation($data['username']);
      $mobile              = $this->fm->validation($data['mobile']);
      $email               = $this->fm->validation($data['email']);
      $password            = $this->fm->validation($data['password']);
      $publication_status  = $this->fm->validation($data['publication_status']);

      if(empty($username) || empty($mobile) || empty($email) || empty($password) || empty($publication_status)){
          //header("Location:addauthor.php?err=Feild must not be empty!!");
          $msg['error'] = "Feild must not be empty!!";
          return $msg;
      }else{    
        $uemail = $this->getUserByEmail($email);
        if($uemail){
            $this->msg['error'] = "Email already exist!!";
            return $this->msg;
        }else{
          $userEmail = md5(sha1($email));
          $userPass  = md5(sha1($password));
          $auth      = md5(sha1($userPass.$userEmail));

          $insert ="INSERT INTO  tbl_user (username,userEmail,userPass,auth,mobile,publication_status)
            VALUES ('$username','$email','$userPass','$auth','$mobile','$publication_status')";
          $run = $this->db->insert($insert);
          if($run== true){
              //header("Location:adddepartment.php?msg=Author added successfully!!");
            $msg['success'] = "User added successfully!!";
            return $msg;
          }else{
              //header("Location:adddepartment.php?err=Author not added!!");
            $msg['error'] = "User not added!!";
            return $msg;
          }
        }
          
      }

	}

	public function updateUser($data){
		  $id                  = $this->fm->validation($data['id']);
      $username            = $this->fm->validation($data['username']);
      $mobile              = $this->fm->validation($data['mobile']);
      $email               = $this->fm->validation($data['email']);
      $publication_status  = $this->fm->validation($data['publication_status']);

      if(empty($id) || empty($username) || empty($mobile) || empty($email) || empty($publication_status)){
          //header("Location:../editauthor.php?id=$id&err=Feild must not be empty!!");
          $msg['error'] = "Feild must not be empty!!";
          return $msg;
      }else{ 
        $uemail = $this->getUserByEmail($email);

        if($uemail){
            while($res = mysqli_fetch_assoc($uemail)){
                $exid  = $res['id'] ;
            }
        }

        if(isset($exid) && $id != $exid){
            $this->msg['error'] = "Email already exist!!";
            return $this->msg;
        }else{   
          $update ="UPDATE tbl_user 
              SET
              username           = '$username',
              mobile             = '$mobile',
              userEmail          = '$email',
              publication_status = '$publication_status'
              WHERE id = '$id'
              ";
          $run = $this->db->update($update);
          if($run== true){
            //header("Location:../authorlist.php?msg=Data updated successfully!!");
            $msg['success'] = "Data updated successfully!!";
            return $msg;
          }else{
            //header("Location:../authorlist.php?err=Data not updated!!");
            $msg['error'] = "Data not updated!!";
            return $msg;
          }
        }
      }
	}







}