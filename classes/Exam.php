<?php

/**
 * Exam class
 */
class Exam extends Controller{
	
	public $msg = array();

	function __construct(){
		parent::__construct();
	}

	public function examProcess($data){
		  $sid  = $this->fm->validation($data['sid']);
      $qid  = $this->fm->validation($data['qid']);
      $next = $qid+1;

      if(isset($data['ans'])){
          $ans  = $this->fm->validation($data['ans']);
      }else{
          $ans  = null;
      }
      
      if(!isset($_SESSION['score'])){
          $_SESSION['score'] = '0';
          $_SESSION['subject'] = $sid;
      }

      $total = $this->totalQuestion($sid);
      $right = $this->rightAns($sid,$qid);

      if($right == $ans){
          $_SESSION['score']++;
      }

      if($qid == $total){
          header("Location: final.php?sid=$sid");
          exit();
      }else{
          $this->msg['sid'] = $sid;
          $this->msg['qid'] = $next;
          return $this->msg;
      }


	}

  public function totalQuestion($subid){
    $query = "SELECT * FROM tbl_question WHERE subject_id = '$subid'";
    $red   = $this->db->select($query);
    $total = $red->num_rows;
    return $total;
  }

  public function rightAns($subid,$qid){
    $query = "SELECT * FROM tbl_answer WHERE subject_id = '$subid' AND question_no = '$qid' AND right_answer = '1' ";
    $getdata  = $this->db->select($query)->fetch_assoc();
    $result   = $getdata['id'];
    return $result;
  }


}