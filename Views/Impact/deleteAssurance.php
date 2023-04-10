<?php
include 'C:\xampp\htdocs\t_assurance\Controller\Assurance.php';

if (isset($_POST['delet']))
{
    $id = $_POST['delet'];
    $ass = new Assurance();
    $ass->deleteAssurance($id);
}

header('Location: index.php');
exit;
?>