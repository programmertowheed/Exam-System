<?php include('inc/header.php');?>
<?php
  error_reporting(0);
   
  if(isset($_REQUEST['sid'])){
      $sid = $_REQUEST['sid'];
      if(empty($sid)){
          header("Location: final.php?sid=1");
          exit();
      }
      if(isset($_SESSION['subject'])){
          if($sid != $_SESSION['subject']){
              header("Location: viewanswer.php?sid=".$_SESSION['subject']);
          }
      }
  }else{
    header("Location: final.php?sid=1");
    exit();
  }
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php include('inc/content-nav.php');?>
        <div class="row">
          <div class="col-md-8 m-auto">
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
                  
                  <div class="info">
                          <div class="answiew-heading">
                            <p class="text-center">All Question & Answer: <?php 
                              $totalques = $ques->totalQuestion($sid);
                              echo $totalques;
                            ?></p>
                          </div>
                      <?php
                        $red = $ques->getQuestionAnswerList($sid);
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
                                <label class="form-check-label" for="radioans<?php echo $z;?>" <?php if($resans['right_answer']=='1'){echo "style='color:green'";}?>>
                                  <input class="form-check-input" id="radioans<?php echo $z;?>" type="radio" <?php if($resans['right_answer']=='1'){echo "checked";}?>><?php echo $resans['answer']?>
                                </label>
                              </div>
                          <?php } } ?>
                      </div>
                    <?php } } ?>

                    </div>
                    <div class="text-center mb-5">
                      <a href="home.php" class="btn btn-primary" name="test">Start Again</a>
                    </div>

                </div>

            </div>
          </div>
        </div>

    </div>
    <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>