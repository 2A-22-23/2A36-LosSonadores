<?php

include '../Controller/RendezVousC.php';



$error = "";

session_start();


$db=config::getConnexion();
if(isset($_SESSION['idclient'])){
   $idclient = $_SESSION['idclient'];
}else{
   $idclient = '';
};


//var_dump($_POST);
if(isset($_POST['ajouter']) )
{
  $LaDate = $_POST['LaDate'];

  // Convertit la date en objet DateTime
  $dateObj = new DateTime($LaDate);
  
  // Récupère le jour de la semaine de la date
  $jour = $dateObj->format('l');
  
  $temps = $dateObj->format('H:i:s');

  // Affiche les résultats
  //echo "Jour : " . $jour . "<br>";
  //echo "Temps : " . $temps;
  
    $doctorId = $_POST['doctor-id'];
    if (!empty($LaDate) && !empty($doctorId))
    {
        $rdv = new Rendezvous($LaDate);
        $rdvC = new RendezvousC();
        if(!$rdvC->checkRendezvousExists($rdv))
        {
          if ($rdvC->addRendezvous($rdv, $doctorId, $jour, $temps)) {
            // Afficher un message de succès si l'ajout a réussi
            echo '<div class="notif notif-succ">'."Le rendez-vous a été ajouté avec succès !".'</div>';
    echo '<script>document.querySelector(".notif-succ").style.display = "block";</script>';
        } else {
            // Afficher un message d'erreur si l'ajout a échoué
            echo '<div class="alert alert-danger">'."Aucun planning ne correspond à la date et à l'heure demandées.".'</div>';
            echo '<script>document.querySelector(".alert-danger").style.display = "block";</script>';
        }
        
        }
    }
    else {
        // Afficher un message d'erreur si l'un des champs est vide
        echo "Veuillez remplir tous les champs.";
    }
}

if(isset($_GET['doctorId'])) {
  // Récupérer l'identifiant du médecin
  $doctorId = $_GET['doctorId'];

  // Connexion à la base de données

  
 
}









?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Appointment</title>

    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">

  <script src="y/View/schedule.js"></script>

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
       
          <li><a href="addRendezVous.php">Appointment</a></li>

          <li><a href="ViewMyAPP.php">View My Appointment</a></li>
            

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
          <h2>Make Your <span>Appointment Now</span></h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started">Get Started</a>
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
      <h2>Choose Your Doctor  <span style="color: darkorange" ><?= $fetch_profile["login"]; ?></span>  </h2>
    </div>
   

</section><!-- End medical record Section -->

  </main><!-- End #main -->

 


    <?php
$db = config::getConnexion();
$sql = "SELECT idclient,nom, prenom,specialite,adresse FROM user WHERE type = 'Doctor'";
$result = $db->query($sql);


?>

<?php
$db = config::getConnexion();
$sqlSpecialites = "SELECT DISTINCT specialite FROM user WHERE type = 'Doctor'";
$resultSpecialites = $db->query($sqlSpecialites);
$sqlAdresses = "SELECT DISTINCT adresse FROM user WHERE type = 'Doctor'";
$resultAdresses = $db->query($sqlAdresses);



  // Requête SQL pour obtenir les adresses pour chaque spécialité
  $sql = "SELECT specialite, adresse FROM user ORDER BY specialite, adresse";
  $stmt = $db->query($sql);

  // Parcourir les résultats de la requête et stocker les adresses pour chaque spécialité dans un tableau associatif
  $adressesParSpecialite = array();
  while ($row = $stmt->fetch()) {
    $specialite = $row['specialite'];
    $adresse = $row['adresse'];

    if (!isset($adressesParSpecialite[$specialite])) {
      $adressesParSpecialite[$specialite] = array();
    }

    $adressesParSpecialite[$specialite][] = $adresse;
  }
?>

<!-- Affichage des médecins et du formulaire -->
<div>

  <form class="filtre" method="get" action="">
  <label for="specialite">Spécialité :</label>
  <br>
<select id="specialite" name="specialite">
  <option value="" disabled selected>Choisissez une spécialité</option>
  <?php while ($row = $resultSpecialites->fetch()) { ?>
    <option value="<?php echo $row['specialite']; ?>"><?php echo $row['specialite']; ?></option>
  <?php } ?>
</select>
<br>
<label for="adresse">Adresse :</label> <br>
<select id="adresse" name="adresse">
  <option value="" disabled selected>Choisissez une adresse</option>
  <?php while ($row = $resultAdresses->fetch()) { ?>
    <option value="<?php echo $row['adresse']; ?>"><?php echo $row['adresse']; ?></option>
  <?php } ?>
</select>

<script>
  const specialiteSelect = document.getElementById("specialite");
  const adresseSelect = document.getElementById("adresse");
  const adresses = <?php echo json_encode($adressesParSpecialite); ?>;

  specialiteSelect.addEventListener("change", () => {
    const selectedSpecialite = specialiteSelect.value;
    adresseSelect.innerHTML = '<option value="" disabled selected>Choisissez une adresse</option>';

    if (selectedSpecialite in adresses) {
      adresses[selectedSpecialite].forEach(adresse => {
        const option = document.createElement("option");
        option.value = adresse;
        option.textContent = adresse;
        adresseSelect.appendChild(option);
      });
    }
  });
</script>

<br><br>
    <input type="submit" value="Rechercher">
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   @ $specialite = $_GET['specialite'];
    @$adresse = $_GET['adresse'];

    $db = config::getConnexion();
    $sql = "SELECT idclient,nom, prenom,specialite,adresse FROM user WHERE type = 'Doctor'";

    if (!empty($specialite)) {
      $sql .= " AND specialite = '$specialite'";
    }

    if (!empty($adresse)) {
      $sql .= " AND adresse = '$adresse'";
    }

    $result = $db->query($sql);
    ?>

 

    <?php while ($row = $result->fetch()) { 
        $doctorId = $row['idclient'];
        $doctorNom = $row['nom'] . ' ' . $row['prenom'];
        $doctorSpeciality = $row['specialite'];
        $doctoradd = $row['adresse'];
      ?>
        <div id="divmed">
            <table id="tabled">
                <td id="tdd" class="doctor-name">
                <br><br><br><br>
                    <img src="../View/images/d1.jpg" alt="<?php echo $doctorNom; ?>">


<br><br><br><br><br>

                    <p>Name : <b>Dr. <?php echo $doctorNom; ?></b></p>
                    <p>Specialite : <b>  <?php echo $doctorSpeciality; ?></b> <p>
                    <p> Adresse : <b><?php echo $doctoradd; ?></b><p>
                   


                    <button name="appointment-btn" id="appointment-btn" class="make-appointment-btn" data-doctor-id="<?php echo $doctorId; ?>" data-doctor-name="<?php echo $doctorNom; ?>" onclick="addId(<?php echo $doctorId; ?>)">Set Appointment</button>
                    <?php
		// votre code PHP ici

        $db = config::getConnexion();

        // Requête SQL pour récupérer le planning du médecin
        $stmt = $db->prepare("SELECT jour, timeFrom, timeTo FROM planningdr WHERE idClient = :doctorId");
        $stmt->bindParam(':doctorId', $doctorId);
        $stmt->execute();
    
        // Afficher le planning du médecin
        if ($stmt->rowCount() > 0) {
            echo "<h3>Planning du médecin :</h3>";
            echo "<table><tr><th>Day</th><th>timeFrom</th><th> timeTo</th></tr>";
            while($row = $stmt->fetch()) {
                echo "<tr><td>" . $row["jour"] . "</td><td>" . $row["timeFrom"] . "</td><td>" . $row["timeTo"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Aucun planning trouvé pour ce médecin.</p>";
        }
    
        $conn = null;
	?>

                </td>
            </table>
        </div>
    <?php } ?>
  <?php } ?>
</div>




<!-- Affichage des médecins et du formulaire -->
<div>
<?php while ($row = $result->fetch()) { 
        $doctorId = $row['idclient'];
        $doctorNom = $row['nom'] . ' ' . $row['prenom'];
        $doctorSpeciality = $row['specialite'];
        $doctoradd = $row['adresse'];
    ?>
        <div>
            <table id="tabled">
                <td id="tdd" class="doctor-name">
                <br><br><br><br>
                    <img src="../View/images/d1.jpg" alt="<?php echo $doctorNom; ?>">


<br><br><br><br><br>

                    <p>Name : <b>Dr. <?php echo $doctorNom; ?></b></p>
                    <p>Specialite : <b>  <?php echo $doctorSpeciality; ?></b> <p>
                    <p> Adresse : <b><?php echo $doctoradd; ?></b><p>
    


                    <button name="appointment-btn" id="appointment-btn" class="make-appointment-btn" data-doctor-id="<?php echo $doctorId; ?>" data-doctor-name="<?php echo $doctorNom; ?>" onclick="addId(<?php echo $doctorId; ?>)">Set Appointment</button>
                    <?php
		// votre code PHP ici

        $db = config::getConnexion();

        // Requête SQL pour récupérer le planning du médecin
        $stmt = $db->prepare("SELECT jour, timeFrom, timeTo FROM planningdr WHERE idClient = :doctorId");
        $stmt->bindParam(':doctorId', $doctorId);
        $stmt->execute();
    
        // Afficher le planning du médecin
        if ($stmt->rowCount() > 0) {
            echo "<h3>Planning du médecin :</h3>";
            echo "<table><tr><th>Day</th><th>timeFrom</th><th> timeTo</th></tr>";
            while($row = $stmt->fetch()) {
                echo "<tr><td>" . $row["jour"] . "</td><td>" . $row["timeFrom"] . "</td><td>" . $row["timeTo"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Aucun planning trouvé pour ce médecin.</p>";
        }
    
        $conn = null;
	?>
                </td>
            </table>
        </div>
    <?php } ?>










<!-- Affichage des médecins et du formulaire
<script> 


// Récupérer les éléments nécessaires du DOM
const popupBtns = document.querySelectorAll('.popup');
const modall = document.querySelector('.modall');
const modallContent = document.querySelector('.modall-content');
const sBtn = document.getElementById('#s-btn');



// Fonction pour afficher la fenêtre modale
function showModal(doctorId) {
  // Faire une requête AJAX pour récupérer le planning du médecin à partir de DoctorSchedule.php
  const xhr = new XMLHttpRequest();
  xhr.open('GET', 'DoctorSchedule.php?id=' + doctorId);
  xhr.onload = function() {
    if (xhr.status === 200) {
      // Afficher le planning du médecin dans la fenêtre modale
      modallContent.innerHTML = xhr.responseText;
      modall.style.display = 'block';
    } else {
      // Gérer l'erreur
      console.log('Une erreur s\'est produite: ' + xhr.status);
    }
  };
  xhr.send();
}

// Fonction pour masquer la fenêtre modale
function hideModall() {
modall.style.display = 'none';
}

// Ajouter un écouteur d'événement au bouton pour afficher la fenêtre modale
popupBtns.forEach((btn) => {
btn.addEventListener('click', () => {
showModal();
});
});

// Ajouter un écouteur d'événement au bouton de validation pour enregistrer les données et masquer la fenêtre modale


// Ajouter un écouteur d'événement au bouton de fermeture pour masquer la fenêtre modale



// Ajouter un écouteur d'événement à la fenêtre modale pour la masquer si l'utilisateur clique à l'extérieur de la fenêtre
// Ajouter un écouteur d'événement à la fenêtre modale pour la masquer si l'utilisateur clique à l'extérieur de la fenêtre




 </script>



-->











    <style>

.notif {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}

.notif-succ {
    color: white;
    background-color: green;
    border-color:light green ;
}


      .alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}

.alert-danger {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
}



/* Styles pour l'élément select */
.filtre select {
  width: 15%;
  padding: 9px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  font-size: 16px;
  font-family: sans-serif;
  appearance: none; /* Supprime le style de base du navigateur */
  background-color: #fff;
  background-image: url("path/to/arrow.svg"); /* Ajoutez une flèche personnalisée */
  background-repeat: no-repeat;
  background-position: right 10px center;
  cursor: pointer;
  margin-left: 5px; /* Réduire la marge gauche entre l'élément "filtre" et l'élément "select" */
}

/* Styles pour l'option sélectionnée */
option:checked {
  background-color: #0070f3;
  color: #fff;
}

/* Styles pour les options */
option {
  background-color: #fff;
  color: #333;
  font-size: 14px; /* Réduire la taille de police */
  font-family: sans-serif;
  text-align: left; /* Aligner le texte vers la gauche */
}

.filtre {
 

  flex-direction: row; /* Afficher les éléments en ligne */
}


.filtre label {
  flex-basis: 45%;
  margin-right: 10px; /* Réduire la marge droite entre les éléments */
}

.filtre label {
  margin-bottom: 10px;
  margin-right: 5px; /* Réduire la marge droite entre le label et le select */
}




#tabadd{

  border-collapse: collapse;
  width: 90%;
  margin: 0 auto;
  table-layout: fixed;
  font-family: Arial, sans-serif;
}


.schedule-appointment-btn {
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 10px;
  font-size: 16px;
  cursor: pointer;
  border-radius: 5px;
}

.schedule-appointment-btn:hover {
  background-color: #3e8e41;
}




  #appointment-btn {
    background-color:#008374;
    border: none;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    float: right;
  }

  #appointment-btn:hover {
    background-color:#88e0d5; 
  }

    #myform {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 2rem;
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 1rem;
    }


#tabled {
  border-collapse: collapse;
  width: 50%;
  margin: 0 auto;
  table-layout: fixed;
  font-family: Arial, sans-serif;
}

#divmed {
  display: flex;
  align-items: flex-start;
}


th, #tdd {
  padding: 1rem;
  text-align: center;
  border: 1px solid #ddd;
  width: auto;
}

th {
  background-color: darkorange;
  color: white;
  font-weight: bold;
  text-transform: uppercase;
  width:30%;
}

tr:nth-child(2n) td {
  background-color: #f2f2f2;
}

#tdd:first-child {
  text-align: left;
}

#tdd:last-child {
  text-align: left;
}

#tdd:nth-child(2) {
  text-align: center;
}

#tabled caption {
  font-size: 1.2rem;
  font-weight: bold;
  margin-bottom: 1rem;
}

#tabled thead tr {
  background-color: #e6e6e6;
}

#tabled tfoot tr {
  background-color: #e6e6e6;
  font-weight: bold;
}

#tabled tfoot td {
  text-align: left;
}

#tabled td {
  transition: all 0.3s ease-in-out;
}

#tabled td:hover {
  background-color: #009786;
  color: white;
}



    input[type="text"], input[type="datetime-local"] {
        padding: 0.5rem;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 1rem;
        width: 70%;
        margin-bottom: 1rem;
    }

    input[type="submit"], input[type="reset"] {
        background-color: #4CAF50;
        color: white;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 1rem;
        font-size: 1rem;
    }

    input[type="reset"] {
        background-color: #f44336;
    }

    /* Styles pour la fenêtre modale */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.5);
}

.modal-content {
  background-color: white;
  margin: 10% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 40%;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}



#LaDate {
  padding: 0.5rem;
  font-size: 1rem;
  border: 1px solid #ddd;
  border-radius: 5px;
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
  transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

#LaDate:focus {
  border-color: #007bff;
  box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
  outline: none;
}





.btn-primary {
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 8px 16px;
  font-size: 16px;
  border-radius: 4px;
}

.btn-secondary {
  background-color: #6c757d;
  color: #fff;
  border: none;
  padding: 8px 16px;
  font-size: 16px;
  border-radius: 4px;
}

.btn-primary:hover, .btn-secondary:hover {
  opacity: 0.8;
}





input[type=datetime-local] {
  padding: 8px 12px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-shadow: none;
  background-color: #fff;
  color: #333;
  width: 50%;
}

input[type=datetime-local]:hover, input[type=datetime-local]:focus {
  border-color: #007bff;
  outline: none;
}

input[type=datetime-local]::-webkit-datetime-edit {
  padding: 8px 12px;
}

input[type=datetime-local]::-webkit-calendar-picker-indicator {
  padding: 8px 12px;
}






</style>






<div>
  
  <div class="modal">
    <div class="modal-content">
    <span id="set-appointment-text">Set Appointment with Your Doctor</span>

    
    <!-- Formulaire pour prendre un rendez-vous -->
    <form id="myform" method="POST" action="" onsubmit="return  validateForm()">
       
            <input type="hidden" name="doctor-id" id="doctor-id" value="">



          
               <label>Date:</label>
                <input type="datetime-local" name="LaDate" id="LaDate">
                <span id="error1" style="display:none;"></span>
           
              <button type="submit" name="ajouter" id="set-appointment-btn"  class="btn-primary">Valider</button>
         
    
    </form>
    <style>
    #closeBtn {
  display: block; /* to make the link a block element */
  text-align: center; /* to center the link horizontally */
  margin-top: 20px; /* to add some space between the link and other elements */
}
</style>
    <a  id="closeBtn" class="btn-secondary" href="addRendezVous.php">Close</a>

</div>


<script>
function validateForm() {
  var dateInput = document.getElementById("LaDate").value;
  var error1 = document.getElementById("error1");
  
  // Check if the date is in the correct format (YYYY-MM-DDThh:mm)
  var regex = /^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}$/;
  if (!regex.test(dateInput)) {
    error1.innerHTML = "Invalid date format. Please enter date in format YYYY-MM-DDThh:mm.";
    error1.style.display = "block";
    error1.style.display = "inline";
    error1.style.color = "red";
    return false;
  }
  
  // Check if the date is a valid date
  var date = new Date(dateInput);
  if (isNaN(date.getTime())) {
    error1.innerHTML = "Invalid date. Please enter a valid date.";
    error1.style.display = "block";
    error1.style.display = "inline";
    error1.style.color = "red";
    return false;
  }
  
  // If the date input is valid, hide the error message and submit the form
  error1.style.display = "none";
  return true;
}

</script>







<script>
    // Fonction pour ajouter l'ID du médecin sélectionné dans le champ caché
    function addId(doctorId) {
        document.getElementById("doctor-id").value = doctorId;
    }
</script>

    </div>
  </div>
</div>








<script>
 // Récupérer les éléments nécessaires du DOM
const makeAppointmentBtns = document.querySelectorAll('.make-appointment-btn');
const modal = document.querySelector('.modal');
const modalContent = document.querySelector('.modal-content');
const setAppointmentBtn = document.getElementById('#set-appointment-btn');
const closeBtn = document.getElementById('#closeBtn');


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
  xhr.open('POST', 'addRendezVous.php');
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

















































  <br>  <br> <br> <br>
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
