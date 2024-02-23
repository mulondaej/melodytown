// Récupération des DOM
let commentModalBtn = document.getElementById('commentModalBtn');
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
if (commentModalBtn != null) {
    commentModalBtn.addEventListener('click', openModal);
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

////////////////////////////////

const editCommentForm = document.getElementById('editCommentModal');
const formEditComment = document.getElementById('logFormEdit');

if (editCommentForm != null) {
    editCommentForm.addEventListener("click", () => {
        if (formEditComment.style.display === 'none' || formEditComment.style.display === '') {
            formEditComment.style.display = 'block';
        } else {
            formEditComment.style.display = 'none';
        }
    });
}

///////////////////////////////////////


////
// modification des commentaires par un clic dans un modal form 
let editComments = document.getElementsByClassName('replyComment');

if (editComments != null) {
    for (let ed of editComments) {
        ed.addEventListener('click', (e) => {
            const commentupdate = e.target.getAttribute('commentupdate'); // on lie l'id de l'élément avec le status
            commentUpdate.value = commentupdate; // la valeur de l'élément 
            console.log(commentupdate)
        });
    }

}

/////////////////////////////
// modal suppression de commentaires
let commentsModalBtn = document.getElementsByClassName('commentModalBtn');
let idCommentsDelete = document.getElementById('idCommentsDelete').value;

if (commentsModalBtn != null) {
    for (let de of commentsModalBtn) {
        de.addEventListener('click', (e) => {
            let commentDelete = e.target.getAttribute('commentdelete');
            idCommentsDelete.value = commentDelete;
            console.log(commentDelete)
        });
    }
}

// pour repondre au commentaire dans un input textbox en modal en le quotant
let statusReplyBtn = document.getElementsByClassName('statusReplyBtn');

if (statusReplyBtn != null) {
    for (let re of statusReplyBtn) { 
        re.addEventListener('click', (e) => {
            let replystatus = e.target.getAttribute('commentstatus'); // on lie l'id de l'élément avec le status
            commenting.value = "@" + replystatus + "\n"; // la valeur de l'élément 
            console.log(replystatus)
        });
    }
}

