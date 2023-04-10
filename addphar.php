<?php

include '../Controller/pharmacieC.php';

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
        $pharmacie = new pharmacie(
            $_POST['idphar'],
            $_POST['idordo'],
            $_POST['Name'],
            $_POST['ville'],
            $_POST['address']
            );
        $pharmacieC = new pharmacieC();
        $pharmacieC->addphar($pharmacie);
        header('location:basic_elements.php');
        } 
    else 
        {
        header('location:basic_elements.php');
        }
    }
else 
    {
        header('location:basic_elements.php');
    }
?>