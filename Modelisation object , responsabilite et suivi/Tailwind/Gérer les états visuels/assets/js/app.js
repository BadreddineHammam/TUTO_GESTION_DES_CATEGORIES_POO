// ============================================
// Récupération des éléments du DOM
// ============================================
const formCategorie = document.getElementById('form-categorie');
const btnSubmit = document.getElementById('btn-submit-form');
const spinnerSubmit = document.getElementById('spinner-submit');
const textSubmit = document.getElementById('text-submit');

// ============================================
// Gestion de l'état de chargement du bouton
// ============================================
function setLoadingState(isLoading) {
    btnSubmit.disabled = isLoading;

    if (isLoading) {
        spinnerSubmit.classList.remove('hidden');
        textSubmit.textContent = 'Enregistrement...';
    } else {
        spinnerSubmit.classList.add('hidden');
        textSubmit.textContent = 'Enregistrer';
    }
}

// ============================================
// Affichage des Toasts (avec Tailwind)
// ============================================
function showToast(message, type = 'success') {
    const container = document.getElementById('toast-container');
    const toast = document.createElement('div');

    // Classes de base pour tous les Toasts
    let classes = 'text-white px-4 py-2 rounded shadow-lg mb-2 transition-opacity duration-500';

    // Couleur conditionnelle
    if (type === 'success') {
        classes += ' bg-green-500';
    } else {
        classes += ' bg-red-500';
    }

    toast.className = classes;
    toast.textContent = message;

    container.appendChild(toast);

    // Disparition avec animation (opacité → 0, puis suppression)
    setTimeout(() => {
        toast.style.opacity = '0';
        setTimeout(() => toast.remove(), 500);
    }, 3000);
}

// ============================================
// Interception de la soumission du formulaire
// ============================================
formCategorie.addEventListener('submit', (e) => {
    e.preventDefault();

    // 1. Passer en état "Chargement"
    setLoadingState(true);

    // 2. Envoyer la requête à l'API
    fetch('api/controllers/CategorieController.php', {
        method: 'POST',
        body: new FormData(formCategorie)
    })
    .then(response => response.json())
    .then(data => {
        showToast("Catégorie enregistrée avec succès !", "success");
        formCategorie.reset();
    })
    .catch(error => {
        showToast("Erreur réseau : Impossible de contacter le serveur.", "error");
        console.error(error);
    })
    .finally(() => {
        // 3. Toujours revenir en état "Repos"
        setLoadingState(false);
    });
});