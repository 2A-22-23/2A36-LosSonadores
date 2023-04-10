



<?php
// Inclure le fichier contenant la classe PlanningC
// Inclure le fichier contenant la classe PlanningC

// Include the PlanningC class and start the session
include '../Controller/PlanningC.php';
session_start();

// Check if the form has been submitted
if(isset($_POST['update'])) {
  // Get the form data
  $id = $_POST['id'];
  $jour = isset($_POST['jour']) ? $_POST['jour'] : "";
  $timeFrom = isset($_POST['timeFrom']) ? $_POST['timeFrom'] : "";
  $timeTo = isset($_POST['timeTo']) ? $_POST['timeTo'] : "";
  

  // Update the planning record
  $planningC = new PlanningC();
  $planningC->updatePlanning($id, $_SESSION['idclient'], $jour, $timeFrom, $timeTo);
 
  // Return a success message
 

  
}



    // Afficher le formulaire de mise à jour
    ?>
 

    <form id="update-form" method="POST" action="">
  <input type="hidden" name="id" value="<?= $id; ?>">
  <label>Jour :</label>
  <input type="text" name="jour" value="<?= isset($planning['jour']) ? $planning['jour'] : '';; ?>"><br>
  <label>Heure de début :</label>
  <input type="time" name="timeFrom" value="<?= isset($planning['timeFrom']) ? $planning['timeFrom'] : '';?>"><br>
  <label>Heure de fin :</label>
  <input type="time" name="timeTo" value="<?=isset($planning['timeTo']) ? $planning['timeTo'] : '';  ?>"><br>
  <button   name="update" value="Mettre à jour"  >Mettre à jour<a href="DoctorSchedule - Copie.php"></button>

  
    
    
    
    
  <button   style= " background-color: #4b0082 ,   color: white,   border-radius: 5px" ><a href="DoctorSchedule - Copie.php">Back to list</a></button>
</form>




<script>
  // Récupérer les éléments HTML correspondants
const form = document.getElementById("update-form");
const jourInput = form.elements["jour"];

// Ajouter un événement "submit" pour le formulaire
form.addEventListener("submit", function(event) {
  // Récupérer la valeur saisie pour le champ "jour"
  const jourValue = jourInput.value.trim().toLowerCase();

  // Vérifier si le champ "jour" est vide ou non
  if (jourValue === "") {
    // Empêcher la soumission du formulaire et afficher un message d'erreur en anglais
    event.preventDefault();
    alert("Please enter a day.");
    return;
  }

  // Vérifier si la valeur saisie correspond à un jour de la semaine
  const daysOfWeek = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi",
                           "sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];
  if (!daysOfWeek.includes(jourValue.toLowerCase())) {
    // Empêcher la soumission du formulaire et afficher un message d'erreur en anglais
    event.preventDefault();
    alert("Please enter a valid day (for example: Monday, Tuesday, Wednesday, etc.).");
  }
});

</script>


<style>
  /* Style the form container */
  #update-form {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f2f2f2;
    border: 1px solid #ddd;
    border-radius: 5px;
  }

  /* Style the form heading */
  #update-form h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #4b0082;
  }

  /* Style the form labels */
  #update-form label {
    display: block;
    margin-bottom: 10px;
    color: #666;
  }

  /* Style the form input fields */
  #update-form input[type="text"],
  #update-form input[type="time"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: none;
    border-radius: 5px;
    background-color: #fff;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
  }

  /* Style the form submit button */
  #update-form input[type="submit"] {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #008374;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  /* Style the form submit button on hover */
  #update-form input[type="submit"]:hover {
    background-color: #008374;
  }

  /* Style the back to list button */
  #update-form button {
    display: block;
    margin-top: 20px;
    padding: 10px;
    background-color: #008374;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  /* Style the back to list button on hover */
  #update-form button:hover {
    background-color: #008374;
  }

  /* Style the link inside the back to list button */
  #update-form button a {
    color: #fff;
    text-decoration: none;
  }
</style>




   

