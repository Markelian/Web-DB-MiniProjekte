<?php
include 'db.php';

if(!isset($_GET['id'])){
    die("ID mungon!");
}

$id = (int) $_GET['id'];

$sql = "DELETE FROM studentet WHERE id = $id";

if(mysqli_query($conn, $sql)){
    header("Location: list_studentet.php");
    exit;
} else {
    echo "Gabim gjatë fshirjes: " . mysqli_error($conn);
}
