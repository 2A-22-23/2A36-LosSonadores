<?php
include 'C:/xampp/htdocs/PROJET_PHARMACIEcrud/Controller/historiqueC.php';
$historiqueC = new historiqueC();
if (isset($_GET['idhis']) && !empty($_GET['idhis'])) {

    echo "id his: " . $_GET['idhis'];
    $historiqueC->deletehist($_GET['idhis']);
    header('location:basic-table.php');
} else {
    echo "id is not defined";
}
?>


