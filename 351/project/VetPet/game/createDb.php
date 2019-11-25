<?php
  // Set default timezone

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

      echo("opened or connected to the database vetLife database");
      $file_db->exec("PRAGMA foreign_keys = on");

     $theQuery = 'CREATE TABLE IF NOT EXISTS users (userID INTEGER PRIMARY KEY NOT NULL, username TEXT)';
     $file_db ->exec($theQuery);


     $theQueryAnimals = 'CREATE TABLE IF NOT EXISTS aninmalCollection (aninmalId INTEGER PRIMARY KEY NOT NULL, name TEXT, species TEXT, country TEXT, gender TEXT, hobbies TEXT, zodiac TEXT, HP TEXT, bugs TEXT, suffering TEXT, active TEXT, owner TEXT, uID INTEGER, FOREIGN KEY (uID) REFERENCES users(userID))';
     $file_db ->exec($theQueryAnimals);

        // Close file db connection
         $file_db = null;

    }
    catch(PDOException $e) {
      // Print PDOException message
      echo $e->getMessage();
    }
    ?>
