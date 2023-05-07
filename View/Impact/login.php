<?php

session_start();

if(isset($_SESSION['idclient'])){
   $idclient = $_SESSION['idclient'];
}else{
   $idclient = '';}


 $msg="";

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
  
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../Impact/assets/css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>   
</head>
<body>

<div class="container">
    
    <input type="checkbox" id="flip">
    
    <div class="cover" >
      <div class="front">
        <!--<img src="images/frontImg.jpg" alt="">-->
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <!--<img class="backImg" src="images/backImg.jpg" alt="">-->
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">

          <?php echo $msg; ?>
            <div class="title">Login</div>
          <form action="login_core.php"  method="post">
       <div class="input-boxes">
         <div class="input-box">
           <i class="fas fa-envelope"></i>
     <input type="text" name="email" placeholder="Enter your email" >
       </div>
     <div class="input-box">
         <i class="fas fa-lock"></i>
         <input type="password" name="mdp" placeholder="Enter your password" required>
      </div>

      <br>
      <div class="input-box">
      <div class="g-recaptcha" data-sitekey="6LeoF5IlAAAAABw3al2nWSr7lxy8jrq9KvdHXW3d"></div>
      </div>
      <br>
              <div class="text"><a href="forget_pass.php">Forgot password?</a></div>
              <div class="button input-box">
                <input id="lel" type="submit" value="sumbit" name="enter">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sign up now</label></div>
            </div>
            <div class="button input-box">
  <input id="lel" type="submit" value="home page" name="enter" onclick="window.location.href='index.php';">
</div>


        </form>
</div>  


<div class="signup-form">
          <div class="title">Signup</div>


   <form enctype="multipart/form-data" id="registration-form" action="register_core.php" method="post"  onsubmit="return Validate(this)" name="register" >
      
   <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
      <input type="text" name="nom" id="nom" placeholder="enter your name" >
              </div>
     


              <div class="input-box">
                <i class="fas fa-user"></i>
         <input type="text" name="prenom" id="prenom" placeholder="enter your firstname" >
        
        </div>
     
        <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                
      <input type="file" name="image" id="image"    placeholder="enter your image" >
               
    </div>
              
        <div class="input-box">
                <i class="fas fa-phone"></i>
                <input type="text" name="telephone"  id="telephone"  placeholder="enter your number"  onkeyup="checkPhone()" />
        
        </div>
        <span id="phone-error" style="color: red; font-weight: bold;"></span>


        <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-user" ></i>
                  <p>&nbsp;&nbsp;&nbsp;&nbsp;</p>
                  
               <select type="text" name="type" >
                <option value="Doctor" >Doctor</option>
                <option value="Anssurance">Anssurance</option>
                <option value="Pharmacist">Pharmacist</option>
                <option value="Patient">Patient</option>
              </select>
              </div>
            </div>

        

        
        <div class="input-box">
                <i class="fa fa-address-card"></i>
                <input type="text"  id="adresse" name="adresse"  placeholder="Enter your address" >        
        </div>
     
     
       
       
        <div class="input-box">
                <i class="fas fa-envelope"></i>
          <input type="text"  name="email"  placeholder="enter your email"  id="email" onkeyup="checkEmail()" />
          <div id="email_error" class="val_error"></div>

        </div>
        <span id="email-error" style="color: red; font-weight: bold;"></span>

        <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="login" id="login" placeholder="enter your username"   onkeyup="checkUsername()" />
                <div id="login_error" class="val_error"></div>

       
              </div>
              <span id="username-error" style="color: red; font-weight: bold;"></span>

         <div  id="pw">

         <i class="fas fa-lock"></i>

                <input type="password" name="mdp" id="pass" placeholder="enter your password"  autocomplete="off" onkeyup="checkPassword()"  />

         </div>
         
        
      

            <div class="button input-box">
                <input type="submit"  value="register now" name="submit" id="submit-button">
                </div>


                <div type="submit"   class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>




   </form>
  
   <style>
        #pw {
            /*max-width: 380px;
            width: 100%;
            /*background-color: #f0f0f0;*/
           /* margin: 10px 0;
            height: 55px;
            border-radius: 55px;
            border-color: aquamarine;

           /* display: grid;*/
            /*grid-template-columns: 15% 85%;
            padding: 0 0.4rem;
            position: relative;*/
        
          /*  height: 100%;
   width: 100%;
   outline: none;
   border: none;
   padding: 0 30px;
   font-size: 16px;
   font-weight: 500;
   border-bottom: 2px solid rgba(0,0,0,0.2);
   transition: all 0.3s ease;
   margin-top: 30px;
   border-color: #149844;
   display: flex;
   align-items: center;
   height: 50px;
   width: 100%;
   margin: 10px 0;
   position: relative;
   color: #088d51;
   font-size: 17px;*/
   margin-top: 30px;
   display: flex;
   align-items: center;
   height: 50px;
   width: 100%;
   margin: 10px 0;
   position: relative;
  
      border-color: #149844;
    
   color: #088d51;
   font-size: 18px;  
        }
       
        

     
        #pass {
            height: 100%;
   width: 100%;
   outline: none;
   border: none;
   padding: 0 30px;
   font-size: 16px;
   font-weight: 500;
   border-bottom: 2px solid rgba(0,0,0,0.2);
   transition: all 0.3s ease;
        }

       

        #pw.weak {
            background-color: #ffcccc;
        }

        #pw.medium {
            background-color: #ffffcc;
        }

        #pw.strong {
            background-color: #ccffcc;
        }

        
        #pass.weak {
            background-color: #ffcccc;
        }

        #pass.medium {
            background-color: #ffffcc;
        }

        #pass.strong {
            background-color: #ccffcc;
        }

       
    </style>
    <script>
        function checkPassword() {
            var password = document.getElementById("pass").value;
            var strength = 0;
            if (password.length >= 8) {
                strength++;
            }
            if (password.match(/[a-z]/)) {
                strength++;
            }
            if (password.match(/[A-Z]/)) {
                strength++;
            }
            if (password.match(/[0-9]/)) {
                strength++;
            }
            if (password.match(/[$@#&!]/)) {
                strength++;
            }
            if (strength == 0) {
                document.getElementById("pw").className = "";
                document.getElementById("pass").className = "";
            } else if (strength <= 1) {
                document.getElementById("pw").className = "weak";
                document.getElementById("pass").className = "weak";
            } else if (strength <= 3) {
                document.getElementById("pw").className = "medium";
                document.getElementById("pass").className = "medium";
            } else if (strength <= 5) {
                document.getElementById("pw").className = "strong";
                document.getElementById("pass").className = "strong";
            }
        }

        function checkConPassword() {
            var password = document.getElementById("confirmpass").value;
            var passwordd = document.getElementById("pass").value;
            // if (password != passwordd) {

            //     document.getElementById("pww").className = "weak";
            //     document.getElementById("confirmpass").className = "weak";
            //     // alert("THE pwd doesnt match.");
            // }
            var strength = 0;
            if (password.length >= 8) {
                strength++;
            }
            if (password.match(/[a-z]/)) {
                strength++;
            }
            if (password.match(/[A-Z]/)) {
                strength++;
            }
            if (password.match(/[0-9]/)) {
                strength++;
            }
            if (password.match(/[$@#&!]/)) {
                strength++;
            }
            if (strength == 0) {
                document.getElementById("pww").className = "";
                document.getElementById("confirmpass").className = "";
            } else if (strength <= 1) {
                document.getElementById("pww").className = "weak";
                document.getElementById("confirmpass").className = "weak";
            } else if (strength <= 3) {
                document.getElementById("pww").className = "medium";
                document.getElementById("confirmpass").className = "medium";
            } else if (strength <= 5 && password == passwordd) {

                document.getElementById("pww").className = "strong";
                document.getElementById("confirmpass").className = "strong";

            } else if (password.length > passwordd.length) {
                document.getElementById("pww").className = "weak";
                document.getElementById("confirmpass").className = "weak";
            }

        }
    </script>

    <!-- Cherkerss -->
    

    <script>
        function checkUsername() {
            const usernameInput = document.getElementById('login');
            const usernameError = document.getElementById('username-error');
            const submitButton = document.getElementById('submit-button');
            // Make an AJAX request to check if the username already exists
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'check-username.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.exists) {
                        usernameError.textContent = 'Username already taken';
                        submitButton.disabled = true; // disable the submit button
                    } else {
                        usernameError.textContent = '';
                        submitButton.disabled = false; // disable the submit button
                    }
                }
            };
            xhr.send(`login=${usernameInput.value}`);
        }

        function checkEmail() {
            const emailInput = document.getElementById('email');
            const emailError = document.getElementById('email-error');
            const submitButton = document.getElementById('submit-button');
            // Make an AJAX request to check if the username already exists
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'check-email.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.exists) {
                    emailError.textContent = 'Email already taken';
                     submitButton.disabled = true; // disable the submit button
                } else {
                    emailError.textContent = '';
                   submitButton.disabled = false; // enable the submit button
                         }
                
    }
            };
            xhr.send(`email=${emailInput.value}`);
        }




        function checkPhone() {
            const phoneInput = document.getElementById('telephone');
            const phoneError = document.getElementById('phone-error');
            const submitButton = document.getElementById('submit-button');
            // Make an AJAX request to check if the username already exists
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'check-phone.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.exists) {
                        phoneError.textContent = 'phone number already taken';
                        submitButton.disabled = true; // disable the submit button
                    } else {
                        phoneError.textContent = '';
                        submitButton.disabled = false; // disable the submit button
                    }
                }
            };
            xhr.send(`telephone=${phoneInput.value}`);
        }
    </script>

<script type="text/javascript" language="javascript">

var nom = document.forms['register']['nom'];
    var prenom = document.forms['register']['prenom'];
    var telephone = document.forms['register']['telephone'];
    var adresse = document.forms['register']['adresse'];
    var email = document.forms['register']['email'];
    var login = document.forms['register']['login'];
    var mdp = document.forms['register']['mdp'];
   
    var login_error = document.getElementById("login_error");
    var email_error = document.getElementById("email_error");
    var mdp_error = document.getElementById("mdp_error"); 


    login.addEventListener("blur", loginVerify, true);
    email.addEventListener("blur", emailVerify, true);
    mdp.addEventListener("blur", mdpVerify, true);


    function Validate()
    { 
        
        if(nom.value == "")
        {
            nom.style.border = "3px solid red";
            alert("You didnt enter your firstname!");
            nom.focus();
            return false;


        }else{    nom.style.border = "1px solid #5E6E66";}
        
        
        if(prenom.value == "")
        {
            prenom.style.border = "3px solid red";
            alert("You didnt enter your lastname!");
            prenom.focus();
            return false;
        }else{    prenom.style.border = "1px solid #5E6E66";}
		
        
        if(telephone.value == "")
        {
            telephone.style.border = "3px solid red";
            alert("You didnt enter your phone number!");
            telephone.focus();
            return false;
        }else{    telephone.style.border = "1px solid #5E6E66";}


        if(adresse.value == "")
        {
            adresse.style.border = "3px solid red";
            alert("You didnt enter your adresse!");
            adresse.focus();
            return false;
        }else{    adresse.style.border = "1px solid #5E6E66";}
        if(login.value == "")
        {
            login.style.border = "3px solid red";
            alert("You didnt enter your login!");
            login.focus();
            return false;
        }else{    login.style.border = "1px solid #5E6E66";}

        if(email.value == "")
        {
            email.style.border = "3px solid red";
            alert("You didnt enter your email!");
            email.focus();
            return false;
        }
        else{  email.style.border = "1px solid #5E6E66";}
        if(mdp.value == "")
        {
            mdp.style.border = "3px solid red";
            alert("You didnt enter your Password!");
            mdp.focus();
            return false;
        }else{    mdp.style.border = "1px solid #5E6E66";}

    }


    
</script>
<script>
$(document).on('submit','#lel',function()
{
    var response =grecaptcha.getResponce();
alert(response);
});
<script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>


</script>
   
</body>


</html>