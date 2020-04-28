<?php include('inc/header.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          <div class="row">
<?php 
    $query_department = "SELECT count(id) from tbl_department where `publication_status`='1' ";
    $query_user    = "SELECT count(id) from tbl_user where `publication_status`='1' ";
    $query_subject = "SELECT count(id) from tbl_subject where `publication_status`='1' ";
    $query_question = "SELECT count(id) from tbl_question";

    $red_department      = $db->select($query_department);
    $red_user    = $db->select($query_user);
    $red_subject = $db->select($query_subject);
    $red_question = $db->select($query_question);

    $result_department      = mysqli_fetch_assoc($red_department);
    $result_user    = mysqli_fetch_assoc($red_user);
    $result_subject = mysqli_fetch_assoc($red_subject);
    $result_question = mysqli_fetch_assoc($red_question);


    $result_department = $result_department['count(id)'];
    if(!$result_department>0){
        $result_department=0;
    }
    $result_user = $result_user['count(id)'];
    if(!$result_user>0){
        $result_user=0;
    }
    $result_subject = $result_subject['count(id)'];
    if(!$result_subject>0){
        $result_subject=0;
    }
    $result_question = $result_question['count(id)'];
    if(!$result_question>0){
        $result_question=0;
    }

?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total User</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $result_user;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Department</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $result_department;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-cog fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Course</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $result_subject;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Question</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $result_question;?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-question fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            





          </div>

          

        </div>
        <!-- /.container-fluid -->

 <?php include('inc/footer.php');?>