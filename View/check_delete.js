function errorMessage() {
    var errorSpan = document.getElementById("error");
  var errorSpan7 = document.getElementById("error7");
    var CIN_patient = document.getElementsByName("CIN_patient")[0].value;
   var doctor_name = document.getElementsByName("doctor_name")[0].value;
   var isValid = true;
   if (!/^[01]\d{7}$/.test(CIN_patient)) {
      errorSpan.textContent = "8 digits starting with 0 or 1";
      errorSpan.style.display = "inline";
      errorSpan.style.color = "red";
      isValid = false;
    } else {
      errorSpan.style.display = "none";
    }
  if (!/^[a-z]+$/.test(doctor_name)) {
      errorSpan7.textContent = "only caracters from a to z";
      errorSpan7.style.display = "inline";
      errorSpan7.style.color = "red";
      isValid = false;
    } else {
      errorSpan7.style.display = "none";
  
    }
  
    return isValid;
}