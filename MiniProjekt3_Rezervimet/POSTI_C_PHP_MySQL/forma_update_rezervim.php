<?php
// forma_update_rezervim.php
include 'db.php';

if (!isset($_GET['id'])) {
    die("ID e rezervimit mungon!");
}

$id = (int) $_GET['id'];

$sql = "SELECT * FROM rezervimet WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) === 0) {
    die("Rezervimi nuk u gjet.");
}

$rez = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Ndrysho rezervimin</title>
    <link rel="stylesheet" href="../POSTI_A_HTML_CSS/style.css">
</head>
<body>

<header>
    <h1>Ndrysho rezervimin</h1>
</header>

<section class="table-section">
    <form action="update_rezervim.php" method="post" onsubmit="return validoRezervimin();">
        <input type="hidden" name="id" value="<?= $rez['id'] ?>">

        <div>
            <label for="klienti">Klienti:</label>
            <input type="text" id="klienti" name="klienti"
                   value="<?= htmlspecialchars($rez['klienti']) ?>" required>
        </div>

        <div>
            <label for="data">Data:</label>
            <input type="date" id="data" name="data"
                   value="<?= htmlspecialchars($rez['data']) ?>" required>
        </div>

        <div>
            <label for="tipi">Tipi i rezervimit:</label>
            <input type="text" id="tipi" name="tipi"
                   value="<?= htmlspecialchars($rez['tipi']) ?>" required>
        </div>

        <div>
            <label for="statusi">Statusi:</label>
            <select id="statusi" name="statusi" required>
                <option value="">-- Zgjidh statusin --</option>
                <option value="Aktive"    <?= $rez['statusi']==='Aktive'    ? 'selected' : '' ?>>Aktive</option>
                <option value="Në pritje" <?= $rez['statusi']==='Në pritje' ? 'selected' : '' ?>>Në pritje</option>
                <option value="Anuluar"   <?= $rez['statusi']==='Anuluar'   ? 'selected' : '' ?>>Anuluar</option>
            </select>
        </div>

        <br>
        <button type="submit" class="btn-add">Ruaj ndryshimet</button>
        <a href="list_rezervime.php">Kthehu te lista</a>
    </form>
</section>

<script src="../POSTI_B_JavaScript/validate.js"></script>
</body>
</html>
