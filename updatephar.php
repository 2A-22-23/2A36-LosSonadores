
<?php

include '../Controller/pharmacieC.php';

$pharmacieC = new pharmacieC();
var_dump($_POST);
if (
    isset($_POST['idphar']) &&
    isset($_POST['idordo']) &&
    isset($_POST['Name']) &&
    isset($_POST['ville']) &&
    isset($_POST['address'])
   ) 
   {
    if (
        !empty($_POST['idphar']) &&
        !empty($_POST['idordo']) &&
        !empty($_POST['Name']) &&
        !empty($_POST['ville']) &&
        !empty($_POST['address']) 
       ) 
       {
        $r = $pharmacieC->showphar ($_POST['idphar']);
        $pharmacie = new pharmacie(
            $_POST['idphar'],
            $_POST['idordo'],
            $_POST['Name'],
            $_POST['ville'],
            $_POST['address']
            );
        $pharmacieC = new pharmacieC();
        $pharmacieC->updatephar($pharmacie, $_POST['idpharmacie']);
        header('location:listphar.php');
        } 
    else 
        {
            header('location:listpha.php');
        }
    }
else 
    {
        header('location:listphar.php');
    }
?>