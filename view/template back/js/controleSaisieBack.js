//--------------------------------------------PHARMACIE---------------------------------------------
  function validatePharmacieup() {
    const nomRegex = /^[A-Za-z]+$/;

    // Récupération des champs
 
    var name = document.getElementById("Name");
    var ville = document.getElementById("ville");
    var address = document.getElementById("address");
  
    // Vérification que les champs obligatoires sont remplis
    if (name.value == "" || ville.value == "" || address.value == "") {
      alert("Veuillez remplir tous les champs obligatoires.");
      return false;
    }
        // Vérification que les champs idphar et ido sont des nombres entiers positifs
 
    if (!nomRegex.test(name.value)) {
        alert('Le nom ne doit contenir que des lettres.');
        return false;
      }
    if (!nomRegex.test(ville.value)) {
        alert('la ville ne doit contenir que des lettres.');
        return false;
      }
    return true;
  }
//--------------------------------------------HISTORIQUE---------------------------------------------
function validateHistorqiueup() {


  // Récupération des champs
  var patient_name = document.getElementById("patient_name");

  var doctor_name = document.getElementById("doctor_name");
  var prix = document.getElementById("prix");

  // Vérification que les champs obligatoires sont remplis
  if (patient_name.value == ""  || prix.value == "" || doctor_name.value == "" ) {
    alert("Veuillez remplir tous les champs obligatoires.");
    return false;
  }

  if (!nomRegex.test(patient_name.value)) {
    alert('Le nom ne doit contenir que des lettres.');
    return false;
  }
  
  if (!nomRegex.test(doctor_name.value)) {
    alert('Le nom ne doit contenir que des lettres.');
    return false;
  }

  if (isNaN(prix.value) || prix.value < 0) {
    alert("prix doit être un nombre entier positif.");
    return false;
}

  return true;
}
  