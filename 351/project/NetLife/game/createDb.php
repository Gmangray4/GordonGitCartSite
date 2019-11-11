<?php
try {
    /******************************************
    * Create databases and  open connections*
    ******************************************/

    // Create (connect to) SQLite database in file
    $file_db = new PDO('sqlite:../db/netLife.db');
  // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE,
                            PDO::ERRMODE_EXCEPTION);
    echo("opened or connected to the database netLife");
    //2
    $theQuery = 'CREATE TABLE netlifedatebase (AcountID INTEGER PRIMARY KEY NOT NULL, username TEXT, names TEXT, species TEXT, country TEXT, gender TEXT, hobbies TEXT, zodiac TEXT, HP TEXT, bugs TEXT, suffering TEXT, peaceDeath TEXT, painDeath TEXT, minTime TEXT, maxTime TEXT, lifeStatus TEXT)';
    $file_db ->exec($theQuery);
// if everything executed error less we will arrive at this statement
    echo ("Table netlife datebase created successfully<br\>");
      // Close file db connection
       $file_db = null;
    //2
   }
catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
  }
  ?>
