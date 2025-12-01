<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['emri'], $_POST['mbiemri'], $_POST['nota'])) {

    $emri    = mysqli_real_escape_string($conn, trim($_POST['emri']));
    $mbiemri = mysqli_real_escape_string($conn, trim($_POST['mbiemri']));
    $nota    = (int) $_POST['nota'];

    $sql = "INSERT INTO studentet (emri, mbiemri, nota)
            VALUES ('$emri', '$mbiemri', $nota)";

    if (mysqli_query($conn, $sql)) {
        // pasi ruhet me sukses, kthehu te lista
        header("Location: list_studentet.php");
        exit;
    } else {
        echo "Gabim gjatë ruajtjes: " . mysqli_error($conn);
    }
} else {
    echo "Kërkesë e pavlefshme.";
}
