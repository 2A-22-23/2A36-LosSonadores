//--------------------------------------------PHARMACIE---------------------------------------------
  
  function validatePharmaciem() {
    const name = document.getElementById("Name");
    const ville = document.getElementById("ville");
    const address = document.getElementById("address");
  
    // Récupérer les éléments pour les messages d'alerte
    const nameAlert = document.getElementById("NameAlert");
    const villeAlert = document.getElementById("villeAlert");
    const addressAlert = document.getElementById("addressAlert");
  
    // Initialiser la variable pour les messages d'alerte
    let alert4 = {
      message: "",
      type: ""
    };
  
    // Vérifier si les champs obligatoires sont remplis
    if (name.value === "" || ville.value === "" || address.value === "") {
      // Mettre à jour le message d'alerte
      alert4.message = 'Veuillez remplir tous les champs.';
      alert4.type = 'danger';
  
      // Afficher le message d'alerte sous chaque champ concerné
      if (name.value === "") {
        nameAlert.innerHTML = alert4.message;
        nameAlert.classList.add("alert", "alert-danger");
      }
      if (ville.value === "") {
        villeAlert.innerHTML = alert4.message;
        villeAlert.classList.add("alert", "alert-danger");
      }
      if (address.value === "") {
        addressAlert.innerHTML = alert4.message;
        addressAlert.classList.add("alert", "alert-danger");
      }
      
  
      return false;
    }
  
    // Vérifier si le nom et la ville ne contiennent que des lettres
    const nomRegex = /^[A-Za-z]+$/;
    if (!nomRegex.test(name.value)) {
      // Mettre à jour le message d'alerte
      alert4.message = 'Le nom ne doit contenir que des lettres';
      alert4.type = 'danger';
  
      // Afficher le message d'alerte sous le champ correspondant
      nameAlert.innerHTML = alert4.message;
  
      return false;
    }
    if (!nomRegex.test(ville.value)) {
      // Mettre à jour le message d'alerte
      alert4.message = 'La ville ne doit contenir que des lettres';
      alert4.type = 'danger';
  
      // Afficher le message d'alerte sous le champ correspondant
      villeAlert.innerHTML = alert4.message;
  
      return false;
    }
  
    // Si tout est valide, retourner true
    return true;
  }
  
//--------------------------------------------HISTORIQUE---------------------------------------------
function validateHistorqiuem() {
  // Récupération des champs
  const patient_name = document.getElementById("patient_name");
  const doctor_name = document.getElementById("doctor_name");
  const prix = document.getElementById("prix");
  
  // Récupérer les éléments pour les messages d'alerte
  const patient_name_alert = document.getElementById("patient_name_alert");
  const doctor_name_alert = document.getElementById("doctor_name_alert");
  const prix_alert = document.getElementById("prix_alert");
  
  // Initialiser la variable pour les messages d'alerte
  let alert3 = {
  message: "",
  type: ""
  };
  
  // Vérification que les champs obligatoires sont remplis
  if (patient_name.value === "" || prix.value === "" || doctor_name.value === "") {
  // Mettre à jour le message d'alerte
  alert3.message = 'Veuillez remplir tous les champs obligatoires.';
  alert3.type = 'danger';
  // Afficher le message d'alerte sous chaque champ concerné
if (patient_name.value === "") {
  patient_name_alert.innerHTML = alert3.message;
  patient_name_alert.classList.add("alert", "alert-danger");
}
if (prix.value === "") {
  prix_alert.innerHTML = alert3.message;
  prix_alert.classList.add("alert", "alert-danger");
}
if (doctor_name.value === "") {
  doctor_name_alert.innerHTML = alert3.message;
  doctor_name_alert.classList.add("alert", "alert-danger");
}

return false;
}

// Vérifier si le nom et le nom du médecin ne contiennent que des lettres
const nomRegex = /^[A-Za-z]+$/;
if (!nomRegex.test(patient_name.value)) {
// Mettre à jour le message d'alerte
alert3.message = 'Le nom ne doit contenir que des lettres.';
alert3.type = 'danger';
// Afficher le message d'alerte sous le champ correspondant
patient_name_alert.innerHTML = alert3.message;

return false;
}

if (!nomRegex.test(doctor_name.value)) {
// Mettre à jour le message d'alerte
alert3.message = 'Le nom du médecin ne doit contenir que des lettres.';
alert3.type = 'danger';
// Afficher le message d'alerte sous le champ correspondant
doctor_name_alert.innerHTML = alert3.message;

return false;
}

// Vérifier que le prix est un nombre entier positif
if (isNaN(prix.value) || prix.value < 0) {
// Mettre à jour le message d'alerte
alert3.message = 'Le prix doit être un nombre entier positif.';
alert3.type = 'danger';
// Afficher le message d'alerte sous le champ correspondant
prix_alert.innerHTML = alert3.message;

return false;
}

return true;
}