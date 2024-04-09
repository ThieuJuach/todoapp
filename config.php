<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
     // Database connection parameters
    /* $host = "localhost";
     $username = "root"; 
     $password = ""; 
     $database = "todo"; 
 
     // Database connection
     $conn = mysqli_connect($host, $username, $password, $database,);
 
     // Check if the connection was successful
     if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
     }*/

     // PHP Data Objects(PDO) Sample Code:
    try {
        $conn = new PDO("sqlsrv:server = tcp:atj.database.windows.net,1433; Database = todo", "ajuach", "Andy.664298");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        print("Error connecting to SQL Server.");
        die(print_r($e));
    }
?>