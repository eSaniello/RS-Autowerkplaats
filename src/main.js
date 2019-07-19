var klant;

function setKlant() {
    const tmp = document.getElementById('klant');
    klant = tmp.options[tmp.selectedIndex].value;
    console.log(klant);
}

function setKlantId() {
    klant ? document.getElementById('selectedKlantId').value = klant : '';
    sessionStorage.klantId = klant;

}

function getKlantId() {
    klantId = sessionStorage.getItem("klantId");
    return klantId;
}