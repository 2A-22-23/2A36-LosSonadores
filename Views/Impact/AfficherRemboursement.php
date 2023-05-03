<?php
//include 'C:\xampp\htdocs\t_assurance\Controller\remboursement.php';
require 'C:\xampp\htdocs\t_assurance\Controller\remboursement.php';

$as = new Remboursement();
$email = $_GET['email'];
$list = $as->AfficherRemboursement($email);
?>
<html>
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
      <nav id="navbar" class="navbar">
        <ul>
          
          <li><a href="#assurance"> Assurance</a></li>
       
        
        </ul>
      </nav><!-- .navbar -->

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
     <?php 
    if (isset($_POST['delete'])) {
      $id = $_POST['id_remb'];
      $Remboursements = new Remboursement();
      $Remboursements->deleteRemboursement($id); // Call the deleteAssurance function with the ID of the record to delete
      //header('Location: AfficherRemboursement.php');
      header('Location: verification.php');
      exit();
    }

    if (isset($_POST['update'])) {
      echo "jareb";
      $id = $_POST['id_remb'];
      $matricule = $_POST['matricule_remb'];
      $pourcentage = $_POST['pourcentage_remb'];
      $observation = $_POST['observation_remb'];
      $cotisation = $_POST['cota_remb'];
      $date = $_POST['date_remb'];
      $Remboursements = new Remboursement();
      $Remboursements->updateRemboursement($id,$matricule, $pourcentage, $observation,$cotisation,$date);
      //header('Location: AfficherRemboursement.php');
      header('Location: verification.php');
      exit();
    }

    ?> 

<div class="text-center">
<div class ="row">

 
  <div class="assurance">
    <h2>Remboursement</h2>
    <?php foreach ($list as $Remboursements) { ?>
      <form method="post">
      <input type="hidden" name="id_remb" value="<?= $Remboursements['id_remb']; ?>">
      <div class="form-group">
          <label for="nom">matricule </label>
         <input type="text" name="matricule_remb"id='matricule_remb' placeholder="Entrer votre nom"  value="<?= $Remboursements['matricule_remb']; ?>" <?= isset($_POST['idbutton']) ? '' : 'readonly'; ?>>
    
        </div>
        <div class="form-group">
          <label for="nom">pourcentage </label>
         <input type="text" name="pourcentage_remb"id='pourcentage_remb' placeholder="Entrer votre nom"  value="<?= $Remboursements['pourcentage_remb']; ?>" <?= isset($_POST['idbutton']) ? '' : 'readonly'; ?>>
    
        </div>
       
        <div class="form-group">
          <label for="nom">observation </label>
         <input type="text" name="observation_remb"id='observation_remb' placeholder="Entrer votre nom"  value="<?= $Remboursements['observation_remb']; ?>" <?= isset($_POST['idbutton']) ? '' : 'readonly'; ?>>
   
        </div>
        <div class="form-group">
       
          <label for="nom">cota </label>
        
          <input type="text" name="cota_remb"id='cota_remb' placeholder="Entrer votre nom"  value="<?= $Remboursements['cota_remb']; ?>" <?= isset($_POST['idbutton']) ? '' : 'readonly'; ?>>
    
        </div>
        <div class="form-group">
       
       <label for="nom">date </label>
     
       <input type="date" name="date_remb"id='date_remb' placeholder="Entrer votre date"  value="<?= $Remboursements['date_remb']; ?>" <?= isset($_POST['idbutton']) ? '' : 'readonly'; ?>>
 
     </div>
        </div>

        <?php if (isset($_POST['idbutton'])) { ?>
          <div class="text-center">
            <button type="submit" name="update" class="btn btn-primary">Save</button>
          </div>
        <?php } else { ?>
          <div class="text-center">
            <button type="submit" name="idbutton" class="btn btn-secondary">Edit</button>
            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
          </div>
        
        <?php } ?>
      </form>
    <?php } ?>
        
    
  </div>
</div>


