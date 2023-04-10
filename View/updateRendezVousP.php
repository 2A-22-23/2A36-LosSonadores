<?php
include '../Controller/RendezVousC.php';

$error = "";
session_start();

$idr = $_POST['idr'];

if (isset($_POST['modifier'])) {
    // Validate the input values
  
    $LaDate = $_POST['LaDate'];
    // Check if the ID is a positive integer
    if (!ctype_digit($idr) || $idr <= 0) {
        $_SESSION['error'] = "Invalid ID value";
        header("Location: updateRendezVousP.php");
        exit();
    }

   

    // Create a new RendezvousC object and call its updateRendezvous method
    $rdvC = new RendezvousC();
    $rdvC->updateDate($idr, $LaDate);

    // Redirect to the list of rendezvous after the update is done
    header("Location: ViewMyAPP.php");
    exit();
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendez-vous Display</title>
</head>
<body>
   
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

  
        <form  id ="myform" action="" method="POST">
       
           
              
             

            
            
            <input type="hidden" name="idr" value="<?= $idr; ?>">
     


            <label>Date:</label>
            <input type="datetime-local" name="LaDate" id="LaDate">
    


  
                   <input type="submit" name = "modifier" value="Update">
                 

                    <button   type="reset" ><a href="ViewMyAPP.php">Cancel</a></button>
            
        </form>

        <style>

#myform {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f1f1f1;
  border: 1px solid #ccc;
  border-radius: 5px;
}



    form {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 2rem;
    }

    table {
        border-collapse: collapse;
        width: 50%;
    }

    th, td {
        padding: 0.5rem;
        text-align: left;
        border: 1px solid #ddd;
    }

    input[type="text"], input[type="datetime-local"] {
        padding: 0.5rem;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    input[type="submit"], input[type="reset"] {
        background-color:#4CAF50;
        color: white;
        border: none;
        padding: 0.5rem;
        cursor: pointer;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 1rem;
        margin-right: 1rem;
    }

    input[type="submit"]:hover, input[type="reset"]:hover {
        background-color: #3e8e41;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
    }
</style>

</body>
</html>
