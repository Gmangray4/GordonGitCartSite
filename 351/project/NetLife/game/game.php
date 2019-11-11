<?php
 $theFile = fopen("savefile/animalfile.txt", "r") or die("Unable to open file!");

 $counter = 0;
 // $numberAttsPerObject = 2;
 $outArr = array();
 while(!feof($theFile)) {
  $outArr[$counter]=trim(fgets($theFile));
  // name = $outArr[0];
  // animal = $outArr[1];
  // brithplace = $outArr[2];
  // sex = $outArr[3];
  // Hobbie = $outArr[4];
  // Zoddic = $outArr[5];
  // Alive = $outArr[6];
  $counter++;
}

fclose($theFile);

// // name
// $temp=$outArr[0];

//
    // var_dump($outArr);
    // Now we want to JSON encode these values to send them to $.ajax success.
  //  $myJSONObj = json_encode($outArr);
    // echo $myJSONObj;
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
  <p class="table">
<?php echo($outArr[1]);?>
</p>
</div>
<div class="table">
<p class="table">Name:</p>
</div>
<div class="table">
  <p class="table">
  <?php echo($outArr[0]);?>
  </p>
</div>
<div class="table">
<p class="table">Sex:</p>
</div>
<div class="table">
  <p class="table">
  <?php echo($outArr[3]); ?>
  </p>
</div>
<div class="table">
<p class="table">Birthplace:</p>
</div>
<div class="table">
  <p class="table">
  <?php echo($outArr[2]); ?>
  </p>
</div>
<div class="table">
<p class="table">Hobbie:</p>
</div>
<div class="table">
  <p class="table">
  <?php echo($outArr[4]); ?>
  </p>
</div>
<div class="table">
<p class="table">Zodiac:</p>
</div>
<div class="table">
  <p class="table">
  <?php echo($outArr[5]); ?>
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
</body>
</html>
