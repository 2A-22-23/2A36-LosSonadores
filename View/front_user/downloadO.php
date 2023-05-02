<?php
use \Mpdf\Mpdf;
require_once __DIR__ . '/vendor/autoload.php';

if (isset($_POST['html'])) {
  $html = $_POST['html'];
  $mpdf = new Mpdf();
  $mpdf->WriteHTML($html);
  header('Content-Type: application/pdf');
  header('Content-Disposition: attachment; filename="ordonnance.pdf"');
  $mpdf->Output('ordonnance.pdf', 'D');
} else {
  echo "Error: No HTML code found.";
}
?>
