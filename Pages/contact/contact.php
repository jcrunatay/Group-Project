
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Contact - SB Admin</title>
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
            <a class="navbar-brand ps-3" href="../../index.php">Admin Panel</a>
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
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Users Managements</div>
                            <a class="nav-link" href="../Admin/users_managements.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Users
                            </a>
                            <div class="sb-sidenav-menu-heading">Pages</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Home
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                 <!--    <a class="nav-link" href="./slider.php">Slider</a> -->
                                    <a class="nav-link" href="../home/home.php">Home</a>
                           <!--          <a class="nav-link" href="./footer.php">Footer</a> -->
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                About
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../about/about.php">About</a>
                                   <!--  <a class="nav-link" href="layout-sidenav-light.html">XXX</a> -->
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Contact
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../contact/contact.php">Contact</a>
                                   <!--  <a class="nav-link" href="layout-sidenav-light.html">XXX</a> -->
                                </nav>
                            </div>
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
                            <a class="nav-link" href="../team/team.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Team
                            </a>
                  
                       <div class="sb-sidenav-menu-heading">Portfolio</div>
                            <a class="nav-link" href="../portfolio/portfolio.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Portfolio
                            </a>
                      <div class="sb-sidenav-menu-heading">Services</div>
                            <a class="nav-link" href="../service/service.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Services
                            </a>
                      <div class="sb-sidenav-menu-heading">Profile</div>
                            <a class="nav-link" href="../profile/profile.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Profile
                            </a>
                            </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Test User
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Contact Config</h2>
        <p class="lead">Below is the option to change your contact text and image or style of the text.</p>
      </div>
    <!--  FORM FOR THE contact -->
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Contact-info</h4>
          <form class="needs-validation" validate>
            <div class="row">
            
         <!--       Contact -->
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Contact name</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jean lessard">
             </div>
           <!--      Email -->
                <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
             </div>
          <!--    Adress  -->
             <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Adress address</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="1589 Montreal Est">
             </div>

             <div>
                              <!--  PICTURE -->
                <label for="formFileLg" class="form-label">Picture</label>
                    <input class="form-control form-control-lg" id="formFileLg" type="file">
                   </div>
                  

                   <div class="col-md-8 order-md-1">
                   <br>
          <h4 class="mb-3">Social Media</h4>
          <form class="needs-validation" validate>
            <div class="row">
            
            <div class="mb-3">
            <i class="fa-brands fa-facebook"></i>
            <label for="exampleFormControlInput1" class="form-label">Facebook</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jean lessard">
             </div>

                <div class="mb-3">
                <i class="fa-brands fa-instagram"></i>
            <label for="exampleFormControlInput1" class="form-label">Instagram</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Link to your page">
             </div>

             <div class="mb-3">
             <i class="fa-brands fa-youtube"></i>
            <label for="exampleFormControlInput1" class="form-label">Youtube</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Link to your page">
             </div>

             <div class="mb-3">
             <i class="fa-brands fa-discord"></i>
            <label for="exampleFormControlInput1" class="form-label">Discord</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Link to your page">
             </div>
             <br>
             <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Form</h4>
          <form class="needs-validation" validate>
            <div class="row">
            
         <!--       Contact -->
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Contact name</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jean lessard">
             </div>
           <!--      Email -->
                <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
             </div>
          <!--    Adress  -->
             <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Adress address</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="1589 Montreal Est">
             </div>

              <!--    hours -->
              <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Open hours</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="15h to 22h">
             </div>
             <div class="mb-3">
             <label for="exampleFormControlTextarea1" class="form-label">Form Text</label>
               <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
               <div class="invalid-feedback">
                  Valid text is required.
                </div>
                </div>
              </div>
             <div>
                              <!--  PICTURE -->
                <label for="formFileLg" class="form-label">Picture</label>
                    <input class="form-control form-control-lg" id="formFileLg" type="file">
                   </div>
             <div>
            <hr class="mb-4">

            <button class="btn btn-primary btn-lg btn-block" type="submit">Confirm the change</button>
            <hr class="mb-4">
            </form>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
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
                </footer>
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