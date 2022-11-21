<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$database = "lijsten";

try {
  $db = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e){
  echo "<p style='font-size: 2rem; font-family: monospace;'>" .$e->getMessage() . "</p>";
}
?>