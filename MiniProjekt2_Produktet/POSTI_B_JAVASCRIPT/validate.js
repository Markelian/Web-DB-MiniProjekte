// validate.js

function validoProduktin() {
    const emri = document.getElementById('emri').value.trim();
    const kategoria = document.getElementById('kategoria').value.trim();
    const cmimi = parseFloat(document.getElementById('cmimi').value);
    const sasia = parseInt(document.getElementById('sasia').value);

    if (emri === "") {
        alert("Ju lutem shkruani emrin e produktit.");
        return false;
    }

    if (kategoria === "") {
        alert("Ju lutem zgjidhni kategorinë.");
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
}
