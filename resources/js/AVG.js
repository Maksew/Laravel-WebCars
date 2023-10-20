document.addEventListener('DOMContentLoaded', function() {
    const visualSelect = document.getElementById('visual');
    const tenueSelect = document.getElementById('tenue');
    const chassisSelect = document.getElementById('chassis');
    const engineSelect = document.getElementById('engine_rating');
    const generalDisplay = document.getElementById('generalDisplay');
    const generalInput = document.getElementById('general'); // Ceci est l'input caché

    // Écouteur d'événements sur chaque <select>
    visualSelect.addEventListener('change', updateGeneralRating);
    tenueSelect.addEventListener('change', updateGeneralRating);
    chassisSelect.addEventListener('change', updateGeneralRating);
    engineSelect.addEventListener('change', updateGeneralRating);

    function updateGeneralRating() {
        const visualValue = parseInt(visualSelect.value, 10);
        const tenueValue = parseInt(tenueSelect.value, 10);
        const chassisValue = parseInt(chassisSelect.value, 10);
        const engineValue = parseInt(engineSelect.value, 10);

        // Calcul de la moyenne
        const average = Math.round((visualValue + tenueValue + chassisValue + engineValue) / 4);

        // Mise à jour de l'élément d'affichage et de l'input caché
        generalDisplay.textContent = average;
        generalInput.value = average;
    }
});
