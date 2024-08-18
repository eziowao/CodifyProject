function validateURL(url) {
    const regex = /^https:\/\/[a-zA-Z0-9_-]+\.github\.io\/[a-zA-Z0-9_-]+\/$/;
    return regex.test(url);
}

document.getElementById('contributionForm').addEventListener('submit', function (event) {
    const linkInput = document.getElementById('link');
    const linkError = document.getElementById('linkError');
    const url = linkInput.value.trim();

    linkError.textContent = '';
    linkInput.classList.remove('is-invalid');

    if (!validateURL(url)) {
        event.preventDefault();
        linkError.textContent = 'Le lien doit être au format "https://PseudoGithub.github.io/NomDuProjet/".';
        linkInput.classList.add('is-invalid');
    }
});