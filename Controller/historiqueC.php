<?php
include_once "C:/xampp/htdocs/PROJET_PHARMACIEcrud/config.php";
include_once "C:/xampp/htdocs/PROJET_PHARMACIEcrud/Model/historique.php";
//include "../config.php";
//include "../Model/historique.php';


class historiqueC
{
    public function listhist()
    {
        $sql = "SELECT * FROM historique";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletehist($id)
    {
        $sql = "DELETE FROM historique WHERE idhis = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addhist($historique)
    {
        $sql =
        "INSERT INTO historique VALUES ( NULL, :patient_name , :doctor_name :prix, :date)";
        $db = config::getConnexion();
        try {
         
            $query = $db->prepare($sql);
            $query->execute([
                NULL,
                'doctor_name' => $historique->getdoctor_name(),
                'patient_name' => $historique->getpatient_name(),
                'prix' => $historique-> getprix(),
                'date' => $historique->getdate()
             
              
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updatehist($historique, $idhis)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE historique SET 
                patient_name = :patient_name,
                doctor_name = : doctor_name,
                prix = :prix, 
                date = :date
            WHERE idhis= :id '
        );
        $query->execute([
            'patient_name' => $historique->getpatient_name(), 
           'doctor_name'=> $historique->getdoctor_name(), 
            'prix' => $historique-> getprix(),
            'date' => $historique->getdate(),
            'id' => $idhis
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

    function showhist($id)
    {
        $sql = "SELECT * from historique where idhis = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(); 

            $historique = $query->fetch();
            return $historique;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}


