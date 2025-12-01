<?php
// forma_update_produkt.php
include 'db.php';

if (!isset($_GET['id'])) {
    die("ID e produktit mungon!");
}

$id = (int) $_GET['id'];

$sql = "SELECT * FROM produktet WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) === 0) {
    die("Produkti nuk u gjet.");
}

$produkt = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Ndrysho produktin</title>
    <link rel="stylesheet" href="style.css"><!-- ose ../POSTI_A_HTML_CSS/style.css -->
</head>
<body>

<header>
    <h1>Ndrysho produktin</h1>
</header>

<section class="table-section">
    <form action="update_produkt.php" method="post" onsubmit="return validoProduktin();">
        <input type="hidden" name="id" value="<?= $produkt['id'] ?>">

        <div>
            <label for="emri">Emri i produktit:</label>
            <input type="text" id="emri" name="emri"
                   value="<?= htmlspecialchars($produkt['emri']) ?>" required>
        </div>

        <div>
            <label for="kategoria">Kategoria:</label>
            <select id="kategoria" name="kategoria" required>
                <option value="">-- Zgjidh kategorinë --</option>
                <option value="Ushqime"    <?= $produkt['kategoria']==='Ushqime'    ? 'selected' : '' ?>>Ushqime</option>
                <option value="Elektronikë"<?= $produkt['kategoria']==='Elektronikë'? 'selected' : '' ?>>Elektronikë</option>
                <option value="Higjienë"   <?= $produkt['kategoria']==='Higjienë'   ? 'selected' : '' ?>>Higjienë</option>
                <option value="Tjetër"     <?= $produkt['kategoria']==='Tjetër'     ? 'selected' : '' ?>>Tjetër</option>
            </select>
        </div>

        <div>
            <label for="cmimi">Çmimi (€):</label>
            <input type="number" id="cmimi" name="cmimi" min="0" step="0.01"
                   value="<?= htmlspecialchars($produkt['cmimi']) ?>" required>
        </div>

        <div>
            <label for="sasia">Sasia në stok:</label>
            <input type="number" id="sasia" name="sasia" min="0"
                   value="<?= htmlspecialchars($produkt['sasia']) ?>" required>
        </div>

        <br>
        <button type="submit" class="btn-add">Ruaj ndryshimet</button>
        <a href="list_produkte.php">Kthehu te lista</a>
    </form>
</section>

<script src="../POSTI_B_JavaScript/validate.js">
/*function validoProduktin() {
    const emri = document.getElementById('emri').value.trim();
    const cmimi = parseFloat(document.getElementById('cmimi').value);
    const sasia = parseInt(document.getElementById('sasia').value);

    if (emri === "") {
        alert("Ju lutem shkruani emrin e produktit.");
        return false;
    }
    if (isNaN(cmimi) || cmimi < 0) {
        alert("Çmimi duhet të jetë numër pozitiv.");
        return false;
    }
    if (isNaN(sasia) || sasia < 0) {
        alert("Sasia duhet të jetë numër ≥ 0.");
        return false;
    }
    return true;
}*/
</script>

</body>
</html>
