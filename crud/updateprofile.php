<?php include_once("includehead.php");?>
<?php 
	 
    if(isset($_REQUEST['prosubmit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
            $username  = $fm->validation($_POST['username']);
            $mobile    = $fm->validation($_POST['mobile']);

			$auth  = Session::get("examuserauth");
			$id    = Session::get("examuserId");

            if(empty($username) || empty($mobile)){
                header("Location:../editprofile.php?err=Feild must not be empty!!");
            }else{    
				$update ="UPDATE tbl_user 
						SET
						username = '$username',
						mobile   = '$mobile'
						WHERE id = '$id' AND auth = '$auth'
						";
				$run = $db->update($update);
				if($run== true){
					header("Location:../editprofile.php?msg=Data updated successfully!!");
				}else{
					header("Location:../editprofile.php?err=Data not updated!!");
				}
            }

        }
    
?>