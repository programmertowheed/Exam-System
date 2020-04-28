<?php include_once("includehead.php");?>
<?php 
	 
    if(isset($_REQUEST['qno']) && isset($_REQUEST['subid'])){
            $qno    = $fm->validation($_REQUEST['qno']);
            $subid  = $fm->validation($_REQUEST['subid']);

            if(empty($qno) || empty($subid)){
                header("Location:../questionsublist.php?subid=$subid&err=ID not found!!");
            }else{ 
				$delete ="DELETE FROM tbl_question WHERE question_no = '$qno' AND subject_id = '$subid';";
				$run = $db->delete($delete);
				if($run== true){
					$rdelete ="DELETE FROM tbl_answer WHERE question_no = '$qno' AND subject_id = '$subid';";
					$ansrun = $db->delete($rdelete);
					if($ansrun== true){
						header("Location:../questionsublist.php?subid=$subid&msg=Question Deleted successfully!!");
					}else{
						header("Location:../questionsublist.php?subid=$subid&err=Question Deleted But Answer not Deleted!!");
					}
				}else{
					header("Location:../questionsublist.php?subid=$subid&err=Data not Deleted!!");
				}
            }

        }
    
?>