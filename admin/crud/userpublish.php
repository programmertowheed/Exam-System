<?php include_once("includehead.php");?>
<?php 
	 
    if(isset($_REQUEST['id']) && isset($_REQUEST['p'])){
            $id       = $fm->validation($_REQUEST['id']);
            $pstatus  = $fm->validation($_REQUEST['p']);

            if(empty($id) || empty($pstatus)){
                header("Location:../userlist.php?err=ID not found!!");
            }else{    
				if($pstatus==1){
					$update ="UPDATE tbl_user 
						SET
						publication_status = '2'
						WHERE id = '$id'
						";
				}else{
					$update ="UPDATE tbl_user 
						SET
						publication_status = '1'
						WHERE id = '$id'
						";
				}
				$run = $db->update($update);
				if($run== true){
					header("Location:../userlist.php?msg=Data updated successfully!!");
				}else{
					header("Location:../userlist.php?err=Data not updated!!");
				}
            }

        }
    
?>