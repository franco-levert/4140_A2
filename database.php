<?php
// code taken from database.php example
/* Database credentials. */
define('DB_SERVER', 'db.cs.dal.ca');
define('DB_USERNAME', 'levert');
define('DB_PASSWORD', 'joHyMW5jTWaGa8H2');
define('DB_NAME', 'levert');
 
/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
} 
?>
