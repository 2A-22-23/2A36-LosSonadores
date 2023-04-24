
<!---<!DOCTYPE html>
<html lang="en">
<body>
<div class="col-4 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">gestion Pharmacie</h4>
            <form class="forms-sample" method="POST" action="insertion.php">
                <div class="form-group">
                    <label for="id_pharmacie">Id Pharmacie</label>
                    <input type="text" class="form-control" id="id_pharmacie" name="id_pharmacie">
                </div>
                <div class="form-group">
                    <label for="id_ordonnance">Id ordonnance</label>
                    <input type="text" class="form-control" id="id_ordonnance" name="id_ordonnance">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
               
                <div class="form-group">
                    <label for="ville">Ville</label>
                    <input type="text" class="form-control" id="ville" name="ville">
                </div>
                <div class="form-group">
                    <label for="adresse">address</label>
                    <input type="text" class="form-control" id="adresse" name="address">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="file-upload-default">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Ajouter</button>
                <button type="submit" class="btn btn-primary mr-2">Modifier</button>
                <button type="submit" class="btn btn-primary mr-2">Supprimer</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>-->
<?php
//Récupérer les données du formulaire dans des variables :
/*$id_pharmacie = $_POST['id_pharmacie'];
$id_ordonnance = $_POST['id_ordonnance'];
$Name = $_POST['name'];
$ville = $_POST['ville'];
$adresse = $_POST['address'];
$image = $_POST['image'];

//Se connecter à la base de données en utilisant PDO :
// Définir les paramètres de connexion à la base de données
$dsn = 'mysql:host=nom_du_serveur;dbname=gestion_pharmacie';
$username = 'root';
$password = '';

// Établir une connexion PDO
try {
    $conn = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

// Préparer la requête SQL pour insérer les données dans la table correspondante
$sql = "INSERT INTO pharmacie (idphar, ido, Name, ville, address,image) VALUES (:id_pharmacie, :id_ordonnance, :name, , :ville, :adresse, :image)";

// Préparer la requête PDO
$stmt = $conn->prepare($sql);

//Insérer les données dans la base de données :
// Lier les variables aux paramètres de la requête PDO
$stmt->bindParam(':idphar', $id_pharmacie);
$stmt->bindParam(':ido', $id_ordonnance);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':ville', $ville);
$stmt->bindParam(':adresse', $adresse);
$stmt->bindParam(':image', $image);

// Exécuter la requête PDO
$stmt->execute();

//Récupérer les données de la table et les afficher :
// Préparer la requête SQL pour récupérer les données de la table
$sql = "SELECT idphar, ido, Name, image, ville, address FROM pharmacie";

// Exécuter la requête PDO
$result = $conn->query($sql);

// Afficher les données de chaque ligne de la table
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo $row['idphar'] . ", " . $row['ido'] . ", " . $row['Name'] . ", " . $row['ville'] . ", " . $row['address'] . ", " . $row['image'] . "<br>";
}
?>
</body>








<?php
include '../config.php';
include '../Model/historique.php';

class CourseC
{
    function showCourse($libelle)
    {
        $sql = "SELECT * FROM course WHERE label LIKE '%" . $libelle . "%'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $courses = $query->fetchAll();
            return $courses;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function upcomingCourse()
    {
        echo date("Y/m/d");
        $sql = "SELECT * FROM course WHERE dateCourse >= '" . date("Y-m-d") . "'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $courses = $query->fetchAll();
            return $courses;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function listCourses()
    {
        $sql = "SELECT * FROM course";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function bookCourse($idCourse, $idClient)
    {
        $sql = "INSERT INTO reservation  
        VALUES (NULL, :idClient,:idCourse)";

        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idClient' => $idClient,
                'idCourse' => $idCourse
            ]);
            $course = $this->getCourse($idCourse);
            echo $course['nbPlaces'] - 1;
            $query = $db->prepare(
                'UPDATE course SET nbPlaces = ' . $course['nbPlaces'] - 1
                    . ' WHERE idCourse= ' . $idCourse
            );
            $query->execute();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function getCourse($id)
    {
        $sql = "SELECT * from course where idCourse = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $course = $query->fetch();
            return $course;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}*/




if (isset($_GET['id'])){

   // $catC = new CategorieC();
    $result=$catC->afficherCategorieWithID($_GET['id']);
    foreach($result as $row){
    $id=$row['id'];
    $nom=$row['nom'];
    $pointfidel=$row['pointfidel'];
    $nbproduit=$row['nbproduit'];
        }
    }
    
if(isset($_POST['Modifier']))
{
if( isset($_POST['nom']) and isset($_POST['pointfidel']) and isset($_POST['nbproduit'])){

    //$cat=new Categorie($_POST['nom'],$_POST['pointfidel'],$_POST['nbproduit']);

//Partie3
//$categorieC = new CategorieC();
$categorieC->modifierCategorie($cat,$id);

        header('Location: AfficherCategories.php');

    }else{
        echo "vérifieer les champs";
        die();
    }
//*/
}


?>
<!DOCTYPE html>
<html lang="en">

<body>

    
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Modifier Categorie</h4>
                  <p class="card-description">
                  Modifier Categorie
                  </p>
                  <form class="forms-sample" method="POST" enctype="multipart/form-data" id="form_cat">
                    <div class="form-group">
                      <label for="exampleInputName1">Nom</label>
                      <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?php echo $nom ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Point fidel</label>
                      <input type="number" class="form-control" id="pointfidel" name="pointfidel" placeholder="Point Fidel" value="<?php echo $pointfidel ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Nombre de Produit</label>
                      <input type="number" class="form-control" id="nbproduit" name="nbproduit" placeholder="Nombre de Produits" value="<?php echo $nbproduit ?>">
                    </div>
                    <input type="submit" class="btn btn-primary mr-2" value="Modifier" name="Modifier" >

                    
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    
    
     
</body>

</html>



<!--<div class="blog-pagination">
          <ul class="justify-content-center">
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
          </ul>
        </div> End blog pagination -->






        <!DOCTYPE html>
<html>
<head>
  <title><?php echo $pharmacie['Name']; ?></title>
</head>
<body>
  <h1><?php echo $pharmacie['Name']; ?></h1>
  <p>Address: <?php echo $pharmacie['address']; ?></p>
  <p>Ville: <?php echo $pharmacie['ville']; ?></p>
</body>
</html>















<?php
include_once "C:/xampp/htdocs/PROJET_PHARMACIEcrud/Controller/pharmacieC.php";

if(isset($_GET['idphar'])){
    $pharmacie_id = $_GET['idphar'];
    $pharmacieC = new pharmacieC();
    $pharmacie = $pharmacieC->getpharmacie($pharmacie_id);
}

if(isset($_POST['submit'])){
    $code = $_POST['code'];
    $pharmacieC = new pharmacieC();
    $result = $pharmacieC->searchOrd($pharmacie_id, $code);
}


?>

<div class="container mt-5">
    <h3>Chercher une ordonnance dans <?php echo $pharmacie['Name']; ?></h3>
    <form method="POST">
        <div class="form-group">
            <label for="code">Code de l'ordonnance :</label>
            <input type="text" class="form-control" id="code" name="code" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Chercher</button>
    </form>
</div>

<?php if(isset($result)): ?>
    <div class="container mt-5">
        <?php if(empty($result)): ?>
            <p>Aucune ordonnance trouvée pour ce code dans cette pharmacie.</p>
        <?php else: ?>
            <h4>Résultats :</h4>
            <ul>
            <?php foreach($result as $ord): ?>
                <li>Code : <?php echo $ord['code']; ?> - Patient : <?php echo $ord['patient']; ?></li>
            <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
<?php endif; ?>










onsubmit="return validatePharmacie()






        
        <!-- table affichage -->
        
        <!--<div class="col-lg-9 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Historique</h4>
              
              <div class="table-responsive pt-3">
                <table class="table table-dark">
                <thead>
                    <tr>
                    <th>Code</th>
                    <th>Doctor name</th>
                    <th>Patient name</th>
                    <th>Prix</th>
                      <th>Date</th>
                      
                 
                    </tr>
                </thead>
               <tbody>

               <?php
        foreach ($list as $historique) 
        {
        ?>
					<tr>
                        <td class="styleth"><?= $historique['code']; ?></td>
                        <td class="styleth"><?= $historique['doctor_name']; ?></td>
                        <td class="styleth"><?= $historique['patient_name']; ?></td>
                        <td class="styleth"><?= $historique['prix']; ?></td>
                        <td class="styleth"><?= $historique['date']; ?></td>
                        
                        <td>
                        <a href="deletehist.php?idhis=<?php echo $historique['idhis']; ?>">supprimer</a>
                        <a href="updatehist.php?idhis=<?php echo $historique['idhis']; ?>">modifier</a>
                       </td>

                    <?php
        }
        
        ?>
                 
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      
      </div>
  
    </div>-->