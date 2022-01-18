<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$dbc = mysqli_connect("localhost", "root", "sesame");
if (!$dbc) {
    echo "<p>Unable to connect to MYSQL</p>";
}else if(!mysqli_select_db($dbc, "club")) {
    echo "<p> Inside MYSQL: no club</p>";

} 
?>

