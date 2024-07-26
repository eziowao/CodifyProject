function getNextMonday() {
    const now = new Date();
    const dayOfWeek = now.getDay();
    const distanceToNextMonday = (dayOfWeek === 1) ? 0 : (8 - dayOfWeek);
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

    document.getElementById('days').textContent = days;
    document.getElementById('hours').textContent = hours;
    document.getElementById('minutes').textContent = minutes;
    document.getElementById('seconds').textContent = seconds;
}

setInterval(updateCountdown, 1000);
