<?php
$servername = "localhost:3306";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

$createDatabase = "CREATE DATABASE countries";

$connectToDatabase="USE countries";

try{
  $conn->query($createDatabase);
  echo "Database Created successfully!";
} 
catch(Exception $ex){
  try {
    $conn->query($connectToDatabase);
  } catch (\Throwable $th) {
    $th->getMessage();
  }

}


  //code...






?>