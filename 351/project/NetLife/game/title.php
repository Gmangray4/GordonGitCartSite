<?php

// https://www.codewall.co.uk/how-to-read-json-file-using-php-examples/

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
//if(isset($_POST["submitted"]){
$theFile = fopen("savefile/animalfile.txt", "w") or die("Unable to open");
fwrite($theFile,$animalNames[rand (0 ,count($animalNames)-1)]."\n");
fwrite($theFile,$species[rand (0 ,count($species)-1)]."\n");
fwrite($theFile,$brithplace[rand (0 ,count($brithplace)-1)]."\n");
fwrite($theFile,$sex[rand (0 ,count($sex)-1)]."\n");
fwrite($theFile,$hobbies[rand (0 ,count($hobbies)-1)]."\n");
fwrite($theFile,$zodiac[rand (0 ,count($zodiac)-1)]."\n");
fwrite($theFile,"Alive");
header("Location: game.php");
}
// }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src = "jquery/jquery-3.4.1.js"></script>
    <script src = "javascript/main.js"></script>
    <title>NetLife</title>
  </head>
<body>
<div>
<div class="login">
  <div class="titleInfo">
<p class="titleInfo">Here is the prototype of the game! Click new game to start.</p>
  </div>
  <form class="main" action="title.php" method="post">
  <input type="hidden" name="submitted" value="submitted">
   <button class="NewGbutt" type="submit" name="NewGameButt">New Game</button>
  </form>
  <form class="main" action="game.php">
    <input class="Continuebutt" type="submit" value="Continue"/>
</form>
<form class="main" action="states.php">
  <input class="Continuebutt" type="submit" value="States"/>
</form>
<form class="logOut" action="index.php">
  <input class="Continuebutt" type="submit" value="Log Out"/>
</form>
</div>
</div>
</body>
</html>
