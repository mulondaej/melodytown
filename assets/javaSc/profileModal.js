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
profiModalBtn.addEventListener('click', openModal);

// le button "fermer" par un clic
closeBtn.addEventListener('click', closeModal);

// fermer le conteneur en cliquant n'importe où
modalContainer.addEventListener("click", (e) => {
    if (e.target != modal && e.target != modalText) {
        modalContainer.style.display = "none"
    }
});

///////////////////////////////
$(document).ready(function () {
    $(".morelink").click(function (e) {
        e.preventDefault();
        $(this).prev().toggle();
        $(this).text($(this).text() == "Read more" ? "Read less" : "Read more");
    });
});


