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
          
          <li><a href="#addassurance">Ajouter Assurance</a></li>
       
        
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
<div class="container">
  <div class ="section-header">
              <h2>Assurance</h2>
</div>      
<form method="post" action="addAssurance.php" > 
<input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
      
              <div class="form-center">
              <form >
              <div class="form-group">
   
  <div class="form-group">
    <div class ="row">
    <label for="nom">Assurance name </label>
    <input type ='text'  name ='nom_assurance' id='nom_assurance' placeholder="Entrer votre nom" onkeyup="checknom()">
    <span id="nom-error" style="color: red; font-weight: bold;"></span>
  </div>
  <div class="form-group">
  <div class ="row">
  <label for="matricule_assurance">Assurance matricule  </label>  
  <input type ='text'  name ='matricule_assurance' id='matricule_assurance' placeholder="Entrer votre matricule" onkeyup="checkmatricule()">
  <span id="matricule-error" style="color: red; font-weight: bold;"></span>

  </div>
  </div>
  <div class="form-group">
  <div class ="row">
  <label for="nom">Assurance type </label>
 <select name ='type_assurance'>
  <option value="Cnss">Cnss</option>
  <option value="Cnrps">Cnrps</option>
  <option value="Convention Bilatérale">Convention Bilatérale</option>
</select>
   <label for="date_assurance">Date </label>  
  <input type ='date'  name ='date_assurance' id='date_assurance' placeholder="date" >

  </div>
  </div>
  <div class="form-group">
  <div class ="row">
  <label for="nom">Status</label>
 <select name ='status_assurance'>
  <option value="active">Active</option>
  <option value="non active">Non active</option>
 
</select>
<!--<div class="form-group">
  <div class ="row">
  <label for="type_assurance"> type assurance </label>  
  <input type ='text' required name ='type_assurance' id='type_assurance' placeholder="Entrer type assurance">
  </div>
<form action="frontAddAssurance.php">
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
                <button id='idbutton' type="submit" name='idbutton'>add assurance</button></div>
               
</form>

</div>
</div>
</div>
</form>

  </section>
  <script> 
   function checkmatricule() {
    
      const matriculeInput = document.getElementById('matricule_assurance');
      const matriculeError = document.getElementById('matricule-error');

      // Make an AJAX request to check if the matricule already exists
      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'check-matricule.php');
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onload = function() {
          if (xhr.status === 200) {
              const response = JSON.parse(xhr.responseText);
              if (response.exists) {
                  matriculeError.textContent = 'matricule already taken';
                  
              } else {
                  matriculeError.textContent = '';
                

              }
          }
      };
      xhr.send(`matricule_assurance=${matriculeInput.value}`);
  }
  function checknom()
  {
    const nomInput = document.getElementById('nom_assurance');
      const nomError = document.getElementById('nom-error');
     // Récupération de l'élément input
const nomAssuranceInput = document.getElementById('nom_assurance');

// Ajout d'un gestionnaire d'événement sur l'événement "submit" du formulaire
//document.querySelector('form').addEventListener('submit', (event) => {
  const regex = /^[a-zA-Z]+$/; // Expression régulière pour les lettres uniquement
  const nomAssuranceValue = nomAssuranceInput.value.trim(); // Supprimer les espaces au début et à la fin de la chaîne

  if (!regex.test(nomAssuranceValue)) { // Si la chaîne ne contient pas que des lettres
    event.preventDefault(); // Empêcher l'envoi du formulaire
    nomError.textContent = 'le nom doit contenir que des lettres';
                  
  }
  else
  {
                  nomError.textContent = '';
                

              }
;


  }
  
  </script>
  <!-- <script src="validation.js"></script> -->
