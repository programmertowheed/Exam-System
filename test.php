<?php include('inc/header.php');?>
<?php

  if(isset($_REQUEST['test']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_SESSION['score'])) {
        unset($_SESSION['score']);
    }
    if (isset($_SESSION['subject'])) {
        unset($_SESSION['subject']);
    }
    $sid = $fm->validation($_REQUEST['sid']);
    $qid = $fm->validation($_REQUEST['qid']);
    if(empty($sid) || empty($qid)){
      header("Location:starttest.php?error=ID not found!!");
    }
  }



  if(isset($_REQUEST['exam']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
      $examprocess = $exam->examProcess($_POST);
  }

  if (isset($examprocess['sid']) && isset($examprocess['qid'])) {
    $sid = $examprocess['sid'];
    $qid = $examprocess['qid'];
  }

?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 m-auto">
            <div class="panel panel-default">
                
                <div class="panel-body">
                  <div class="well text-center" style="margin: 0">
                    <strong>Course: </strong>
                    <?php 
                      $subname = $sub->getSubjectByID($sid);
                      $subname = mysqli_fetch_assoc($subname);
                      echo $subname['name'];
                    ?>
                  </div>
                  <div class="formouter">
                      <form action="" method="post">

                         <?php if(isset($_GET['success'])){
                          $msg = $_GET['success'];?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong><?php echo $msg ?></strong> 
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <?php } ?>

                      <?php if(isset($_GET['error'])){
                          $error = $_GET['error'];?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong><?php echo $error ?></strong> 
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <?php }?>

                        <div class="info">
                          <div class="heading">
                            <p class="text-center">Question <?php echo $qid;?> of <?php 
                              $totalques = $ques->totalQuestion($sid);
                              echo $totalques;
                            ?></p>
                          </div>
                          <?php
                            $red = $ques->getQuestionByQnoAnsSub($qid,$sid);
                            if($red==true){
                            while($res = mysqli_fetch_assoc($red)){
                          ?>
                          <div class="form-group">
                              <label for="question" class="control-label"><?php echo $res['question_no'].". ".$res['question'];?></label>

                               <?php 
                                $z=0;
                                $answer = $ques->getQuestionAnswerByQno($res['question_no'],$sid);
                                if($answer==true){
                                while($resans = mysqli_fetch_assoc($answer)){$z++?>
                              <div class="form-check">
                                  <label class="form-check-label" for="radioans<?php echo $z;?>">
                                  <input class="form-check-input" id="radioans<?php echo $z;?>" type="radio" name="ans" value="<?php echo $resans['id']?>"><?php echo $resans['answer']?></label>
                              </div>
                              <?php } } ?>
                          </div>
                        <?php } } ?>

                        </div>
                        <input type="hidden" name="sid" value="<?php echo $sid?>">
                        <input type="hidden" name="qid" value="<?php echo $qid?>">

                        <div class="text-center">
                          <button type="submit" class="btn btn-primary" name="exam">Next Question</button>
                        </div>
                      </form>
                  </div>

                </div>

            </div>
          </div>
        </div>

    </div>
    <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>