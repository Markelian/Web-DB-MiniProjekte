// validate.js - validimi per format e rezervimeve

function validoRezervimin() {
    const klienti = document.getElementById('klienti').value.trim();
    const data    = document.getElementById('data').value;
    const tipi    = document.getElementById('tipi').value.trim();
    const statusi = document.getElementById('statusi').value;

    if (klienti === "") {
        alert("Ju lutem shkruani emrin e klientit.");
        return false;
    }

    if (data === "") {
        alert("Ju lutem zgjidhni daten e rezervimit.");
        return false;
    }

    const sot = new Date().toISOString().split('T')[0];
    if (data < sot) {
        if (!confirm("Data eshte ne te shkuaren. Doni te vazhdoni?")) {
            return false;
        }
    }

    if (tipi === "") {
        alert("Ju lutem shkruani tipin e rezervimit (p.sh. Dhoma single).");
        return false;
    }

    if (statusi === "") {
        alert("Ju lutem zgjidhni statusin.");
        return false;
    }

    return true;
}
