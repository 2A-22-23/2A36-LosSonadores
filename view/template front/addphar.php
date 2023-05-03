<?php
include_once "C:/xampp/htdocs/PROJET_PHARMACIEcrud/Controller/pharmacieC.php";

if (
    isset($_POST['Name']) &&
    isset($_POST['ville']) &&
    isset($_POST['address'])
) 
{
    if (
        !empty($_POST['Name']) &&
        !empty($_POST['ville']) &&
        !empty($_POST['address']) 
    ) 
    {
        $pharmacie = new pharmacie(
            NULL,
            $_POST['Name'],
            $_POST['ville'],
            $_POST['address']
        );

        $pharmacieC = new pharmacieC();
       

        echo "<script> alert('Pharmacie ajoutée avec succès!');</script>";
        echo "<script> window.location.href='pharmacie-details.php';</script>";
    } 
    else 
    {
        header('location:pharmacie.php');
    }
}
else 
{
    header('location:pharmacie.php');
}
?>
