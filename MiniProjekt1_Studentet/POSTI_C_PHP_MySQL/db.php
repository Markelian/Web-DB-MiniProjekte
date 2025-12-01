<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shkolla";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Lidhja dështoi: " . mysqli_connect_error());
}
?>
