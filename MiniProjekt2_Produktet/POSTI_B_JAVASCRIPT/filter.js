const tabela = document
  .getElementById('tabelaProduktet')
  .getElementsByTagName('tbody')[0];

const selectKategori = document.getElementById('filterKategori');
const inputMin = document.getElementById('filterMin');
const inputEmer = document.getElementById('filterEmer');

function filtroProdukte() {
    const kat = selectKategori.value.toLowerCase();
    const min = parseFloat(inputMin.value) || 0;
    const emer = inputEmer.value.toLowerCase();

    for (let i = 0; i < tabela.rows.length; i++) {
        const r = tabela.rows[i];
        const rEmer = r.cells[0].innerText.toLowerCase();
        const rKat  = r.cells[1].innerText.toLowerCase();
        const rCmim = parseFloat(r.cells[2].innerText);

        let shfaq = true;

        if (kat !== "" && rKat !== kat) shfaq = false;
        if (min > 0 && rCmim < min) shfaq = false;
        if (emer !== "" && !rEmer.includes(emer)) shfaq = false;

        r.style.display = shfaq ? "" : "none";
    }
}

selectKategori.addEventListener('change', filtroProdukte);
inputMin.addEventListener('input', filtroProdukte);
inputEmer.addEventListener('input', filtroProdukte);
