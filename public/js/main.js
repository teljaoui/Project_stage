document.querySelectorAll(".delete").forEach(function (button) {
    button.addEventListener("click", function (event) {
        if (!confirm("Êtes-vous sûr de vouloir supprimer?")) {
            event.preventDefault();
        }
    });
});
