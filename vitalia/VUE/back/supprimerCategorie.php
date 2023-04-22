<?PHP
include "../../Controller/CategorieC.php";


$catC=new CategorieC();
if (isset($_POST["id"])){
	$catC->supprimerCategorie($_POST["id"]);
	header('Location: AfficherCategories.php');
}

?>