<?php
// forma_shto_produkt.php
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Shto produkt të ri</title>
    <link rel="stylesheet" href="style.css"><!-- ose ../POSTI_A_HTML_CSS/style.css -->
</head>
<body>

<header>
    <h1>Shto produkt të ri</h1>
</header>

<section class="table-section">
    <form action="insert_produkt.php" method="post" onsubmit="return validoProduktin();">
        <div>
            <label for="emri">Emri i produktit:</label>
            <input type="text" id="emri" name="emri" required>
        </div>

        <div>
            <label for="kategoria">Kategoria:</label>
            <select id="kategoria" name="kategoria" required>
                <option value="">-- Zgjidh kategorinë --</option>
                <option value="Ushqime">Ushqime</option>
                <option value="Elektronikë">Elektronikë</option>
                <option value="Higjienë">Higjienë</option>
                <option value="Kancelari">Kancelari</option>
                <option value="Orendi">Orendi</option>
                <option value="Veshje">Veshje</option>
                <option value="Argjendari">Argjendari</option>
                <option value="Suvenire">Suvenire</option>
                <option value="Vegla Pune">Vegla Pune</option>
                <option value="Tjetër">Tjetër</option>
            </select>
        </div>

        <div>
            <label for="cmimi">Çmimi (€):</label>
            <input type="number" id="cmimi" name="cmimi" min="0" step="0.01" required>
        </div>

        <div>
            <label for="sasia">Sasia në stok:</label>
            <input type="number" id="sasia" name="sasia" min="0" required>
        </div>

        <br>
        <button type="submit" class="btn-add">Ruaj produktin</button>
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

