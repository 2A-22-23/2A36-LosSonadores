<?php
include 'C:/xampp/htdocs/PROJET_PHARMACIEcrud/Controller/pharmacieC.php';
$pharmacieC = new pharmacieC();
if (isset($_GET['idphar']) && !empty($_GET['idphar'])) {

    echo "id phar: " . $_GET['idphar'];
    $pharmacieC->deletepharmacie($_GET['idphar']);
    header('location:basic_elements.php');
} else {
    echo "id is not defined";
}
?>
