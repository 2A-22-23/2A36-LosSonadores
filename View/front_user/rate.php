<?php

include 'C:\xampp\htdocs\First_SUII\projet\Controller\RendezVousC.php';



$error = "";

session_start();
//var_dump($_POST);
$db = config::getConnexion();
$idr = $_POST['idr'];
@$rating = $_POST['rating'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // get the rating value


  // get the consultation ID
 
  // check if all required fields are present
  if (!empty($rating) && !empty($idr)) {
    // save the rating to the database
    $sql = "UPDATE rendezvous SET note = :note WHERE idr = :idr";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':note', $rating);
    $stmt->bindParam(':idr', $idr);
    if ($stmt->execute()) {
      // rating saved successfully, redirect back to appointments page
      header('Location: ViewmyAPP.php');
      exit;
    } else {
      // an error occurred, display error message
      $error = 'An error occurred while saving the rating.';
    }
  } else {
    // some required fields are missing, display error message
    $error = 'Please select a rating and enter a consultation ID.';
  }
}

// display the rating form
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>
<body>

  <form id="ratingForm">
 
      <div class="modal-header">
        <h5 class="modal-title" id="ratingModalLabel">Noter la consultation</h5>
  
 
 
      
      </div>
      <div class="modal-body">
        <p>Merci d'avoir consulté avec nous. Veuillez noter votre expérience avec notre service :</p>
        <div class="rating">
          <input type="radio" id="star5" name="rating" value="5">
          <label for="star5"><i class="fa fa-star"></i></label>
          <input type="radio" id="star4" name="rating" value="4">
          <label for="star4"><i class="fa fa-star"></i></label>
          <input type="radio" id="star3" name="rating" value="3">
          <label for="star3"><i class="fa fa-star"></i></label>
          <input type="radio" id="star2" name="rating" value="2">
          <label for="star2"><i class="fa fa-star"></i></label>
          <input type="radio" id="star1" name="rating" value="1">
          <label for="star1"><i class="fa fa-star"></i></label>
        </div>
        <input type="hidden" id="rating" name="rating" value="">
        <input type="hidden" id="idr" name="idr" value="<?php echo $idr; ?>">


      </div>
      <div class="modal-footer">
      <a href="ViewmyAPP.php"  class="btn btn-secondary" >  Annuler  </a>
       
        <button type="button" class="btn btn-primary" id="submitRating" name="envoyer">Envoyer</button>
      </div>
 
    </form>



    <script>
  $(document).ready(function() {
    // écouter les changements sur les étoiles de la note
    $('.rating input[type=radio]').change(function() {
      // récupérer la valeur de l'étoile sélectionnée
      var ratingValue = $(this).val();
      // mettre à jour la valeur de l'input de note
      $('#rating').val(ratingValue);
    });
  });

  $(document).ready(function() {
  $('#submitRating').click(function() {
    var rating = $('input[name=rating]:checked').val();
    var idr = $('#idr').val();
    $.ajax({
      type: "POST",
      url: "rate.php",
      data: { rating: rating, idr: idr },
      success: function(data) {
        // handle success response
        $('#ratingForm').modal('hide');
        alert('Rating saved successfully.');
        window.location.href = "ViewMyAPP.php";
      },
      error: function(xhr, status, error) {
        // handle error response
        alert('An error occurred while saving the rating.');

      }
    });
  });


});


     </script>


    
<style>
.rating {
  display: inline-block;
  top: 50%;
  left: 50%;
}

.rating input {
  display: none;
}

.rating label {
  color: #ddd;
  font-size: 2rem;
  padding: 0 0.1rem;
  cursor: pointer;
  top: 50%;
  left: 50%;
}

.rating label:hover,
.rating label:hover ~ label,
.rating input:checked ~ label {
  color: #ffca08;
}



</style>


</body>
</html>


  


  
  






