//Modal
// Récupération des DOM
const profiModalBtn = document.getElementById('profiModalBtn');
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
if (profiModalBtn != null) {
profiModalBtn.addEventListener('click', openModal);
}

// le button "fermer" par un clic
if (closeBtn != null) {
closeBtn.addEventListener('click', closeModal);
}

// fermer le conteneur en cliquant n'importe où
if (modalContainer != null) {
modalContainer.addEventListener("click", (e) => {
    if (e.target != modal && e.target != modalText) {
        modalContainer.style.display = "none"
    }
});
}

///////////////////////////////

if (profiModalBtn != null) {
    profiModalBtn.addEventListener('click', () => {
        const deleteId = profiModalBtn.getAttribute('deleteid');
        idDelete.value = deleteId;
        console.log(deleteId)
    });
}

/////
if (replyModalBtn != null) {
    replyModalBtn.addEventListener('click', () => {
        const deleteId = replyModalBtn.getAttribute('deleteid');
        idDelete.value = deleteId;
        console.log(deleteId)
    });
}
