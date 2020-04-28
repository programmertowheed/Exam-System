<?php include_once("includehead.php");?>
<?php 
	 
    if(isset($_REQUEST['prosubmit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
            $username  = $fm->validation($_POST['username']);
            $mobile    = $fm->validation($_POST['mobile']);

			$email = Session::get("adminemail");
			$id    = Session::get("adminuserId");

            if(empty($username) || empty($mobile)){
                header("Location:../editprofile.php?err=Feild must not be empty!!");
            }else{    
				$update ="UPDATE tbl_admin 
						SET
						username = '$username',
						mobile   = '$mobile'
						WHERE id = '$id' AND userEmail = '$email'
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