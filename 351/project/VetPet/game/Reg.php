<?php
//check if there has been something posted to the server to be processed
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
// need to process
 $user = $_POST['a_user'];

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
      $user_es =$file_db->quote($user);


      // first check if exists ::
        $sql_select= "SELECT COUNT(*) from users WHERE username=$user_es" ;
        $result = $file_db->query($sql_select);
       if (!$result) die("Cannot execute query.");

       if ($result->fetchColumn() > 0) {
         echo("ALREADY IN");

       }
       else{
         echo("NOT IN");
          $queryInsert ="INSERT INTO users(username)VALUES ($user_es)";
          $file_db->exec($queryInsert);
       }




     }
     catch(PDOException $e) {
       // Print PDOException message
       echo $e->getMessage();
     }

    //echo("done");
    exit;
}//POST
?>

<!DOCTYPE html>
<html>
<head>
<title>Sample REGISTER PAGE </title>
<!-- get JQUERY -->
  <script src = "jquery/jquery-3.4.1.js"></script>
<!--set some style properties::: galleryStyle -->
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<!-- formContainer -->
<div class= "login">
<!--form done using more current tags... -->
<form id="insertUser" action="" enctype ="">
<!-- group the related elements in a form -->
<h3> REGISTER :::</h3>
<fieldset>
<p><label>User:</label><input type="text" size="24" maxlength = "40" name = "a_user" required></p>
<p class = "sub"><input type = "submit" name = "submit" value = "submit my info" id ="buttonS" /></p>
 </fieldset>
</form>
<form class="login1" action="index.php">
  <input class="login1" type="submit" value="GO TO LOGIN"/>
</form>
<div id ="error"></div>
<div id = "mButton" ><a href = "index.php">GO TO LOGIN</a></div>

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
</script>
</body>
</html>
