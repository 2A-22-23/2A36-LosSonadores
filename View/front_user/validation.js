// document.addEventListener("DOMContentLoaded", function() {
//     var form = document.querySelector("form");
  
//     form.addEventListener("submit", function(event) {
//       var matricule = document.getElementById("matricule_assurance").value;
//       var name = document.getElementById("nom_assurance").value;
//       if (name.length == 0 )
//       {
//         alert("Le nom d'assurance ne doit pas etre vide");
//         event.preventDefault();
//       }
  
//       if (isNaN(matricule) || matricule.length != 8) {
//         alert("Le matricule de l'assurance doit être un nombre de 8 chiffres.");
//         event.preventDefault();
//       }
//     });
//   });

  
 /* function checkmatricule() {
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
  }*/

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
