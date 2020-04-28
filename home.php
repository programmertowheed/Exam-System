<?php include('inc/header.php');?>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 m-auto">
            <div class="panel panel-default">
                
                <div class="panel-body">
                  <div class="well text-center" style="margin: 0">
                    <strong>Online exam</strong>
                  </div>
                  <div class="formouter">
                      <form action="starttest.php" method="post">

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


                        <div class="form-group">
                            <label for="department_id">Department</label>
                            <select name="department_id" id="department_id" class="form-control">
                                <option value="" selected>Select Department</option>
                            <?php
                                $red = $dpart->getDepartment();
                                if($red==true){
                                    while($value = mysqli_fetch_assoc($red)){ ?>

                                    <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>

                            <?php } } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subject_id">Course</label>
                            <select name="subject_id" id="subject_id" class="form-control">
                                <option value="" selected>Select Course</option>
                            </select>
                        </div>
                        <div class="text-center">
                          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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