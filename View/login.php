<?php

session_start();

if(isset($_SESSION['idclient'])){
   $idclient = $_SESSION['idclient'];
}else{
   $idclient = '';}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
  
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="Impact/assets/css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   </head>
<body>

<div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
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


            <div class="title">Login</div>
          <form action="login_core.php"  method="post">
       <div class="input-boxes">
         <div class="input-box">
           <i class="fas fa-envelope"></i>
     <input type="text" name="email" placeholder="Enter your email" required>
       </div>
     <div class="input-box">
         <i class="fas fa-lock"></i>
         <input type="password" name="mdp" placeholder="Enter your password" required>
      </div>
              <div class="text"><a href="#">Forgot password?</a></div>
              <div class="button input-box">
                <input type="submit" value="sumbit" name="enter">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sign up now</label></div>
            </div>
        </form>
</div>  


<div class="signup-form">
          <div class="title">Signup</div>


   <form id="registration-form" action="register_core.php" method="post" >
      
   <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
      <input type="text" name="nom" required placeholder="enter your name" >
              </div>
     


              <div class="input-box">
                <i class="fas fa-user"></i>
         <input type="text" name="prenom" required placeholder="enter your firstname" >
        
        </div>
     

        <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="telephone" required placeholder="enter your number" class="box" >
        
        </div>


      
        

        
        <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="text"  id="adresse" name="adresse" required placeholder="Enter your address" >        
        </div>
     
     
        <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="login" required placeholder="confirm your username" >
        
        </div>

         <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="mdp" required placeholder="enter your password" >
        
         </div>

         <div class="input-box">
                <i class="fas fa-lock"></i>
          <input type="email" id="email" name="email" required placeholder="enter your email"  >
          <span id="email-check"></span>
        </div>
          <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-user"></i>
                  <p>&nbsp;&nbsp;&nbsp;&nbsp;</p>
                  
               <select type="text" name="type"   >
                <option value="Doctor" >Doctor</option>
                <option value="Anssurance">Anssurance</option>
                <option value="Pharmacist">Pharmacist</option>
                <option value="Patient">Patient</option>
              </select>
              </div>
            </div>


            <div class="button input-box">
                <input type="submit"  value="register now" name="submit" id="submit-button">
                </div>


                <div type="submit"   class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>




   </form>
  
	
   <script src="script.js"></script>
</body>


</html>