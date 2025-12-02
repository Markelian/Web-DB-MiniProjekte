<?php
// update_rezervim.php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['id'], $_POST['klienti'], $_POST['data'], $_POST['tipi'], $_POST['statusi'])) {

    $id      = (int) $_POST['id'];
    $klienti = mysqli_real_escape_string($conn, trim($_POST['klienti']));
    $data    = mysqli_real_escape_string($conn, $_POST['data']);
    $tipi    = mysqli_real_escape_string($conn, trim($_POST['tipi']));
    $statusi = mysqli_real_escape_string($conn, $_POST['statusi']);

    if ($klienti === "" || $tipi === "" || $statusi === "") {
        die("Të dhëna të paplota.");
    }

    $sql = "UPDATE rezervimet
            SET klienti = '$klienti',
                data    = '$data',
                tipi    = '$tipi',
                statusi = '$statusi'
            WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: list_rezervime.php");
        exit;
    } else {
        echo "Gabim gjatë përditësimit: " . mysqli_error($conn);
    }
} else {
    echo "Kërkesë e pavlefshme.";
}
