document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    const dateInput = document.getElementById('published_at');

    form.addEventListener('submit', (event) => {
        const selectedDate = new Date(dateInput.value);

        if (isNaN(selectedDate.getTime())) {
            alert('La date sélectionnée est invalide.');
            event.preventDefault();
            return;
        }

        // Vérifier si la date est un lundi
        if (selectedDate.getDay() !== 1) {
            alert('La date de publication doit être un lundi.');
            event.preventDefault();
            return;
        }

        // Vérifier si l'heure est minuit (00:00)
        if (selectedDate.getHours() !== 0 || selectedDate.getMinutes() !== 0 || selectedDate.getSeconds() !== 0) {
            alert('La date de publication doit être à minuit.');
            event.preventDefault();
            return;
        }
    });
});