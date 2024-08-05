<?php 
    $insert = false;
    if(isset($_POST['name'])){
        
    
    $server ="localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server ,$username ,$password);

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    //echo "Success!! Connected to db";
    $Name = $_POST['Name'];
    $Age = $_POST['Age'];
    $Gender = $_POST['Gender'];
    $Email = $_POST['Email']; 
    $Phone = $_POST['Phone'];
    $GunsAmmunation = $_POST['GunsAmmunation'];
    $Other = $_POST['Other'];
    $sql = "INSERT INTO  `SAVE AMERICA`.`Protectors` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `GunsAmmunation`, `Other`, `Time`) VALUES ('$Name', '$Age', '$Gender', '$Email', '$Phone', '$GunsAmmunation', '$Other', current_timestamp()) ;";
    //echo $sql;

    if($con-> query($sql) == true){
      //  echo "Successfully Inserted";
      $insert = true;
    }
    else{
        echo  "Error : $sql <br> $con->error";

    }
    $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Bona+Nova+SC:ital,wght@0,400;0,700;1,400&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bgg" src="bg.webp" alt="TRUMP">
    <div class="container">
        
        <h1>Save Democracy</h1>
        <p>Enter your Details and submit this form to confirm your participation in this save democracy struggle</p>
        <?php
            if($insert == true){
            
                echo "<p class='submitmsg'>Will Make America Great Again!!!</p>";
            
            }
        ?>
       
        <form action="index.php" method="post">
            <input type="text" name = "Name" id="Name" placeholder = "Enter your name">
            <input type="text" name = "Age" id="Age" placeholder = "Enter your age" >
            <input type="text" name = "Gender" id="Gender" placeholder = "Enter your gender" >
            <input type="email" name="Email" id="Email" placeholder = "Enter your email" >
            <input type="phone" name="Phone" id="Phone" placeholder = "Enter your phone" >
            <textarea name="guns" id="GunsAmmunation" cols="30" rows="2" placeholder="Guns & Ammunation"></textarea>
            <textarea name="desc" id="Other" cols="30" rows="4" placeholder="Other"></textarea>
            <button class="btn">Submit</button>
            <button class="btn">Reset</button>

        </form>
        
    </div>
    <script src="index.js"></script>
</body>
</html>