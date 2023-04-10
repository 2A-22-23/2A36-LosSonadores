<?php

include '../Controller/PlanningC.php';





$PlanningC = new PlanningC();
$list = $PlanningC->listPlanning();

$error = "";

session_start();
$db=config::getConnexion();
if(isset($_SESSION['idclient'])){
   $idClient = $_SESSION['idclient'];
}else{
   $idClient = '';
};


if(isset($_POST['ajouter']) )
{
  
    $jour = $_POST['jour'];
    $timeFrom = $_POST['timeFrom'];
    $timeTo = $_POST['timeTo'];

    if ( !empty($jour) && !empty($timeFrom) && !empty($timeTo))
    {
        $planningdr = new Planningdr(
            $idClient,
            $jour,
            $timeFrom,
            $timeTo
        );
        $planningdrC = new PlanningC();
        if ($planningdrC->addPlanning($planningdr)) {
            // Afficher un message de succès si l'ajout a réussi
            echo "Le planning a été ajouté avec succès !";
        } else {
            // Afficher un message d'erreur si l'ajout a échoué
            echo "Une erreur est survenue lors de l'ajout du planning.";
        }
    } else {
        // Afficher un message d'erreur si l'un des champs est vide
        echo "Veuillez remplir tous les champs.";
    }
}










?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Side</title>

    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

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
  <link href="assets/css/medical_record.css" rel="stylesheet">
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
  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">VITALIA@gmail.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+216 71 240 260</span></i>
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
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
  
        <?php          
            $select_profile = $db->prepare("SELECT * FROM `user` WHERE idclient = ?");
            $select_profile->execute([$idClient]);
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
        
    
          <li><a href="homeDr.php">Home</a></li>
       
          <li><a href="DoctorSchedule - Copie.php">Schedule</a></li>
          <li><a href="viewapp.php">Doctor's Appointments</a></li>
            

          <li class="dropdown"><a href="#"> <i class="fas fa-user" style="font-size: 24px;"></i> <p> &nbsp;&nbsp;  </p> <span><?= $fetch_profile["login"]; ?></span><i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <ul>
                  <li><a href="show_user.php">Show your account infos</a></li>
                  <li><a href="#">Update your account</a></li>
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

  <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
  <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

</div>
</header><!-- End Header -->
<!-- End Header -->



<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>Add Your  <span>Schedule</span></h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
      
            
    <button name="appointment-btn" id="appointment-btn" class="make-appointment-btn" >Add Planning</button>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="assets/img/" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div>

    <div class="icon-boxes position-relative">
      <div class="container position-relative">
        <div class="row gy-4 mt-5">

      


        </div>
      </div>
    </div>

    </div>
  </section>
  <!-- End Hero Section -->
  <main id="main">
<!-- ======= Appointment section ======= -->
<section id="record" class="about">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h2>Welcome Doctor  <span style="color: darkorange" ><?= $fetch_profile["login"]; ?></span>  </h2>
    </div>
   

</section><!-- End medical record Section -->

  </main><!-- End #main -->

 
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>
   



    <div style="display: flex; justify-content: space-between;">
  <table border="1" width="70%" height="10%">
    <tr>
  
      <th>jour</th>
      <th>timefrom</th>
      <th>time to</th>
      <th>Action</th>
    </tr>
    <?php
$db = config::getConnexion();
$sql = "SELECT p.id, p.jour, p.timeFrom, p.timeTo, u.nom, u.prenom 
        FROM planningdr p 
        INNER JOIN user u ON p.idClient = u.idclient 
        WHERE p.idClient = :idClient";
$stmt = $db->prepare($sql);
$stmt->bindValue(":idClient", $_SESSION['idclient']);
$stmt->execute();
$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($list as $planningdr) {
?>
  <tr>
 
    <td><?= $planningdr['jour']; ?></td>
    <td><?= $planningdr['timeFrom']; ?></td>
    <td><?= $planningdr['timeTo']; ?></td>
    <td align="center">
   
    <form id="formu" method="POST" action="UpdatePlanning.php">
    <input type="hidden" name="id" value="<?= $planningdr['id']; ?>">
    <button type="submit" name="update">Update</button>
    </form>

  
      <a href="DeletePlanning.php?id=<?php echo $planningdr['id']; ?>" class="delete-link">Delete</a>


    
    </td>
  </tr>
<?php
}
?>

  </table>
  
</div>






<!-- Bouton pour ouvrir la fenêtre modale -->


<!-- Fenêtre modale -->



<div>
<div class="modal">
    <div class="modal-content">
    <span id="set-appointment-text">Add You Schedule Doctor </span>

      <form id="myform" method="POST" action="">
      
        <label>Jour :</label>
        <input type="text" name="jour" ><br>

        <label>Heure de début :</label>
        <input type="time" name="timeFrom"><br>

        <label>Heure de fin :</label>
        <input type="time" name="timeTo"><br>

        <button type="submit" name="ajouter" value="Ajouter" id="set-appointment-btn">Ajouter</button>
        <button  id="closeBtn">Annuler</button>
      </form>

      </div>
</div>
</div>





<script>
  // Récupérer les éléments HTML correspondants
const form = document.getElementById("myform");
const jourInput = form.elements["jour"];

// Ajouter un événement "submit" pour le formulaire
form.addEventListener("submit", function(event) {
  // Récupérer la valeur saisie pour le champ "jour"
  const jourValue = jourInput.value.trim().toLowerCase();

  // Vérifier si le champ "jour" est vide ou non
  if (jourValue === "") {
    // Empêcher la soumission du formulaire et afficher un message d'erreur
    event.preventDefault();
    alert("Veuillez saisir un jour valide.");
    return;
  }

  // Vérifier si la valeur saisie correspond à un jour de la semaine en français ou en anglais
  const joursDeLaSemaine = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi",
                           "sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];
  if (!joursDeLaSemaine.includes(jourValue.toLowerCase())) {
    // Empêcher la soumission du formulaire et afficher un message d'erreur
    event.preventDefault();
    alert("Veuillez saisir un jour valide (par exemple : lundi, mardi, mercredi, etc.).");
  }
});


</script>




<style>


a.delete-link {
  margin-top: 10px;
}



    table {
    border-collapse: collapse;
    width: 70%;
    margin: 0 auto;
    table-layout: fixed;
}

th, td {
    padding: 0.5rem;
    text-align: center;
    border: 1px solid #ddd;
    width: auto; /* or use a specific width value */
}

th {
    background-color: #eee;
}

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    input[type="submit"], a {
        background-color: #008374;
        color: white;
        border: none;
        padding: 0.5rem;
        cursor: pointer;
        text-decoration: none;
        border-radius: 5px;
    }

    a:hover {
        background-color: #008374;
    }


    .make-appointment-btn {
      font-family: var(--font-primary);
  font-weight: 500;
  font-size: 15px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 14px 40px;
  border-radius: 50px;
  transition: 0.3s;
  color: #fff;
  background: rgba(255, 255, 255, 0.1);
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
  border: 2px solid rgba(255, 255, 255, 0.1);
  }

  .make-appointment-btn:hover {
    border-color: rgba(255, 255, 255, 0.5);
  }



  .modal {
    display: none; /* Par défaut, la fenêtre modale est cachée */
    position: fixed; /* La fenêtre modale est positionnée en mode fixe */
    z-index: 1; /* La fenêtre modale est affichée au-dessus de tous les autres éléments */
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto; /* Permet de faire défiler la page si la fenêtre modale est trop grande */
    background-color: rgba(0,0,0,0.4); /* Ajoute un voile noir transparent derrière la fenêtre modale */
  }

  .modal-content {
    background-color: white;
    margin: 10% auto; /* Place la fenêtre modale à 10% du haut de la page */
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
  }

  #closeBtn {
    background-color: #008374;
        color: white;
        border: none;
        padding: 0.5rem;
        cursor: pointer;
        text-decoration: none;
        border-radius: 5px;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }






  #myform {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f1f1f1;
  border: 1px solid #ccc;
  border-radius: 5px;
}


input[type="text"],
input[type="time"] {
  display: block;
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #3e8e41;
}

</style>




    









<script>
 // Récupérer les éléments nécessaires du DOM
const makeAppointmentBtns = document.querySelectorAll('.make-appointment-btn');
const modal = document.querySelector('.modal');
const modalContent = document.querySelector('.modal-content');
const setAppointmentBtn = document.getElementById('#set-appointment-btn');
const closeBtn = document.getElementById('closeBtn');


// Fonction pour afficher la fenêtre modale
function showModal() {
  modal.style.display = 'block';
}

// Fonction pour masquer la fenêtre modale
function hideModal() {
  modal.style.display = 'none';
}

// Ajouter un écouteur d'événement au bouton pour afficher la fenêtre modale
makeAppointmentBtns.forEach((btn) => {
  btn.addEventListener('click', () => {
    showModal();
  });
});

// Ajouter un écouteur d'événement au bouton de validation pour enregistrer les données et masquer la fenêtre modale
setAppointmentBtn.addEventListener('click', (event) => {
  event.preventDefault();
  const formData = new FormData(document.getElementById('myform'));
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'DoctorSchedule - Copie.php');
  xhr.onload = function() {
    if (xhr.status === 200) {
      // Faire quelque chose avec la réponse
      console.log(xhr.responseText);
    } else {
      // Gérer l'erreur
      console.log('Une erreur s\'est produite: ' + xhr.status);
    }
    hideModal();
  };
  xhr.send(formData);
});

// Ajouter un écouteur d'événement au bouton de fermeture pour masquer la fenêtre modale

closeBtn.addEventListener('click', () => {
  hideModal();

});

// Ajouter un écouteur d'événement à la fenêtre modale pour la masquer si l'utilisateur clique à l'extérieur de la fenêtre
// Ajouter un écouteur d'événement à la fenêtre modale pour la masquer si l'utilisateur clique à l'extérieur de la fenêtre
modal.addEventListener('click', (event) => {
  if (event.target === modal) {
    hideModal();
  }
});


</script>



























<br><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


  
     <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

<div class="container">
  <div class="row gy-4">
    <div class="col-lg-5 col-md-12 footer-info">
      <a href="addRendezVous.php" class="logo d-flex align-items-center">
     
      </a>
    
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
    &copy; Copyright <strong><span>Impact</span></strong>. All Rights Reserved
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
<!-- End Footer -->
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</body>

</html>
