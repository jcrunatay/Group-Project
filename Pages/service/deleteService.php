<?php   include "../../core.php"; 

if (empty($_SESSION['user'])) {
 header("location: ../../admin_panel.php"); 
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Add Service - SB Admin</title>
        <link href="../../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <style>
      #body-users {
        background-color:whitesmoke ;
      }

      #table-users {
        border: 1px solid;
       padding: 5px;
       box-shadow: 10px 10px 10px 10px black;
      }
    </style>
    
    <body  id="body-users">
        
  
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../../admin_panel.php">Admin Panel</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
               <!--  <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div> -->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <!--li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li-->
                        <li><a class="dropdown-item" href="../../core.php?logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <?php if($_SESSION['user']->getLevel()) : ?>
                            <div class="sb-sidenav-menu-heading">Users Managements</div>
                            <a class="nav-link" href="../Admin/allUsers.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Users
                            </a>
                            <?php endif;?>
                                                      <div class="sb-sidenav-menu-heading">Pages</div>
                            <a class="nav-link" href="../home/headerContent.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Home
                            </a>
                            <a class="nav-link" href="../home/slider.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Slider
                            </a>
                            <a class="nav-link" href="../contact/social_media.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Social Media
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Team</div>
                            <a class="nav-link" href="../team/allTeamMembers.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Team
                            </a>
                  
                       <div class="sb-sidenav-menu-heading">Portfolio</div>
                            <a class="nav-link" href="../portfolio/portfolio.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Portfolio
                            </a>
                      <div class="sb-sidenav-menu-heading">Services</div>
                            <a class="nav-link" href="allServices.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Services
                            </a>
                      <div class="sb-sidenav-menu-heading">Profile</div>
                            <a class="nav-link" href="../profile/profile.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Profile
                            </a>
                        <div class="sb-sidenav-menu-heading">Website Page</div>
                            <a class="nav-link" href="../../index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Page
                            </a>    
                            </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                         <?php 
                        $level = isset($_SESSION['user']) ? $_SESSION['user']->getLevel()  : "";
                        $nameLevel = ($level == 1) ? "Administrator" : "Moderator";

                        echo $_SESSION['user']->getUsername() . "($nameLevel)"; 

                        ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                    <div class="py-5 text-center">
        <!--img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"-->
        <h2 class="display-4"> Delete Service </h2>
      </div>
      <div class="col-md-8 order-md-1" role="form" >
          <!--h4 class="mb-3">Picture </h4-->
          <form class="needs-validation" validate enctype="multipart/form-data" method="post" action="../../formSubmission.php">
            <div class="row">

             <!--  Hidden ID -->    
            <input type="hidden" value="<?= $_GET['id'] ?>" name="id" readonly>
            <div>   
                 <!--  #1 PICTURE -->
                <label  class="form-label">Service Image</label><br>
                <img src="<?= "../../".$_GET['image']?>" style="width: 200px;height: 200px;">
            </div>
             <div>
               
             <br>
             <div class="col-md-8 order-md-1">
          <!--h4 class="mb-3">Title</h4-->
            <div class="row">

                 <!--     Title -->
                 <div class="mb-3">
           <label  class="form-label">Title</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="<?= $_GET['title']?>" readonly>
             </div>

        <div class="col-md-8 order-md-1">
          <!--h4 class="mb-3">Text</h4-->
            <div class="row">
              <!-- TEXT #1  -->
              <div class="mb-3" >
              <label  class="form-label">About the Service</label>
               <textarea rows="8"class="form-control " id="exampleFormControlTextarea1" rows="3" name="text" readonly><?= $_GET['text'] ?></textarea>
               <div class="invalid-feedback">
                  Valid first service is required.
                </div>
                </div>
              </div>        
                <div>
            
      
            <hr class="mb-4">

            <input class="btn btn-danger btn-lg btn-block" type="submit" value="Delete Service" name="submit" onclick="return confirm('Are you sure you want to delete the service ?')">
            <a class="btn btn-warning btn-lg btn-block" href="allServices.php"> Cancel </a>

            </form>
            <br>

      <!--footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer-->
    </div>
                </main>
                <!--footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer-->
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
              
           
    </body>
</html>