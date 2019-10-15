<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  //logs the values in array (is to help ... )
  // var_dump($_POST);
  /* Step 1:
  Get the temperature value (a_temp): is a string so we need to convert to a number using the in built function intval()
  */


$temp = $_POST['a_temp'];

$tempIntV = intval($temp);
// echo ("<br />");
// echo ($tempIntV);
// echo ("<br />");


  /* Step 2:
  Get the radio button choice (tempChoice) and then create a variable to hold the converted value::
  PLEASE USE THE FORMULA BELOW TO WRITE THE CONVERSION ALGORITHM - DO NOT USE ANY LIBRARY ETC
  To convert from Fahrenheit to Celsius: Celsius = (5 / 9) * (Fahrenheit – 32)
  To convert from Celsius to Fahrenheit: Fahrenheit = (9 / 5) * Celsius + 32
*/

$tempstate = $_POST['tempChoice'];

if ($tempstate == "Fahrenheit") {
  // code..

$total = (9/5) * ($tempIntV + 32);
// Fahrenheit = (9 / 5) * Celsius + 32
}else {

$total = (5 / 9) * ($tempIntV - 32);

}

// echo ($total);
  /* Step 3:
  Get the email address and name from the $_POST array (using the appropriate keys) and send an email
  to that person containing the converted value. Please include a short message in the email (not JUST the value.)
  Use the php inbuilt mail() function
  https://www.w3schools.com/php/func_mail_mail.asp
  The email may end up in your spam folder when testing...
  */

$email = $_POST['a_email'];
$name = $_POST['a_name'];
$msg = ("<p class=msg>")."Your convented vaule is ".$total." in ".$tempstate.".".("</p>");
$msg2 = ("<p class=msg2>")."We are sorry ".$name.".".("</p>");
$msg3 = ("<p class=msg3>")."Our system could not send anything to ".$email.("</p>");
$msg4 = ("<p class=msg4>")."Stay Hydrated!".("</p>");

// mail($email,$name,$msg);


  /* Step 4: using the echo() - display a custom message i.e. Dear ... to notify the usewr that t
  hey will get an email with the results.*/
// echo ($msg);



echo($msg);
echo($msg2);
echo($msg3);
echo($msg4);

}
 ?>

<!DOCTYPE html>
<html>
<head>
<title>Sample Contact and FahrenHeit/Celsius Form </title>
<!--set some style properties::: -->
<link rel="stylesheet" type="text/css" href="css/galleryStyle.css">
</head>
<body>

<div class= "formContainer">
<!--form -->
<!-- You need an action att and a method att within the form tag -->
<form action="exerciseForm.php" method="post">
<!-- group the related elements in a form -->
<h3> LET US SEND YOU A CONVERTED VALUE F->C or C->F</h3>
<fieldset>
 <p><label>Name:</label><input type="text" size="40" maxlength = "40" name = "a_name" required> </p>
<p><label>Email:</label> <input type ="email" size="40" maxlength = "40" name = 'a_email' required/></p>

</fieldset>
<fieldset>
  <!-- ONLY number entries  -->
  <p><label>Temperature Input:</label><input type="number" size="5" maxlength = "5" name = "a_temp" required> </p>
  <p><input class="ConvertButt"type="radio" name="tempChoice" value="Celsius"> Convert to Celsius </p>
  <p><input class="ConvertButt"type="radio" name="tempChoice" value="Fahrenheit"> Convert to Fahrenheit</p>
  </fieldset>
<!-- submit button  -->
 <p><input type = "submit" name = "submit" value = "submit and convert" id =buttonS /></p>

<p class=""></p>

</form>
</div>
</body>
</html>
