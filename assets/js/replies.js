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
if (replyModalBtn != null) {
    // le bouton "Supprimer" par un clic
    replyModalBtn.addEventListener('click', openModal);
}

// le button "fermer" par un clic
if (replyCloseBtn != null) {
    replyCloseBtn.addEventListener('click', closeModal);
}

// fermer le conteneur en cliquant n'importe où
if (replyModalContainer != null) {
    replyModalContainer.addEventListener("click", (e) => {
        if (e.target != modal && e.target != modalText) {
            replyModalContainer.style.display = "none"
        }
    });
}

// le bouton "Supprimer" par un clic extérieur au container
if (replyModalBtn != null) { // si le bouton n'est pas présent dans la page
    replyModalBtn.addEventListener('click', () => { // on rajoute l'action de clic 
        const deleteId = replyModalBtn.getAttribute('deleteid'); // on lie l'id de l'élément avec le status
        idDelete.value = deleteId; // on l'enregistre l'id de l'élément avec le status pour l'envoyer au php
        console.log(deleteId)
    });
}

///////////////////////////////////////
// modal replies
const editFormReply = document.getElementById('replyEditModal');
const replyFormEdit = document.getElementById('replyLogFormEdits');

if (editFormReply != null) {
    editFormReply.addEventListener("click", () => {
        if (replyFormEdit.style.display === 'none' || replyFormEdit.style.display === '') {
            replyFormEdit.style.display = 'block';
        } else {
            replyFormEdit.style.display = 'none';
        }
    });
}

// pour modifier les reponses dans un input textbox en modal
if (editFormReply != null) {
    editFormReply.addEventListener('click', () => {
        const updatereply = editFormReply.getAttribute('updatereply');
        const repliesUpdate = document.getElementById('repliesUpdate'); // recuperer l'id de textbar
        if (repliesUpdate) {
            repliesUpdate.value = updatereply;
            console.log(updatereply)
        }
    });
}


// pour repondre le contenu du topic dans un input textbox en modal en le quotant
let repliesBtn = document.getElementsByClassName('repliesBtn');

if (repliesBtn != null) {
    for (let r of repliesBtn) {
        r.addEventListener('click', (e) => {
            let quotereply = e.target.getAttribute('quotereply');
            replyTextBar.value = "<<" + quotereply + ">>" + "\n";
            console.log(quotereply)
        });

    }

}