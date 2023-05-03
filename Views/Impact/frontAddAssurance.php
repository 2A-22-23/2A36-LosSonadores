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
    body {
    font-family: 'Lato', sans-serif;
}

h1 {
    margin-bottom: 40px;
}

label {
    color: #333;
}

.btn-send {
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    width: 80%;
    margin-left: 3px;
    }
.help-block.with-errors {
    color: #ff5050;
    margin-top: 5px;

}

.card{
	margin-left: 10px;
	margin-right: 10px;
}

    </style>
<div class="container">
  <div class ="section-header">
              <h2>Assurance</h2>
</div>      
<form method="post" action="addAssurance.php"  onsubmit="return Validate(this)" name="assurance"> 
<input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">

       <div class="row ">
      <div class="col-lg-7 mx-auto">
        <div class="card mt-2 mx-auto p-4 bg-light">
            <div class="card-body bg-light">
       
            <div class = "container">
                             <form id="contact-form" role="form">

            

            <div class="controls">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nom">Assurance Name *</label>
                            <input id="nom_assurance" type="text" name="nom_assurance" class="form-control" placeholder="Enter your name *" onkeyup ="checknom()"  >
                        </div>
                        <span id="nom-error" style="color: red; font-weight: bold;"></span>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_assurance">Assurance Date *</label>
                            <input id="date_assurance" type="date" name="date_assurance" class="form-control" placeholder="Please enter the date *"  >
                            
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="matricule_assurance">Assurance matricule *</label>
                            <input id="matricule_assurance" type="text" name="matricule_assurance" class="form-control" placeholder="Please enter your matricule *" onkeyup="checkmatricule()" >
                            
                        </div>
                        <span id="matricule-error" style="color: red; font-weight: bold;"></span>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                             <label for="type_assurance">Assurance type *</label>
                              <select id="type_assurance" name="type_assurance" class="form-control"  >
                                <option value="" selected disabled>--Select Your type--</option>
                                <option value="Cnss">Cnss</option>
                                <option value="Cnrps">Cnrps</option>
                                <option value="Convention Bilatérale">Convention Bilatérale</option>
                               </select>
                            
                        </div>
                    </div>
                </div>
               
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="status_assurance">Assurance Status *</label>
                            <select id="status_assurance" name="status_assurance" class="form-control" >
                                <option value="" selected disabled>--Select Your status--</option>
                                <option value="active">Active</option>
                                <option value="non active">Non active</option>
                            </select>
                            
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="age_assurance">Age *</label>
                            <input id="age_assurance" type="text" name="age_assurance" class="form-control" placeholder="Please enter your age *"  >
                            
                        </div>
                        <span id="age-error" style="color: red; font-weight: bold;"></span>
                    </div>


                    <div class="col-md-12">
                        
                            <button id='idbutton' type="submit" name='idbutton' class="btn btn-success btn-send  pt-2 btn-block
                            ">add assurance</button></div>
                    
                </div>
          
                </div>


        </div>
         </form>
        </div>
            </div>


    </div>
        <!-- /.8 -->

    </div>
    <!-- /.row-->

</div>
</div>

</form>
<script type="text/javascript" language="javascript">

    var nom = document.forms['assurance']['nom_assurance']; 
    var matricule = document.forms['assurance']['matricule_assurance']; 
    var type = document.forms['assurance']['type_assurance']; 
    var status = document.forms['assurance']['status_assurance']; 
    var date = document.forms['assurance']['date_assurance']; 
    var age = document.forms['assurance']['age_assurance']; 


    function Validate()
    { 
        
        if(nom.value == "")
        {
            nom.style.border = "3px solid red";
            alert("You didnt enter your Assurancename!");
            nom.focus();
            return false;


        }else{    nom.style.border = "1px solid #5E6E66";}
        
        if(age.value == "")
        {
            age.style.border = "3px solid red";
            alert("You didnt enter your age!");
            age.focus();
            return false;


        }else{    nom.style.border = "1px solid #5E6E66";}
        
        if(matricule.value == "")
        {
          matricule.style.border = "3px solid red";
            alert("You didnt enter your matricule!");
            matricule.focus();
            return false;
        }else{    matricule.style.border = "1px solid #5E6E66";}
		  
        if(date.value == "")
        {
          date.style.border = "3px solid red";
            alert("You didnt enter date!");
            date.focus();
            return false;
        }else{    date.style.border = "1px solid #5E6E66";}
        
        if(type.value == "")
        {
          type.style.border = "3px solid red";
            alert("You didnt enter your type!");
            type.focus();
            return false;
        }else{    type.style.border = "1px solid #5E6E66";}


        if(status.value == "")
        {
          status.style.border = "3px solid red";
            alert("You didnt enter your status!");
            status.focus();
            return false;
        }else{    status.style.border = "1px solid #5E6E66";}
      

    }


    
</script>
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
                  document.getElementById("idbutton").disabled = true;
              } else {
                  matriculeError.textContent = '';
                 // enableButton();
                 document.getElementById("idbutton").disabled = false;
              }
          }
      };
      xhr.send(`matricule_assurance=${matriculeInput.value}`);
  }
  
  function checknom() {
    const nomInput = document.getElementById('nom_assurance');
    const nomError = document.getElementById('nom-error');
    const regex = /^[a-zA-Z]+$/; // Expression régulière pour les lettres uniquement
    const nomAssuranceValue = nomInput.value.trim(); // Supprimer les espaces au début et à la fin de la chaîne

    if (!regex.test(nomAssuranceValue)) { // Si la chaîne ne contient pas que des lettres
      nomError.textContent = 'the name has to have lettre';
      document.getElementById("idbutton").disabled = true;
    } else {
      nomError.textContent = '';
     //
      //enableButton();
      document.getElementById("idbutton").disabled = false;
    }
  }

  

  function enableButton() {
    const nomInput = document.getElementById('nom_assurance');
    const matriculeInput = document.getElementById('matricule_assurance');
  
    const button = document.getElementById('idbutton');
    
    if (nomInput.value && matriculeInput.value) {
      button.disabled = false;
    } else {
      button.disabled = true;
    }
  }
  


   /*function checkmatricule() {
    
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


  }*/
  
  </script>
  <!-- <script src="validation.js"></script> -->
