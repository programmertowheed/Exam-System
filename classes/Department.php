<?php

/**
 * Department class
 */
class Department extends Controller{
	
	public $msg = array();

	function __construct(){
		parent::__construct();
	}

	public function getDepartment(){
		$query = "SELECT * FROM tbl_department WHERE publication_status='1' ORDER BY id DESC";
  	$red = $this->db->select($query);
  	if($red){
      return $red;
    }else{
      return false;
    }
	}


	public function getAllDepartment(){
		$query = "SELECT * FROM tbl_department ORDER BY id DESC";
		$red = $this->db->select($query);
    if($red){
      return $red;
    }else{
      return false;
    }
	}
	

	public function getDepartmentByID($id){
		$query = "SELECT * FROM tbl_department WHERE id= '$id' ";
    $red = $this->db->select($query);
  	if($red){
      return $red;
    }else{
      return false;
    }
	}
  

  public function getDepartmentByName($name){
    $query = "SELECT * FROM tbl_department WHERE name= '$name' ";
    $red = $this->db->select($query);
    if($red){
      return $red;
    }else{
      return false;
    }
  }

	public function addDepartment($data,$current_time){
		$name                = $this->fm->validation($data['name']);
    $publication_status  = $this->fm->validation($data['publication_status']);
    $date                = $current_time;

    if(empty($name) || empty($publication_status)){
        //header("Location:adddepartment.php?err=Feild must not be empty!!");
        $msg['error'] = "Feild must not be empty!!";
        return $msg;
    }else{    
        $name = $this->getDepartmentByName($name);
        //$name = mysqli_fetch_assoc($name);
        if($name){
            $this->msg['error'] = "Department already exist!!";
            return $this->msg;
        }else{
            $insert ="INSERT INTO  tbl_department (name,publication_status,date)
            VALUES ('$name','$publication_status','$date')";
            $run = $this->db->insert($insert);
            if($run== true){
                //header("Location:adddepartment.php?msg=Department added successfully!!");
                $msg['success'] = "Department added successfully!!";
              return $msg;
            }else{
               // header("Location:adddepartment.php?err=Department not added!!");
              $msg['error'] = "Department not added!!";
              return $msg;
            }
        }
        
    }

	}

	public function updateDepartment($data){
		$id                  = $this->fm->validation($data['id']);
        $name                = $this->fm->validation($data['name']);
        $publication_status  = $this->fm->validation($data['publication_status']);

        if(empty($id) || empty($name) || empty($publication_status)){
            //header("Location:../editdepartment.php?id=$id&err=Feild must not be empty!!");
            $msg['error'] = "Feild must not be empty!!";
            return $msg;
        }else{    
          $update ="UPDATE tbl_department 
              SET
              name               = '$name',
              publication_status = '$publication_status'
              WHERE id = '$id'
              ";
          $run = $this->db->update($update);
          if($run== true){
            //header("Location:../departmentlist.php?msg=Data updated successfully!!");
            $msg['success'] = "Data updated successfully!!";
            return $msg;
          }else{
            //header("Location:../departmentlist.php?err=Data not updated!!");
            $msg['error'] = "Data not updated!!";
            return $msg;
          }
        }
	}

}