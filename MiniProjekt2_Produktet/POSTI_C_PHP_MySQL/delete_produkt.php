<?php
// delete_produkt.php
include 'db.php';

if (!isset($_GET['id'])) {
    die("ID e produktit mungon!");
}

$id = (int) $_GET['id'];

$sql = "DELETE FROM produktet WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("Location: list_produkte.php");
    exit;
} else {
    echo "Gabim gjatë fshirjes: " . mysqli_error($conn);
}
