<?php
include "C:/xampp/htdocs/FIRST_SUII/projet/controller/Assurance.php";
$as = new Assurance();
$email = $_GET['email'];
$list = $as->AfficherAssurances($email);
?>
<?php
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
      </a>
      <nav id="navbar" class="navbar">
        <ul>
        <li class="dropdown"><a href="#"> <i class="fas fa-user" style="font-size: 24px;"></i> <p> &nbsp;&nbsp;  </p> <span><?= $fetch_profile["login"]; ?></span><i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <?php
          $username = $fetch_profile["login"];
          $_SESSION["username"] = $username;
          ?>
          <li><a href="logout.php">log out</a></li>
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
      $id = $_POST['id_assurance'];
      $assurance = new Assurance();
      $assurance->deleteAssurance($id); // Call the deleteAssurance function with the ID of the record to delete
      header('Location: verification.php');
      exit();
    }

    if (isset($_POST['update'])) {
      $id = $_POST['id_assurance'];
      $nom = $_POST['nom_assurance'];
      $mat = $_POST['matricule_assurance'];
      $type = $_POST['type_assurance'];
      $date = $_POST['date_assurance'];
      $status = $_POST['status_assurance'];
      $age = $_POST['age_assurance'];
      $assurance = new Assurance();
      $assurance->updateAssurance($id, $nom, $mat, $type,$date,$status,$age);
      header('Location: verification.php');
      exit();
    }
    ?>
<div class="text-center">
<div class ="row">
  <div class="assurance">
    <h2>Votre assurance</h2>
    <?php foreach ($list as $Assurances) { ?>
      <form method="post">
      <div class="form-group">
          <input hidden number="text" name="id_assurance" value="<?= $Assurances['id_assurance']; ?>" <?= isset($_POST['idbutton']) ? '' : 'readonly'; ?>>
        </div>
        <div class="form-group">
          <label for="nom">Assurance name</label>
         <input type="text" name="nom_assurance"id='nom_assurance' placeholder="Entrer votre nom" onkeyup="checknom()" value="<?= $Assurances['nom_assurance']; ?>" <?= isset($_POST['idbutton']) ? '' : 'readonly'; ?>>
    <span id="nom-error" style="color: red; font-weight: bold;"></span>
        </div>
        <div class="form-group">
          <label for="matricule_assurance">Assurance matricule</label>
          <input type="text" name="matricule_assurance" id='matricule_assurance' placeholder="Entrer votre matricule" onkeyup="checkmatricule()" value="<?= $Assurances['matricule_assurance']; ?>" <?= isset($_POST['idbutton']) ? '' : 'readonly'; ?>>
          <span id="matricule-error" style="color: red; font-weight: bold;"></span>

        </div>
        <div class="form-group">
          <label for="type_assurance">Assurance type</label>
          <select name="type_assurance" <?= isset($_POST['idbutton']) ? '' : 'disabled'; ?>>
            <option value="Cnss" <?= $Assurances['type_assurance'] === 'Cnss' ? 'selected' : ''; ?>>Cnss</option>
            <option value="Cnrps" <?= $Assurances['type_assurance'] === 'Cnrps' ? 'selected' : ''; ?>>Cnrps</option>
            <option value="Convention Bilatérale" <?= $Assurances['type_assurance'] === 'Convention Bilatérale' ? 'selected' : ''; ?>>Convention Bilatérale</option>
          </select>
        </div>
        <div class="form-group">
          <label for="date_assurance">Date</label>
          <input type="date" name="date_assurance"  value="<?= $Assurances['date_assurance']; ?>" <?= isset($_POST['idbutton']) ? '' : 'readonly'; ?>>
    
        </div>
        <div class="form-group">
          <label for="status_assurance">Assurance status</label>
          <select name="status_assurance" <?= isset($_POST['idbutton']) ? '' : 'disabled'; ?>>
            <option value="active" <?= $Assurances['status_assurance'] === 'active' ? 'selected' : ''; ?>>Active</option>
            <option value="non active" <?= $Assurances['status_assurance'] === 'non active' ? 'selected' : ''; ?>>Non active</option>
          
          </select>
        </div>
        <div class="form-group">
          <label for="age_assurance">Age</label>
          <input type="text" name="age_assurance" id='age_assurance' placeholder="Entrer votre matricule"  value="<?= $Assurances['age_assurance']; ?>" <?= isset($_POST['idbutton']) ? '' : 'readonly'; ?>>
          <span id="age-error" style="color: red; font-weight: bold;"></span>

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
          <input type="hidden" name="id_assurance" value="<?= $Assurances['id_assurance']; ?>">
        <?php } ?>
        
      </form>
    <?php } ?>
    
    <div class="text-center">
  <a href="frontAddRemboursement.php?email=<?= $email ?>&idAssurance=<?= $Assurances['id_assurance'] ?>&age=<?= $Assurances['age_assurance'] ?>"><strong>Remboursement</strong></a>
</div>
  </div>
</div>


<!--<script src="validation.js"></script>-->
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
    nomError.textContent = 'the name has to have lettre';
                  
  }
  else
  {
                  nomError.textContent = '';
                

              }
;


  }
  
  </script>