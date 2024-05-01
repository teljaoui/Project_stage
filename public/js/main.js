document.querySelectorAll(".delete").forEach(function (button) {
    button.addEventListener("click", function (event) {
        if (!confirm("Êtes-vous sûr de vouloir supprimer?")) {
            event.preventDefault();
        }
    });
});

const forms = document.querySelectorAll('.container table form');
const valides = document.querySelectorAll('.afficherform');
const resets = document.querySelectorAll('.reset');

valides.forEach(function (valide, index) {
    valide.addEventListener("click", function () {
        forms[index].style.display = "flex";
        valide.style.display = "none";
    });
});

resets.forEach(function (reset, index) {
    reset.addEventListener('click', function () {
        forms[index].style.display = "none";
        valides[index].style.display = "";
    });
});
