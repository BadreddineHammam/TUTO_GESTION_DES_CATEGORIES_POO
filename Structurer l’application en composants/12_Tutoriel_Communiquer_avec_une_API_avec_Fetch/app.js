const API_URL = 'backend/api.php';
let ligneEnEdition = null;

const tableBody = document.getElementById('tableBody');
const formCategorie = document.getElementById('formCategorie');
const champNom = document.getElementById('nom');
const champCouleur = document.getElementById('couleur');
const champIcone = document.getElementById('icone');


// Charger les catégories
function chargerCategories() {
    fetch(API_URL)
        .then(res => res.json())
        .then(result => {

            console.log(result);

            tableBody.innerHTML = '';

            result.data.forEach(cat => {

                const tr = document.createElement('tr');

                tr.innerHTML = `
                <td>${cat.id}</td>
                <td>${cat.nom}</td>
                <td>${cat.couleur}</td>
                <td>${cat.icone}</td>
                <td>
                    <button class="btn-supprimer">Supprimer</button>
                </td>
`;

                tr.querySelector('button').addEventListener('click', () => {

                    fetch(API_URL, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            id: cat.id
                        })
                    })
                    .then(res => res.json())
                    .then(() => chargerCategories());

                });

                tableBody.appendChild(tr);
            });
        });
}


// Ajouter / modifier une catégorie
formCategorie.addEventListener('submit', (e) => {

    e.preventDefault();

    const categorie = {
        nom: champNom.value,
        couleur: champCouleur.value,
        icone: champIcone.value
    };

    console.log("Données envoyées :", categorie);

    fetch(API_URL, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(categorie)
    })
    .then(res => res.json())
    .then(result => {

        console.log("Réponse PHP :", result);

        formCategorie.reset();

        chargerCategories();
    })
    .catch(error => {
        console.error("Erreur :", error);
    });
});
const btnAjouter = document.getElementById('btnAjouter');
const btnAnnuler = document.getElementById('btnAnnuler');

// Afficher le formulaire
btnAjouter.addEventListener('click', () => {
    formCategorie.style.display = 'block';
});

// Annuler
btnAnnuler.addEventListener('click', () => {
    formCategorie.reset();
    formCategorie.style.display = 'none';
    ligneEnEdition = null;
});
// Charger les catégories au démarrage
document.addEventListener('DOMContentLoaded', chargerCategories);