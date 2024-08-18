function validatePseudo(pseudo) {
    const regex = /^[a-zA-Z0-9_-]{3,20}$/;
    return regex.test(pseudo);
}

function validateGithubURL(url) {
    const regex = /^https:\/\/github\.com\//;
    return regex.test(url);
}

function validateTwitterURL(url) {
    const regex = /^https:\/\/x\.com\//;
    return regex.test(url)
}

function validateLinkedInURL(url) {
    const regex = /^https:\/\/www\.linkedin\.com\//;
    return regex.test(url)
}

document.getElementById('contributionForm').addEventListener('submit', function (event) {
    let isValid = true;

    // pseudo
    const pseudoInput = document.getElementById('pseudo');
    const pseudoError = document.getElementById('pseudoError');
    pseudoError.textContent = '';
    pseudoInput.classList.remove('is-invalid');

    if (!validatePseudo(pseudoInput.value)) {
        pseudoError.textContent = 'Pseudo invalide. Il doit contenir entre 3 et 20 caractères, et peut inclure des lettres, des chiffres, des tirets et underscores.';
        pseudoInput.classList.add('is-invalid');
        isValid = false;
    }

    // github
    const githubInput = document.getElementById('github');
    const githubError = document.getElementById('githubError');
    githubError.textContent = '';
    githubInput.classList.remove('is-invalid');

    if (githubInput.value.trim() && !validateGithubURL(githubInput.value)) {
        githubError.textContent = "L'URL GitHub doit commencer par 'https://github.com/'.";
        githubInput.classList.add('is-invalid');
        isValid = false;
    }

    // twitter
    const twitterInput = document.getElementById('twitter');
    const twitterError = document.getElementById('twitterError');
    twitterError.textContent = '';
    twitterInput.classList.remove('is-invalid');

    if (twitterInput.value.trim() && !validateTwitterURL(twitterInput.value)) {
        twitterError.textContent = "L'URL Twitter doit commencer par 'https://x.com/'.";
        twitterInput.classList.add('is-invalid');
        isValid = false;
    }

    // linkedin
    const linkedinInput = document.getElementById('linkedin');
    const linkedinError = document.getElementById('linkedinError');
    linkedinError.textContent = '';
    linkedinInput.classList.remove('is-invalid');

    if (linkedinInput.value.trim() && !validateLinkedInURL(linkedinInput.value)) {
        linkedinError.textContent = "L'URL LinkedIn doit commencer par 'https://www.linkedin.com/'.";
        linkedinInput.classList.add('is-invalid');
        isValid = false;
    }

    // Validation de l'image
    const pictureInput = document.getElementById('picture');
    const pictureFile = pictureInput.files[0];
    const pictureError = document.getElementById('pictureError');
    pictureError.textContent = '';
    pictureInput.classList.remove('is-invalid');

    if (pictureFile) {
        const allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        const maxSize = 2 * 1024 * 1024; // 2 Mo
        const fileExtension = pictureFile.name.split('.').pop().toLowerCase();
        const fileSize = pictureFile.size;

        if (!allowedExtensions.includes(fileExtension)) {
            pictureError.textContent = 'Format de fichier non autorisé. Les formats acceptés sont : jpg, jpeg, png, gif.';
            pictureInput.classList.add('is-invalid');
            isValid = false;
        } else if (fileSize > maxSize) {
            pictureError.textContent = 'Le fichier est trop volumineux. La taille maximale autorisée est de 2 Mo.';
            pictureInput.classList.add('is-invalid');
            isValid = false;
        }
    }

    if (!isValid) {
        event.preventDefault();
    }
});