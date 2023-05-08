<?PHP
require_once "C:/xampp/htdocs/First_SUII/projet/Controller/ProduitC.php";


$prodC=new ProduitC();
if (isset($_POST["id"])){
	$prodC->supprimerProduit($_POST["id"]);
	header('Location: AfficherProduits.php');
}

?>