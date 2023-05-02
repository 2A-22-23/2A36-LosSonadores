<?php
require '../Controller/crudO.php';

if (isset($_POST['submit'])) {
    $ido = $_POST['id'];
    $medicament = $_POST['medicament'];
    $per_day = $_POST['per_day'];
    $ord = new ordonnance_officiel();
    $ord->edit_ordonnance($per_day,$medicament,$ido);
}
?>