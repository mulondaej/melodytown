//Modal
// Récupération des DOM
const openModalBtn = document.getElementById('openModalBtn');
const modalContainer = document.getElementById('modalContainer');
const closeBtn = document.getElementById('closeBtn');

// Fonction d'affichage de conteneur modal
function openModal() {
    modalContainer.style.display = 'block';
}

// Fonction de clotûre de  conteneur modal
function closeModal() {
    modalContainer.style.display = 'none';
}

// le bouton "Supprimer" par un clic
openModalBtn.addEventListener('click', openModal);

// le button "fermer" par un clic
closeBtn.addEventListener('click', closeModal);

// fermer le conteneur en cliquant n'importe où
modalContainer.addEventListener("click", (e) => {
    if (e.target != modal && e.target != modalText) {
        modalContainer.style.display = "none"
    }
})