<?php    
$dbHost     = "localhost";  
$dbUsername = "root";  
$dbPassword = "";  
$dbName     = "phplogin";  
  
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
if ($db->connect_error) {  
    die("Connection failed: " . $db->connect_error);  
}
?>
