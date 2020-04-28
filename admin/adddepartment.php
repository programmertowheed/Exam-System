<?php include('inc/header.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Department</h1>
          </div>

          <?php 
            if(isset($_REQUEST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
                $adddepartment = $dpart->addDepartment($_POST,$current_time); 
            }
          ?>

          <?php if(isset($adddepartment['success'])){
            $msg = $adddepartment['success'];?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $msg ?></strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php } ?>

        <?php if(isset($adddepartment['error'])){
            $error = $adddepartment['error'];?>
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
                <form role="form" action="adddepartment.php" method="post">
                    <div class="form-group">
                        <label for="inputSuccess">Department name</label>
                        <input type="text" class="form-control" name="name" id="inputSuccess">
                    </div>
                     <div class="form-group">
                        <label for="publication_status">Publication Status</label>

                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="inlineRadio1">
                                <input class="form-check-input" id="inlineRadio1" type="radio" name="publication_status" checked value="1">Published</label>

                            <label class="form-check-label" for="inlineRadio2">
                                <input class="form-check-input" id="inlineRadio2" type="radio" name="publication_status" value="2">Unpublished</label>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Add Department</button>
                </form>
            </div>

     </div>
        <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>