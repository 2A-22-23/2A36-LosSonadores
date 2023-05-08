//--------------------------------------------PHARMACIE---------------------------------------------

function validatePharmacie() {
  const name = document.getElementById("Name");
  const ville = document.getElementById("ville");
  const address = document.getElementById("address");

  // Récupérer les éléments pour les messages d'alerte
  const nameAlert = document.getElementById("NameAlert");
  const villeAlert = document.getElementById("villeAlert");
  const addressAlert = document.getElementById("addressAlert");

  // Initialiser la variable pour les messages d'alerte
  let alert1 = {
    message: "",
    type: ""
  };

  // Vérifier si les champs obligatoires sont remplis
  if (name.value === "" || ville.value === "" || address.value === "") {
    // Mettre à jour le message d'alerte
    alert1.message = 'Veuillez remplir tous les champs.';
    alert1.type = 'danger';

    // Afficher le message d'alerte sous chaque champ concerné
    if (name.value === "") {
      nameAlert.innerHTML = alert1.message;
      nameAlert.classList.add("alert", "alert-danger");
    }
    if (ville.value === "") {
      villeAlert.innerHTML = alert1.message;
      villeAlert.classList.add("alert", "alert-danger");
    }
    if (address.value === "") {
      addressAlert.innerHTML = alert1.message;
      addressAlert.classList.add("alert", "alert-danger");
    }
    

    return false;
  }

  // Vérifier si le nom et la ville ne contiennent que des lettres
  const nomRegex = /^[A-Za-z]+$/;
  if (!nomRegex.test(name.value)) {
    // Mettre à jour le message d'alerte
    alert1.message = 'Le nom ne doit contenir que des lettres';
    alert1.type = 'danger';

    // Afficher le message d'alerte sous le champ correspondant
    nameAlert.innerHTML = alert1.message;

    return false;
  }
  if (!nomRegex.test(ville.value)) {
    // Mettre à jour le message d'alerte
    alert1.message = 'La ville ne doit contenir que des lettres';
    alert1.type = 'danger';

    // Afficher le message d'alerte sous le champ correspondant
    villeAlert.innerHTML = alert1.message;

    return false;
  }

  // Si tout est valide, retourner true
  return true;
}

//--------------------------------------------code--------------------------------------------- 
function validatecode() {
  // Récupération des champs

  var code0 = document.getElementById("code0");
  const codeAlert = document.getElementById("codeAlert");
  let alert2 = {
    message: "",
    type: ""
  };
  // Vérification que les champs obligatoires sont remplis
  if (code0.value === "") {
    // Mettre à jour le message d'alerte
    alert2.message = 'Veuillez mettre un code.';
    alert2.type = 'danger';

    // Afficher le message d'alerte sous chaque champ concerné
    if (code0.value === "") {
      codeAlert.innerHTML = alert2.message;
      codeAlert.classList.add("alert", "alert-danger");
    }
 
    return false;
  }
}
//--------------------------------------------prix--------------------------------------------- 
function validateprix() {

  // Récupération des champs
   var prix = document.getElementById("prix");
   const prixAlert = document.getElementById("prixAlert");
   let alert3 = {
    message: "",
    type: ""
  };
 
  // Vérification que les champs obligatoires sont remplis
  if (prix.value === "") {
    // Mettre à jour le message d'alerte
    alert3.message = 'Veuillez mettre un prix.';
    alert3.type = 'danger';

    // Afficher le message d'alerte sous chaque champ concerné
    if (prix.value === "") {
      prixAlert.innerHTML = alert3.message;
      prixAlert.classList.add("alert", "alert-danger");
    }
 
    return false;
  }
}
