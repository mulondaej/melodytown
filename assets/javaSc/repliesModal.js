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

if (replyModalBtn != null) {
replyModalBtn.addEventListener('click', () => {
    const deleteId = replyModalBtn.getAttribute('deleteid');
    idDelete.value = deleteId;
    console.log(deleteId)
});
}

///////////////////////////////////////
// const editForm = document.getElementById('editModal');
// const formEdit = document.getElementById('logFormEdits');

// if(editForm!= null ){
// editForm.addEventListener("click", () => {
//     if (formEdit.style.display === 'none' || formEdit.style.display === '') {
//         formEdit.style.display = 'block';
//     } else {
//         formEdit.style.display = 'none';
//     }
// });
// }

// if (editForm != null) {
//     editForm.addEventListener('click', () => {
//         const updatecontent = editForm.getAttribute('updatecontent');
//         contentUpdate.value = updatecontent;
//         console.log(updatecontent)
//     });
//     }
