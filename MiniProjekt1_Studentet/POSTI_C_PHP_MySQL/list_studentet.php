<?php
include 'db.php';

// Lexojme vlerat nga GET (nese ekzistojne)
$order    = $_GET['order']    ?? 'nota_desc';
$minNota  = $_GET['min_nota'] ?? '';
$minNota  = $minNota !== '' ? (int)$minNota : null;

// Percaktojme ORDER BY sipas zgjedhjes
switch ($order) {
    case 'nota_asc':
        $orderBy = 'nota ASC';
        break;
    case 'emri_asc':
        $orderBy = 'emri ASC';
        break;
    case 'emri_desc':
        $orderBy = 'emri DESC';
        break;
    default: // nota_desc
        $orderBy = 'nota DESC';
}

// Ndertojme WHERE sipas notes minimale
$where = '';
if ($minNota !== null && $minNota > 0) {
    $where = "WHERE nota >= $minNota";
}

// Query final
$sql = "SELECT * FROM studentet $where ORDER BY $orderBy";
// Mund te heqesh LIMIT nese do te shohesh te gjithe
// $sql .= " LIMIT 50";

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Lista e Studentëve</title>
    <link rel="stylesheet" href="../POSTI_A_HMTL_CSS/style.css">
</head>
<body>
<header>
    <h1>Lista e Studentëve</h1>
    <p>MiniProjekt 1 – Studentët (me DB)</p>
</header>
<section class="filter-section">
<form method="get" action="list_studentet.php">
        <label for="min_nota">Nota minimale:</label>
        <input type="number"
               id="min_nota"
               name="min_nota"
               min="4"
               max="10"
               value="<?= isset($_GET['min_nota']) ? htmlspecialchars($_GET['min_nota']) : '' ?>">

        <label for="order">Rendit sipas:</label>
        <select id="order" name="order">
            <option value="nota_desc" <?= (($_GET['order'] ?? '') === 'nota_desc') ? 'selected' : '' ?>>
                Nota (nga nota më e madhe)
            </option>
            <option value="nota_asc" <?= (($_GET['order'] ?? '') === 'nota_asc') ? 'selected' : '' ?>>
                Nota (nga nota më e vogel)
            </option>
            <option value="emri_asc" <?= (($_GET['order'] ?? '') === 'emri_asc') ? 'selected' : '' ?>>
                Emri (A → Z)
            </option>
            <option value="emri_desc" <?= (($_GET['order'] ?? '') === 'emri_desc') ? 'selected' : '' ?>>
                Emri (Z → A)
            </option>
        </select>

        <button type="submit" id="btnFiltro">Apliko</button>
        <a href="list_studentet.php" class="btn-add">Reseto</a>
    </form>
</section>

<section class="table-section">
    <h2>Top studentët sipas notës</h2>
    <a href="forma_shto_student.php" class="btn-add">+ Shto student</a>

    <table id="tabelaStudentet">
        <thead>
            <tr>
                <th>ID</th>
                <th>Emri</th>
                <th>Mbiemri</th>
                <th>Nota</th>
                <th>Veprime</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['emri']) ?></td>
                    <td><?= htmlspecialchars($row['mbiemri']) ?></td>
                    <td><?= $row['nota'] ?></td>
                    <td>
                        <a href="forma_update.php?id=<?= $row['id'] ?>">Ndrysho</a> |
                        <a href="delete_student.php?id=<?= $row['id'] ?>" onclick="return confirm('Fshi studentin?');">Fshi</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>

<script src="../POSTI_B_JavaScript/filter.js"></script>
</body>
</html>
