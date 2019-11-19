<?php

session_start();

$currentId = $_SESSION['userID'];
$uName = $_SESSION['username'];
// $pet = $_SEESION['currentPet']
//echo $uName;


?>

<?php
//check if there has been something posted to the server to be processed
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["sendReason"]) && ($_GET["sendReason"] == "gameStart"))
{
//  echo("IN GET");
  try
  {
    /**************************************
    * Create databases and                *
    * open connections                    *
    **************************************/

    // Create (connect to) SQLite database in file
  $file_db = new PDO('sqlite:../db/netLife.db');
  // Set errormode to exceptions
  /* .. */
  $file_db->setAttribute(PDO::ATTR_ERRMODE,
                          PDO::ERRMODE_EXCEPTION);

 //echo($artistOptions[0]);
  $getData="SELECT * FROM aninmalCollection WHERE uid ='$currentId' AND active ='true'";

 // go through the options there could be multiple ...



$result = $file_db->query($getData);
 if (!$result) die("Cannot execute query.");
 $row = $result->fetch(PDO::FETCH_ASSOC);
  $myJSONObj = json_encode($row);
  echo $myJSONObj;

// // NOW WE WANT TO SEND THE RESULT AS A JSON STRING BACK TO CLIENT::
//
// // get a row...
// // MAKE AN ARRAY::
// $res = array();
// $i=0;
// while($row = $result->fetch(PDO::FETCH_ASSOC))
// {
//   // note the result from SQLitE is ALREADy ASSOCIATIVE
//   $res[$i] = $row;
//   $i++;
// }//end while
// // endcode the resulting array as JSON
// $myJSONObj = json_encode($res);
// echo $myJSONObj;
}
catch(PDOException $e) {
  // Print PDOException message
  echo $e->getMessage();

}
exit;

}
else if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["sendReason"])&&($_GET["sendReason"] == "gameUpdate"))

{
  try
  {
    /**************************************
    * Create databases and                *
    * open connections                    *
    **************************************/

    // Create (connect to) SQLite database in file
  $file_db = new PDO('sqlite:../db/netLife.db');
  // Set errormode to exceptions
  /* .. */
  $file_db->setAttribute(PDO::ATTR_ERRMODE,
                          PDO::ERRMODE_EXCEPTION);
  //echo($_GET["bugsTotal"]);
  $bugCount = $file_db->quote($_GET["bugsTotal"]);
  $sql_update="UPDATE aninmalCollection SET bugs = $bugCount WHERE uID = '$currentId' AND active = 'true'";
      // again we do error checking when we try to execute our SQL statements on the db
    $file_db ->exec($sql_update);
    }


catch(PDOException $e) {
  // Print PDOException message
  echo $e->getMessage();

}
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>TEMPLATE CART 351 PAGE</title>
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <script src = "jquery/jquery-3.4.1.js"></script>
  <script src = "javascript/main.js"></script>
</head>
<body>

<div id="mainDiv" class="main" >
  <div class="topInfo">
<form class="topInfo" action="title.php"><input class="topInfo" type="submit" value="Home"/></form>
  </div>
<div class="animalDisplay">

  <div class="sideinfo">

<div class="table">
<p class="table">Animal:</p>
</div>
<div id="NameTable" class="table">
  <p id = "animalSpecies" class="table">
    DUD
</p>
</div>
<div class="table">
<p class="table">Name:</p>
</div>
<div class="table">
  <p id = "animalName" class="table">
  DUD
  </p>
</div>
<div class="table">
<p class="table">Sex:</p>
</div>
<div class="table">
  <p id = "animalSex" class="table">
  DUD
  </p>
</div>
<div class="table">
<p class="table">Birthplace:</p>
</div>
<div class="table">
  <p id = "animalCountry" class="table">
  DUD
  </p>
</div>
<div class="table">
<p class="table">Hobbie:</p>
</div>
<div class="table">
  <p id = "animalHobbie" class="table">
  DUD
  </p>
</div>
<div class="table">
<p class="table">Zodiac:</p>
</div>
<div class="table">
  <p id = "animalZodiac" class="table">

  </p>
</div>
  </div>

<img class="AnimalImg"src="images/<?php echo($outArr[1]);?>.gif" alt="Place Holder image">
</div>

<div class="hud">

<div class="hudHeader">

<div class="condition">
  <div class="statusL">
    <p class="statusCss">Status:</p>
  </div>
  <div class="statusR">

<!-- this p tage will update in furtre -->
    <p id="status" class="statusCss"></p>
  </div>

</div>
  <button type="button" name="button" onclick="bugsUpdate()">AddBug</button>
  <button style="margin: 0" type="button" name="button" onclick="damage()">Damage</button>
</div>
<div class="hudSections">
<button class="Hudbutt"type="button" name="ButtBrain" onclick="brainCheck()"> Brain</button>
</div>
<div class="hudSections">
<button class="Hudbutt"type="button" name="ButtHeart" onclick="heartCheck()"> Heart</button>
</div>
<div class="hudSections">
<button class="Hudbutt"type="button" name="ButtLungs" onclick="lungsCheck()"> Lungs</button>
</div>

</div>
</div>
<!-- <script>
$(document).ready (function(){

});
</script> -->
</body>
</html>
