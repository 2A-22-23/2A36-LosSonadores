<?php

include "C:/xampp/htdocs/PROJET_PHARMACIEcrud/Controller/clientc.php";
session_start();
$db=config::getConnexion();
if(isset($_SESSION['idclient'])){
   $idclient = $_SESSION['idclient'];
}else{
   $idclient = '';
};

if(isset($_POST['submit']))
{
    $nom = $_POST['nom'];
    
    $prenom = $_POST['prenom'];
    
    $telephone = $_POST['telephone'];
    
   
    $email = $_POST['email'];
    
 
    $mdp = $_POST['mdp'];
    
    $adresse = $_POST['adresse'];
   
    $login = $_POST['login'];
   
    
    $type = $_POST['type'];
    $idclient = $_SESSION['idclient'];   
    
    $db = config::getConnexion();
    $req = $db->prepare('UPDATE user SET nom=?,prenom=?,telephone=?,email=?,login=?,adresse=?,type=?,mdp=?  WHERE idclient= ?');
    $req->execute(array($nom,$prenom,$telephone,$email,$login,$adresse,$type,$mdp,$idclient));
   

    header("Location:homee.php");
    

}
?>
