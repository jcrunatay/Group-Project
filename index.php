<!DOCTYPE html>

<?php 
spl_autoload_register(function ($class_name) {
  include "classes/" . $class_name . ".class.php";
});
//session_start();
$db = new DBManager();

// retrieve data from DB
$pageContent = $db->getPageContent();
$services = $db->getAllServices(true);
$portfolios = $db->getAllPortfolios(true); 
$team = $db->getAllTeam(true);
$socials = $db->getSocial();

$companyName = empty($pageContent['company_name']) ? "[Company Name]" : $pageContent['company_name']; // pulling this out of the array for the sake of convenience, since this is used multiple times 
$sliderImages = empty($pageContent['slider']) ? [] : explode(',', $pageContent['slider']); // extract list of the slider image filepaths into an array

?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $companyName ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizLand - v3.8.1
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html"><?= $companyName ?><span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->  

  <!-- get Upconstruction slider ======= Hero Section ======= -->
  <section id="hero" class="hero">

    <div class="info d-flex align-items-center">
      <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <div class="row">
          <div class="">
            <h1 data-aos="fade-down">Welcome to <span><?= $companyName ?></span></h1>
            <h2 data-aos="fade-up"><?= empty($pageContent['welcome_text']) ? "Welcome Text" : $pageContent['welcome_text'] ?></h2>
            <!--a data-aos="fade-up" data-aos-delay="200" href="#get-started" class="btn-get-started">Get Started</a-->
          </div>
        </div>
      </div>
    </div>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
      <?php if (empty($sliderImages)) : ?>
        <div class="carousel-item active" style="background-image: url(assets/img/hero-carousel/hero-carousel-1_2.jpg)"></div>
        <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/hero-carousel-2.jpg)"></div>
        <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/hero-carousel-3.jpg)"></div>
        <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/hero-carousel-4.jpg)"></div>
        <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/hero-carousel-5.jpg)"></div>
      <?php else : ?> 
        <?php for ($i = 0; $i < count($sliderImages); $i++) : ?>
          <div class="<?= $i == 0 ? 'carousel-item active' : 'carousel-item' ?>" style="background-image: url(<?= $sliderImages[$i] ?>)"></div>
        <?php endfor; ?>
      <?php endif; ?>

      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>

  </section><!-- End Hero Section -->


  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
          <h3>Find Out More <span>About Us</span></h3>
        </div>

        <div class="row ">
          <div class="col-lg-5 m-auto" data-aos="fade-right" data-aos-delay="100">
            <img src="<?= empty($pageContent['about_img']) ? 'assets/img/about.jpg' : $pageContent['about_img'] ?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-4 pt-4 pt-lg-0  content d-flex flex-column" data-aos="fade-up" data-aos-delay="100">
            <h3 class="mb-3 mt-4"><?= empty($pageContent['about_header']) ? 'Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.' : $pageContent['about_header'] ?></h3>
            <!--p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li>
                <i class="bx bx-store-alt"></i>
                <div>
                  <h5>Ullamco laboris nisi ut aliquip consequat</h5>
                  <p>Magni facilis facilis repellendus cum excepturi quaerat praesentium libre trade</p>
                </div>
              </li>
              <li>
                <i class="bx bx-images"></i>
                <div>
                  <h5>Magnam soluta odio exercitationem reprehenderi</h5>
                  <p>Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna pasata redi</p>
                </div>
              </li>
            </ul-->
            <p class="lh-lg">
              <?= empty($pageContent['about_text']) ? 'Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum' : $pageContent['about_text'] ?>
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <h3>Check our <span>Services</span></h3>
          <!--p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p-->
        </div>

        <div class="row">
          <?php if(empty($services)) : ?>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box px-0 pt-0">
                <img src="assets/img/hero-carousel/hero-carousel-1_2.jpg">
                <h4 class="mx-2 mt-4">Luos dolore</h4>
                <p class="mx-2">deleniti atque corrupti quos dolores et quas molestias excepturi Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi align-items-stretch</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon-box px-0 pt-0">
                <img src="assets/img/hero-carousel/hero-carousel-1.jpg">
                <h4 class="mx-2 mt-4">Molestias Excepturi</h4>
                <p class="mx-2">Voluptatuti quos dolores et quas molestias excepturi Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi align-items-stretch</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box px-0 pt-0">
                <img src="assets/img/hero-carousel/hero-carousel-2.jpg">
                <h4 class="mx-2 mt-4">Corrupti Quos</h4>
                <p class="mx-2">Voluptatum deleniti atque corrupti quos dolores et quas molestias eleniti atque corrupti quos dolores et quas molestias</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box px-0 pt-0">
                <img src="assets/img/hero-carousel/hero-carousel-3.jpg">
                <h4 class="mx-2 mt-4">Dolores</h4>
                <p class="mx-2">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi Voluptatupturi Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi align-items-stretch</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon-box px-0 pt-0">
                <img src="assets/img/hero-carousel/hero-carousel-4.jpg">
                <h4 class="mx-2 mt-4">Voluptatum</h4>
                <p class="mx-2">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi align-items-stretch</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box px-0 pt-0">
                <img src="assets/img/hero-carousel/hero-carousel-5.jpg">
                <h4 class="mx-2 mt-4">Deleniti Atque</h4>
                <p class="mx-2">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi Voluptatum delretch</p>
              </div>
            </div>
          <?php else : ?>

            <?php
            $data_aos_delay_counter = 0;    
            for ($i=0; $i < count($services); $i++) { 

              //echo "Services Count : " . count($services) . "<br>";
              //echo " I count :" . $i;
               // get needed bootsrap class margin according to the service current count 
             $addedClass = "";
             if ($i == 1) {
              $addedClass = "mt-4 mt-md-0"; 
            }elseif ($i == 2) {
             $addedClass = "mt-4 mt-lg-0"; 
           }elseif($i >= 3){
            $addedClass = "mt-4";
          }

          // get needed  attribute data-aos-delay according to the service current count 
          $data_aos_delay_counter++;
          //if first column in a row
          $data_aos_delay = "100";

          //if 2nd column in a row
          if ($data_aos_delay_counter == 2) {
            $data_aos_delay = "200";

                }elseif ($data_aos_delay_counter == 3) {//if 3rd column in a row
                  $data_aos_delay = "300";
                  $data_aos_delay_counter = 0;
                }

                ?>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch <?= $addedClass ?>" data-aos="zoom-in" data-aos-delay="<?= $data_aos_delay ?>">
                  <div class="icon-box px-0 pt-0">
                    <img src="<?= $services[$i]->getImage() ?>">
                    <h4 class="mx-2 mt-4"><?= $services[$i]->getTitle() ?></h4>
                    <p class="mx-2"><?= $services[$i]->getText() ?></p>
                  </div>
                </div>

              <?php } //close the for loop ?>


            <?php endif; ?>
          </div>
        </div>
      </section><!-- End Services Section -->

      <!-- ======= Portfolio Section ======= -->
      <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Portfolio</h2>
            <h3>Check our <span>Portfolio</span></h3>
            <!--p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p-->
          </div>

        <!--div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div-->

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          <?php if(empty($portfolios)) : ?>
            <div class="col-lg-4 col-md-6 portfolio-item ">
              <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" 
                title="App 1<br><br>modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasamodi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasa modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasa modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita">
                <i class="bx bx-plus"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item ">
              <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" 
                title="Web 3<br><br>modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasamodi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasa modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasa modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita"
                ><i class="bx bx-plus"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item ">
              <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" 
                title="App 2<br><br>modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasamodi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasa modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasa modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita"
                ><i class="bx bx-plus"></i></a>            
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item ">
              <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" 
                title="Card 2<br><br>modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasamodi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasa modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasa modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita"
                ><i class="bx bx-plus"></i></a>            
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item ">
              <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 2</h4>
                <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" 
                title="Web 2<br><br>modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasamodi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasa modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasa modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita"
                ><i class="bx bx-plus"></i></a>             
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item ">
              <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 3</h4>
                <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" 
                title="App 3<br><br>modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasamodi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasa modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasa modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita"
                ><i class="bx bx-plus"></i></a>           
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item ">
              <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 1</h4>
                <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" 
                title="Card 1<br><br>modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasamodi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasa modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasa modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita"
                ><i class="bx bx-plus"></i></a>             
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item ">
              <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" 
                title="Card 3<br><br>modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasamodi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasa modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasa modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita"
                ><i class="bx bx-plus"></i></a>          
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item ">
              <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" 
                title="Web 3<br><br>modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasamodi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasa modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita at asdasdasd asdas dasdasdasdasdsa asdasdas asdsa asdasdasdasdas dasa modi omnis est adipisci expedita at modi omnis est adipisci expedita at modi omnis est adipisci expedita"
                ><i class="bx bx-plus"></i></a>
              </div>
            </div>
          <?php else : ?>
            <?php foreach($portfolios as $portfolio) : ?>
              <div class="col-lg-4 col-md-6 portfolio-item ">
                <img src="<?= $portfolio->getImage() ?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4><?= $portfolio->getTitle() ?></h4>
                  <a href="<?= $portfolio->getImage() ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" 
                    title="<?= $portfolio->getTitle() ?><br><br><?= $portfolio->getText() ?>"
                    ><i class="bx bx-plus"></i></a>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </section><!-- End Portfolio Section -->

      <!-- ======= Team Section ======= -->
      <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Team</h2>
            <h3>Our Hardworking <span>Team</span></h3>
            <!--p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p-->
          </div>

          <div class="row">
            <?php if (empty($team)) : ?>
              <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="member">
                  <div class="member-img">
                    <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="member-info">
                    <h4>Walter White</h4>
                    <p style="font-style: normal;">Chief Executive Officer</p>
                    <span><i>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua .</i></span>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="member">
                  <div class="member-img">
                    <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="member-info">
                    <h4>Sarah Jhonson</h4>
                    <p style="font-style: normal;">Product Manager</p>
                    <span><i>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua .</i></span>

                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                <div class="member">
                  <div class="member-img">
                    <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="member-info">
                    <h4>William Anderson</h4>
                    <p style="font-style: normal;">CTO</p>
                    <span><i>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua .</i></span>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                <div class="member">
                  <div class="member-img">
                    <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="member-info">
                    <h4>Amanda Jepson</h4>
                    <p style="font-style: normal;">Accountant</p>
                    <span><i>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua .</i></span>
                  </div>
                </div>
              </div>
            <?php else : ?>

              <?php

              $data_aos_delay_counter = 0;    
              for ($i=0; $i < count($team); $i++) { 

               // get needed  attribute data-aos-delay according to the team member current count 
                $data_aos_delay_counter++;
                //if first column in a row
                $data_aos_delay = "100";

                //if 2nd column in a row
                if ($data_aos_delay_counter == 2) {
                  $data_aos_delay = "200";

                }elseif ($data_aos_delay_counter == 3) {//if 3rd column in a row
                  $data_aos_delay = "300";
                  
                }elseif ($data_aos_delay_counter == 4) {//if 4th column in a row
                  $data_aos_delay = "400";
                  $data_aos_delay_counter = 0;
                }

                ?>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="<?= $data_aos_delay ?>">
                  <div class="member">
                    <div class="member-img">
                      <img src="<?= $team[$i]->getImage() ?>" class="img-fluid" alt="">
                    </div>
                    <div class="member-info">
                      <h4><?= $team[$i]->getName() ?></h4>
                      <p style="font-style: normal;"><?= $team[$i]->getTitle() ?></p>
                      <span><i><?= $team[$i]->getText() ?></i></span>
                    </div>
                  </div>
                </div>

              <?php } //close the for loop  ?>

            <?php endif; ?>
          </div>

        </div>
      </section><!-- End Team Section -->


      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Contact</h2>
            <h3><span>Contact Us</span></h3>
            <!--p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p-->
          </div>

          <!-- ======= Make some changes ======= -->
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6">
              <div class="info-box mb-4">
                <i class="bx bx-map"></i>
                <h3>Our Address</h3>
                <p><?= empty($pageContent['address']) ? 'A108 Adam Street, New York, NY 535022' : $pageContent['address'] ?></p>
              </div>

              <div class="row" data-aos="fade-up" data-aos-delay="100"> 
                <div class="col-lg-6 col-md-6">
                  <div class="info-box  mb-4">
                    <i class="bx bx-envelope"></i>
                    <h3>Email Us</h3>
                    <p><?= empty($pageContent['email']) ? 'contact@example.com' : $pageContent['email'] ?></p>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6">
                  <div class="info-box  mb-4">
                    <i class="bx bx-phone-call"></i>
                    <h3>Call Us</h3>
                    <p><?= empty($pageContent['phone_number']) ? '+1 5589 55488 55' : $pageContent['phone_number'] ?></p>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <input type="hidden" name="email" value=" <?= empty($pageContent['email']) ? '' : $pageContent['email'] ?>">
                <div class="row">
                  <div class="col form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                  </div>
                  <div class="col form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>


          </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3><?= $companyName ?><span>.</span></h3>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Portfolio</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#team">Team</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <?php if (empty($socials)) : ?>
              <p>Coming Soon!</p>
            <?php else : ?>
              <div class="social-links mt-3">
                <?php foreach ($socials as $site => $username) : ?>
                  <a href="https://<?=$site?>.com/<?= $site == 'linkedin' ? 'company/' : '' ?><?=$username?>"><i class="bx bxl-<?=$site?>"></i></a>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Admin Link</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="admin_panel.php">Login as Admin</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span><?= $companyName ?></span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>