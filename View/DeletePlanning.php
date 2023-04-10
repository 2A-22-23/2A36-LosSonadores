<?php
include '../Controller/PlanningC.php';
$PlanningC = new PlanningC();
$PlanningC->deletePlanning($_GET["id"]);
header('Location:DoctorSchedule - Copie.php');
?>
