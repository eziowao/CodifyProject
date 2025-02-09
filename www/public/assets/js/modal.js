document.addEventListener("DOMContentLoaded", function () {

    const forms = document.querySelectorAll(".delete-form");

    forms.forEach(function (form) {
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            let currentForm = e.target;
            let deleteModalElement = document.getElementById("delete-modal");
            if (deleteModalElement) {
                let deleteModal = new bootstrap.Modal(deleteModalElement);
                deleteModal.show();

                const validateButton = document.querySelector('[data-valid="true"]');
                const newButton = validateButton.cloneNode(true);
                validateButton.replaceWith(newButton);

                newButton.addEventListener('click', () => currentForm.submit());
            } else {
                console.error("Element de modal introuvable");
            }
        });
    });
});