//Modal
// Récupération des DOM
const profiModalBtn = document.getElementById('profiModalBtn');
const comModalBtn = document.getElementById('commentModalBtn');
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
comModalBtn.addEventListener('click', openModal);

// le button "fermer" par un clic
closeBtn.addEventListener('click', closeModal);

// fermer le conteneur en cliquant n'importe où
modalContainer.addEventListener("click", (e) => {
    if (e.target != modal && e.target != modalText) {
        modalContainer.style.display = "none"
    }
})

function search() {
    var searchTerm = document.getElementById("searchInput").value;
    // Perform search logic here (this is just a placeholder)
    document.getElementById("searchResults").innerHTML = "<p>Search results for: " + searchTerm + "</p>";
  }
  