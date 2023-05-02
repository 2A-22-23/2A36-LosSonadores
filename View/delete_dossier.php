<?php
require '../Controller/crud.php';

  if(isset($_POST['delete'])) 
  {
     $idd = $_POST['idd'];
     $dossier1 = new dossier_medical();
     $result = $dossier1->delete_medical_record($idd);
  }
?>
