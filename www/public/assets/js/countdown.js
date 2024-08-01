function getNextMonday() {
    const now = new Date();
    const dayOfWeek = now.getDay();
    const distanceToNextMonday = (dayOfWeek === 0) ? 1 : (8 - dayOfWeek);
    const nextMonday = new Date(now.getFullYear(), now.getMonth(), now.getDate() + distanceToNextMonday);
    nextMonday.setHours(0, 0, 0, 0);
    return nextMonday;
}

function updateCountdown() {
    const now = new Date();
    const nextMonday = getNextMonday();
    const timeRemaining = nextMonday - now;

    const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
    const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

    document.getElementById('days').textContent = String(days).padStart(2, '0');
    document.getElementById('hours').textContent = String(hours).padStart(2, '0');
    document.getElementById('minutes').textContent = String(minutes).padStart(2, '0');
    document.getElementById('seconds').textContent = String(seconds).padStart(2, '0');
}

setInterval(updateCountdown, 1000);
