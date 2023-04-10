<?php
include '../Controller/pharmacieC.php';
$pharmacieC = new pharmacieC();
$listname1 = $pharmacieC->listpharmaciename("name1");


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Impact Bootstrap Template - Blog</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  
</head>

<body>

  <!-- ======= Header ======= -->
  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section><!-- End Top Bar -->

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>VITALIA<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a></li>
        
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Rendez-Vous</a></li>
          <li><a href="blog.html">PHARMACIE</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>pharmacie</h2>

            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>pharmacie</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->


<section class="List">
    <ul class="Tablelist">
         <li class="Type Type1">
				<h1 class="Title_Types"> Type 1</h1>
				<ul class="UnType">
				<?php
				foreach ($listtype1 as $pharmacie) 
        		{
        		?>
					<li class="Unpharmacie">
						<input type="hidden" id="idphar" value="<?= $pharmacie['idphar']; ?>"/>
                        <input type="hidden" id="idordo" value="<?= $pharmacie['idordo']; ?>"/>
                        
						<button class="card_pharmacie">
							<div class="card_pharmacie_contenu">
								<div class="card_frontinfo">
									<img src="./blog/<?= $pharmacie['image']; ?>" alt="pharmacie" class="img_pharmacie">
								</div>
								<div class="card_backinfo">
								<p class="post-category">Tunis</p>

									<h1 class="Nompharmacie"><?= $pharmacie['Name']; ?></h1>
									<h2 class="Prixpharmacie"><?= $pharmacie['ville']; ?></h2>
									<h2 class="Datepharmacie"><?= $pharmacie['adresse']; ?></h2>
									<h2 class="Timepharmacie"><?= $pharmacie['time']; ?></h2>
								</div>
							</div>
						</button>
					</li>
				<?php
       			}
        		?>	
				</ul>
			</li>
         </ul>
     </section>