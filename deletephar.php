<?php
include '../Controller/pharmacieC.php';
$pharmacieC = new pharmacieC();
if (isset($_GET['idphar']) && !empty($_GET['idphar'])) {

    echo "idphar event: " . $_GET['idphar'];
    $pharmacieC->deletephar($_GET['idphar']);
    header('location:basic_elements');
} else {
    echo "idphar is not defined";
}
?>
