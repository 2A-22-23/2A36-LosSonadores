<?php 
require 'C:\xampp\htdocs\First_SUII\projet\config.php';

if (isset($_POST['submit'])) {
  $code = $_POST['code'];

  $pdo = new PDO('mysql:host=localhost;dbname=khalil', 'root', '');
  $query = $pdo->prepare("SELECT login FROM user WHERE code0 = :code");
  $query->bindParam(':code', $code);
  $query->execute();
  $result = $query->fetch(PDO::FETCH_ASSOC);

  if ($result) {
      $login = $result['login'];
      $query = $pdo->prepare("SELECT * FROM dossier WHERE patient_name = :login");
      $query->bindParam(':login', $login);
      $query->execute();
      $data = $query->fetch(PDO::FETCH_ASSOC);
      
      if ($query->rowCount() != 0) {
        echo '<html>';
        echo '<head>';
        echo '<title>Medical Record - VITALIA</title>';
        echo '<style>
        .medical-record {
            margin: 0 auto;
            padding: 30px;
            border: 2px solid #333;
            max-width: 600px;
            font-family: Arial, sans-serif;
        }
        .medical-record h2 {
            text-align: center;
            font-size: 30px;
            margin-bottom: 20px;
        }
        .medical-record p {
            margin-bottom: 10px;
            line-height: 1.5;
        }
        .medical-record strong {
            font-weight: bold;
        }
        .medical-record a {
            display: block;
            margin-top: 20px;
            text-align: center;
            font-size: 20px;
            text-decoration: none;
            color: #333;
            border: 2px solid #333;
            padding: 10px;
            max-width: 200px;
            margin: 0 auto;
        }
        .medical-record a:hover {
            background-color: #333;
            color: #fff;
        }
        </style>';
        echo '</head>';
        echo '<body>';
        echo '<div class="medical-record">';
        echo '<h2>Medical Record - VITALIA</h2>';
        echo '<p><strong>Patient Name:</strong> '.$data['patient_name'].'</p>';
        echo '<p><strong>Phone Number:</strong> '.$data['phone_number'].'</p>';
        echo '<p><strong>Birth Date:</strong> '.$data['birth_date'].'</p>';
        echo '<p><strong>Weight:</strong> '.$data['weightt'].'</p>';
        echo '<p><strong>Height:</strong> '.$data['heigth'].'</p>';
        echo '<p><strong>Doctor Name:</strong> '.$data['doctor_name'].'</p>';
        echo '<p><strong>Medical History:</strong> '.$data['medical_history'].'</p>';
        echo '<p><strong>Sexe:</strong> '.$data['sexe'].'</p>';
        echo '<a href="homeUM.php"><strong>Home</strong></a>';echo '<p>VITALIA@gmail.com</p>';
        echo '<p>+1 620 414 8818</p>';
        echo '<p>A108 Adam Street</p>';
        echo '</div>';
        echo '</body>';
        echo '</html>';        
      } else {
          echo "<script>alert('Patient record does not exist'); window.history.back();</script>";
      }
  } else {
      echo "<script>alert('Invalid code'); window.history.back();</script>";
  }
}

?>