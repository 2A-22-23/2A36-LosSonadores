<?php
include "C:/xampp/htdocs/PROJET_PHARMACIEcrud/Controller/pharmacieC.php";


$pharmacieC = new pharmacieC();
$list = $pharmacieC->listpharmacie();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Impact Bootstrap Template - Blog Details</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  
   <!--Vendor CSS Files -->
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
          <li><a href="#home.php">Home</a></li>
          <li><a href="patient.php">Patient</a></li>
          <li><a href="blog2.php">Pharmacie</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

     
    </div>
  </header>
  <!-- End Header -->




<!--afficher pharmacie aprés login-->


<?php
// Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=gestion_pharmacie', 'root', '');

if (isset($_GET['idphar'])) {
    // Récupération de l'ID de la pharmacie à afficher
    $pharmacie_id = $_GET['idphar'];

    // Requête pour récupérer les informations de la pharmacie
    $stmt = $db->prepare('SELECT * FROM pharmacie WHERE idphar = :idphar');
    $stmt->execute(array('idphar' => $pharmacie_id));
    $pharmacie = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($pharmacie === false) {
        // La pharmacie n'existe pas, on redirige vers la page principale
        header('Location: blog_details.php');
        exit();
    }
} else {
    // Si l'ID de la pharmacie n'est pas spécifié, on redirige vers la page principale
    header('Location: blog2.php');
    exit();
}
?>
  <main id="main">

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
  <div class="page-header d-flex align-items-center" style="background-image: url('');">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2><?php echo $pharmacie['Name']; ?></h2>
        </div>
      </div>
    </div>
  </div>
  <nav>
    <div class="container">
      <ol>
        <li><a href="index.html">Home</a></li>
        <li><?php echo $pharmacie['Name']; ?></li>
      </ol>
    </div>
  </nav>
</div><!-- End Breadcrumbs -->
<!DOCTYPE html>
<html>

<body>
<body>

  <p>Address: <?php echo $pharmacie['address']; ?></p>
  <p>Ville: <?php echo $pharmacie['ville']; ?></p>
</body>


<!-------------------------------------------------------->


     
   <!-- ======= Blog Details Section =======
   <section id="blog" class="blog">
  <div class="container" data-aos="fade-up">
</div>

<div class="col-lg-5">

<div class="sidebar">

<div class="sidebar-item search-form">
  <h3 class="sidebar-title">Search ordonnance</h3>
  <form action="" class="mt-3">
    <input type="text" placeholder="ajouter le code">
    <button type="submit"><i class="bi bi-search"></i></button>
  </form>
</div> End sidebar search formn-->

<!--recherche o ajout fel historique-->
<form method="POST">

    <label for="code">Code :</label>
    <input type="number" name="code" id="code" autocomplete="off" min='0'>

    <input type="hidden" name="pharmacie_id" value="<?php echo $pharmacie['idphar']; ?>">

    <button type="submit" name="search" onsubmit="validatecode()">Rechercher</button>
</form>
<br>

<?php
// Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=gestion_pharmacie', 'root', '');

// Vérification de la soumission du formulaire de recherche
if (isset($_POST['search'])) {
    $code = $_POST['code'];
    $pharmacie_id = $_POST['pharmacie_id'];

    // Requête pour récupérer les informations de l'ordonnance
    $stmt = $db->prepare('SELECT * FROM pharmacie p
                            JOIN ordonnance o ON p.ido = o.ido
                            WHERE o.code = :code AND p.idphar = :pharmacie_id');
    $stmt->execute(array('code' => $code, 'pharmacie_id' => $pharmacie_id));
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(isset($result) && !empty($result)){
      $patient_name = $result[0]['patient_name'];
      $doctor_name = $result[0]['doctor_name'];
    
   } 
    

}

// Traitement de la soumission du formulaire d'ajout de prix
if (isset($_POST['prix'])) {
    $prix = $_POST['prix'];
    $pharmacie_id = $_POST['pharmacie_id'];
    $code = $_POST['code'];

 
    // Vérifier si une entrée pour la même ordonnance et la même pharmacie existe déjà dans l'historique
    $stmt_check = $db->prepare('SELECT * FROM historique WHERE pharmacie_id = :pharmacie_id AND code = :code');
    $stmt_check->execute(array('pharmacie_id' => $pharmacie_id, 'code' => $code));
    $result_check = $stmt_check->fetchAll(PDO::FETCH_ASSOC);

    if (count($result_check) > 0) {
        echo "<script>alert('Cette ordonnance existe déjà dans l\'historique!');</script>";
    } else {
        // Requête pour ajouter l'historique de la transaction
        $stmt = $db->prepare('INSERT INTO historique (pharmacie_id, code, prix, patient_name, doctor_name) VALUES (:pharmacie_id, :code, :prix, :patient_name, :doctor_name)');
        $stmt->execute(array('pharmacie_id' => $pharmacie_id, 'code' => $code, 'prix' => $prix, 'patient_name' => $patient_name, 'doctor_name' => $doctor_name));

        echo "<script>alert('ordonnance enregistrée avec succès!');</script>";
    }
}

// Affichage des résultats de la recherche
if (isset($result)) {
    if (count($result) > 0) {
        foreach ($result as $row) {
            // Affichage des informations de l'ordonnance
            echo "Code : " . $row['code'] . "<br>";
            echo "Nom du médicament : " . $row['nom_medicament'] . "<br>";
            echo "Nom du patient : " . $row['patient_name'] . "<br>";
            echo "Nom du docteur : " . $row['doctor_name'] . "<br>";
         
            // Formulaire pour ajouter le prix
            
            echo "<hr>";
            echo "<form method='POST' onsubmit='return validateprix()>";
            echo "<label for='prix'>Prix :  </label>";
            echo "<input type='number' name='prix' id='prix' autocomplete='off' min='0'>";
            echo "<input type='hidden' name='pharmacie_id' value='".$pharmacie_id."'>";
            echo "<input type='hidden' name='code' value='".$code."'>";
            echo "<input type='hidden' name='patient_name' value='".$patient_name."'>";
            echo "<input type='hidden' name='doctor_name' value='".$doctor_name."'>";
            echo "<button type='submit' name='search' > Enregistrer   </button>";
            echo "</form>";
            echo "<hr>";
            
            
        }    echo "<script>alert('résultat trouvé!');</script>";
      } else {
        echo "<script>alert('Aucun résultat trouvé!');</script>";
    }
}
?>








</div><!-- End sidebar categories-->

</main><!-- End #main -->
  </main><!-- End #main -->
  

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <span>VITALIA</span>
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
          
            <strong>Phone:</strong> +1 5589 55488 55<br>
            <strong>Email:</strong> info@example.com<br>
          </p>

        </div>

      </div>
    </div>

   

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files-->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script> 
  <script src="../../js/controleSaisieBack.js"></script>
<!--Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>