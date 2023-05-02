function verif()
{
   
    var email = document.forms['register']['email'];
    var login = document.forms['register']['login'];
    var mdp = document.forms['register']['mdp'];
   
    var login_error = document.getElementById("login_error");
    var email_error = document.getElementById("email_error");
    var mdp_error = document.getElementById("mdp_error"); 


    login.addEventListener("blur", loginVerify, true);
    email.addEventListener("blur", emailVerify, true);
    mdp.addEventListener("blur", mdpVerify, true);
    
        if(login.value == "")
        {
            login.style.border = "1px solid red";
            alert("Vous n'avez pas entré de login!");
            login.focus();
            return false;
        }

        if(email.value == "")
        {
            window.
            email.style.border = "1px solid red";
            email_error.textContent = "Email requis !";
            email.focus();
            return false;
        }

        if(mdp.value == "")
        {
            mdp.style.border = "1px solid red";
            mdp_error.textContent = "Mot de passe requis !";
            mdp.focus();
            return false;
        }


    function loginVerify()
    {
        if(login.value != "")
        {
            login.style.border = "1px solid #5E6E66";
            login_error.innerHTML = "";
            return true;
        }
    }

    function emailVerify()
    {
        if(email.value != "")
        {
            email.style.border = "1px solid #5E6E66";
            email_error.innerHTML = "";
            return true;
        }
    }

    function mdpVerify()
    {
        if(mdp.value != "")
        {
            mdp.style.border = "1px solid #5E6E66";
            mdp_error.innerHTML = "";
            return true;
        }
    }
}