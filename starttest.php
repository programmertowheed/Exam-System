<?php include('inc/header.php');?>
<?php

  if(isset($_REQUEST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $subject_id = $fm->validation($_REQUEST['subject_id']);
    if(empty($subject_id)){
      header("Location:home.php?error=Feild must not be empty!!");
    }
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
                      $subname = $sub->getSubjectByID($subject_id);
                      $subname = mysqli_fetch_assoc($subname);
                      echo $subname['name'];
                    ?>
                  </div>
                  <div class="formouter">
                      <form action="test.php" method="post">

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
                            <p class="text-center">Test your knowledge</p>
                          </div>
                          <p>This is multiple choice quiz to test your knowledge</p>
                          <p><strong>Number of Question: </strong>
                            <?php 
                              $totalques = $ques->totalQuestion($subject_id);
                              echo $totalques;
                            ?>
                          </p>
                          <p><strong>Question Type: </strong>Multiple Choice</p>
                        </div>
                        <input type="hidden" name="sid" value="<?php echo $subject_id;?>">
                        <input type="hidden" name="qid" value="<?php 
                        $question = $ques->getQuestion($subject_id);
                        echo $question['question_no'];
                        ?>">

                        <div class="text-center">
                          <button type="submit" class="btn btn-primary" name="test">Start test</button>
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