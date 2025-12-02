<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "hoteli";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Lidhja deshtoi: " . mysqli_connect_error());
}
?>
