<?php

// https://www.codewall.co.uk/how-to-read-json-file-using-php-examples/

$url = 'loadFiles/animal.json'; // path to your JSON file
$data = file_get_contents($url); // put the contents of the file into a variable
// $characters = json_decode($data); // decode the JSON feed
$animals = json_decode($data); // decode the JSON feed and make an associative array

echo $animals[0]->Dog->Male->Name;
// echo $animals['AnimalItems']['Dog']['Male']['Name'][1];





// $strJsonFileContents = file_get_contents("LoadFiles/animal.json");
//
// $array = json_decode($strJsonFileContents);
// var_dump($array);
//
// foreach ($array ->AnimalItems->animal as $animal) {
//
// // $animal->Dog->Name[1];
//
// }

// $animal = $array['AnimalItems'];


// $animalName = array_rand($array)
// echo($animalName);

// if($_SERVER['REQUEST_METHOD'] == 'POST')
// {
// $temp = $_POST['a_temp'];
// $tempstate = $_POST['tempChoice'];
//
//
// $email = $_POST['a_email'];
// $name = $_POST['a_name'];
//
// $theFile = fopen("files/anamalFile.txt", "w") or die("Unable to open");
// // fwrite($theFile,$tempstate."\n");
// // fwrite($theFile,$total."\n");
// // fwrite($theFile,$name."\n");
// // fwrite($theFile,$email."\n");
//
// // header("Location: read.php");
// // exit;
// }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src = "jquery/jquery-3.4.1.js"></script>
    <script src = "javascript/create.js"></script>
    <script src = "javascript/main.js"></script>
    <title>NetLife</title>
  </head>
  <body>
<div>
<div class="title">

  <div class="titleInfo">
<p class="titleInfo">Here is the prototype of the game! Click new game to start.</p>
  </div>
  <button class="NewGbutt"type="button" name="NewGameButt">New Game</button>
  <!-- <input class="NewGbutt" type = "submit" name = "submit" value = "submit and convert" id =buttonS /> -->
</div>
</div>
</body>
</html>
