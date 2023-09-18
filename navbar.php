<?php
session_start();

if(isset($_SESSION['admin_id']))
{
    echo "";
    $admin_id=$_SESSION['admin_id'];
}
else
{
    header('location: adminlogin.php');
}
?>



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">



<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img src="logo.jpg"  height="50px" alt="Panel" loading="lazy" />
            </a>
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addworker.php">Add Worker</a>
                </li>
                
            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <!-- Icon -->
            <ul class="navbar-nav">
            <li class="nav-item">
                <span class="badge rounded-pill bg-success"><?php echo $admin_id; ?></span>
                <a class="" href="logout.php">Logout</a>
                
            </li>
           
          </ul> 




        </div>

    </div>

</nav>