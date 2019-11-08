<?php
try {
    /******************************************
    * Create databases and  open connections*
    ******************************************/

    // Create (connect to) SQLite database in file
    $file_db = new PDO('sqlite:../db/exercise.db');
  // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE,
                            PDO::ERRMODE_EXCEPTION);
    echo("opened or connected to the database graffitiGallery");
    //2
    $theQuery = 'CREATE TABLE User (ID INTEGER PRIMARY KEY NOT NULL, usernames TEXT, passwords TEXT)';
    $file_db ->exec($theQuery);
// if everything executed error less we will arrive at this statement
    echo ("Table User created successfully<br \>");
      // Close file db connection
       $file_db = null;
    //2
   }
catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
  }
  ?>
