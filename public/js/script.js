
const ctx = document.getElementById('userChart').getContext('2d');
const userChart = new Chart(ctx, {
    type: 'bar', // Type de graphique (bar, line, pie, etc.)
    data: {
        labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'], // Mois
        datasets: [{
            label: 'Nouveaux Joueurs',
            data: [12, 19, 3, 5, 5, 3, 7, 12, 9, 7, 14, 15], // Données des nouveaux utilisateurs
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'red',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});








/*const gameCtx = document.getElementById('gameChart').getContext('2d');
const gameChart = new Chart(gameCtx, {
type: 'line', // Type de graphique
data: {
    labels: ['Partie A', 'Partie B', 'Partie C', 'Partie D'], // Noms des jeux
    datasets: [{
        label: 'Partie les Plus Joués',
        data: [300, 50, 100, 40], // Données des jeux
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)'
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)'
        ],
        borderWidth: 1
    }]
}
});


const data = [
    'Apple',
    'Banana',
    'Cherry',
    'Date',
    'Fig',
    'Grape',
    'Honeydew',
    'Kiwi',
    'Lemon',
    'Mango'
];*/