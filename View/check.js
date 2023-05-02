function errorMessage() {
  var errorSpan = document.getElementById("error");
  var errorSpan3 = document.getElementById("error3");
  var errorSpan8 = document.getElementById("error8");
  var CIN_patient = document.getElementsByName("CIN_patient")[0].value;
    var phone_number = document.getElementsByName("phone_number")[0].value;
  var medical_history = document.getElementsByName("medical_history")[0].value;
  var isValid = true;

  if (!/^[01]\d{7}$/.test(CIN_patient)) {
    errorSpan.textContent = "8 digits starting with 0 or 1";
    errorSpan.style.display = "inline";
    errorSpan.style.color = "red";
    isValid = false;
  } else {
    errorSpan.style.display = "none";
  }

  if (!/^\d{8}$/.test(phone_number)) {
    errorSpan3.textContent = "only 8 digits";
    errorSpan3.style.display = "inline";
    errorSpan3.style.color = "red";
    isValid = false;
  } else {
    errorSpan3.style.display = "none";
  }

  if (!/^[a-z]+$/.test(medical_history)) {
    errorSpan8.textContent = "only caracters from a to z";
    errorSpan8.style.display = "inline";
    errorSpan8.style.color = "red";
    isValid = false;
  } else {
    errorSpan8.style.display = "none";

  }
  return isValid;
}
var hamburger = document.querySelector(".hamburger");
	var wrapper  = document.querySelector(".wrapper");
	var backdrop = document.querySelector(".backdrop");

	hamburger.addEventListener("click", function(){
		wrapper.classList.add("active");
	})

	backdrop.addEventListener("click", function(){
		wrapper.classList.remove("active");
	})