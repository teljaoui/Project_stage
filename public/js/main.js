document.querySelectorAll(".delete").forEach(function (button) {
    button.addEventListener("click", function (event) {
        if (!confirm("Êtes-vous sûr de vouloir supprimer?")) {
            event.preventDefault();
        }
    });
});

const form = document.querySelector('.container table form');
const valide = document.querySelector('.afficherform');

valide.addEventListener('click', function() {
    valide.style.display = "none"
    form.style.display = "flex";
});
