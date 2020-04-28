<?php include_once("includehead.php");?>
<?php 
	if(isset($_REQUEST['department_id'])){
		$id = $fm->validation($_REQUEST['department_id']);

		if($id!=""){
			$option ="<option value=''>Select Course</option>";
	        $query = "SELECT * FROM tbl_subject WHERE department_id='$id' AND publication_status='1' ORDER BY id DESC";
	        $red = $db->select($query);
	        if($red==true){
	            while($value = mysqli_fetch_assoc($red)){ 

	            	$option .="<option value='".$value['id']."'>".$value['name']."</option>";

	    		} 
	    		echo $option;
	    	}

		}	
	}else{
		header("Location:../404.php");
	}
?>