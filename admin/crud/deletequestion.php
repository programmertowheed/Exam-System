<?php include_once("includehead.php");?>
<?php 
	 
    if(isset($_REQUEST['subid'])){
            $subid   = $fm->validation($_REQUEST['subid']);

            if(empty($subid)){
                header("Location:../questionlist.php?err=ID not found!!");
            }else{ 
				$delete ="DELETE FROM tbl_question WHERE subject_id = '$subid';";
				$run = $db->delete($delete);
				if($run== true){
					$rdelete ="DELETE FROM tbl_answer WHERE subject_id = '$subid';";
					$ansrun = $db->delete($rdelete);
					if($ansrun== true){
						header("Location:../questionlist.php?msg=Question Deleted successfully!!");
					}else{
						header("Location:../questionlist.php?err=Question Deleted But Answer not Deleted!!");
					}
				}else{
					header("Location:../questionlist.php?err=Data not Deleted!!");
				}
            }

        }
    
?>