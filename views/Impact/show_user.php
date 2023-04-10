<?php
include "C:/xampp/htdocs/tojrab03/controller/clientc.php";

session_start();
$db=config::getConnexion();
if(isset($_SESSION['idclient'])){
   $idclient = $_SESSION['idclient'];
}else{
   $idclient = '';
};

?>
<!DOCTYPE html>
<html>
  <!--<head>
    <meta charset="UTF-8">
    <title>Mon compte utilisateur</title>
    <link rel="stylesheet" href="../Impact/assets/css/show_user.css">
  </head>
  <body>
    <header>
      <h1>Mon compte utilisateur</h1>
      <nav>
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="show_user.php">Mon profil</a></li>
          <li><a href="logout.php">Log out</a></li>
        </ul>
      </nav>
    </header>-->
    <head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Vitalia</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-PKjQ2BzN/7NBcj8vzO/ti1OgNpIOw20I8x/6GizmXJ/FBLiK15z+jR8I32m0TJm0jgTszSQPHx2q56rHd9GJLw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-+6s9q+n2T1mWJZ8R+R/eVUhUpquJ/4xWYGTTy2hyFzX9S6UvNlBnYSZAR4G6Uig4pLNCxysyW8LzQ1QwbXJKSg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Vendor CSS Files -->
 

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-+6s9q+n2T1mWJZ8R+R/eVUhUpquJ/4xWYGTTy2hyFzX9S6UvNlBnYSZAR4G6Uig4pLNCxysyW8LzQ1QwbXJKSg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- =======================================================
  * Template Name: Impact
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>

main {
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #e9f7ef;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  }
  
  h2 {
    color: #4caf50;
    text-align: center;
  }
  
  ul {
    list-style: none;
    margin: 0;
    padding: 0;
    text-align: center;
  }
  
  li {
    margin-bottom: 10px;
  }
  
  label {
    display: block;
    font-weight: bold;
    margin-bottom: 10px;
  }
  
  input[type="text"],
  input[type="password"],
  input[type="email"],
  input[type="tel"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
  }
  
  input[type="submit"] {
    display: block;
    margin-top: 20px;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #4caf50;
    color: white;
    cursor: pointer;
    transition: background-color 0.2s ease-in-out;
  }
  
  input[type="submit"]:hover {
    background-color: #388e3c;
  }
  
  .avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
  }
  

</style>
</head>
    
  <header id="header" class="header d-flex align-items-center">

<div class="container-fluid container-xl d-flex align-items-center justify-content-between">
  <a href="index.php" class="logo d-flex align-items-center">
    <!-- Uncomment the line below if you also wish to use an image logo -->
    <!-- <img src="assets/img/logo.png" alt=""> -->
    <h1>Vitalia<span>.</span></h1>
   
   <?php          
        $select_profile = $db->prepare("SELECT * FROM `user` WHERE idclient = ?");
        $select_profile->execute([$idclient]);
        if($select_profile->rowCount() > 0){
        $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
     ?>
     
     
     <?php
        }else{
     ?>
    
     <?php
       echo "ghalet"; }
     ?>      
    
  <nav id="navbar" class="navbar">
    <ul>
    

      <li><a href="home.php">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#services">Services</a></li>
      <li><a href="#portfolio">Portfolio</a></li>
      <li><a href="#team">Team</a></li>
      <li><a href="blog.html">Blog</a></li>
      <li><a href="#contact">Contact</a></li>
        

      <li class="dropdown"><a href="#"> <i class="fas fa-user" style="font-size: 24px;"></i> <p> &nbsp;&nbsp;  </p> <span><?= $fetch_profile["nom"]; ?></span><i class="bi bi-chevron-down dropdown-indicator"></i></a>
      <ul>
              <li><a href="show_user.php">Show your account infos</a></li>
              <li><a href="update.php">Update your account</a></li>
              <li><a href="#">Deep Drop Down 3</a></li>
              <li><a href="#">Deep Drop Down 4</a></li>
              <li><a href="#">Deep Drop Down 5</a></li>
            </ul>
      </li>
      <li><a href="logout.php">log out</a></li>
      </ul>
      
   
  </nav><!-- .navbar -->

  <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
  <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

</div>
</header><!-- End Header -->



    <main>
    <?php          
        $select_profile = $db->prepare("SELECT * FROM `user` WHERE idclient = ?");
        $select_profile->execute([$idclient]);
        if($select_profile->rowCount() > 0){
        $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
     
        $image = base64_encode($fetch_profile['image']);
     ?>
     
     
     <?php
        }else{
     ?>
    
     <?php
       echo "ghalet"; }
     ?>     
      
      <section>
        <h2>Your personal information</h2>
        <ul>

        <?php if ($image) : ?>
    
        <li> <img src="data:image/jpeg;base64,<?= $image ?>"  style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;"></li>
        <?php endif; ?>

          <li><strong>Username:</strong> <?= $fetch_profile["login"]; ?></li>
          <li><strong>Firstname:</strong> <?= $fetch_profile["nom"]; ?></li>
          <li><strong>Lastname:</strong> <?= $fetch_profile["prenom"]; ?></li>
          <li><strong>Type of custumor:</strong> <?= $fetch_profile["type"]; ?></li>
          <li><strong>Adresse email:</strong> <?= $fetch_profile["email"]; ?></li>
          <li><strong>telephone number:</strong><?= $fetch_profile["telephone"]; ?></li>
         
        
        </ul>
      </section>
     
    
      </form>

    </main>

    <br>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <span>Vitalia</span>
          </a>
<p>Bienvenue sur VITALIA, votre destination pour améliorer votre bien-être physique et mental. Nous sommes une équipe de professionnels passionnés et expérimentés, composée de médecins, de sportifs et d'experts du bien-être, dédiée à vous aider à atteindre un mode de vie plus sain et équilibré.</p>
          <div class="social-links d-flex mt-4">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>
            A108 Adam Street <br>
            New York, NY 535022<br>
            United States <br><br>
            <strong>Phone:</strong> +1 5589 55488 55<br>
            <strong>Email:</strong> info@example.com<br>
          </p>

        </div>

      </div>
    </div>

    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Vitalia</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer><!-- End Footer -->
  </body>
</html>
