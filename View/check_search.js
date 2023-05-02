function errorMessage() {
    var isValid = true;
    var errorSpan2 = document.getElementById("error2");
  var errorSpan7 = document.getElementById("error7");
  var patient_name = document.getElementsByName("patient_name")[0].value;
 var doctor_name = document.getElementsByName("doctor_name")[0].value;
 
 if (!/^[a-z]+$/.test(patient_name)) {
    errorSpan2.textContent = "only caracters from a to z";
    errorSpan2.style.display = "inline";
    errorSpan2.style.color = "red";
    isValid = false;
  } else {
    errorSpan2.style.display = "none";

  }
if (!/^[a-z]+$/.test(doctor_name)) {
    errorSpan7.textContent = "only caracters from a to z";
    errorSpan7.style.display = "inline";
    errorSpan7.style.color = "red";
    isValid = false;
  } else {
    errorSpan7.style.display = "none";

  }
  return isValid ;
}