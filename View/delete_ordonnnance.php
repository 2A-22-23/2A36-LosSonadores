<?php
require '../Controller/crudO.php';

if (isset($_POST['delete'])) {
    $patient_name = $_POST['patient_name2'];
    $ord = new ordonnance_officiel();
    $ord->delete_ordonnance($patient_name);
}
?>