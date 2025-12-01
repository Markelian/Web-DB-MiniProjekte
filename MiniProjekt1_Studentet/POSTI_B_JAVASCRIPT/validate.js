function validoNoten() {
    const notaInput = document.getElementById('nota');
    const nota = parseInt(notaInput.value);

    if (isNaN(nota) || nota < 4 || nota > 10) {
        alert("Ju lutem vendosni një notë nga 4 në 10.");
        notaInput.focus();
        return false;
    }
    return true;
}
