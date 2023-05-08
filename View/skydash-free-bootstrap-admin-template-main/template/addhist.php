<?php
//include '../Controller/historiqueC.php';
include "C:/xampp/htdocs/First_SUII/projet/Controller/historiqueC.php";
if (

    isset($_POST['patient_name']) &&
    isset($_POST['doctor_name']) &&
    isset($_POST['prix']) &&
    isset($_POST['date']) 

    
   ) 
{
    if (
       
        !empty($_POST['patient_name']) &&
        !empty($_POST['doctor_name']) &&
        !empty($_POST['prix']) &&
        !empty($_POST['date']) 
      
       ) 
        {
        $historique = new historique(
            NULL,
            $_POST['patient_name'],
            $_POST['doctor_name'],
            $_POST['prix'],
            $_POST['date']
        
            );
        $historiqueC = new historiqueC();
        $historiqueC->addhist($historique);
        header('location:basic-table.php');

        } 
    else 
        {
        header('location:basic-table.php');

        }
    }
else 
    {
      header('location:basic-table.php');

    }
?>