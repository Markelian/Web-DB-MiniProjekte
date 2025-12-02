<?php
// delete_rezervim.php
include 'db.php';

if (!isset($_GET['id'])) {
    die("ID e rezervimit mungon!");
}

$id = (int) $_GET['id'];

$sql = "DELETE FROM rezervimet WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("Location: list_rezervime.php");
    exit;
} else {
    echo "Gabim gjatë fshirjes: " . mysqli_error($conn);
}
