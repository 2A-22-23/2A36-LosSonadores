<?PHP
	class Produit{
		private $id;
		private $nom;
		private $prix;
		private $image;
		private $informations;
		private $id_category;

		
		function __construct($nom,$prix,$image,$informations,$id_category){
			
			$this->nom=$nom;
			$this->prix=$prix;
			$this->image=$image;
			$this->informations=$informations;
			$this->id_category=$id_category;
		}
		
		function getId(){
			return $this->id;
		}
		function getNom(){
			return $this->nom;
		}
		function getImage(){
			return $this->image;
		}
		function getPrix(){
			return $this->prix;
		}
		function getInformation(){
			return $this->informations;
		}
		function getIdCategory(){
			return $this->id_category;
		}


		function setNom($nom){
			$this->nom=$nom;
		}
		function setPrix($prix){
			$this->prix=$prix;
		}
		function setImage($image){
			$this->image=$image;
		}
		function setInformation($informations){
			$this->informations=$informations;
		}		
		function setIdCategory($id_category){
			$this->id_category=$id_category;
		}		
	

	}
?>