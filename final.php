<?php include('inc/header.php');?>
<?php 
  if(isset($_REQUEST['sid'])){
      $subject_id = $_REQUEST['sid'];
      if(empty($subject_id)){
          if (isset($_SESSION['score'])) {
              unset($_SESSION['score']);
          }
          if (isset($_SESSION['subject'])) {
              unset($_SESSION['subject']);
          }
          header("Location: home.php?error=Sorry, For the technical problem. Please start again !!");
          exit();
      }
      if(isset($_SESSION['subject'])){
          if($subject_id != $_SESSION['subject']){
             header("Location: final.php?sid=".$_SESSION['subject']);
          }
      }
  }else{
    header("Location: home.php?error=Sorry, For the technical problem. Please start again !!");
    exit();
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
                            <p class="text-center">You are done!</p>
                          </div>
                          <p><span class="congrats">Congrats !</span> You have just completed the exam.</p>
                          <p><strong>Final Score: </strong>
                            <?php 
                              if (isset($_SESSION['score'])) {
                                echo $_SESSION['score'];

                              }
                            ?>
                          </p>
                        </div>

                        <div class="text-center">
                          <a href="viewanswer.php?sid=<?php echo $subject_id;?>" class="btn btn-primary" name="test">View Answer</a>
                          <a href="home.php" class="btn btn-primary" name="test">Start Again</a>
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