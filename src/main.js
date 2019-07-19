var klant;

function setKlant() {
    const tmp = document.getElementById('klant');
    klant = tmp.options[tmp.selectedIndex].value;
    console.log(klant);
}

function setKlantId() {
    klant ? document.getElementById('selectedKlantId').value = klant : '';
}

function getKlantId() {
    const tmp = document.getElementById('klant');
    klant = tmp.options[tmp.selectedIndex].value;
    return klant;
}