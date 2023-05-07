<?php
require '../config.php';
require '../Model/ordonnance.php' ;

class ordonnance_officiel {

    public static function add_ordonnance($date, $medicament, $patient_name, $per_day, $doctor_name,$medical_id)
    {
        $pdo = new PDO('mysql:host=localhost;dbname=khalil', 'root', '');
    
        $stmt = $pdo->prepare("INSERT INTO ordonnance (date, nom_medicament, patient_name, nombre_fois, doctor_name,id_dossier) VALUES (:date, :medicament, :patient_name, :per_day, :doctor_name, :medical_id)");
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':medicament', $medicament);
        $stmt->bindParam(':patient_name', $patient_name);
        $stmt->bindParam(':per_day', $per_day);
        $stmt->bindParam(':doctor_name', $doctor_name);
        $stmt->bindParam(':medical_id', $medical_id);
        
        if ($stmt->execute()) {
            echo "<script>alert('Data added successfully'); window.history.back();</script>";
        }
    }
    
    public static function view_ordonnance($ido) 
    {
            $pdo = new PDO('mysql:host=localhost;dbname=khalil', 'root', '');
        
            // Prepare statement and bind parameters
            $stmt = $pdo->prepare("SELECT * FROM ordonnance WHERE ido = ?");
            $stmt->execute([$ido]);
        
            // Fetch data and display results
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($results) > 0) {
                echo '<html>';
                echo '<head>';
                echo '<link rel="stylesheet" type="text/css" href="table_display.css">';
                echo '</head>';
                echo '<body>';
                echo '<div class="medical-record">';
                echo '<h2>Ordonnance</h2>';
                echo '<table>';
                foreach ($results as $row) {
                    echo '<p><strong>Patient Name:</strong> '.$row['patient_name'].'</p>';
                    echo '<p><strong>Medicament:</strong> '.$row['nom_medicament'].'</p>';
                    echo '<p><strong>How much per day:</strong> '.$row['nombre_fois'].'</p>';
                    echo '<p><strong>Date:</strong> '.$row['date'].'</p>';
                    echo '<p><strong>Doctor Name:</strong> '.$row['doctor_name'].'</p>';
                    echo '<p><strong>Dossier ID:</strong> '.$row['id_dossier'].'</p>';
                echo '</table>';
                echo '<br><br>';
                echo '<a href="editO.php"><strong>Home</strong></a>';
                echo '</div>';
                echo '</body>';
                echo '</html>';
        
}
            }
            else 
            {
                echo "<script>alert('The patient $patient_name do not have ordonnance yet'); window.history.back();</script>";
            }
        }

        public static function edit_ordonnance($per_day, $medicament, $ido)
        {
            $pdo = new PDO('mysql:host=localhost;dbname=khalil', 'root', '');
            $stmt = $pdo->prepare('SELECT nom_medicament, nombre_fois, patient_name FROM ordonnance WHERE ido = ?');
            $stmt->execute([$ido]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if ($row) {
                // Ordonnance exists, update its record
                $updateStmt = $pdo->prepare('UPDATE ordonnance SET nom_medicament = ?, nombre_fois = ? WHERE ido = ?');
                $updateStmt->execute([$medicament, $per_day, $ido]);
                echo "<script>alert('Ordonnance for patient " . $row['patient_name'] . " modified successfully'); window.history.back();</script>";
            } else {
                // Ordonnance does not exist, display an alert with patient name
                $stmt2 = $pdo->prepare('SELECT patient_name FROM ordonnance WHERE ido = ?');
                $stmt2->execute([$ido]);
                $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                $patient_name = $row2 ? $row2['patient_name'] : 'Unknown';
                echo "<script>alert('Ordonnance does not exist for patient $patient_name'); window.history.back();</script>";
            }
        }
        
        
        public static function delete_ordonnance($patient_name)
{
    $pdo = new PDO('mysql:host=localhost;dbname=khalil', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    
    $stmt = $pdo->prepare('SELECT * FROM ordonnance WHERE ido = :patient_name');
    $stmt->execute(array('patient_name' => $patient_name));
    
    if ($stmt->rowCount() > 0) {
        $stmt = $pdo->prepare('DELETE FROM ordonnance WHERE ido = :patient_name');
        if ($stmt->execute(array('patient_name' => $patient_name))) {
            echo "<script>alert('patient $patient_name deleted'); window.history.back();</script>";
        } 
    } else {
        echo "<script>alert('patient $patient_name doesn\'t have any ordonnance yet'); window.history.back();</script>";
    }
    
    $pdo = null;
}

}
?>