<?php

include "C:/xampp/htdocs/tojrab03/controller/clientc.php";

$db=config::getConnexion();

session_start();
$db=config::getConnexion();
if(isset($_SESSION['idclient'])){
   $idclient = $_SESSION['idclient'];
}else{
   $idclient = '';
};

/*if(isset($_POST['delete'])){

  

   $nom = $_POST['nom'];
   $nom = filter_var($nom, FILTER_SANITIZE_STRING);
   
   $prenom = $_POST['prenom'];
   $prenom = filter_var($prenom, FILTER_SANITIZE_STRING);
   
   $telephone = $_POST['telephone'];
   $telephone = filter_var($telephone, FILTER_SANITIZE_STRING);
   
  
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   
   $mdp = $_POST['mdp'];
   $mdp = sha1($_POST['mdp']);
   
   $adresse = $_POST['adresse'];
   $adresse = filter_var($adresse, FILTER_SANITIZE_STRING);
  
   $login = $_POST['login'];
   $login = filter_var($login, FILTER_SANITIZE_STRING);
  
   
   $type = $_POST['type'];
   $type = filter_var($type, FILTER_SANITIZE_STRING);
   

   // Check if email already exists
   

     $client = new client($nom,$prenom,$type,$telephone,$adresse,$email,$login,$mdp);
        $clientc = new clientc();
        
        $clientc->deleteClient($idclient);

       
    
}*/



/*


	if (isset($_GET["DELETE"]) )
   {
		$idclient = $POST["idclient"];



		$client = new client($nom,$prenom,$type,$telephone,$adresse,$email,$login,$mdp);
        $clientc = new clientc();
        
        $clientc->deleteClient($idclient);

		echo "user delete <br>";
		//echo "<a href='../View/inscriptionAD.php'> <br> Liste des utilisateurs</a>";
	}
	
   
else  {echo"false";}*/
   
 

if(isset($_POST['delete'])){
    $idclient = $_GET['idclient'];
    $clientc = new clientc();
    $clientc->deleteClient($idclient);
    echo "User deleted <br>";
}
	
?>




