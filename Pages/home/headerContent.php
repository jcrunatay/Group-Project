<?php include "../../core.php";

$pageContent = $db->getPageContent();
$sliderImages = empty($pageContent['slider']) ? [] : explode(',', $pageContent['slider']); // extract list of the slider image filepaths into an array
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
        <title>Home - SB Admin</title>
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
                            <a class="nav-link" href="headerContent.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Home
                            </a>
                            <a class="nav-link" href="slider.php">
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
                            <a class="nav-link" href="../service/allServices.php">
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
        <h2 class="display-3">Home Config</h2>
        <class="lead">Change your home text, information in about section and contacts .</p-->
      </div>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </symbol>
      <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
      </symbol>
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
    </svg>

    <!-- SHOW ERROR ALERT IF ADD IS SUCCESSFUL-->
    <?php if (isset($_SESSION['errmsg'])) : ?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
      <div>
        <?= $_SESSION['errmsg'] ?? "" ?>
      </div>
    </div>
    <?php endif; unset($_SESSION['errmsg']); ?>

    <!-- SHOW SUCCESS ALERT IF ADD IS SUCCESSFUL-->
    <?php if (isset($_SESSION['successmsg'])) : ?>
        <div class="alert alert-success d-flex align-items-center" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
          <div>
             <?= $_SESSION['successmsg'] ?? "" ?>
          </div>
        </div>

    <?php endif; unset($_SESSION['successmsg']); ?>
    <br>

    <!--  FORM FOR THE SLIDER -->
        <div class="col-md-6 order-md-1">
            <form class="needs-validation" validate action="../../formSubmission.php" method="POST" enctype="multipart/form-data">
             <h4 class="mb-3 display-6">Header Section </h4>
             <hr class="mb-4">

  
                <!--   Company Name -->
               <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label">Company Name</label>
             <input type="text" class="form-control" id="exampleFormControlInput1"  name="company_name" minlength="2" maxlength="30" required value="<?= $pageContent['company_name']?>">
                </div>


            <!--   Welcome Text -->
               <div class="mb-3">
               <label for="exampleFormControlInput2" class="form-label">Welcome Text</label>
             <textarea class="form-control" rows="3" name="welcome_text" minlength="10" maxlength="150" required><?= $pageContent['welcome_text']?></textarea>
                </div>
             <br>   
            <h4 class="mb-3 display-6">About Section </h4>
            <hr class="mb-4">
            
            <!--   About Image -->
               <div class="mb-3">
               <label for="exampleFormControlInput3" class="form-label">About Image</label>
               <input type="file" class="form-control" id="exampleFormControlInput3" name="image" accept="image/*"> 
                </div>


                <!--   About Header -->
               <div class="mb-3">
               <label for="exampleFormControlInput4" class="form-label">About Header</label>
             <input class="form-control" rows="3" name="about_header" minlength="5" maxlength="150" required value="<?= $pageContent['about_header'] ?>">
                </div>

             <!--  About Text -->
             <div class="mb-3">
               <label for="exampleFormControlInput5" class="form-label">About Text</label>
             <textarea class="form-control" rows="3" name="about_text" minlength="10" maxlength="150" required ><?= $pageContent['about_text'] ?></textarea>
                </div>
                <br>
            <h4 class="mb-3 display-6">Contact Section </h4>
            <hr class="mb-4">
            
            <!--   Address -->
               <div class="mb-3">
               <label for="exampleFormControlInput6" class="form-label">Address </label>
             <input type="text" class="form-control" name="address" minlength="10" maxlength="50" required value="<?= $pageContent['address']?>">
                </div>


                <!--  Email -->
               <div class="mb-3">
               <label for="exampleFormControlInput7" class="form-label">Email </label>
             <input  type="email" class="form-control" rows="3" name="email" minlength="10" maxlength="50" required value="<?= $pageContent['email'] ?>">
                </div>

             <!-- Phone Number -->
             <div class="mb-3">
               <label for="exampleFormControlInput8" class="form-label">Phone Number </label>
            <input  type="number" class="form-control" rows="3" name="phone_number" minlength="8" maxlength="12" required value="<?= $pageContent['phone_number'] ?>">

            </div>
            <br>
        
              
            <hr class="mb-4">
            <input class="btn btn-success btn-lg btn-block" type="submit" value="Save Page Content" name="submit">
            </form>
            <br><br>
        </div>

    </div>
                </main>

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