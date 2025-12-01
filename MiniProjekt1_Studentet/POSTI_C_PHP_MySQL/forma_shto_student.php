<?php
// nese do CSS te njejte:
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Shto student të ri</title>
    <link rel="stylesheet" href="./POSTI_A_HMTL_CSS/style.css">
</head>
<body>

<header>
    <h1>Shto student të ri</h1>
</header>

<section class="table-section">
    <form action="insert_student.php" method="post" onsubmit="return validoStudentin();">
        <div>
            <label for="emri">Emri:</label>
            <input type="text" id="emri" name="emri" required>
        </div>
        <div>
            <label for="mbiemri">Mbiemri:</label>
            <input type="text" id="mbiemri" name="mbiemri" required>
        </div>
        <div>
            <label for="nota">Nota:</label>
            <input type="number" id="nota" name="nota" min="4" max="10" required>
        </div>
        <br>
        <button type="submit" class="btn-add">Ruaj studentin</button>
        <a href="list_studentet.php">Kthehu te lista</a>
    </form>
</section>

<script>
function validoStudentin(){
    const emri = document.getElementById('emri').value.trim();
    const mbiemri = document.getElementById('mbiemri').value.trim();
    const nota = parseInt(document.getElementById('nota').value);

    if(emri === "" || mbiemri === ""){
        alert("Ju lutem plotësoni emrin dhe mbiemrin.");
        return false;
    }
    if(isNaN(nota) || nota < 4 || nota > 10){
        alert("Nota duhet të jetë nga 4 në 10.");
        return false;
    }
    return true;
}
</script>

</body>
</html>
