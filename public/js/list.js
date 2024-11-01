/*function search_titre() {
    let input = document.getElementById('searchbar').value
    input = input.toLowerCase();
    let x = document.getElementsByClassName('titres');

    for (let i = 0; i < x.length; i++) {
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display = "none";
        }
        else{
            x[i].style.display = ""
        }
    }
}*/

function search_titre() {
    // Récupère la valeur de la barre de recherche et la convertit en minuscules
    let input = document.getElementById('searchbar');
    let filter = input.value.toLowerCase();
    let table = document.querySelector('table');
    let tr = table.getElementsByTagName('tr');

    // Parcourt toutes les lignes de la table (en commençant par 1 pour ignorer l'en-tête)
    for (let i = 1; i < tr.length; i++) {
        let tdTitle = tr[i].getElementsByTagName('td')[0]; // Titre
        let tdStartTime = tr[i].getElementsByTagName('td')[1]; // Date de début
        let tdEndTime = tr[i].getElementsByTagName('td')[2]; // Date de fin
        let tdStatus = tr[i].getElementsByTagName('td')[3]; // Statut

        // Vérifie si les cellules existent et si le texte correspond à la recherche
        if (tdTitle || tdStartTime || tdEndTime || tdStatus) {
            let titleText = tdTitle.textContent || tdTitle.innerText;
            let startTimeText = tdStartTime.textContent || tdStartTime.innerText;
            let endTimeText = tdEndTime.textContent || tdEndTime.innerText;
            let statusText = tdStatus.textContent || tdStatus.innerText;

            // Si l'un des champs contient le texte de recherche, on affiche la ligne, sinon on la cache
            if (
                titleText.toLowerCase().includes(filter) ||
                startTimeText.toLowerCase().includes(filter) ||
                endTimeText.toLowerCase().includes(filter) ||
                statusText.toLowerCase().includes(filter)
            ) {
                tr[i].style.display = ""; // Afficher la ligne
            } else {
                tr[i].style.display = "none"; // Cacher la ligne
            }
        }
    }
}
