<?php
include 'db.php';

$order      = $_GET['order'] ?? 'cmim_asc';
$min_cmim   = $_GET['min_cmim'] ?? '';
$kategori   = $_GET['kategori'] ?? '';

$min_cmim = $min_cmim !== '' ? (float)$min_cmim : null;

switch ($order) {
    case 'cmim_desc': $orderBy = 'cmimi DESC'; break;
    case 'emri_asc':  $orderBy = 'emri ASC';   break;
    case 'emri_desc': $orderBy = 'emri DESC';  break;
    default:          $orderBy = 'cmimi ASC';
}

$where = [];
if ($min_cmim !== null && $min_cmim >= 0) {
    $where[] = "cmimi >= $min_cmim";
}
if ($kategori !== '') {
    $kategoriEsc = mysqli_real_escape_string($conn, $kategori);
    $where[] = "kategoria = '$kategoriEsc'";
}
$whereClause = count($where) ? 'WHERE ' . implode(' AND ', $where) : '';

$sql    = "SELECT * FROM produktet $whereClause ORDER BY $orderBy";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Lista e Produkteve</title>
    <link rel="stylesheet" href="../POSTI_A_HTML_CSS/style.css">
</head>
<body>

<header>
    <h1>Lista e Produkteve</h1>
    <p>MiniProjekt 2 – Produktet (me DB)</p>
</header>

<section class="filter-section">
    <h2>Filtro & Rendit</h2>
    <form method="get" action="list_produkte.php">
        <label>Kategoria:</label>
        <select name="kategori">
            <option value="">Të gjitha</option>
            <option value="Ushqime"    <?= $kategori==='Ushqime' ? 'selected' : '' ?>>Ushqime</option>
            <option value="Elektronikë"<?= $kategori==='Elektronikë' ? 'selected' : '' ?>>Elektronikë</option>
            <option value="Higjienë"   <?= $kategori==='Higjienë' ? 'selected' : '' ?>>Higjienë</option>
        </select>

        <label>Çmimi minimal:</label>
        <input type="number" name="min_cmim" step="0.1"
               value="<?= htmlspecialchars($_GET['min_cmim'] ?? '') ?>">

        <label>Rendit:</label>
        <select name="order">
            <option value="cmim_asc"  <?= $order==='cmim_asc'  ? 'selected' : '' ?>>Çmimi ↑</option>
            <option value="cmim_desc" <?= $order==='cmim_desc' ? 'selected' : '' ?>>Çmimi ↓</option>
            <option value="emri_asc"  <?= $order==='emri_asc'  ? 'selected' : '' ?>>Emri A–Z</option>
            <option value="emri_desc" <?= $order==='emri_desc' ? 'selected' : '' ?>>Emri Z–A</option>
        </select>

        <button type="submit">Apliko</button>
        <a href="list_produkte.php" class="btn-add">Reseto</a>
    </form>

    <a href="forma_shto_produkt.php" class="btn-add">+ Shto produkt</a>
</section>

<section class="table-section">
    <h2>Lista e produkteve</h2>
    <table id="tabelaProduktet">
        <thead>
            <tr>
                <th>ID</th>
                <th>Emri</th>
                <th>Kategoria</th>
                <th>Çmimi</th>
                <th>Sasia</th>
                <th>Veprime</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['emri']) ?></td>
                    <td><?= htmlspecialchars($row['kategoria']) ?></td>
                    <td><?= $row['cmimi'] ?></td>
                    <td><?= $row['sasia'] ?></td>
                    <td>
                        <a href="forma_update_produkt.php?id=<?= $row['id'] ?>">Ndrysho</a> |
                        <a href="delete_produkt.php?id=<?= $row['id'] ?>"
                           onclick="return confirm('Fshi produktin?');">Fshi</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>

<script src="../POSTI_B_JavaScript/filter.js"></script>
</body>
</html>
