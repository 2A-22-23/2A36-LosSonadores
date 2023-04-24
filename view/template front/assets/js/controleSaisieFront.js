//--------------------------------------------PHARMACIE---------------------------------------------
  function validatePharmacie() {
    const nomRegex = /^[A-Za-z ]+$/;


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
function validateHistorique() {
  const nomRegex = /^[A-Za-z]+$/;


  // Récupération des champs
  var ido = document.getElementById("patient_name");
  
  var prix = document.getElementById("prix");
  var date = document.getElementById("doctor_name")

  // Vérification que les champs obligatoires sont remplis
  if (patient_name.value == ""  || prix.value == "" || doctor_name.value == "" ) {
    alert("Veuillez remplir tous les champs obligatoires.");
    return false;
  }

  // Vérification que les champs idphar et ido sont des nombres entiers positifs
  if (isNaN(prix.value) || prix.value < 0) {
    alert("Le prix doit être un nombre entier positif.");
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

  return true;
}
//--------------------------------------------code--------------------------------------------- 
function validatecode() {
  // Récupération des champs
  var code = document.getElementById("code");
  

  // Vérification que les champs obligatoires sont remplis
  if (code.value == "" ) {
    alert("Veuillezajouter un code.");
    return false;
  }

  // Vérification que les champs idphar et ido sont des nombres entiers positifs
  if (isNaN(code.value) || code.value < 0) {
    alert("le code n'est pas valable.");
    return false;
  }

  return true;
}
//--------------------------------------------prix--------------------------------------------- 
function validateprix() {
 
  // Récupération des champs
   var prix = document.getElementById("prix");
 // Vérification que les champs obligatoires sont remplis
 if (prix.value == "" ) {
  alert("Veuillez ajouter un prix.");
  return false;
}
 if (isNaN(prix.value) || prix.value < 0) {
  alert("le prix n'est pas valable.");
    return false;
}
  return true;
}
