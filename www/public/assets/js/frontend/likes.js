document.addEventListener('DOMContentLoaded', function () {
    const likeButtons = document.querySelectorAll('.like-button');

    likeButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();

            const button = this;
            const contributionId = button.getAttribute('data-contribution-id');
            const icon = document.getElementById('like-icon-' + contributionId);

            button.classList.add('pulsate');

            setTimeout(() => {
                button.classList.remove('pulsate');
            }, 600); // durée de l'animation CSS

            fetch(window.location.href, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({ contribution_id: contributionId })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const likeCountSpan = document.getElementById('like-count-' + contributionId);
                        likeCountSpan.textContent = data.new_like_count;

                        if (data.liked) {
                            icon.classList.remove('fa-regular');
                            icon.classList.add('fa-solid');
                        } else {
                            icon.classList.remove('fa-solid');
                            icon.classList.add('fa-regular');
                        }
                    } else {
                        alert('Une erreur est survenue : ' + data.message);
                    }
                })
                .catch(error => console.error('Erreur:', error));
        });
    });
});
