document.addEventListener('DOMContentLoaded', function () {
    const themeToggle = document.getElementById('theme-toggle');
    const body = document.body;

    themeToggle.addEventListener('click', function () {
        body.classList.toggle('light-mode');
        const isLightMode = body.classList.contains('light-mode');
        localStorage.setItem('lightMode', isLightMode);
    });

    const storedLightMode = localStorage.getItem('lightMode');
    if (storedLightMode) {
        body.classList.toggle('light-mode', JSON.parse(storedLightMode));
    }
});