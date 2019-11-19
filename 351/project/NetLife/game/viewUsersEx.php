<!-- $sql = "select * from users";

$result = $db->query($sql);

$data = $result->fetchAll();

for($i = 0;  $i < count ($data); $i++){
  echo "<li>" . $data[$i]->usernames . " -". $data[$i]->password ."jjjj"."</li>";
} -->
<?php
// put required html mark up
echo"<html>\n";
echo"<head>\n";
echo"<title> Output from the Ex6 Database </title> \n";
//include CSS Style Sheet
echo "<link rel='stylesheet' type='text/css' href='css/galleryStyle.css'>";
echo"</head>\n";
// start the body ...
echo"<body>\n";
// place body content here ...

try {
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

                            $sql_select='SELECT * FROM aninmalCollection';
                            // the result set
                            $result = $file_db->query($sql_select);
                            if (!$result) die("Cannot execute query.");
                            // fetch first row ONLY...
  // gets the data from the database
  // $row = $result->fetch(PDO::FETCH_ASSOC);
  // var_dump($row);

  echo "<h3> All User Acounts Results:::</h3>";
  echo"<div id='back'>";
  // get a row...
  while($row = $result->fetch(PDO::FETCH_ASSOC))
  {
     echo "<div class ='outer'>";
     echo "<div class ='content'>";
     // go through each column in this row
     // retrieve key entry pairs
     foreach ($row as $key=>$entry)
     {
       //if the column name is not 'image'
        if($key!="image")
        {
          // echo the key and entry
            echo "<p>".$key." :: ".$entry."</p>";
        }
     }

    // put image in last
      echo "</div>";
      // access by key
      echo "</div>";
  }//end while
  echo"</div>";


  }
  catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
  }

echo"</body>\n";
echo"</html>\n";
?>
