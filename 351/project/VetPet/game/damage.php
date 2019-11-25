<?php
//check if there has been something posted to the server to be processed


try
  {
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

 //echo($artistOptions[0]);
  $getData="SELECT * FROM aninmalCollection WHERE  active ='true'";

 // go through the options there could be multiple ...

$result = $file_db->query($getData);
 if (!$result) die("Cannot execute query.");
 while($row = $result->fetch(PDO::FETCH_ASSOC))
 {

   $hpCurrent = intval($row["HP"]);
   $bug = intval($row["bugs"]);
   $newbug = $bug + rand(1,5);
   $sufferingC = intval($row["suffering"]);

   if ($hpCurrent >= 1) {
     $newHp = $hpCurrent - $newbug;
     $newSuffering = $sufferingC + ($newbug*2);
   }else {
     $newHp = 0;
     $newSuffering = $sufferingC;
     $newbug = $bug;
   }
   // $newHp = $hpCurrent - $newbug;
   // $newSuffering = $sufferingC + ($newbug*2);

   $Id = $row['uID'];
   //echo("new S".$newbug);
  $sql_update="UPDATE aninmalCollection SET bugs = '$newbug',HP='$newHp',suffering='$newSuffering' WHERE uID = '$Id' AND active = 'true'";
   $file_db ->exec($sql_update);
   echo("UPDATE SUCCESSFUL");
   foreach ($row as $key=>$entry)
   {

        // echo the key and entry
       echo "<p>".$key." :: ".$entry."</p>";


   }


 }

}//try
catch(PDOException $e) {
  // Print PDOException message
  echo $e->getMessage();

}



?>
