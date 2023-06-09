<?php
include "C:/xampp/htdocs/FIRST_SUII/projet/controller/clientc.php";

session_start();
$db=config::getConnexion();
if(isset($_SESSION['idclient'])){
   $idclient = $_SESSION['idclient'];
}else{
   $idclient = '';
};
if(isset($_SESSION['CIN_patient']))
{
    $CIN_patient = $_SESSION['CIN_patient']; 
}
?>

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
      <a href="homeUM.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>VITALIA<span>.</span> </h1>
      </a>
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
        <li><a href="homeUM.php">Home</a></li>
        <li class="dropdown"><a href="#"> <img src="<?= $fetch_profile["image"]; ?>" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;" > <p> &nbsp;&nbsp;  </p> <span><?= $fetch_profile["login"]; ?></span><i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <ul>
                <li><a href="../Impact/show_user.php">Show your account infos</a></li>
                <li><a href="C:\xampp\htdocs\First_SUII\projet\View\front_user\update.php">Update your account</a></li>
              </ul>
        </li>
        <li><a href='C:\xampp\htdocs\First_SUII\projet\View\Impact\logout.php'>log out</a></li>
          <?php
          $username = $fetch_profile["login"];
          $_SESSION["username"] = $username;
          ?>
        
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <!-- ======= add assurance Section ======= -->
  <style>
#idbutton{
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
.center {
    text-align: center;
}

 </style> 
<div class="container">
<div class="section-header center">
    <h2>Verification</h2>
</div>

<form action="verificationId.php" method="post">
  <div class="form-center">
    <div class="form-group">
      <div class="row">
        <label for="nom">Enter your Email</label>
        <input type="text" name="email" id="email" placeholder="Enter your email" onkeyup="checkmail()">
         <span id="email-error" style="color: red; font-weight: bold;"></span>
      </div>
      <div class="button input-box">
        <input id="idbutton" type="submit" value="submit" name="enter" disabled>
      </div>
    </div>
  </div>
</form>

</div>  

  </section>
 
  <script> 
/*function checkmail() {
  let email = document.getElementById("email").value;
  let emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
  if (!emailRegex.test(email)) {
    document.getElementById("email-error").innerHTML = "Please enter a valid email address.";
  } else {
    document.getElementById("email-error").innerHTML = "";
  }
}*/

function checkmail() {
  let email = document.getElementById("email").value;
  let emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
  let submitButton = document.getElementById("idbutton");
  let emailError = document.getElementById("email-error");

  if (email === "") {
    emailError.innerHTML = "Please enter an email address.";
    submitButton.disabled = true;
  } else if (!emailRegex.test(email)) {
    emailError.innerHTML = "Please enter a valid email address.";
    submitButton.disabled = true;
  } else {
    emailError.innerHTML = "";
    submitButton.disabled = false;
  }
}

  


   /*function checkmail() {
     
      const emailInput = document.getElementById('email');
      const emailError = document.getElementById('email-error');

      // Make an AJAX request to check if the matricule already exists
      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'check_email.php');
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onload = function() {
          if (xhr.status === 200) {
              const response = JSON.parse(xhr.responseText);
              if (response.exists) {
                  matriculeError.textContent = '';
                  
              } else {
                  matriculeError.textContent = 'email not found ';
                

              }
          }
      };
      xhr.send(`email=${emailInput.value}`);
  } 
   function checkEmail() {
  const emailInput = document.getElementById("email");
  const emailError = document.getElementById("email-error");

  if (!emailInput.checkValidity()) {
    emailError.textContent = "Please enter a valid email address";
    return;
  } else {
    emailError.textContent = "";
  }
}*/
</script>