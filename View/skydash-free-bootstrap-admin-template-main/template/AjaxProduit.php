<?php

require_once  "C:/xampp/htdocs/First_SUII/projet/Controller/ProduitC.php";
require_once  "C:/xampp/htdocs/First_SUII/projet/Controller/CategorieC.php";



$catC= new CategorieC();

$prodC= new ProduitC();

if(!isset($_POST['str'])){
    $liste=$prodC->afficherProduits();
}
else{
    $liste = $prodC->rechercherProduit($_POST['str']);
}

                foreach ($liste as $row) {
                    ?>
                                        <tr>
                                            <td><?php echo $row['nom']; ?></td>
                                            <?php
                                            $resultaa = $catC->afficherCategorieWithID($row["id_categorie"]);
                                            foreach($resultaa as $row2){
                                            ?>
                                            <td> <?php echo $row2['nom']; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <td><?php echo $row['prix']; ?></td>
                                            <td><img src="<?php echo $row['image']; ?>" heigth="500" width=500></td>
                                            <td><?php echo $row['informations']; ?></td>
                                            <td>
                                                <form method="POST" action="ModifierProduit.php?id=<?PHP echo $row['id']; ?>">
                                                    <input type="submit" class="btn btn-warning" value= "Modifier">
                                                </form>
                                                <br>
                                        
                                               <form method="POST" action="supprimerProduit.php">
                                                    <input type="submit" class="btn btn-danger" value= "supprimer">
                                                    <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
                                                </form>
                                            </td>
                                        </tr>

                    <?php
                }

?>