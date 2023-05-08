<?php

//fetch_data.php
include  "C:/xampp/htdocs/First_SUII/projet/Controller/CategorieC.php";


$catC= new CategorieC();

include('database_connection.php');

if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM produit WHERE TRUE
	";
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		 AND prix BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	if(isset($_POST["categorie"]))
	{
		$category_filter = implode("','", $_POST["categorie"]);
		$query .= "
		 AND id_categorie IN('".$category_filter."')
		";
	}

	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			$resultaa = $catC->afficherCategorieWithID($row["id_categorie"]);
			foreach($resultaa as $row2){			
			
			

			$output .= '
			<div class="col-sm-4 col-lg-3 col-md-3">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
					<img src="./skydash-free-bootstrap-admin-template-main/template/'. $row['image'] .'" alt="" class="img-responsive" style="width:200px;height: 280px; >
					<p align="center"><strong><a href="#">'. $row['nom'] .'</a></strong></p>
					<h4 style="text-align:center;" class="text-danger" >'. $row['prix'] .'</h4>
					Categorie : '. 
					$row2['nom'] .' <br />
				</div>

			</div>
			';
		}
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>