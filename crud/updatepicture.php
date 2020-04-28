<?php include_once("includehead.php");?>
<?php 
	 
    if(isset($_REQUEST['imgsubmit'])){
			$auth = Session::get("auth");
			$id   = Session::get("userId");
			$eid  = Session::get("employeid");
			$permited = array('jpg','jpeg','png','gif');
			$file_name  =$_FILES['adminimage']['name'];
			$file_size  =$_FILES['adminimage']['size'];
			$file_temp  =$_FILES['adminimage']['tmp_name'];
			
			$div = explode('.', $file_name );
			$file_ext = strtolower(end($div));
			$unique_image = md5($eid).'upic'.'.'.$file_ext;
			$upload_path = "../assets/img/".$unique_image;
			
			if( $file_name=="" ){
				header("Location:../editprofile.php?err=File Not Selected!!!");
			}elseif(!empty($file_name)){	
				if(in_array($file_ext,$permited) === false){
					header("Location:../editprofile.php?err=You can upload only: ".implode(', ',$permited));
				}else{
					// $resizeWidth  = 400;
					// $resizeHeight = 400;
					// $result = $img->imageresize($file_ext,$file_temp,$resizeWidth,$resizeHeight,$upload_path);
					$result = move_uploaded_file($file_temp,$upload_path);
					if($result==true){
						$insert ="UPDATE tbl_user 
							SET
								picture     	= '$unique_image'
								WHERE auth = '$auth' AND id = '$id'
								";

						$run = $db->update($insert);
						if($run == false){
							header("Location:../editprofile.php?err=Profile picture not updated!!");
						}else{
							header("Location:../editprofile.php?msg=Profile picture updated!!");
						}
					}else{
						header("Location:../editprofile.php?err=Data not updated!!");
					}
				}
			}
		}
    
?>






