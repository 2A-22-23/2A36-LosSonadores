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
              <h2>Remboursement</h2>
</div>      
<form method="post" action="addRembourement.php"  onsubmit="return Validate(this)" name="remboursement">       
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
                            <label for="matricule_remb">Matricule *</label>
                            <input id="matricule_remb" type="text" name="matricule_remb" class="form-control" placeholder="Enter your matricule *"  onkeyup ="checkmatricule()" >
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="pourcentage_remb">Pourcentage * </label>
                            <input id="pourcentage_remb" type="text" name="pourcentage_remb" class="form-control" placeholder="Please enter the pourcentage *">
                           
                            
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="date_remb">Age *</label>  
                            <input id="age_remb" type="text" name="age_remb" class="form-control" placeholder="Please enter your age*" onkeyup ="checkage()" >
                           
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                         <label for="observation_remb"> Observation *</label>  
                            <input id="observation_remb" type="text" name="observation_remb" class="form-control" placeholder="Please enter the observation *" >
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                        <label for="cota_remb"> cota *</label>  
                            <input id="cota_remb" type="text" name="cota_remb" class="form-control" placeholder="Please enter your cota *" >
                            
                        </div>
                    </div>

  <div class="row">
  <?php if (isset($_GET['idAssurance'])): ?>
    <input type="hidden" name="idAssurance" value="<?php echo htmlspecialchars($_GET['idAssurance'], ENT_QUOTES); ?>">
  <?php endif; ?>
</div>

<div class="row">
  <?php if (isset($_GET['email'])): ?>
    <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email'], ENT_QUOTES); ?>">
  <?php endif; ?>
</div>




 
  <div class="text-center">
                <button id='idbutton' type="submit" name='idbutton'  class="btn btn-success btn-send  pt-2 btn-block
                            ">add remboursement</button></div>

      
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

  </section>
  <script type="text/javascript" language="javascript">

    var matricule = document.forms['remboursement']['matricule_remb']; 
    var pourcentage = document.forms['remboursement']['pourcentage_remb']; 
    var age = document.forms['remboursement']['age_remb']; 
    var observation = document.forms['remboursement'][' observation_remb']; 
    var cota = document.forms['remboursement']['cota_remb']; 
   


    function Validate()
    { 
        
        if(matricule.value == "")
        {
          matricule.style.border = "3px solid red";
            alert("You didnt enter your matricule!");
            matricule.focus();
            return false;


        }else{    matricule.style.border = "1px solid #5E6E66";}
        
        
        if(pourcentage.value == "")
        {
          pourcentage.style.border = "3px solid red";
            alert("You didnt enter your pourcentage!");
            pourcentage.focus();
            return false;
        }else{    pourcentage.style.border = "1px solid #5E6E66";}
		
        
        if(age .value == "")
        {
          age .style.border = "3px solid red";
            alert("You didnt enter your age!");
            age .focus();
            return false;
        }else{    age .style.border = "1px solid #5E6E66";}


        if(observation.value == "")
        {
          observation.style.border = "3px solid red";
            alert("You didnt enter observation!");
            observation.focus();
            return false;
        }else{   observation.style.border = "1px solid #5E6E66";}

        if(cota.value == "")
        {
          cota.style.border = "3px solid red";
            alert("You didnt enter your cota!");
            cota.focus();
            return false;
        }else{   cota.style.border = "1px solid #5E6E66";}
      

    }


    
</script>
  <script> 
     const form =document.getElementById("form");
     const pourcentage =document.getElementById("pourcentage_remb");
     const date =document.getElementById("date_remb");
     const observation=document.getElementById("observation_remb");
     const cotisation =document.getElementById("cotisation_remb");

     form.addEeventListener('submit',e =>{
       e.preventDefault();
       checkinput();
    });
    function checkinput(){
      const pourcentageValue = pourcentage.value.trim();
      const dateValue = date.value.trim();
      const observationValue = observation.value.trim();
      const cotisationValue = cotisation.value.trim();

      if (pourcentageValue === ''){
        setError(pourcentage,'pourcentage Cannot be blank');
      }
      else {
        setSuccess(pourcentage);
      }
      if (dateValue === ''){
        setError(date,'date Cannot be blank');
      }
      else {
        setSuccess(date);
      }
     
      if (observationValue === ''){
        setError(observation,'observation Cannot be blank');
      }
      else {
        setSuccess(observation);
      }
      
      if (cotisationValue === ''){
        setError(cotisation,'cotisation Cannot be blank');
      }
      else {
        setSuccess(cotisation);
      }

    }
    function setError(input,message){
      const formContol =input.parentElement;
      const small =formControl.querySelector('samall');
      formControl.className ='form-control error ';
      small.innerText = message ;

    }
    function setSuccess(){
      const formControl = input.parentElement;
      formControl.ClassName ='form-control success';
    }
  </script>
<script> 


function checkmatricule() {
 
   const matriculeInput = document.getElementById('matricule_remb');
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
   xhr.send(`matricule_remb=${matriculeInput.value}`);
}

function checkage() {
 const nomInput = document.getElementById('age_remb');
 const nomError = document.getElementById('age-error');
 const regex = /^[0-9]+$/; // Expression régulière pour les lettres uniquement
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
 const nomInput = document.getElementById('age_remb');
 const matriculeInput = document.getElementById('matricule_remb');

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
