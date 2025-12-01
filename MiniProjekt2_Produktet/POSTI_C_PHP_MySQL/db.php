<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "dyqani";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Lidhja deshtoi: " . mysqli_connect_error());
}
?>
