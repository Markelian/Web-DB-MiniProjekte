<?php
// forma_shto_rezervim.php
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Shto rezervim</title>
    <link rel="stylesheet" href="../POSTI_A_HTML_CSS/style.css">
</head>
<body>

<header>
    <h1>Shto rezervim të ri</h1>
</header>

<section class="table-section">
    <form action="insert_rezervim.php" method="post" onsubmit="return validoRezervimin();">
        <div>
            <label for="klienti">Klienti:</label>
            <input type="text" id="klienti" name="klienti" required>
        </div>

        <div>
            <label for="data">Data:</label>
            <input type="date" id="data" name="data" required>
        </div>

        <div>
            <label for="tipi">Tipi i rezervimit:</label>
            <input type="text" id="tipi" name="tipi" placeholder="p.sh. Dhoma single" required>
        </div>

        <div>
            <label for="statusi">Statusi:</label>
            <select id="statusi" name="statusi" required>
                <option value="">-- Zgjidh statusin --</option>
                <option value="Aktive">Aktive</option>
                <option value="Në pritje">Në pritje</option>
                <option value="Anuluar">Anuluar</option>
            </select>
        </div>

        <br>
        <button type="submit" class="btn-add">Ruaj rezervimin</button>
        <a href="list_rezervime.php">Kthehu te lista</a>
    </form>
</section>

<script src="../POSTI_B_JavaScript/validate.js"></script>
</body>
</html>
