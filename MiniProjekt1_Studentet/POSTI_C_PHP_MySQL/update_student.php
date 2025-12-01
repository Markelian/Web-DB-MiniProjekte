<?php
include 'db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = (int) $_POST['id'];
    $nota = (int) $_POST['nota'];

    $sql = "UPDATE studentet SET nota = $nota WHERE id = $id";

    if(mysqli_query($conn, $sql)){
        header("Location: list_studentet.php");
        exit;
    } else {
        echo "Gabim gjatë përditësimit: " . mysqli_error($conn);
    }
} else {
    echo "Kërkesë e pavlefshme.";
}
