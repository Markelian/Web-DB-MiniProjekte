// Mer referenca te elementeve
const tabela = document.getElementById('tabelaStudentet').getElementsByTagName('tbody')[0];
const inputMinNota = document.getElementById('minNota');
const inputSearchEmri = document.getElementById('searchEmri');
const btnFiltro = document.getElementById('btnFiltro');
const btnPastro = document.getElementById('btnPastro');

// Event për butonin "Filtro"
btnFiltro.addEventListener('click', function () {
    const minNota = parseInt(inputMinNota.value) || 0;
    const searchEmri = inputSearchEmri.value.toLowerCase();

    for (let i = 0; i < tabela.rows.length; i++) {
        const row = tabela.rows[i];
        const emri = row.cells[1].innerText.toLowerCase();
        const nota = parseInt(row.cells[3].innerText);

        let shfaq = true;

        if (minNota > 0 && nota < minNota) {
            shfaq = false;
        }

        if (searchEmri !== "" && !emri.includes(searchEmri)) {
            shfaq = false;
        }

        row.style.display = shfaq ? "" : "none";
    }
});

// Event për butonin "Pastro"
btnPastro.addEventListener('click', function () {
    inputMinNota.value = "";
    inputSearchEmri.value = "";

    for (let i = 0; i < tabela.rows.length; i++) {
        tabela.rows[i].style.display = "";
    }
});
