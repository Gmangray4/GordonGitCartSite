<?php
//check if there has been something posted to the server to be processed
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
// need to process
 $user = $_POST['a_user'];
 $pass = $_POST['a_pass'];


    try {
        /**************************************
        * Create databases and                *
        * open connections                    *
        **************************************/
        // Create (connect to) SQLite database in file
        $file_db = new PDO('sqlite:../db/exercise.db');
        // Set errormode to exceptions
        /* .. */
        $file_db->setAttribute(PDO::ATTR_ERRMODE,
                                PDO::ERRMODE_EXCEPTION);


// checks the current count of data

 // $sql_selectA = "SELECT pieceID, title, creationDate FROM artCollection";
// $totalCountofData = "SELECT COUNT(*) FROM User";


// see LATER PLEASE!
$checkAllDataUser = "SELECT * FROM User WHERE usernames = '$user'";
$foundUsernames = $file_db->query($checkAllDataUser);


if (count($foundUsernames->fetchAll()) > 0){
  echo "false";
}else {
  $insertStatement =  "INSERT INTO User (usernames, passwords) VALUES ('$user', '$pass')";
  $file_db->exec($insertStatement);
  echo ("true");
}

 // Close file db connection
  $file_db = null;
      }
      catch(PDOException $e) {
        // Print PDOException message
        echo $e->getMessage();
      }
    exit;

}//POST
?>

<!DOCTYPE html>
<html>
<head>
<title>Sample Insert into Gallery Form USING JQUERY AND AJAX </title>
<!-- get JQUERY -->
  <script src = "libs/jquery-3.4.1.js"></script>
<!--set some style properties::: -->
<link rel="stylesheet" type="text/css" href="css/galleryStyle.css">
</head>
<body>
  <!-- NEW for the result -->
<div id = "result"></div>

<div class= "formContainer">
<!--form done using more current tags... -->
<form id="insertUser" action="">
<!-- group the related elements in a form -->
<h3> Create a Username! :::</h3>
<fieldset>
<p><label>Username:</label><input type="text" size="24" maxlength = "40" name = "a_user" required></p>
<p><label>Password</label><input type = "text" size="24" maxlength = "40"  name = "a_pass" required></p>
<p class = "sub"><input type = "submit" name = "submit" value = "submit my info" id ="buttonS" /></p>
 </fieldset>
</form>
</div>
<script>
// here we put our JQUERY
$(document).ready (function(){
    $("#insertUser").submit(function(event) {
       //stop submit the form, we will post it manually. PREVENT THE DEFAULT behaviour ...
      event.preventDefault();
     console.log("button clicked");
     let form = $('#insertUser')[0];
     let data = new FormData(form);
    // Display the key/value pairs
    // to access the data in the formData Object ... (not this is ALL TEXT ... )
    // as key -value pairs
    //Object.entries() method in JavaScript returns an array consisting of
    //enumerable property [key, value] pairs of the object.
  // //  for (let valuePairs of data.entries()) {
  //   console.log(valuePairs[0]+ ', ' + valuePairs[1]); }


  $.ajax({
            type: "POST",
            enctype: 'text/plain',
            url: "registerEx.php",
            data: data,
            processData: false,//prevents from converting into a query string
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (response) {
            //reponse is a STRING (not a JavaScript object -> so we need to convert)
            console.log("we had success!");
            console.log(response);

            if(response === 'false') {
              alert("Username is already in use!");
            }
            //use the JSON .parse function to convert the JSON string into a Javascript object
            // let parsedJSON = JSON.parse(response);
            // console.log(parsedJSON);
            // displayResponse(parsedJSON);
           },
           error:function(){
          console.log("error occurred");
        }
      });
   });

});
</script>
</body>
</html>
