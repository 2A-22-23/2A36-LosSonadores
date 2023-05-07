<?php
require '../Controller/crudO.php';
if (isset($_POST['search'])) {
    $patient_name = $_POST['id2'];
    $ord = new ordonnance_officiel();
    $ord->view_ordonnance($patient_name);
}
?>