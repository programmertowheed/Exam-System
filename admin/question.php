<?php include('inc/header.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add question</h1>
          </div>
<?php 
    if(isset($_REQUEST['sid'])){
      $subject_id   = $fm->validation($_REQUEST['sid']);

      if(empty($subject_id)){
        header("Location:addquestion.php?err=ID not found!!");
      }
    }

    if(isset($_REQUEST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $addquestion = $ques->addQuestion($_POST);
    }

    if(isset($addquestion['subject_id'])){
        $subject_id = $addquestion['subject_id'];
    }
?>


          <?php if(isset($addquestion['success'])){
            $msg = $addquestion['success'];?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $msg ?></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php } ?>

        <?php if(isset($addquestion['error'])){
            $error = $addquestion['error'];?>
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
                    <div class="form-group">
                        <label class="control-label" for="question_no">Question NO</label>
                        <?php $question_no = $ques->getQuestionNo($subject_id);?>
                        <input type="number" disabled="disabled" class="form-control" value="<?php echo $question_no;?>">

                        <input type="hidden" class="form-control" name="question_no" value="<?php echo $question_no;?>" id="question_no">

                        <input type="hidden" class="form-control" name="subject_id" value="<?php echo $subject_id;?>" id="subject_id">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="question">Question</label>
                        <input type="text" class="form-control" name="question" id="question" placeholder="Enter question">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="choice_one">Choice One</label>
                        <input type="text" class="form-control" name="choice_one" id="choice_one" placeholder="Enter answer one">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="choice_two">Choice Two</label>
                        <input type="text" class="form-control" name="choice_two" id="choice_two" placeholder="Enter answer two">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="choice_three">Choice Three</label>
                        <input type="text" class="form-control" name="choice_three" id="choice_three" placeholder="Enter answer three">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="choice_four">Choice Four</label>
                        <input type="text" class="form-control" name="choice_four" id="choice_four" placeholder="Enter answer four">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="correct_no">Correct NO</label>
                        <input type="number" class="form-control" name="correct_no" id="correct_no">
                    </div>
                    <button type="submit" name="submit" id="issuesubmit" class="btn btn-primary">Add Question</button>
                </form>
            </div>

     </div>
        <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>