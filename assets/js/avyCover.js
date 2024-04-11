const imgModalBtn = document.getElementById('imgModalBtn');
const imgModalContent = document.getElementById('myModal');
const imgCloseBtn = document.getElementById('imgClose');

// Fonction d'affichage de conteneur modal
function openModal() {
    imgModalContent.style.display = 'block';
}

// Fonction de clotûre de  conteneur modal
function closeModal() {
    imgModalContent.style.display = 'none';
}

if (imgModalBtn != null) {
    // le bouton "Supprimer" par un clic
    imgModalBtn.addEventListener('click', openModal);
}

if (imgCloseBtn != null) {
    // le button "fermer" par un clic
    imgCloseBtn.addEventListener('click', closeModal);
}

// fermer le conteneur en cliquant n'importe où
imgModalContent.addEventListener("click", (e) => {
    if (e.target != modal && e.target != modalText) {
        imgModalContent.style.display = "none"
    }
});

//////////////////
//cover picture
const coverModalBtn = document.getElementById('editCover');
const coverModalContent = document.getElementById('myModals');
const coverCloseBtn = document.getElementById('imgCloses');

// Fonction d'affichage de conteneur modal
function openModals() {
    coverModalContent.style.display = 'block';
}

// Fonction de clotûre de  conteneur modal
function closeModals() {
    coverModalContent.style.display = 'none';
}

if (coverModalBtn != null) {
    // le bouton "Supprimer" par un clic
    coverModalBtn.addEventListener('click', openModals);
}

if (coverCloseBtn != null) {
    // le button "fermer" par un clic
    coverCloseBtn.addEventListener('click', closeModals);
}

// fermer le conteneur en cliquant n'importe où
coverModalContent.addEventListener("click", (e) => {
    if (e.target != modal && e.target != modalText) {
        coverModalContent.style.display = "none"
    }
});