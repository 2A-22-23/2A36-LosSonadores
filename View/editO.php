<?php
include "C:/xampp/htdocs/FIRST_SUII/projet/View/tojrab03/controller/clientc.php";
session_start();
$db = config::getConnexion();

if (isset($_SESSION['idclient'])) {
   $idclient = $_SESSION['idclient'];
} else {
   $idclient = '';
}

$select_profile = $db->prepare("SELECT * FROM `user` WHERE idclient = ?");
$select_profile->execute([$idclient]);

if ($select_profile->rowCount() > 0) {
   $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
   if (isset($fetch_profile)) {
      $username = $fetch_profile["login"];
      $_SESSION["username"] = $username;
   }
   echo "";
} else {
   echo "ghalet";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MEDICAL RECORD</title>
	<link rel="stylesheet" href="medical.css">
	<link rel="stylesheet" href="doctor.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="check.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
  
	<title>Doctor side</title>
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
      <a href="editO.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>VITALIA<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="homeM.php">Home</a></li>
		  <li class="dropdown"><a href="#"> <i class="fas fa-user" style="font-size: 24px;"></i> <p> &nbsp;&nbsp;  </p> <span><?= $fetch_profile["login"]; ?></span><i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <?php
          $username = $fetch_profile["login"];
          $_SESSION["username"] = $username;
          ?>
          <ul>
                  <li><a href="show_user.php">Show your account infos</a></li>
                  <li><a href="#">Update your account</a></li>
                </ul>
          </li>
          <li><a href="/FIRST_SUII/tojrab03/views/Impact/logout.php">log out</a></li>
		</ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->
  
<body>
	<div class="wrapper">
		<div class="wrapper_inner">
			<div class="vertical_wrap">
			<div class="backdrop"></div>
			<div class="vertical_bar">
				<div class="profile_info">
					<div class="img_holder">
						<img src="doctor.png" alt="profile_pic">
					</div>
					<p class="title">WELCOME <?php echo $username; ?></p>
				</div>
				<ul class="menu">
					<li><a href="addO.php">
						<span class="icon"><i class="fas fa-plus"></i></span>
						<span class="text">Add</span>
					</a></li>
					<li><a href="editO.php" class="active">
						<span class="icon"><i class="fas fa-edit"></i></span>
						<span class="text">Edit</span>
					</a></li>
					<li><a href="statO.php">
						<span class="icon"><i class="fas fa-chart-pie"></i></span>
						<span class="text">Statistics</span>
					</a></li>
				</ul>

				<ul class="social">
					<li><a href="homeM.php"><i class="fas fa-home"></i></a></li>
				</ul>
			</div>
		</div>
		<div class="main_container">
			<div class="top_bar">
				<div class="hamburger">
					<i class="fas fa-bars"></i>
				</div>
				<div class="logo">
					ORDONNANCE
				</div>
			</div>
			<div class="container">
				<script>
var hamburger = document.querySelector(".hamburger");
	var wrapper  = document.querySelector(".wrapper");
	var backdrop = document.querySelector(".backdrop");

	hamburger.addEventListener("click", function(){
		wrapper.classList.add("active");
	})

	backdrop.addEventListener("click", function(){
		wrapper.classList.remove("active");
	})
	function errorMessage() {
  var errorSpan8 = document.getElementById("error8");
  var errorSpan5 = document.getElementById("error5");
  var medicament = document.getElementsByName("medicament")[0].value;
  var per_day = document.getElementsByName("per_day")[0].value;
  var isValid = true; 
  if (!/^[a-z]+$/.test(medicament)) {
    errorSpan8.textContent = "only caracters from a to z";
    errorSpan8.style.display = "inline";
    errorSpan8.style.color = "red";
    isValid = false;
  } else {
    errorSpan8.style.display = "none";
  }
  if (!/^[1-3]+$/.test(per_day)) {
    errorSpan5.textContent = "only from 1 to 3 per day";
    errorSpan5.style.display = "inline";
    errorSpan5.style.color = "red";
    isValid = false;
  } else {
    errorSpan5.style.display = "none";
  }
  return isValid;
}
				</script>
				 <div class="content">
					<div class="content">
						<form method="post" action="modify_ordonnance.php" onsubmit="return errorMessage()">	
						<div class="user-details">
						 <div class="input-box">
  								<span class="details">Ordonnance ID</span>
  									<select name="id" id="id">
    								<option value=" ">Select ID</option>
  									</select>
							</div>
							<div class="input-box">
							<span class="details">How much per day</span>
							<input type="text" name="per_day" placeholder="Enter the quantity per day" >
							<span id="error5" style="display:none;"></span>
						  </div>
						  <div class="input-box">
							<span class="details">Medicament</span>
							<input type="text" name="medicament" placeholder="Enter the medicament name" >
							<span id="error8" style="display:none;"></span>
						  </div>
						</div>
						<input type="submit" name="submit" value="Confirm">
					 </form>
					 <form method="post" action="view_ordonnance.php">	
					 <a href="#" id="search-link"><strong>View ordonnance ?</strong></a>
                     <br>
<div id="search-form" class="search-form">
  <div class="input-box">
    <span class="details">Patient to view</span>
    <select name="id2" id="id2">
      <option value=" ">Select ID</option>
    </select>
  </div>
  <input type="submit" name="search" value="Delete">
</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</form>
<style>
  #search-label {
    background-color: lightgray;
    padding: 10px;
    margin-top: 10px;
  }
  .search-form {
    display: none;
  }
</style>
				   </div>
				</div>
			</div>
		</div>
		</div>
	</div>
	
	<script>
$(document).ready(function() {
  $.ajax({
    url: 'addO_ajax.php', // replace with the actual name of your PHP file
    dataType: 'json',
    success: function(data) {
      var options = '';
      for (var i = 0; i < data.length; i++) {
        options += '<option>' + data[i].ido + ' (' + data[i].patient_name + ')</option>';
      }
      $('#id').html(options);

// Use jQuery to set the value attribute of each option to the corresponding ido value
$('#patient_name2 option').each(function() {
  $(this).attr('value', $(this).text().split(' ')[0]);
});
    },
    error: function(xhr, status, error) {
      console.log(xhr.responseText);
    }
  });
});
						</script>
						<script>
$(document).ready(function() {
  $.ajax({
    url: 'addO_ajax.php', // replace with the actual name of your PHP file
    dataType: 'json',
    success: function(data) {
      var options = '';
      for (var i = 0; i < data.length; i++) {
        options += '<option>' + data[i].ido + ' (' + data[i].patient_name + ')</option>';
      }
      $('#id2').html(options);

// Use jQuery to set the value attribute of each option to the corresponding ido value
$('#patient_name2 option').each(function() {
  $(this).attr('value', $(this).text().split(' ')[0]);
});
    },
    error: function(xhr, status, error) {
      console.log(xhr.responseText);
    }
  });
});
						</script>
	<!-- ======= Footer ======= -->
	<footer id="footer" class="footer">

<div class="container">
  <div class="row gy-4">
	<div class="col-lg-5 col-md-12 footer-info">
	  <a href="home.html" class="logo d-flex align-items-center">
		<span>Impact</span>
	  </a>
	  <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
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
   Copyright <strong><span>Impact</span></strong>
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
<script>
  var searchLink = document.getElementById("search-link");
  var searchForm = document.getElementById("search-form");

  searchLink.addEventListener("click", function(e) {
    e.preventDefault(); // prevent default behavior of the link
    searchForm.style.display = "block"; // show the search form
  });
  var deleteButton = document.querySelector('input[type="submit"][name="delete"]');
deleteButton.addEventListener("click", function(e) {
  searchForm.style.display = "none"; // hide the search form
});

</script>
</html>