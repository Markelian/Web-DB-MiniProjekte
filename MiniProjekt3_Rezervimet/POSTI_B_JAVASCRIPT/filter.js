// filter.js - filtro tabelën e rezervimeve ne frontend

document.addEventListener('DOMContentLoaded', function () {
    const tabelaBody = document
        .getElementById('tabelaRezervime')
        .getElementsByTagName('tbody')[0];

    const selectStatus = document.getElementById('filterStatus');
    const inputDate    = document.getElementById('filterDate');
    const inputKlient  = document.getElementById('filterKlient');

    function filtroRezervimet() {
        const statusVal = selectStatus.value.toLowerCase();
        const dateVal   = inputDate.value; // format YYYY-MM-DD
        const klientVal = inputKlient.value.toLowerCase();

        for (let i = 0; i < tabelaBody.rows.length; i++) {
            const row = tabelaBody.rows[i];
            const klient = row.cells[0].innerText.toLowerCase();
            const data   = row.cells[1].innerText; // po ashtu YYYY-MM-DD
            const status = row.cells[3].innerText.toLowerCase();

            let shfaq = true;

            if (statusVal !== "" && status !== statusVal) {
                shfaq = false;
            }

            if (dateVal !== "" && data < dateVal) {
                // shfaq vetem rezervimet nga kjo date e tutje
                shfaq = false;
            }

            if (klientVal !== "" && !klient.includes(klientVal)) {
                shfaq = false;
            }

            row.style.display = shfaq ? "" : "none";
        }
    }

    selectStatus.addEventListener('change', filtroRezervimet);
    inputDate.addEventListener('change', filtroRezervimet);
    inputKlient.addEventListener('input', filtroRezervimet);
});
