<?php
/**
 * Question class
 */
class Question extends Controller{
	
	public $msg = array();

	function __construct(){
		parent::__construct();
	}

	public function getQuestionCourseList(){
		$query = "SELECT DISTINCT tbl_question.subject_id as subid, tbl_subject.name as subname, tbl_department.name as dname
          FROM tbl_question 
          INNER JOIN tbl_subject
          ON tbl_question.subject_id = tbl_subject.id 
          INNER JOIN tbl_department
          ON tbl_subject.department_id = tbl_department.id 
          ORDER BY tbl_subject.name ASC";
  	$red = $this->db->select($query);
  	return $red;
	}

  public function getQuestionByNo($question_no){
    $flag = false;
    $query = "SELECT * FROM tbl_question WHERE question_no='$question_no'";
    $red = $this->db->select($query);
    if($red == true){
        while ( $res = mysqli_fetch_assoc($red)) {
          if($res['question_no'] == $question_no){
            $flag = true;
          }
        }
      }
    if($flag){
      $increse = $question_no+1;
      return $this->getQuestionByNo($increse);
    }else{
      return "$question_no";
    }
  }


  public function getQuestionNo($sid){
      $question_no = 0;
      $query = "SELECT question_no FROM tbl_question WHERE subject_id='$sid'";
      $red = $this->db->select($query);
      if($red == true){
        while ( $res = mysqli_fetch_assoc($red)) {
          $question_no++;
        }
      }
      $question_no = $question_no+1;
      $question = $this->getQuestionByNo($question_no);
      return $question_no;
  }
	

	public function totalQuestion($subid){
		$query = "SELECT * FROM tbl_question WHERE subject_id= '$subid'";
    $red   = $this->db->select($query);
    $total = $red->num_rows;
  	return $total;
	}
  
  public function getQuestion($subid){
    $query  = "SELECT * FROM tbl_question WHERE subject_id= '$subid'";
    $red    = $this->db->select($query);
    $result = $red->fetch_assoc();
    return $result;
  }

  public function getQuestionAnswerList($subid){
    $query = "SELECT * FROM tbl_question WHERE subject_id= '$subid' ORDER BY question_no ASC";
    $red = $this->db->select($query);
    return $red;
  }

  public function getQuestionByQnoAnsSub($qno,$subid){
    $query = "SELECT * FROM tbl_question WHERE question_no = '$qno' AND subject_id= '$subid' ORDER BY question_no ASC";
    $red = $this->db->select($query);
    return $red;
  }

  public function getQuestionAnswerByQno($qno,$subid){
    $query = "SELECT * FROM tbl_answer WHERE question_no = '$qno' AND subject_id= '$subid' ORDER BY id ASC";
    $red = $this->db->select($query);
    return $red;
  }

  public function getAnswerListByQno($qno){
    $query = "SELECT * FROM tbl_answer WHERE question_no = '$qno' ORDER BY question_no ASC";
    $red = $this->db->select($query);
    return $red;
  }
  

  public function getQuestionNoIf($no,$sid){
    $query = "SELECT * FROM tbl_question WHERE subject_id = '$sid' AND question_no = '$no' ";
    $red = $this->db->select($query);
    if($red){
      return $red;
    }else{
      return false;
    }
  }

	public function addQuestion($data){
      $subject_id    = $this->fm->validation($data['subject_id']);
      $question_no   = $this->fm->validation($data['question_no']);
      $question      = $this->fm->validation($data['question']);
      $choice_one    = $this->fm->validation($data['choice_one']);
      $choice_two    = $this->fm->validation($data['choice_two']);
      $choice_three  = $this->fm->validation($data['choice_three']);
      $choice_four   = $this->fm->validation($data['choice_four']);
      $correct_no    = $this->fm->validation($data['correct_no']);

      if(empty($subject_id) || empty($question_no) || empty($question) || empty($choice_one) || empty($choice_two) || empty($choice_three) || empty($choice_four) || empty($correct_no) ){
          //header("Location:addauthor.php?err=Feild must not be empty!!");
          $msg['error'] = "Feild must not be empty!!";
          return $msg;
      }else{ 
        $ans = array();
        $ans[1] = $choice_one;   
        $ans[2] = $choice_two;   
        $ans[3] = $choice_three;   
        $ans[4] = $choice_four; 

        $ques_no = $this->getQuestionNoIf($question_no,$subject_id);
        if($ques_no){
            $this->msg['error'] = "Question no already exist!!";
            return $this->msg;
        }else{
            $insert ="INSERT INTO  tbl_question (subject_id,question_no,question)
                VALUES ('$subject_id','$question_no','$question')";
            $run = $this->db->insert($insert);
            if($run== true){
               foreach ($ans as $key => $value) {
                 if($ans !=''){
                    if ($correct_no == $key) {
                        $rinsert ="INSERT INTO  tbl_answer (subject_id,question_no,right_answer,answer) VALUES ('$subject_id','$question_no','1','$value')";
                    }else{
                        $rinsert ="INSERT INTO  tbl_answer (subject_id,question_no,right_answer,answer) VALUES ('$subject_id','$question_no','0','$value')";
                    }
                    $insertrow = $this->db->insert($rinsert);
                    if($insertrow){
                      continue;
                    }else{
                      die('Error...');
                    }
                 }
               }

                $msg['success'] = "Question added successfully!!";
                return $msg;
            }else{
              $msg['error'] = "Question not added!!";
              return $msg;
            }
        }
          
      }

	}

	public function updateQuestion($data){
		  $subject_id    = $this->fm->validation($data['subject_id']);
      $qid           = $this->fm->validation($data['qid']);
      $question_no   = $this->fm->validation($data['question_no']);
      $question_orgin= $this->fm->validation($data['question_orgin']);
      $question      = $this->fm->validation($data['question']);

      $choice_one    = $this->fm->validation($data['choice_one']);
      $choice_two    = $this->fm->validation($data['choice_two']);
      $choice_three  = $this->fm->validation($data['choice_three']);
      $choice_four   = $this->fm->validation($data['choice_four']);

      $choice_one_id    = $this->fm->validation($data['choice_one_id']);
      $choice_two_id    = $this->fm->validation($data['choice_two_id']);
      $choice_three_id  = $this->fm->validation($data['choice_three_id']);
      $choice_four_id   = $this->fm->validation($data['choice_four_id']);
      
      $correct_no    = $this->fm->validation($data['correct_no']);

      if(empty($subject_id) || empty($question_no) || empty($question) || empty($choice_one) || empty($choice_two) || empty($choice_three) || empty($choice_four) || empty($correct_no) || empty($question_orgin) || empty($qid) || empty($choice_one_id) || empty($choice_two_id) || empty($choice_three_id) || empty($choice_four_id) 

      ){
          //header("Location:addauthor.php?err=Feild must not be empty!!");
          $msg['error'] = "Feild must not be empty!!";
          return $msg;
      }else{ 
        $ans = array();
        $ans[1] = $choice_one;   
        $ans[2] = $choice_two;   
        $ans[3] = $choice_three;   
        $ans[4] = $choice_four; 

        $ansid = array();
        $ansid[1] = $choice_one_id;   
        $ansid[2] = $choice_two_id;   
        $ansid[3] = $choice_three_id;   
        $ansid[4] = $choice_four_id; 

        if($question_no != $question_orgin){
          $ques_no = $this->getQuestionNoIf($question_no,$subject_id);
          if($ques_no){
              $this->msg['error'] = "Question no already exist!!";
              return $this->msg;
          }
        }
        
            $update ="UPDATE tbl_question 
                SET
                question_no = '$question_no',
                question    = '$question'
                WHERE subject_id = '$subject_id' AND id = '$qid'
                ";
            $run = $this->db->update($update);
            if($run== true){
               foreach ($ans as $key => $value) {
                 if($ans !=''){
                        if ($correct_no == $key) {
                            $rinsert ="UPDATE tbl_answer 
                                      SET
                                      question_no  = '$question_no',
                                      right_answer = '1',
                                      answer       = '$value'
                                      WHERE subject_id = '$subject_id' AND id = '$ansid[$key]'
                                      ";
                        }else{
                            $rinsert ="UPDATE tbl_answer 
                                      SET
                                      question_no  = '$question_no',
                                      right_answer = '0',
                                      answer       = '$value'
                                      WHERE subject_id = '$subject_id' AND id = '$ansid[$key]'
                                      ";
                        }
                        $updaterow = $this->db->update($rinsert);
                        if($updaterow){
                          continue;
                        }else{
                          die('Error...');
                        }
                 }
               }

                $msg['success'] = "Question update successfully!!";
                $msg['subid'] = $subject_id;
                return $msg;
            }else{
              $msg['error'] = "Question not updated!!";
              return $msg;
            }
      }
	}







}