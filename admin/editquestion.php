<?php include('inc/header.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Question</h1>
          </div>
<?php 
     
    if(isset($_REQUEST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $updatequestion = $ques->updateQuestion($_POST);
    }
    
?>
        <?php if(isset($updatequestion['success'])){
                $msg    = $updatequestion['success'];
                $subid  = $updatequestion['subid'];
                header("Location:questionsublist.php?subid=$subid&msg=$msg");
                exit();
            } 
        ?>

        <?php if(isset($updatequestion['error'])){
            $error = $updatequestion['error'];?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo $error ?></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php }?>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-6">
                <form role="form" action="" method="post">
<?php
    if(isset($_REQUEST['qno']) && isset($_REQUEST['subid'])){
        $qno   = $fm->validation($_REQUEST['qno']);
        $subid = $fm->validation($_REQUEST['subid']);
    }
    if(empty($qno) || empty($subid)){
        header("Location:questionlist.php?err=ID not found!!"); 
    }else{
        $red = $ques->getQuestionByQnoAnsSub($qno,$subid);
        if($red != false){
            while($res = mysqli_fetch_assoc($red)){?>
                    <div class="form-group">
                        <label for="question_no">Question NO</label>
                        <input type="number" class="form-control" name="question_no" value="<?php echo $res['question_no'];?>" id="question_no">
                        <input type="hidden" class="form-control" name="question_orgin" value="<?php echo $res['question_no'];?>" id="question_orgin">
                        <input type="hidden" class="form-control" name="subject_id" value="<?php echo $subid;?>" id="subject_id">
                        <input type="hidden" class="form-control" name="qid" value="<?php echo $res['id'];?>" id="qid">
                    </div>
                    <div class="form-group">
                        <label for="question">Question</label>
                        <input type="text" value="<?php echo $res['question'];?>" class="form-control" name="question" id="question" placeholder="Enter question">
                    </div>
                    <?php
                    $ansred = $ques->getQuestionAnswerByQno($res['question_no'],$subid);
                    $a = 0;
                    if($ansred != false){
                        while($ansres = mysqli_fetch_assoc($ansred)){$a++;
                        if($a==1){
                        $uniqname = "choice_one";
                        $uniqid = "choice_one_id";$showname = "Choice One";
                        }elseif($a==2){
                        $uniqname = "choice_two";
                        $uniqid = "choice_two_id";$showname = "Choice Two";
                        }elseif($a==3){
                        $uniqname = "choice_three";
                        $uniqid = "choice_three_id";$showname = "Choice Three";
                        }elseif($a==4){
                        $uniqname = "choice_four";
                        $uniqid = "choice_four_id";$showname = "Choice Four";
                        }

                        if($ansres['right_answer'] == '1'){
                            $answer=$a;
                        }
                        ?>
                    <div class="form-group">
                        <label for="<?php echo $uniqname;?>"><?php echo $showname;?></label>
                        <input type="text" value="<?php echo $ansres['answer'];?>" class="form-control" name="<?php echo $uniqname;?>" id="<?php echo $uniqname;?>">
                        <input type="hidden" value="<?php echo $ansres['id'];?>" class="form-control" name="<?php echo $uniqid;?>">
                    </div>
                    
                    <?php } ?>

                    <div class="form-group">
                        <label for="correct_no">Correct NO</label>
                        <input type="number" value="<?php echo $answer;?>" class="form-control" name="correct_no" id="correct_no">
                    </div>
                    <?php } ?>

                    <button type="submit" name="submit" class="btn btn-primary">Update Question info</button>
<?php } }else{
    header("Location:questionsublist.php?subid=$subid&err=ID not found!!");
} }?>                    
                </form>
            </div>

     </div>
        <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>