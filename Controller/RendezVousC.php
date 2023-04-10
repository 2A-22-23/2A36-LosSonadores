<?php
include '../config.php';

include '../Model/RendezVous.php';

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
    
    
    
    
    public function addRendezvous($rdv, $doctorId) {
        $sql = "INSERT INTO rendezvous (LaDate, idclient, status,iddoc) 
                SELECT :LaDate, idclient, :status ,  :iddoc
                FROM user 
                WHERE idclient = :idclient 
                AND type = 'Patient'";
        $db = config::getConnexion();
    
        try {
            $conn = $db->prepare($sql);
    
            $conn->bindValue(":LaDate", $rdv->getLaDate());
            $conn->bindValue(":idclient", $_SESSION['idclient']);
            $conn->bindValue(":status", 0); // set status to 0 by default
            $conn->bindValue(":iddoc", $doctorId);
    
            $conn->execute();
            return true;
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