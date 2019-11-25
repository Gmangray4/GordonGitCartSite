<?php
// clear any sessions ...
session_start();
// remove all session variables
session_unset();
// destroy the session
session_destroy();
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
         //NO ECHOS!
         session_start();
         $sql_getUser= "SELECT userID, username from users WHERE username=$user_es" ;
         $result = $file_db->query($sql_getUser);
         $row = $result->fetch(PDO::FETCH_ASSOC);
         $_SESSION['userID'] = $row["userID"];
         $_SESSION['username'] = $row['username'];
         echo("IN");
         return;
         // start a session a

       }
       else{
          $file_db =null;
         echo("NONE");

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
<title>VetPet: Login</title>
<!-- get JQUERY -->
  <script src = "jquery/jquery-3.4.1.js"></script>
<!--set some style properties::: -->
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
  <!-- NEW for the result -->
<div id = "result"></div>

<div class= "login">
<!--form done using more current tags... -->
<form id="insertUser" action="">
<!-- group the related elements in a form -->
<h1 class="login">Vet Pet</h1>
<h3> Login in:</h3>
<fieldset>
<p><label>Username:</label><input type="text" size="24" maxlength = "40" name = "a_user" required></p>
<p class = "sub"><input type = "submit" name = "submit" value = "Login" id ="buttonS" /></p>
 </fieldset>
</form>
<form action="Reg.php">
  <input type="submit" value="Create Account"/>
</form>

<img class="title" src="images\animal\DogGoodFine.gif" alt="">
<img class="title" src="images\animal\CatGoodFine.gif" alt="">
<img class="title" src="images\animal\HorseGoodFine.gif" alt="">
<img class="title" src="images\animal\ChickenGoodFine.gif" alt="">
<br>
<img class="title" src="images\animal\FoxGoodFine.gif" alt="">
<img class="title" src="images\animal\BearGoodFine.gif" alt="">



<img class="title" src="images\animal\LionGoodFine.gif" alt="">
<img class="title" src="images\animal\ElephantGoodFine.gif" alt="">

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
            url: "index.php",
            data: data,
            processData: false,//prevents from converting into a query string
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (response) {
            //reponse is a STRING (not a JavaScript object -> so we need to convert)
            console.log("we had success!");
            console.log(response);
            if(response ==="NONE"){
            $("#error").text("No such user try again");
            alert("There is no user with this username, try creaing an account or try a again.");
            }
            else if ("IN") {
              window.location = "title.php";
            }else{
            // window.location = "title.php";
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
