<?php
include 'C:\xampp\htdocs\First_SUII\projet\View\back_end\template\config.php';
include 'C:\xampp\htdocs\First_SUII\projet\Controller\PlanningC.php';
include 'C:\xampp\htdocs\First_SUII\projet\Controller\RendezVousC.php';

class RendezvousC
{

    function deleteRendezvous($id)
    {
        $sql = "DELETE FROM rendezvous WHERE idr = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
    
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    
    



   
    function listRendezvous(){
        $sql = "SELECT rendezvous.idr, user.nom AS patient_prenom, user.prenom AS patient_nom, rendezvous.LaDate, rendezvous.status, rendezvous.iddoc 
        FROM rendezvous
        INNER JOIN user ON rendezvous.idclient = user.idclient";
        
        // Exécution de la requête
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
        
        // Retourner les résultats de la requête
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
  /*  public function addRendezvous($rdv, $doctorId) {
        $sql = "INSERT INTO rendezvous ( LaDate,idclient, status, iddoc, idp) 
                SELECT :idclient, pd.id
                FROM user 
                JOIN planningdr pd ON pd.idClient = :iddoc
                WHERE user.idclient = :idclient 
                AND type = 'Patient'
                AND DAYNAME(:LaDate) = CONCAT(UPPER(LEFT(pd.jour, 1)), LOWER(SUBSTRING(pd.jour FROM 2)))
                AND TIME(:LaDate) >= pd.timeFrom
                AND TIME(:LaDate) <= pd.timeTo";
        $db = config::getConnexion();
    
        try {
            $conn = $db->prepare($sql);
    
            $conn->bindValue(":idclient", $_SESSION['idclient']);
          
                $conn->bindValue(":LaDate", $rdv->getLaDate());
            
            $conn->bindValue(":status", 0); // set status to 0 by default
            $conn->bindValue(":iddoc", $doctorId);
            $conn->bindValue(":idp",  $rdv->getIdp());
    
            $conn->execute();
            return true;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    
    
*/
function addidp($doctorId, $LaDate) {
    $sql = "SELECT pd.id, pd.jour, pd.timeFrom, pd.timeTo 
    FROM planningdr pd 
    WHERE pd.idClient = :doctor_id 
    AND DAYOFWEEK(:LaDate) = DAYOFWEEK(pd.jour) 
    AND TIME(:LaDate) >= pd.timeFrom 
    AND TIME(:LaDate) <= pd.timeTo
    ";
            
    $db = config::getConnexion();
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':doctor_id', $doctorId, PDO::PARAM_INT);
    $stmt->bindValue(':LaDate', $LaDate, PDO::PARAM_STR);
    echo $sql;
    $stmt->execute();
    
    $plannings = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($plannings);

    var_dump($plannings);
    
    if (count($plannings) > 0) {
        foreach ($plannings as $planning) {
            $sql = "INSERT INTO rendezvous (idp) VALUES (:idp)";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':idp', $planning['id'], PDO::PARAM_INT);
            $stmt->execute();
        }
        return $planning['id']; // retourne l'identifiant de la dernière planification insérée
    } else {
        return null; // aucune planification trouvée pour cette date et ce médecin
    }
}



public function addRendezvous($rdv, $doctorId, $jour, $temps) {
    $db = config::getConnexion();

    try {
        // Get the ID of the planningdr row matching the day and time
        $sqlIdp = "SELECT id FROM planningdr 
                   WHERE idClient = :iddoc
                   AND jour = :jour
                   AND timeFrom <= :temps
                   AND timeTo >= :temps";

        $stmt = $db->prepare($sqlIdp);
        $stmt->bindValue(":iddoc", $doctorId);
        $stmt->bindValue(":jour", $jour);
        $stmt->bindValue(":temps", $temps);
        $stmt->execute();
        $idp = $stmt->fetchColumn();

        if ($idp !== false) {
            // Insert appointment information into the "rendezvous" table
            $sql = "INSERT INTO rendezvous (LaDate, idclient, status, idp, iddoc) 
                    SELECT :LaDate, idclient, :status, :idp, :iddoc
                    FROM user 
                    WHERE idclient = :idclient 
                    AND type = 'Patient'";

            $conn = $db->prepare($sql);

            $conn->bindValue(":LaDate", $rdv->getLaDate());
            $conn->bindValue(":idclient", $_SESSION['idclient']);
            $conn->bindValue(":status", 0); // set status to 0 by default
            $conn->bindValue(":idp", $idp);
            $conn->bindValue(":iddoc", $doctorId);

            $conn->execute();

            return true;
        } else {
            // No matching planning row was found
          //  echo '<div class="alert alert-danger">' . "Aucun planning ne correspond à la date et à l'heure demandées." . '</div>';

            return false;
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}


        
    public  function checkRendezvousExists($rdv) {
            $sql = "SELECT COUNT(*) FROM rendezvous WHERE idclient = :idclient  AND LaDate= :LaDate";
            $db = config::getConnexion();
            $conn = $db->prepare($sql);
            $conn->bindValue(":idclient", $rdv->getidclient());
            $conn->bindValue(":LaDate", $rdv->getLaDate() );
           // $conn->bindValue(":idr", $rdv-> getIdr());
            // Parse and bind the LaDate value
            $conn->execute();
            return $conn->fetchColumn() > 0;
        }
        

    
    
    
    
        function updateRendezvous($idr, $status)
        {
            // Define the SQL query with named parameters
            $sql = "UPDATE rendezvous SET status = :status WHERE idr = :idr";
            $db = config::getConnexion();
            $req = $db->prepare($sql);
        
            // Bind named parameters to their corresponding values
            $req->bindParam(':idr', $idr, PDO::PARAM_INT);
        
            // Bind the status parameter directly using the value of $status
            $req->bindParam(':status', $status, PDO::PARAM_STR);
        
            // Execute the prepared query
            try {
                $req->execute();
            } catch (PDOException $e) {
                die('Error:' . $e->getMessage());
            }
        }






        function updateDate($idr, $LaDate)
        {
            // Define the SQL query with named parameters
            $sql = "UPDATE rendezvous SET LaDate = :LaDate WHERE idr = :idr";
            $db = config::getConnexion();
            $req = $db->prepare($sql);
        
            // Bind named parameters to their corresponding values
            $req->bindParam(':idr', $idr, PDO::PARAM_INT);
        
            // Bind the status parameter directly using the value of $status
            $req->bindParam(':LaDate', $LaDate, PDO::PARAM_STR);
        
            // Execute the prepared query
            try {
                $req->execute();
            } catch (PDOException $e) {
                die('Error:' . $e->getMessage());
            }
        }
        
        
        
    
    function showRendezvous($id)
    {
        $sql = "SELECT * from rendezvous where idr = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $rdv = $query->fetch();
            return $rdv;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

}