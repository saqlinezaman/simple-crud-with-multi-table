<?php
    $DB_HOST = 'localhost';
    $DB_USER = 'root';
    $DB_PASS = '';
    $DB_NAME = 'learn_crud';

    // Create a connection to the database using PDO
    try{
        $db_connect = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER, $DB_PASS);
        // Set the PDO error mode to exception
        $db_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    // Catch any connection errors
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>