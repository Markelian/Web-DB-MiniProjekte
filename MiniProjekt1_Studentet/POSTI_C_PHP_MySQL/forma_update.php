<?php
include 'db.php';

if(!isset($_GET['id'])){
    die("ID mungon!");
}

$id = (int) $_GET['id'];
$sql = "SELECT * FROM studentet WHERE id = $id";
$result = mysqli_query($conn, $sql);
$studenti = mysqli_fetch_assoc($result);

if(!$studenti){
    die("Studenti nuk u gjet!");
}
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Ndrysho notën</title>
</head>
<body>
<h2>Ndrysho notën e: <?= htmlspecialchars($studenti['emri']) ?> <?= htmlspecialchars($studenti['mbiemri']) ?></h2>

<form action="update_student.php" method="post" onsubmit="return validoNoten();">
    <input type="hidden" name="id" value="<?= $studenti['id'] ?>">
    Nota e re:
    <input type="number" name="nota" id="nota" min="4" max="10" value="<?= $studenti['nota'] ?>">
    <button type="submit">Ruaj</button>
</form>

<script src="../POSTI_B_JAVASCRIPT/validate.js"></script>
</body>
</html>
