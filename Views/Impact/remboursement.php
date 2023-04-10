<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>VITALIA</title>
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
  <!--<link href="assets/css/list.css" rel="stylesheet">-->

  <!-- =======================================================
  * Template Name: Impact
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>VITALIA<span>.</span> </h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <!-- ======= add assurance Section ======= -->
  <style>
#idbutton {
    background: var(--color-primary);
    border: 0;
    padding: 14px 45px;
    color: #fff;
    transition: 0.4s;
    border-radius: 50px;
}
.form-center{
  display:flex;
  justify-content: center;
}
 </style> 
<div class="container">
  <div class ="section-header">
              <h2>Remboursement</h2>
</div>      
<form method="post" action="addRembourement.php">       
              <div class="form-center">
              <form >
              <div class="form-group">
   
  <div class="form-group">
    <div class ="row">
    <label for="pourcentage_remb">Pourcentage </label>
    <input type ='float' required name ='pourcentage_remb' id='pourcentage_remb' placeholder="Entrer la pourcentage ">
  </div>
  <div class="form-group">
  <div class ="row">
  <label for="date_remb">Date  </label>  
  <input type ='text' required name ='date_remb' id='date_remb' placeholder="Entrer la date">
  </div>
  </div>
  <div class="form-group">
  <div class ="row">
   <!--
 <select class="custom-select" multiple>
  <option selected>Assurance type</option>
  <option value="1">Cnss</option>
  <option value="2">cnrps</option>
  <option value="3">convention bilatérale</option>
</select> -->
<div class="form-group">
  <div class ="row">
  <label for="observation_remb"> observation</label>  
  <input type ='text' required name ='observation_remb' id='observation_remb' placeholder="Entrer observation">
  </div>
  <div class="form-group">
  <div class ="row">
  <label for="cotisation_remb"> observation</label>  
  <input type ='text' required name ='cotisation_remb' id='cotisation_remb' placeholder="Entrer la cotisation">
  </div>
  <div class="form-group">
  <div class ="row">
  <label for="observation_remb"> observation</label>  
  <input type ='text' required name ='observation_remb' id='observation_remb' placeholder="Entrer observation">
  </div>
  
<!--<form action="frontAddAssurance.php">
<label for="type_assurance">Type Assurance  </label> 
  <select id="type" name="type" size="3" multiple>
    <option value="Cnss">Cnss</option>
    <option value="Cnrps">Cnrps</option>
    <option value="Convention bilatérale">convention bilatérale</option>
  </select>-->
  <!--<input type="submit" name='ok'>-->
</form>
</div>
</div>
  <div class="text-center">
                <button id='idbutton' type="submit" name='idbutton'>add remboursement</button></div>
</form>
</div>
</div>
</div>
</form>

  </section>
