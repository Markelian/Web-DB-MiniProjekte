<?php
// update_produkt.php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['id'], $_POST['emri'], $_POST['kategoria'], $_POST['cmimi'], $_POST['sasia'])) {

    $id       = (int) $_POST['id'];
    $emri     = mysqli_real_escape_string($conn, trim($_POST['emri']));
    $kategoria= mysqli_real_escape_string($conn, trim($_POST['kategoria']));
    $cmimi    = (float) $_POST['cmimi'];
    $sasia    = (int) $_POST['sasia'];

    if ($emri === "" || $kategoria === "") {
        die("Të dhëna të paplota.");
    }

    $sql = "UPDATE produktet
            SET emri = '$emri',
                kategoria = '$kategoria',
                cmimi = $cmimi,
                sasia = $sasia
            WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: list_produkte.php");
        exit;
    } else {
        echo "Gabim gjatë përditësimit: " . mysqli_error($conn);
    }
} else {
    echo "Kërkesë e pavlefshme.";
}
