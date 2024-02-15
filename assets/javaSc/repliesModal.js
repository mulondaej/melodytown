//Modal replies
// Récupération des DOM
const replyModalBtn = document.getElementById('replyModalBtn');
const replyModalContainer = document.getElementById('replyModalContainer');
const replyCloseBtn = document.getElementById('replyCloseBtn');

// Fonction d'affichage de conteneur modal
function openModal() {
    replyModalContainer.style.display = 'block';
}

// Fonction de clotûre de  conteneur modal
function closeModal() {
    replyModalContainer.style.display = 'none';
}

// le bouton "Supprimer" par un clic
replyModalBtn.addEventListener('click', openModal);

// le button "fermer" par un clic
replyCloseBtn.addEventListener('click', closeModal);

// fermer le conteneur en cliquant n'importe où
replyModalContainer.addEventListener("click", (e) => {
    if (e.target != modal && e.target != modalText) {
        replyModalContainer.style.display = "none"
    }
});