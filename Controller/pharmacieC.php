<?php
include_once "C:/xampp/htdocs/PROJET_PHARMACIEcrud/config.php";
include_once "C:/xampp/htdocs/PROJET_PHARMACIEcrud/Model/pharmacie.php";
//include "../config.php";
//include "../Model/pharmacie.php';


class pharmacieC
{
    public function listpharmacie()
    {
        $sql = "SELECT * FROM pharmacie";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletepharmacie($id)
    {
        $sql = "DELETE FROM pharmacie WHERE idphar = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addpharmacie($pharmacie)
    {
        $sql =
        "INSERT INTO pharmacie VALUES ( :N, :ad, :ville)";
        $db = config::getConnexion();
        try {
         
            $query = $db->prepare($sql);
            $query->execute([
                'N' => $pharmacie-> getName(),
                'ad' => $pharmacie->getAddress(),
                'ville' => $pharmacie->getville(),
              
                
              
            ]);
            $pharmacie_id = $db->lastInsertId();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updatepharmacie($pharmacie, $idphar)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE pharmacie SET 
                Name = :Name, 
                Ville = :ville, 
                address = :address
            WHERE idphar= :id'
        );
        $query->execute([
          
            'Name' => $pharmacie->getName(),
            'ville' => $pharmacie->getVille(),
            'address' => $pharmacie->getAddress(),
            'id' => $idphar
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

    function showpharmacie($id)
    {
        $sql = "SELECT * from pharmacie where idphar = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(); 

            $pharmacie = $query->fetch();
            return $pharmacie;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }



}


