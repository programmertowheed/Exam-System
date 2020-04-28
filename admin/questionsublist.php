<?php include('inc/header.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php 
              if(isset($_REQUEST['subid'])){
                  $subid  = $fm->validation($_REQUEST['subid']);
                  if(empty($subid)){
                      header("Location:questionlist.php?err=ID not found!!");
                  }
              } 
          ?>
          <?php if(isset($_GET['msg'])){
            $msg = $_GET['msg'];?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $msg ?></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php } ?>

        <?php if(isset($_GET['err'])){
            $error = $_GET['err'];?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo $error ?></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php }?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary d-inline-block">Question answer List</h6>
              <a href="addquestion.php" class="btn btn-sm btn-primary shadow-sm float-right">Add Question</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                    <tr>
                      <th width="5%">SL</th>
                      <th width="5%">Question No</th>
                      <th width="45%">Question</th>
                      <th width="35%">Answer</th>
                      <th width="10%">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th width="5%">SL</th>
                      <th width="5%">Question No</th>
                      <th width="45%">Question</th>
                      <th width="35%">Answer</th>
                      <th width="10%">Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
<?php
  $i = 0;
  $red = $ques->getQuestionAnswerList($subid);
  if($red==false){?>
  <td colspan="4"><h4 class="text-center">No Data Found</h4></td>
  <?php }else{
  while($res = mysqli_fetch_assoc($red)){ $i++ ?>
                    <tr>
                      <td><?php echo $i ;?></td>
                      <td><?php echo $res['question_no'];?></td>
                      <td><?php echo $res['question'];?></td>
                      <td>
                      <?php 
                        $k = 0;
                         $ansred = $ques->getAnswerListByQno($res['question_no']);
                        if($ansred==true){
                          while($ansres = mysqli_fetch_assoc($ansred)){ $k++;
                            if($ansres['right_answer'] == '1'){
                              echo "<span style='color:green'>".$k.". ".$ansres['answer']."</span><br/>";
                            }else{
                              echo $k.". ".$ansres['answer']."<br/>";
                            }
                          } 
                        }else{
                          echo "NO answer found";
                        } 
                      ?>

                      </td>
                      <td>
                        <a href="editquestion.php?qno=<?php echo $res['question_no'];?>&subid=<?php echo $res['subject_id'];?>" type="button" data-toggle="tooltip" title="Edit issue book" class="btn btn-link btn-primary pd0" data-original-title="Edit Task">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="crud/deletequestionans.php?qno=<?php echo $res['question_no'];?>&subid=<?php echo $res['subject_id'];?>" type="button" data-toggle="tooltip" onclick="return confirm('Are you sure to delete this question?');" title="Return book" class="btn btn-link btn-danger pd0" data-original-title="Return book">
                            <i class="fa fa-trash-alt"></i>
                        </a>
                      </td>
                    </tr>
<?php  } } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

<?php include('inc/footer.php');?>