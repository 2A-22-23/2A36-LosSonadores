<?php
// update.php

include '../Controller/RendezVousC.php';

$connect = new PDO('mysql:host=localhost;dbname=mabase', 'root', '211JFT9126');

if(isset($_POST["title"]) && isset($_POST["idr"]))
{
  $query = "
    UPDATE rendezvous 
    SET title = :title
    WHERE idr = :idr
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
    array(
      ':title' => $_POST['title'],
      ':idr'    => $_POST['idr']
    )
  );
}
?>
