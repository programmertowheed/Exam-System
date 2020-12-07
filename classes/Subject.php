<?php

/**
 * Subject class
 */
class Subject extends Controller{
	
	public $msg = array();

	function __construct(){
		parent::__construct();
	}

	public function getSubject(){
		$query = "SELECT * FROM tbl_subject WHERE publication_status='1' ORDER BY name ASC";
  	$red = $this->db->select($query);
  	return $red;
	}


  public function getSubjectList(){
      $query = "SELECT tbl_subject.*, tbl_department.name as departname
          FROM tbl_subject 
          INNER JOIN tbl_department
          ON tbl_subject.department_id = tbl_department.id 
          ORDER BY tbl_subject.name ASC";
      $red = $this->db->select($query);
      return $red;
  }
	

	public function getSubjectByID($id){
		$query = "SELECT * FROM tbl_subject WHERE id= '$id' ";
    $red = $this->db->select($query);
  	if($red){
      return $red;
    }else{
      return false;
    }
	}
  

  public function getSubjectByCode($name){
    $query = "SELECT * FROM tbl_subject WHERE name = '$name' ";
    $red = $this->db->select($query);
    if($red){
      return $red;
    }else{
      return false;
    }
  }

	public function addSubject($data,$current_time){
      $name                = $this->fm->validation($data['name']);
      $department_id       = $this->fm->validation($data['department_id']);
      $publication_status  = $this->fm->validation($data['publication_status']);
      $date                = $current_time;

      if(empty($name) || empty($department_id) || empty($publication_status)){
          //header("Location:addauthor.php?err=Feild must not be empty!!");
          $msg['error'] = "Feild must not be empty!!";
          return $msg;
      }else{    
        $sname = $this->getSubjectByCode($name);
        if($sname){
            $this->msg['error'] = "Course already exist!!";
            return $this->msg;
        }else{
          $insert ="INSERT INTO  tbl_subject (name,department_id,publication_status,date)
              VALUES ('$name','$department_id','$publication_status','$date')";
          $run = $this->db->insert($insert);
          if($run== true){
              //header("Location:adddepartment.php?msg=Author added successfully!!");
            $msg['success'] = "Course added successfully!!";
            return $msg;
          }else{
              //header("Location:adddepartment.php?err=Author not added!!");
            $msg['error'] = "Course not added!!";
            return $msg;
          }
        }
          
      }

	}

	public function updateSubject($data){
		  $id                  = $this->fm->validation($data['id']);
      $name                = $this->fm->validation($data['name']);
      $department_id       = $this->fm->validation($data['department_id']);
      $publication_status  = $this->fm->validation($data['publication_status']);

      if(empty($id) || empty($name) || empty($department_id) || empty($publication_status)){
          //header("Location:../editauthor.php?id=$id&err=Feild must not be empty!!");
          $msg['error'] = "Feild must not be empty!!";
          return $msg;
      }else{  
          $exquery = "SELECT * FROM tbl_subject WHERE name='$name' AND department_id = '$department_id' ";
          $exdepart = $this->db->select($exquery);
          if($exdepart != false){
              while($res = mysqli_fetch_assoc($exdepart)){
                  $exid  = $res['id'] ;
              }
          }

          if(isset($exid) && $exid != $id){
              $msg['error'] = "Course already exist!!";
              return $msg;
          }else{   
              $update ="UPDATE tbl_subject 
                  SET
                  name               = '$name',
                  department_id      = '$department_id',
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