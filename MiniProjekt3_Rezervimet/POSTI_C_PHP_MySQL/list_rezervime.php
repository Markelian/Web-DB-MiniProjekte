<?php
include 'db.php';

$status  = $_GET['status'] ?? '';
$dataMin = $_GET['data_min'] ?? '';
$order   = $_GET['order'] ?? 'data_asc';

switch ($order) {
    case 'data_desc': $orderBy = 'data DESC'; break;
    default:          $orderBy = 'data ASC';
}

$where = [];
if ($status !== '') {
    $statusEsc = mysqli_real_escape_string($conn, $status);
    $where[] = "statusi = '$statusEsc'";
}
if ($dataMin !== '') {
    $dataEsc = mysqli_real_escape_string($conn, $dataMin);
    $where[] = "data >= '$dataEsc'";
}
$whereClause = count($where) ? 'WHERE ' . implode(' AND ', $where) : '';

$sql    = "SELECT * FROM rezervimet $whereClause ORDER BY $orderBy";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Rezervimet</title>
    <link rel="stylesheet" href="../POSTI_A_HTML_CSS/style.css">
</head>
<body>
<header>
    <h1>Rezervimet</h1>
    <p>MiniProjekt 3 – Rezervimet (me DB)</p>
</header>

<section class="filter-section">
    <h2>Filtro rezervimet</h2>
    <form method="get" action="list_rezervime.php">
        <label>Statusi:</label>
        <select name="status">
            <option value="">Të gjitha</option>
            <option value="Aktive"    <?= $status==='Aktive' ? 'selected' : '' ?>>Aktive</option>
            <option value="Në pritje" <?= $status==='Në pritje' ? 'selected' : '' ?>>Në pritje</option>
            <option value="Anuluar"   <?= $status==='Anuluar' ? 'selected' : '' ?>>Anuluar</option>
        </select>

        <label>Data nga:</label>
        <input type="date" name="data_min" value="<?= htmlspecialchars($dataMin) ?>">

        <label>Rendit:</label>
        <select name="order">
            <option value="data_asc"  <?= $order==='data_asc'  ? 'selected' : '' ?>>Data ↑</option>
            <option value="data_desc" <?= $order==='data_desc' ? 'selected' : '' ?>>Data ↓</option>
        </select>

        <button type="submit">Apliko</button>
        <a href="list_rezervime.php" class="btn-add">Reseto</a>
    </form>

    <a href="forma_shto_rezervim.php" class="btn-add">+ Shto rezervim</a>
</section>

<section class="table-section">
    <h2>Lista e rezervimeve</h2>
    <table id="tabelaRezervime">
        <thead>
            <tr>
                <th>ID</th>
                <th>Klienti</th>
                <th>Data</th>
                <th>Tipi</th>
                <th>Statusi</th>
                <th>Veprime</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['klienti']) ?></td>
                    <td><?= $row['data'] ?></td>
                    <td><?= htmlspecialchars($row['tipi']) ?></td>
                    <td><?= htmlspecialchars($row['statusi']) ?></td>
                    <td>
                        <a href="forma_update_rezervim.php?id=<?= $row['id'] ?>">Ndrysho</a> |
                        <a href="delete_rezervim.php?id=<?= $row['id'] ?>"
                           onclick="return confirm('Fshi rezervimin?');">Fshi</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>

<script src="../POSTI_B_JavaScript/filter.js"></script>
</body>
</html>
