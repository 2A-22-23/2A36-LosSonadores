<style>
		.container {
			border: 1px solid #ccc;
			background-color: #f8f8f8;
			padding: 20px;
			margin: 20px auto;
			width: 500px;
			font-family: Arial, sans-serif;
			box-shadow: 0px 0px 10px #ccc;
		}
		.center {
			text-align: center;
		}
		.line {
			border-bottom: 1px solid #ccc;
			margin-top: 10px;
			margin-bottom: 10px;
		}
		.date {
			display: block;
			margin-top: 10px;
			text-align: center;
			font-size: 14px;
			color: #333;
		}
		h1 {
			margin-top: 0;
			font-size: 28px;
			font-weight: normal;
			color: #555;
		}
		p {
			margin-top: 0;
			margin-bottom: 10px;
			font-size: 14px;
			color: #333;
		}
	</style>
<?php 
require_once('../config.php');

if(isset($_POST['search'])) {
   $idd = $_POST['id'];  
   $pdo = new PDO('mysql:host=localhost;dbname=khalil','root', '');
   $query = $pdo->prepare("SELECT idd,patient_name,phone_number,birth_date,weightt,heigth,doctor_name,medical_history,sexe FROM dossier WHERE idd = :idd");
   $query->bindParam(':idd',$idd);
   $query->execute();
   $data = $query->fetch(PDO::FETCH_ASSOC);
   if ($query->rowCount() != 0) {
    echo "<div class=\"container\">";
echo "<h1 class=\"center\"><strong>Medical record by VITALIA</strong></h1>";
echo "<p class=\"center\">A108 Adam Street, New York, NY 535022, United States</p>";
echo "<div>";
echo "<br>";
echo "<p>ID dossier: ".$data['idd']."</p>";
echo "<br>";
echo "<p>Patient name: ".$data['patient_name']."</p>";
echo "<br>";
echo "<p>Doctor name: ".$data['doctor_name']."</p>";
echo "<br>";
echo "<div class=\"line\"></div>";
echo "<br>";
echo "<p>Weight: ".$data['weightt']."</p>";
echo "<br>";
echo "<p>Height: ".$data['heigth']."</p>";
echo "<br>";
echo "<p>Birth date: ".$data['birth_date']."</p>";
echo "<br>";
echo "<div class=\"line\"></div>";
echo "<p>Medical history: ".$data['medical_history']."</p>";
echo "<br>";
echo "<p>Phone number: ".$data['phone_number']."</p>";
echo "<br>";
echo "<p>Sexe: ".$data['sexe']."</p>";
echo "<br>";
echo "</div>";
echo "</div>";
echo '<a href="edit.php" style="display: block; text-align: center; margin-top: 20px;"><strong>Home</strong></a>';

} 
  else
  {
    echo "<script>alert('Patient do not exist'); window.history.back();</script>";
  }
}
?>
