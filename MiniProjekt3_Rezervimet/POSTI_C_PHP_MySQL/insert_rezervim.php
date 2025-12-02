<?php
// insert_rezervim.php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['klienti'], $_POST['data'], $_POST['tipi'], $_POST['statusi'])) {

    $klienti = mysqli_real_escape_string($conn, trim($_POST['klienti']));
    $data    = mysqli_real_escape_string($conn, $_POST['data']);
    $tipi    = mysqli_real_escape_string($conn, trim($_POST['tipi']));
    $statusi = mysqli_real_escape_string($conn, $_POST['statusi']);

    if ($klienti === "" || $tipi === "" || $statusi === "") {
        die("Të dhëna të paplota.");
    }

    $sql = "INSERT INTO rezervimet (klienti, data, tipi, statusi)
            VALUES ('$klienti', '$data', '$tipi', '$statusi')";

    if (mysqli_query($conn, $sql)) {
        header("Location: list_rezervime.php");
        exit;
    } else {
        echo "Gabim gjatë ruajtjes: " . mysqli_error($conn);
    }
} else {
    echo "Kërkesë e pavlefshme.";
}
