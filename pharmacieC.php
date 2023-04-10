<?php
include 'C:/xampp/htdocs/PROJET_PHARMACIE/config.php';
include '../Model/pharmacie.php';

class pharmacieC
{
    public function listpharmacie()
    {
        $sql = "SELECT * FROM ";
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
        $sql = "INSERT INTO pharmacie
        VALUES (NULL, NULL , :N, :ville, :ad)";
        $db = config::getConnexion();
        try {
         
            $query = $db->prepare($sql);
            $query->execute([
                'N' => $pharmacie-> getName(),
                'ville' => $pharmacie->getville(),
                'ad' => $pharmacie->getAddress(), 
              
            ]);
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
                    idphar = :idphar,
                    idordo = :idordo,
                    Name = :Name, 
                    Ville = :ville, 
                   address = :address,
                 
                WHERE idphar= :idphar'
            );
            $query->execute([
                'idphar' => $idphar,
                'idordo' => $pharmacie->getidordo(),
                'Name' => $pharmacie->getName(),
                'ville' => $pharmacie->getville(),
                'address' =>$pharmacie->getAddress()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
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
