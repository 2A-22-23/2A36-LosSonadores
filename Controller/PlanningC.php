<?php

include 'C:\xampp\htdocs\First_SUII\projet\Model\Planning.php';
include 'C:\xampp\htdocs\First_SUII\projet\View\back_end\template\config.php';


class PlanningC
{
    public function updatePlanning($id, $connectedUserId, $jour, $timeFrom, $timeTo)
    {
        // Define the SQL query with named parameters
        $sql = "UPDATE planningdr SET jour = :jour, timeFrom = :timeFrom, timeTo = :timeTo WHERE id = :id AND idClient = :connectedUserId";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
    
        // Bind named parameters to their corresponding values
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->bindParam(':connectedUserId', $connectedUserId, PDO::PARAM_INT);
        $req->bindParam(':jour', $jour, PDO::PARAM_STR);
        $req->bindParam(':timeFrom', $timeFrom, PDO::PARAM_STR);
        $req->bindParam(':timeTo', $timeTo, PDO::PARAM_STR);
    
        // Execute the prepared query
        try {
            $req->execute();
        } catch (PDOException $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    


    public function listPlanning()
    {
        $sql = "SELECT planningdr.*, user.nom, user.prenom FROM planningdr JOIN user ON planningdr.idClient = user.idclient";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    



    public  function checkPlanningExists($planning) {
        $sql = "SELECT COUNT(*) FROM planningdr WHERE idClient = :idClient  AND jour= :jour";
        $db = config::getConnexion();
        $conn = $db->prepare($sql);
        $conn->bindValue(":idClient", $planning->getidClient());
        $conn->bindValue(":jour", $planning->getJour() );
       // $conn->bindValue(":idr", $rdv-> getIdr());
        // Parse and bind the LaDate value
        $conn->execute();
        return $conn->fetchColumn() > 0;
    }
    




    function addPlanning($planning) {
        $sql = "INSERT INTO planningdr (jour, timeFrom, timeTo, idClient) 
                VALUES (:jour, :timeFrom, :timeTo, :idClient)";
        $db = config::getConnexion();

        if ($this->checkPlanningExists($planning)) {
            return false; // Planning already exists
        }
    

        try {
            $conn = $db->prepare($sql);
            $conn->bindValue(":jour", $planning->getJour());
            $conn->bindValue(":timeFrom", $planning->getTimeFrom());
            $conn->bindValue(":timeTo", $planning->getTimeTo());
            $conn->bindValue(":idClient", $_SESSION['idclient']);
            // Bind the idclient value from the session
    
            $conn->execute();
            return true;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    
    
    public function deletePlanning($id)
    {
        $sql = "DELETE FROM planningdr WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
    
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    

    
    
}
