console.log('test delete account');

document.addEventListener("DOMContentLoaded", function () {

    const accountDeleteForm = document.querySelector(".delete-account");

    if (accountDeleteForm) {
        accountDeleteForm.addEventListener("submit", function (e) {
            e.preventDefault();
            let currentForm = e.target;
            let deleteAccountModalElement = document.getElementById("delete-account-modal");
            if (deleteAccountModalElement) {
                let deleteAccountModal = new bootstrap.Modal(deleteAccountModalElement);
                deleteAccountModal.show();

                const validateButton = deleteAccountModalElement.querySelector('[data-valid="true"]');
                const newButton = validateButton.cloneNode(true);
                validateButton.replaceWith(newButton);

                newButton.addEventListener('click', () => currentForm.submit());
            } else {
                console.error("Element de modal de suppression de compte introuvable");
            }
        });
    }
});