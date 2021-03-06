<?php

// https://www.codewall.co.uk/how-to-read-json-file-using-php-examples/



session_start();

$currentId = $_SESSION['userID'];
$uName = $_SESSION['username'];
// $pet = $_SEESION['currentPet']
echo $uName;


$url = 'loadFiles/animal.json'; // path to your JSON file
$data = file_get_contents($url); // put the contents of the file into a variable
//echo($data);
// $characters = json_decode($data); // decode the JSON feed
$animals = json_decode($data, true); // decode the JSON feed and make an associative array
//var_dump($animals);
$animalNames = $animals["Names"];
$species = $animals["Species"];
$brithplace = $animals["Country"];
$sex = $animals["Gender"];
$hobbies = $animals["Hobbies"];
$zodiac = $animals["Zodiac"];
// echo($animalNames[rand (0 ,count($animalNames))]);
//
// echo($Type[rand (0 ,count($Type))]);
//var_dump($animals["Names"]);

// https://www.countries-ofthe-world.com/all-countries.html
// http://www.notsoboringlife.com/list-of-hobbies/

if($_SERVER['REQUEST_METHOD'] == 'POST'){
if(isset($_POST["submitted"])){

// header("Location: game.php");

$aniName = $animalNames[rand (0 ,count($animalNames)-1)];
$specType = $species[rand (0 ,count($species)-1)];
$homeland = $brithplace[rand (0 ,count($brithplace)-1)];
$gender = $sex[rand (0 ,count($sex)-1)];
$hobbie = $hobbies[rand (0 ,count($hobbies)-1)];
$zSign = $zodiac[rand (0 ,count($zodiac)-1)];

try {
    /**************************************
    * Create databases and                *
    * open connections                    *
    **************************************/

    // Create (connect to) SQLite database in file
    $file_db = new PDO('sqlite:../db/vetpet.db');
    // Set errormode to exceptions
    /* .. */
    $file_db->setAttribute(PDO::ATTR_ERRMODE,
                            PDO::ERRMODE_EXCEPTION);

 /*The data from the text box is potentially unsafe; 'tainted'. Use the quote() - puts quotes around things..
   It escapes a string for use as a query parameter.
   This is common practice to avoid malicious sql injection attacks.
   PDO::quote() places quotes around the input string (if required)
   and escapes special characters within the input string, using a quoting style appropriate to the underlying driver. */


   $activeAnimal = "SELECT * FROM aninmalCollection WHERE active = 'true'";
   $foundActive= $file_db->query($activeAnimal);


   $s1 = "SELECT * FROM aninmalCollection WHERE uID = '$currentId' AND active = 'true'";
   $result = $file_db->query($s1);

   if ($result->fetchColumn() <= 0){

     echo "false";

      $queryInsert = "INSERT INTO aninmalCollection (name,species,country ,gender,hobbies,zodiac,HP, bugs, suffering, active, owner, uID) VALUES ('$aniName', '$specType','$homeland','$gender','$hobbie','$zSign','300','1','0', 'true', '$uName',  '$currentId' )";
      $file_db->exec($queryInsert);

   }else {

     $sql_update="UPDATE aninmalCollection SET active = 'false' WHERE uID = '$currentId'";
    // again we do error checking when we try to execute our SQL statements on the db
    $file_db ->exec($sql_update);


     $queryInsert = "INSERT INTO aninmalCollection (name,species,country ,gender,hobbies,zodiac,HP, bugs, suffering, active, owner, uID) VALUES ('$aniName', '$specType','$homeland','$gender','$hobbie','$zSign','100','0','0', 'true', '$uName',  '$currentId' )";
     $file_db->exec($queryInsert);
     echo ("true");
   }


  }
  catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
  }

 //echo("done");
  header("Location: game.php");
 exit;
}

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src = "jquery/jquery-3.4.1.js"></script>
    <script src = "javascript/main.js"></script>
    <title>VetLife</title>
  </head>
<body>
<div>
<div class="login">
  <div class="titleInfo">
    <!-- class="titleInfo" -->
<h4 class="titleInfo">Welcome to Vet Pet <?php echo $uName; ?>! </h3>
  <p class="titleInfo" >
   You are tasked with removing viruses from your Vet Pet every half hour.
   Open the x-ray window by clicking on any of the following orgins: Brain, Heart, or Lungs and click on the green viruses to remove them.
   Remember to also let your pet rest, if you remain on the browser window for more then 15 minutes then your pet will suffer!
<br><br>
Yes your Vet Pet is heavily ill and will not last a few more days. However, continue to log in every so often to remove viruses so that your pet does not suffer when it finely meets it's end.
Are you responsible to ensure that your pet passes on peacefully?
 </p>
  </div>
  <form class="main" action="title.php" method="post">
  <input type="hidden" name="submitted" value="submitted">
   <button class="NewGbutt" type="submit" name="NewGameButt">New Game</button>
  </form>
  <form class="main" action="game.php">
    <input class="Continuebutt" type="submit" value="Continue"/>
</form>
<form class="main" action="viewUsersEx.php">
  <input class="Continuebutt" type="submit" value="All Vet Pets"/>
</form>
<form class="logOut" action="index.php">
  <input class="Continuebutt" type="submit" value="Log Out"/>
</form>
</div>
<div class="">

</div>
</div>
</body>
<!-- <script>
// here we put our JQUERY
$(document).ready (function(){
    $("#insertUser").submit(function(event) {
       //stop submit the form, we will post it manually. PREVENT THE DEFAULT behaviour ...
      event.preventDefault();
     console.log("button clicked");
     let form = $('#insertUser')[0];
     let data = new FormData(form);

  $.ajax({
            type: "POST",
            enctype: 'application/x-www-form-urlencoded',
            url: "Reg.php",
            data: data,
            processData: false,//prevents from converting into a query string
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (response) {
            //reponse is a STRING (not a JavaScript object -> so we need to convert)
            console.log("we had success!");
            console.log(response);
            if(response ==="ALREADY IN"){
            $("#error").text("User is already taken please select another ...");
            }
            else{
              $("#error").text("Thank you for registering");
              $("#mButton").show();
            }
           },
           error:function(){
          console.log("error occurred");
        }
      });
   });

});
</script> -->

</html>
