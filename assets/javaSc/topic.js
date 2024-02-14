
document.addEventListener("DOMContentLoaded", function () {
//faire apparaître le formulaire du creation du thread en cliquant sur le button "newThread"
const newThread = document.getElementById('newThread');
const modalContainer = document.getElementById('modalContainer');
const threadCloseBtn = document.getElementById('threadCloseBtn');

// Fonction d'affichage de conteneur modal
function openModal() {
    modalContainer.style.display = 'block';
}

// Fonction de clotûre de  conteneur modal
function closeModal() {
    modalContainer.style.display = 'none';
}

// le bouton "Supprimer" par un clic
newThread.addEventListener('click', openModal);

// le button "fermer" par un clic
threadCloseBtn.addEventListener('click', closeModal);

// fermer le conteneur en cliquant n'importe où
modalContainer.addEventListener("click", (e) => {
    if (e.target != modal && e.target != modalText) {
        modalContainer.style.display = "none"
    }
})
});

const editForm = document.getElementById('editModal');
const formEdit = document.getElementById('logFormEdits');

editForm.addEventListener("click", () => {
    if (formEdit.style.display === 'none' || formEdit.style.display === '') {
        formEdit.style.display = 'block';
    } else {
        formEdit.style.display = 'none';
    }
});

const likeBtn = document.getElementById('likeBtn');
likeBtn.addEventListener('click', () => {
    likeBtn.classList.toggle("changeColor");
});


const replyLikeBtn = document.getElementById('replyLikBtn');
replyLikeBtn.addEventListener('click', () => {
    replyLikeBtn.classList.toggle("changeColor");
});

const replyBtn = document.getElementById('replyBtn');
const quotedContent = document.getElementById('comments');
const content = document.getElementById('contentP');

quotedContent.value = content.value
replyBtn.addEventListener('click', () => {
    quotedContent.value += '" ' + '\n\n' + '"';
})

const replyRepliesBtn = document.getElementById('quoteBtn');
// const quotedReply = document.getElementById('comments');
replyBtn.addEventListener('click', () => {
    quotedContent.value += '" ' + content + '\n\n' + '"';
})
