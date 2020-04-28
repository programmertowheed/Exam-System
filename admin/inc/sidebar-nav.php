<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-book-reader"></i>
    </div>
    <div class="sidebar-brand-text mx-3">exam system</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="index.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <!-- <div class="sidebar-heading">
    Interface
  </div> -->

  <!-- Nav Item Collapse Menu -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#userarea" aria-expanded="true" aria-controls="userarea">
      <i class="fas fa-fw fa-cog"></i>
      <span>User</span>
    </a>
    <div id="userarea" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Users area:</h6>
        <a class="collapse-item" href="adduser.php">Add User</a>
        <a class="collapse-item" href="userlist.php">User List</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#departmenrarea" aria-expanded="true" aria-controls="departmenrarea">
      <i class="fas fa-fw fa-cog"></i>
      <span>Department</span>
    </a>
    <div id="departmenrarea" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Departments area:</h6>
        <a class="collapse-item" href="adddepartment.php">Add Department</a>
        <a class="collapse-item" href="departmentlist.php">Department List</a>
      </div>
    </div>
  </li>


  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#subjectarea" aria-expanded="true" aria-controls="subjectarea">
      <i class="fas fa-user"></i>
      <span>Course</span>
    </a>
    <div id="subjectarea" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Courses area:</h6>
        <a class="collapse-item" href="addsubject.php">Add Course</a>
        <a class="collapse-item" href="subjectlist.php">Course List</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#addquestion" aria-expanded="true" aria-controls="addquestion">
      <i class="fas fa-users"></i>
      <span>Add question</span>
    </a>
    <div id="addquestion" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Question area:</h6>
        <a class="collapse-item" href="addquestion.php">Add question</a>
        <a class="collapse-item" href="questionlist.php">Question List</a>
      </div>
    </div>
  </li>

  <!-- Nav Item Collapse Menu End-->
 

 
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <!-- Design and develop by programmertowheed-->
      <!-- URL: https://www.programmertowheed.com -->

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>